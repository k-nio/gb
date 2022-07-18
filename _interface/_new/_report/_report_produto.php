<title>Relatório de Produto Acabado</title>
<link rel="stylesheet" type="text/css" href="./_CSS/_report.css"/>
 <?php
      $ids = filter_input(INPUT_POST,'rel');
      if ($ids){
          
          $results = $con->pesquisar("SELECT * FROM ordem_producao o join _produto p on p.id_produto = o.id_produto where id_ordem = '$ids' ");
       while ($dado = mysqli_fetch_array($results)){
           $produto = $dado['produto'];
           $id_produto = $dado['id_produto'];
           $versao= $dado['versao'];
           $data = $dado['data'];
           $lote = $dado['lote'];
           $ord = $dado['id_ordem'];
           $tanque = $dado['tanque'];          
           $status = $dado['situacao'];
           $quantidade = $dado['quantidade'];
           $timestamp = strtotime($data); 
           $newDate = date("d/m/Y", $timestamp );

       }
          
        ?>
<section id="display-ord">
    <a href="" class="no-print" id="fx">&times;</a>
<form method="post" action="./_report.php?menu-report=6">
            <table>
                <tr>
                    <th colspan="6"><h2>Relatório de Produto</h2></th>
                </tr>
                <tr>
              <th>Produto</th> <td > <?php echo $produto; ?></td>
              <th>Versão</th>  <td> <?php echo $versao; ?></td>
              <th>Lote</th>    <td> <?php echo $lote; ?></td>
          
                </tr>
                <tr>
            <th>Data</th><td>      <?php echo $newDate; ?></td>
            <th>Quantidade</th><td><?php echo $quantidade; ?></td>
            <th>Ordem</th><td>     <?php echo $ids; ?></td>
           
            </table> 
            <table>
                <tr><th colspan="4"><h2>Resultados</h2></th> </tr>
                <tr>
                    <th>Propriedade</th>
                    <th>Especificação</th>
                    <th>Unidade</th>
                    <th>Resultado</th>
                </tr>
                <?php 
                $result_ = $con->pesquisar("SELECT * FROM `especificacao` WHERE `id_produto` = '$id_produto'");
                while ($dado = mysqli_fetch_array($result_)){
                     $id_especification = $dado['id_especification'];
                     $propriedade = $dado['parametro'];
                    $especifica_ = $dado['valor'];
                    $unidade_ = $dado['unidade'];
                    $propriedade_ = iconv( "UTF-8" , "ASCII//TRANSLIT//IGNORE" , $propriedade );
                    $string = preg_replace( array( '/[ ]/' , '/[^A-Za-z0-9\-]/' ) , array( '' , '' ) , $propriedade_ );
                    
                ?>
                <tr>
                    <th>
                        <ul>
                    <li><?php echo $propriedade;?></li>
                
                </ul>
                    </th>
                    <th>
                        <ul>
                    <li><?php echo $especifica_;?></li>
                
                </ul>
                    </th>
                    <th>
                        <ul>
                    <li><?php echo $unidade_;?></li>
                
                </ul>
                    </th>
                    <th>
                        <ul>
                            <li>
                                <input type="text" class="campo-rel" name="<?php echo $string;?>" value="">
                            </li>
                        </ul>
                    </th>
                </tr>
                    <?php } ?>
                <tr>
                    <td colspan="1">
                        <input type="hidden" name="lote" value="<?php echo $lote; ?>">
                        <input type="hidden" name="id_produto" value="<?php echo $id_produto;?>">
                        <input type="hidden" name="id_ordem" value="<?php echo $ids;?>">
                    Conclusão:
                    </td>
                    <td colspan="3">
                        <textarea id="txt" name="conclusao" ></textarea>
                    </td>
                    
                  
                    
                </tr>
                <tr>
                    <td colspan="1">
                    </td>
                    <td colspan="2">
                        
                    </td>
                    
                    <th>
                        <input type="submit" class="bt" name="action" value="Salvar">
                    </th>
                    
                </tr>
            </table>
        </form>
</section>
<?php
      }