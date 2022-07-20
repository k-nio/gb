<?php
$cadastrar_cliente = filter_input(INPUT_POST,'cadastrar');

if($cadastrar_cliente){
    

$customer = filter_input(INPUT_POST,'nome');
$phone = filter_input(INPUT_POST,'telefone');
$mail = filter_input(INPUT_POST,'email');
$adress = filter_input(INPUT_POST,'endereco');
$note = filter_input(INPUT_POST,'note');

$save = $con->salvar('cliente','`id_cliente`, `nome`, `telefone`, `endereco`, `email`,`note`',"null,'$customer','$phone','$mail','$adress','$note'");

}
?>
<link rel="stylesheet" href="./_CSS/_pedido_cliente.css"/>
<title>Cadastrar cliente</title>
<div id="display-pedido">
  <a href="" class="no-print" id="fx">&times;</a>  
<form id="form-cliente" method="post" action="">
    
    <table id="cadastro-clientes">
                <tr><th><h2>Cadastro de Cliente</h2></th></tr>
                <tr><th>Nome:</th></tr>
                <tr><td> <input class="campo-cliente" type="text" name="nome" value=""></td> </tr>
                <tr><th>Telefone:</th></tr>
                <tr><td><input class="campo-cliente" type="text" name="telefone" value=""> </td></tr>
                <tr><th>Email:</th></tr>
                <tr><td><input class="campo-cliente" type="text" name="email" value="">    </td></tr>
                <tr><th>Endereço:</th></tr>
                <tr><td> <textarea id="text-cliente" name="endereco" rows="5" cols="50">
Rua:
N°:
Bairro:
Cidade:
CEP:
            </textarea>  </td></tr>
               
                <tr><th>Anotação:</th></tr>
                <tr><td> <textarea id="text-cliente" name="note" rows="5" cols="50"></textarea>  </td></tr>
               
            
                <tr>
                    <td>
                        <input type="hidden" class="bt-cliente" name="cadastrar" value="cadastrar"> 
                        <input type="submit" class="bt-cliente" name="add" value="Cadastrar"> 
                    </td>
                </tr>  
               
            </table> 
        </form>
</div>