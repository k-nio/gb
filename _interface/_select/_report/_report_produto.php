<title>Relatório de Produto Acabado</title>
<link rel="stylesheet" href="./_CSS/_report.css"/>
 <?php
      $ids = filter_input(INPUT_POST,'id');
      if ($ids){
        ?>
<section id="display-ord">
    <a href="" class="no-print" id="fx">&times;</a>
<?php
 
    $result = $con->pesquisar("SELECT * FROM ordem_producao o join _produto p on o.id_produto = p.id_produto WHERE id_ordem = '$ids'");
    
    while ($dados = mysqli_fetch_array($result)){
           $id_produto = $dados['id_produto'];
           $produto = $dados['produto'];
           $versao= $dados['versao'];
           $data = $dados['data'];
           $lote = $dados['lote'];
           $ord = $dados['id_ordem'];
           $solicitante = $dados['id_funcionario'];
           $status = $dados['situacao'];
           $quantidade = $dados['quantidade'];
           $timestamp = strtotime($data); 
           $newDate = date("d/m/Y", $timestamp );
    }

?>
    <div id="folhas">
    <table id="relatorio-title">
                <tr>
                    <th colspan="6"><h2>Relatório de Produto</h2></th>
                </tr>
                <tr>
              <th>Produto</th><td > <?php echo $produto; ?></td>
              <th>Versão</th>  <td> <?php echo $versao; ?></td>
              <th>Lote</th> <td> <?php echo $lote; ?></td>
          
                </tr>
                <tr>
                    <th>Data</th><td> <?php echo $newDate; ?></td>
            <th>Quantidade</th><td><?php echo $quantidade; ?></td>
            <th>Ordem</th><td> <?php echo $ord; ?></td>
           
</table> 
        <table id="relatorio-especifications">
    <tr>
        <th>Propriedade</th>
        <th>Unidade</th>
        <th>Metodo</th>
        <th>Especificação</th>
        <th>Resultado</th>
    </tr>

<?php
$consulta = $con->pesquisar("SELECT * FROM `especificacao` e join _report_resultados r on r.id_especification = e.id_especification WHERE `id_produto` = $id_produto and r.id_ordem = $ids");
while ($dados = mysqli_fetch_array($consulta)){
    $resultado = $dados['resultado'];
    $parametro = $dados['parametro'];
    $metodo = $dados['metodo'];
    $valor = $dados['valor'];
    $unidade = $dados['unidade'];
    ?>
    <tr>
        <td><?php echo "$parametro"; ?></td>
        <td><?php echo "$unidade"; ?></td>
        <td><?php echo "$metodo"; ?></td>
        <td><?php echo "$valor"; ?></td>
        <td><?php echo "$resultado"; ?></td>
    </tr>
        <?php
        }
?>
</table>
    </div>
</section>
<?php
      }
      
      
      
    