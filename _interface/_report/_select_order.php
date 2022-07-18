<title>Ordens de produção</title>
        <?php
      $consulta = filter_input(INPUT_POST,'pesquisar');
      if ($consulta){
        ?>
<section id="display-ord">
    <a href="" id="fx">&times;</a>
    <form id="id-ord" action="./_report.php?menu-report=2" method="post"></form>
    <form id="id-rel" action="./_report.php?menu-report=1" method="post"></form>
    
    <table id="ord-display">
        <tr>
            <th>Data</th>
            <th>Ordem</th>
            <th style="width: 300px;">Produto</th>
            <th style="width: 200px;">Versão</th>
            <th>Lote</th>
            <th>Solicitante</th>
            <th>Quantidade</th>
            <th>Status</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
         <?php
   
   
   $pesquisar = filter_input(INPUT_POST,'pesquisar');
   
   if($pesquisar){
       $valor = filter_input(INPUT_POST,'valor');
       $status = filter_input(INPUT_POST,'status');
       $paramentro = filter_input(INPUT_POST,'parametro');
      if($status){
          $statu = "and o.situacao = '$status'";
      } else {
          $statu ="";
      }
         $result = $con->pesquisar("SELECT * FROM `ordem_producao` o JOIN _produto p on p.id_produto = o.id_produto JOIN funcionario f on o.id_funcionario = f.id_funcionario WHERE o.$paramentro like '%$valor%' $statu order by o.id_ordem desc");
   }else {
          $status = "EMITIDA";
          $paramentro = "data";
          $valor = date('Y-m-d');
          $result = $con->pesquisar("SELECT * FROM ordem_producao where $paramentro like '%$valor%' and situacao = '$status' order by id_ordem desc");
   }
       
       while ($dados = mysqli_fetch_array($result)){
           $produto = $dados['produto'];
           $versao= $dados['versao'];
           $data = $dados['data'];
           $lote = $dados['lote'];
           $ord = $dados['id_ordem'];
           $solicitante = $dados['nome'];
           $status = $dados['situacao'];
           $quantidade = $dados['quantidade'];
           $timestamp = strtotime($data); 
           $newDate = date("d/m/Y", $timestamp );
       ?>
        <tr>
            <td> <?php echo $newDate; ?></td>
            <td> <?php echo $ord; ?></td>
            <td > <?php echo $produto; ?></td>
            <td> <?php echo $versao; ?></td>
            <td> <?php echo $lote; ?></td>
            <td><?php echo $solicitante; ?></td>
            <td><?php echo $quantidade; ?></td>
            <td><?php echo $status; ?></td>
            <td><button type="submit" name="rel" form="id-rel" value="<?php echo $ord; ?>">Novo</button></td>
            <td><button type="submit" name="id" form="id-ord" value="<?php echo $ord; ?>">Mostrar</button></td>
        </tr>
        
  <?php      
  } 
   ?>
    </table>  
</section>
<?php
      }