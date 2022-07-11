<title>Composição</title>
<?php
$id = $_SESSION['id_produto'] ;
if($id){
   
    $action = filter_input(INPUT_POST,'action');
    if($action){
    $quantidade_mp = filter_input(INPUT_POST,'quantidade');
    $mp = filter_input(INPUT_POST,'materia_prima');
    $procedimento_mp = filter_input(INPUT_POST,'procedimento');
    
    $salvar = $con->pesquisar("INSERT INTO `_formula`(`id_formula`, `id_produto`, `id_materia_prima`, `quantidade`, `procedimento`)values(null,'$id','$mp','$quantidade_mp','$procedimento_mp')");
   
    }
    
?>
<link rel="stylesheet" href="./_CSS/_composition.css"/>

<form action="" method="post" class="form-cadastro">
    <table id="table-composition">
        <tr><th colspan="4"><h2>Composição</h2></th></tr>
        <tr>
            <th>Quantidade</th>
            <th>Matéria prima</th>
            <th colspan="2">Procedimento</th>
            
        </tr>
        <?php
          $result_ = $con->pesquisar("SELECT f.quantidade, m.materia_prima,  f.procedimento FROM   _formula f join materia_prima m on f.id_materia_prima = m.id_materia_prima WHERE f.id_produto = '$id'");
        while ($dado_ = mysqli_fetch_array($result_)){
            $quantidade = $dado_['quantidade'];
            $materia_prima = $dado_['materia_prima'];
            $procedimento = $dado_['procedimento'];
        ?>
        <tr>
            
            <td>
        <?php echo $quantidade; ?>
            </td>
            <td>
                    <?php echo "$materia_prima";  ?>
            </td>
            <td colspan="2">
    <?php echo $procedimento; ?>
                </td>
            </tr>
                    <?php
                }
                ?>
        
        
        <tr>
         <td><input type="text" class="campo-input" name="quantidade" value=""></td>   
         <td>
                <select name="materia_prima" class="campo-input">
                    <?php
                    $result = $con->pesquisar("SELECT * FROM materia_prima order by materia_prima asc");
                            while($dados = mysqli_fetch_array($result)){
                                $id_materia_prima = $dados['id_materia_prima'];
                                $materia_prima = $dados['materia_prima'];
                    ?>
                    <option value=" <?php echo $id_materia_prima; ?>"> <?php echo $materia_prima;?></option>
                     <?php
                            } 
                     ?>
                </select>
         </td>
         <td>
             <input type="text" class="campo-input" name="procedimento" value="">
         </td>
        <td><input type="submit" class="bt" name="action" value="Adicionar"></td>
        </tr>
        <tr><td colspan="4">
                <input type="submit" name="concluir" formaction="./conection/_session.php" value="Concluir"></td></tr>
    </table>
   
</form>
    <?php }