
<a href="" id="fx">&times;</a>
<table id="estoque-mp">
    <tr>
        <th>Matéria prima</th>
        <th>Fornecedor</th>
        <th>Lote</th>
        <th>Validade</th>
        <th>Fabricação</th>
        <th>Situação</th>
        <th>Status</th>
        <th>Quantidade</th>
    <tr>
        <?php
       if($situacao){
        $complemento = "and situacao = '$situacao'";
        } else {
            $complemento = ' ';
        }
        $result = $con->pesquisar("SELECT * FROM `estoque_materia_prima` e JOIN materia_prima m on m.id_materia_prima = e.id_materia_prima join _fornecedor f on f.id_fornecedor = e.`id_fornecedor` WHERE materia_prima like '%$search%' $complemento");
        while($dados = mysqli_fetch_array($result)){
          $materia_prima = $dados['materia_prima'];
          $fornecedor = $dados['fornecedor'];
          $lote = $dados['lote'];
          $validade_mp = $dados['validade'];
          $fabricacao_mp = $dados['fabricacao'];
          $situacao_mp = $dados['situacao'];
          $status_mp = $dados['status'];
          
          $quantidade_mp = $dados['quantidade'];
          
          switch ($situacao_mp){
          case 'Bloqueado':
              $cor = 'orange';             
              break;
           case 'Reprovado':
              $cor = 'red';             
              break;
           case 'Quarentena':
              $cor = 'yellow';
                break;
           case 'Aprovado':
              $cor = 'green';
                break;
          }
        ?>
    <tr style="color:<?php echo $cor ;?>;">
        <td><?php echo $materia_prima ?></td>
        <td><?php echo $fornecedor ?></td>
        <td><?php echo $lote ?></td>
        <td><?php echo $validade_mp ?></td>
        <td><?php echo $fabricacao_mp ?></td>
        <td ><?php echo $situacao_mp ?></td>
        <td><?php echo $status_mp ?></td>
        <td><?php echo $quantidade_mp ?></td>
    </tr>
        <?php }?>
    
</table>