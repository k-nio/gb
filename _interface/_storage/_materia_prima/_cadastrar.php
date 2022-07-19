<?php
$action = filter_input(INPUT_POST,'action');
if($action){
    $materia_prima = filter_input(INPUT_POST,'mp');
    $lote_mp = filter_input(INPUT_POST,'lt');
    $quantidade_mp = filter_input(INPUT_POST,'qt');
    $fornecedor_mp = filter_input(INPUT_POST,'fc');
    $validade_mp = filter_input(INPUT_POST,'val');
    $fabricacao_mp = filter_input(INPUT_POST,'fab');
    $status_mp = filter_input(INPUT_POST,'st');
    $situacao_mp = filter_input(INPUT_POST,'sit');
    
    
    $salvar = $con->pesquisar("INSERT INTO `estoque_materia_prima`(`id_estoque`, `id_materia_prima`, `lote`, `id_fornecedor`, `validade`, `quantidade`, `status`, `situacao`, `fabricacao`) VALUES (null,'$materia_prima','$lote_mp','$fornecedor_mp','$validade_mp','$quantidade_mp','$status_mp','$situacao_mp','$fabricacao_mp')");
    
    
    
}


?>
<link rel="stylesheet" href="./_CSS/_estoque_cadastrar.css"/>

<form method="post" action="">
    <table id="table_materia">
        <tr>
            <th colspan="4">
                <h2>Adicionar Matéria prima</h2>
            </th>
        </tr>
        <tr>
            <th>  MATÉRIA PRIMA: </th> <th> FORNECEDOR:  </th> <th> LOTE:  </th><th> QUANTIDADE:  </th>
        </tr>
        <tr>
            <td>
                <select class="campo-input" name="mp"> 
                    <?php 
                    $result = $con->pesquisar("SELECT * FROM materia_prima order by materia_prima asc");
                    while ($dados = mysqli_fetch_array($result)){
                        $id_mp = $dados['id_materia_prima'];
                        $mp = $dados['materia_prima'];
                    ?>
                       <option value=" <?php echo $id_mp ?>"> <?php echo $mp; ?></option> 
                           <?php
                                 }
                    ?>
                    
                </select>  
            </td>
            <td> 
                <select class="campo-input" name="fc"> 
                    <?php 
                    $results = $con->pesquisar("SELECT * FROM _fornecedor order by fornecedor asc");
                    while ($dados = mysqli_fetch_array($results)){
                        $id_fc = $dados['id_fornecedor'];
                        $fc = $dados['fornecedor'];
                    ?>
                       <option value=" <?php echo $id_fc ?>"> <?php echo $fc; ?></option> 
                           <?php
                                 }
                    ?>
                    
                </select>
                </td> 
                <td> <input class="campo-input" type="text" name="lt" value="">  </td>
                 <td>  <input class="campo-input" type="text" name="qt" value="">  </td>
        </tr>
       
        <tr>
            <th> SITUAÇÃO:  </th><th> STATUS:</th><th> VALIDADE:  </th><th> FABRICAÇÃO:  </th>
             </tr>
        <tr>
            <td>  <select  class="campo-input" name="st"> 
                    <option value="Estoque">EM ESTOQUE</option>
                    <option value="Em Uso">EM USO</option>
                    <option value="Bloqueado">BLOQUEADO</option>
                </select>  
            </td>
            <td> 
                <select class="campo-input" name="sit"> 
                    <option value="Aprovado">LIBERADO</option>
                    <option value="Quarentena">QUARENTENA</option>
                    <option value="Reprovado">BLOQUEADO</option>
                    <option value="Vencido">DEVOLUÇÃO</option>
                </select>  
            </td>
            <td> 
                <input class="campo-input" type="date" name="val" value="">  
            </td>
            <td> 
                <input class="campo-input" type="date" name="fab" value="">  
            </td>
        </tr>
        
        <tr>
            
            <td colspan="4">
                <input type="reset" class="bt" name="" value="LIMPAR"> 
            
                 <input type="submit" class="bt" name="action" value="CADASTRAR">
            </td>
        </tr>
    </table>
</form>