<?php
$action = filter_input(INPUT_POST,'action');
if($action){
    $id_produto = filter_input(INPUT_POST,'id_produto');
    $lote = filter_input(INPUT_POST,'lote');
    $quantidade = filter_input(INPUT_POST,'quantidade');
    $volume = filter_input(INPUT_POST,'volume');
    $unidade = filter_input(INPUT_POST,'unidade');
    $validade = filter_input(INPUT_POST,'validade');
    $fabricacao = filter_input(INPUT_POST,'fabricacao');
    $status = filter_input(INPUT_POST,'status');
    $situacao = filter_input(INPUT_POST,'situacao');
    
    
    $salvar = $con->pesquisar("INSERT INTO `estoque_produto`(`id_estoque`, `id_produto`, `quantidade`, `volume`, `unidade`, `lote`, `fabricacao`, `validade`, `situacao`, `status`) VALUES (null,'$id_produto','$quantidade','$volume','$unidade','$lote','$fabricacao','$validade','$situacao','$status')");
    
    
    
}


?>
<link rel="stylesheet" href="./_CSS/_estoque_cadastrar.css"/>
<form method="post" action="">
    <table id="table_produto">
        <tr>
            <th colspan="3"><h2>Adicionar Produto</h2></th>
        </tr>
        <tr>
            <th> Produto: </th>
            <th> Unidade </th>
            <th> volume </th>
            
             </tr>
        <tr>
            <td>
                <select class="campo-input" name="id_produto"> 
                    <?php 
                    $result = $con->pesquisar("SELECT * FROM _produto order by produto asc");
                    while ($dados = mysqli_fetch_array($result)){
                        $id_produto= $dados['id_produto'];
                        $produto = $dados['produto'];
                        $versao = $dados['versao'];
                    ?>
                       <option value=" <?php echo $id_produto ?>"> <?php echo "$produto $versao"; ?></option> 
                           <?php
                                 }
                    ?>
                    
                </select>
            </td>
            <td> 
                <select class="campo-input" name="unidade"> 
                   
                       <option value="Unidade"> Unidade</option> 
                       <option value="Caixa"> Caixa</option> 
                          
                </select>
                </td>
                <td> 
                <select class="campo-input" name="volume"> 
                   
                       <option value="500 ml"> 500 ml</option> 
                       <option value="1 Litro"> 1 Litro</option> 
                       <option value="2 Litros"> 2 Litros</option> 
                       <option value="5 Litros"> 5 Litros</option> 
                       <option value="1 Kg"> 1 Kg</option> 
                          
                </select>
                </td>
        </tr>
        
        <tr>
            <th> LOTE:  </th><th> SITUAÇÃO:  </th><th> STATUS:  </th>
             </tr>
        <tr>
            <td> <input class="campo-input" type="text" name="lote" value="">  </td>
       
            <td>  <select  class="campo-input" name="status"> 
                    <option value="Em estoque">EM ESTOQUE</option>
                    <option value="Reservado">EM USO</option>
                    <option value="Esgotado">BLOQUEADO</option>
                    <option value="Vencido">BLOQUEADO</option>
                </select>  
            </td>
        
            <td> <select class="campo-input" name="situacao"> 
                    <option value="Liberado">LIBERADO</option>
                    <option value="Quarentena">QUARENTENA</option>
                    <option value="Bloqueado">BLOQUEADO</option>
                   
                </select>  
            </td>
        </tr>
       
        <tr>
            <th> QUANTIDADE:  </th><th> VALIDADE:  </th><th> FABRICAÇÃO:  </th>
             </tr>
        <tr>
            <td>  <input class="campo-input" type="text" name="quantidade" value="">  </td>
       
            <td> <input class="campo-input" type="date" name="validade" value="">  </td>
       
            <td> <input class="campo-input" type="date" name="fabricacao" value="">  </td>
        </tr>
       
        <tr>
            
           
            <td colspan="3">
                  <input type="reset" class="bt" name="" value="LIMPAR"> 
                  <input type="submit" class="bt" name="action" value="CADASTRAR">
            </td>
        </tr>
    </table>
</form>