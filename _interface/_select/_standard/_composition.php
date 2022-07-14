<table id="table-composition">
    <tr><th style="width: 200px;">Quantidade(%)</th><th>Matéria prima</th></tr>
<?php
     $result = $con->pesquisar("SELECT f.quantidade, m.materia_prima FROM _formula f JOIN materia_prima m ON f.id_materia_prima = m.id_materia_prima
where f.id_produto = $id");
     
     while ($dados = mysqli_fetch_array($result)){
         $quantidade = $dados['quantidade'];
         $id_mp = $dados['materia_prima'];
         ?>

         
   
    <tr><td style="width: 200px;"><?php echo $quantidade; ?></td><td><?php echo $id_mp ?></td><tr>
<?php  }?>
</table>