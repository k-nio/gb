<title>Cadastro de Matérias primas</title>
<link rel="stylesheet" href="./_CSS/_new_materia.css"/>

<form id="form-cadastro" action="" method="post">
    
    <table id="cadastro-mp">
        <tr>
            <th><h2>Cadastrar Matéria prima</h2></th>
        </tr>
        <tr>
            <th>Matéria Prima:</th>
        </tr>
        <tr>
            <td><input type="text" name="mp" class="campo-input" value="" required=""></td>
        </tr>
        <tr>
            <td><input type="submit" name="cadastra_mp" class="bt" value="Cadastrar"></td>
        </tr>
    </table>
</form>
<?php

$action = filter_input(INPUT_POST,'cadastra_mp');
if($action){
    $materia_prima = filter_input(INPUT_POST,'mp');
    
    $salva = $con->salvar('materia_prima','materia_prima',"'$materia_prima'");
}