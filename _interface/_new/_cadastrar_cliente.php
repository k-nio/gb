<?php
$cadastrar_cliente = filter_input(INPUT_POST,'cadastrar-cliente');
if($cadastrar_cliente){
    

$customer = filter_input(INPUT_POST,'nome');
$phone = filter_input(INPUT_POST,'telefone');
$mail = filter_input(INPUT_POST,'email');
$street = filter_input(INPUT_POST,'');
$street = filter_input(INPUT_POST,'');
$street = filter_input(INPUT_POST,'');
$street = filter_input(INPUT_POST,'');
$street = filter_input(INPUT_POST,'');
$note = filter_input(INPUT_POST,'note');
$save = $con->salvar('cliente','`id_cliente`, `nome`, `telefone`, `endereco`, `email`,`note`',"null,'$customer','$phone','$mail','$adress','$note'");

}
?>
<link rel="stylesheet" href="./_CSS/_new_cliente.css"/>
<title>Cadastrar cliente</title>

<form id="form-cliente" method="post" action="">
    <table id="cadastro-clientes">
        <tr><th colspan="4"><h2>Cadastro de Cliente</h2></th></tr>
        <tr><th colspan="4">Nome:</th></tr>
                <tr><td colspan="4"> <input class="campo-cliente" type="text" name="nome" value=""></td> </tr>
                <tr><th colspan="4">Telefone:</th></tr>
                <tr><td colspan="4"><input class="campo-cliente" type="text" name="telefone" value=""> </td></tr>
                <tr><th colspan="4">Email:</th></tr>
                <tr><td colspan="4"><input class="campo-cliente" type="text" name="email" value="">    </td></tr>
                <tr><th colspan="4"><h3>Endereço:</h3></th></tr>
                
 <tr><th>Rua:</th>    <td> <input type="text" class="campo-cliente" name="rua" value=""></td> <th>N°:</th> <td> <input type="text" class="campo-cliente" name="numero" value=""></td></tr>
 <tr><th>Bairro:</th> <td> <input type="text" class="campo-cliente" name="bairro" value=""></td> <th>Cidade:</th><td><input type="text" class="campo-cliente" name="cidade" value=""></td></tr>
 
 <tr>
     <th>complemento:</th><td> <input type="text" class="campo-cliente" name="complemento" value=""></td>
     <th>CEP:</th><td> <input type="text" class="campo-cliente" name="cep" value=""></td>
 </tr>
           
               
 <tr><th colspan="4"><h3>Anotação:</h3></th></tr>
                <tr><td colspan="4"> <textarea id="text-cliente" name="note" rows="5" cols="50"></textarea>  </td></tr>
               
            
                <tr>
                    <td colspan="4">
                        <input type="submit" class="bt-cliente" name="cadastrar-cliente" value="Cadastrar"> 
                    </td>
                </tr>  
               
            </table> 
        </form>