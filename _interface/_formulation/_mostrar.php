<link rel="stylesheet" href="./_CSS/_formulations.css"/>
<a class="fx" href="./_formulations.php?menu-formula=3">&times;</a>
<div id="formulations-mostrar">
    <table id="table">
    <tr>
        <th colspan="3"><h2>Formulação</h2></th>
    </tr>
    <tr>
        <th>Código:</th><td colspan="2"><?php echo $_SESSION['id_produto']; ?></td>
    </tr>
    <tr>
        <th>Produto:</th><td colspan="2"> <?php echo $_SESSION['produto']; ?></td>
    </tr>
    <tr>
        <th>Versão:</th><td colspan="2"><?php echo $_SESSION['versao']; ?></td>
    </tr>
    <tr>
        <th>Quantidade</th>
        <th>Matéria prima</th>
        <th>Procedimento</th>
    </tr>
        <?php
        $id = $_SESSION['id_produto'] ;
if($id){
        $result = $con->pesquisar("SELECT f.quantidade, m.materia_prima, f.procedimento from _formula f join materia_prima m on f.id_materia_prima = m.id_materia_prima where f.id_produto = '$id'");
       while ($dados = mysqli_fetch_array($result)){
           $quantidade = $dados['quantidade'];
           $materia_prima = $dados['materia_prima'];
           $procedimento = $dados['procedimento'];?>
    <tr>
        <td><?php echo $quantidade ;?></td>
        <td><?php echo $materia_prima ;?></td>
        <td><?php echo $procedimento ;?></td>
    </tr>
      <?php
}}
        ?>
</table>
</div>