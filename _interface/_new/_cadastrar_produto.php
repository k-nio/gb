<title>Cadastrar Produto</title>
<link rel="stylesheet" type="text/css" href="./_CSS/_new_produto.css"/>
<form class="form-cadastro" method="post" action="">
    <table id="cadastro-produtos">
                <tr><th><h2>Cadastro de Produto</h2></th></tr>
                <tr><th>Produto:</th></tr>
                <tr><td> <input class="campo-input" type="text" name="produto" value=""></td> </tr>
                <tr><th>Versão:</th></tr>
                <tr><td><input class="campo-input" type="text" name="versao" value=""> </td></tr>
                <tr><th>Linha:</th></tr>
                <tr><td><select class="campo-input" name="linha" >
                            <option value="Domestica">Domestica</option>
                            <option value="Institucional">Institucional</option> 
                            <option value="Automotiva">Automotica</option> 
                            <option value="Outra">Outros</option> 
                    </td></tr>
                <tr>
                    <td>
                        <input type="submit" class="bt" name="cadastrar-produto" value="Cadastrar"> 
                    </td>
                </tr>  
               
            </table> 
        </form>
<?php
$action = filter_input(INPUT_POST,'cadastrar-produto');
if($action){
    
    $produto = filter_input(INPUT_POST,'produto');
    $versao = filter_input(INPUT_POST,'versao');
    $linha = filter_input(INPUT_POST,'linha');
    
    $salvar = $con->salvar('_produto',"`id_produto`, `produto`, `versao`, `linha`","null,'$produto','$versao','$linha'" );
    
 
}