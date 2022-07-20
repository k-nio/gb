<?php
$cadastrar_cliente = filter_input(INPUT_POST,'cadastrar-fornecedor');
if($cadastrar_cliente){
    

$customer = filter_input(INPUT_POST,'fornecedor');
$phone = filter_input(INPUT_POST,'telefone');
$mail = filter_input(INPUT_POST,'email');
$cnpj = filter_input(INPUT_POST,'cnpj');

$note = filter_input(INPUT_POST,'note');
$save = $con->salvar('_fornecedor','`id_fornecedor`, `fornecedor`, `telefone`, `email`,`cnpj`, `note`',"null,'$customer','$phone','$mail','$cnpj','$note'");


}
?>
<link rel="stylesheet" href="./_CSS/_new_cliente.css"/>
<title>Cadastrar cliente</title>

<form id="form-cliente" method="post" action="">
    <table id="cadastro-clientes">
                <tr><th><h2>Cadastro de Cliente</h2></th></tr>
                <tr><th>Fornecedor:</th></tr>
                <tr><td><input class="campo-cliente" type="text" name="fornecedor" value=""></td> </tr>
                <tr><th>Telefone:</th></tr>
                <tr><td><input class="campo-cliente" type="text" name="telefone" value=""> </td></tr>
                <tr><th>Email:</th></tr>
                <tr><td><input class="campo-cliente" type="text" name="email" value="">    </td></tr>
                <tr><th>CNPJ:</th></tr>
                <tr><td><input class="campo-cliente" type="text" name="cnpj" value="">    </td></tr>
                
                <tr><th>Anotação:</th></tr>
                <tr><td> <textarea id="text-cliente" name="note" rows="5" cols="50"></textarea>  </td></tr>
               
            
                <tr>
                    <td>
                        <input type="submit" class="bt-cliente" name="cadastrar-fornecedor" value="Cadastrar"> 
                    </td>
                </tr>  
               
            </table> 
        </form>
