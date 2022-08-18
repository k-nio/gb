<?php
$cadastrar_cliente = filter_input(INPUT_POST,'cadastrar');

if($cadastrar_cliente){
    
$customer = filter_input(INPUT_POST,'nome');
$phone = filter_input(INPUT_POST,'telefone');
$mail = filter_input(INPUT_POST,'email');
$street = filter_input(INPUT_POST,'rua');
$number = filter_input(INPUT_POST,'numero');
$nwood = filter_input(INPUT_POST,'bairro');
$cep = filter_input(INPUT_POST,'cep');
$complemento = filter_input(INPUT_POST,'complemento');
$town = filter_input(INPUT_POST,'cidade');
$state = filter_input(INPUT_POST,'estado');
$identidade = filter_input(INPUT_POST,'identidade');
$note = filter_input(INPUT_POST,'note');
$save = $con->pesquisar("INSERT INTO `cliente`(`id_cliente`, `nome`, `telefone`, `rua`, `email`, `note`, `numero`, `bairro`, `cep`, `complemento`, `cidade`, `estado`, `identidade`) VALUES (null,'$customer','$phone','$street','$mail','$note','$number','$nwood','$cep', '$complemento','$town','$state','$identidade')");
                                                  

}
?>
<link rel="stylesheet" href="./_CSS/_pedido_cliente.css"/>
<title>Cadastrar cliente</title>
<div id="display-pedido">
  <a href="" class="no-print" id="fx">&times;</a>  
<form id="form-cliente" method="post" action="">
    
    <table id="cadastro-clientes">
               <tr><th colspan="4"><h2>Cadastro de Cliente</h2></th></tr>
        <tr><th colspan="4">Nome:</th></tr>
                <tr><td colspan="4"> <input class="campo-cliente" type="text" name="nome" value=""></td> </tr>
                <tr><th colspan="4">Telefone:</th></tr>
                <tr><td colspan="4"><input class="campo-cliente" type="text" name="telefone" value=""> </td></tr>
                <tr><th colspan="4">Email:</th></tr>
                <tr><td colspan="4"><input class="campo-cliente" type="text" name="email" value="">    </td></tr>
                <tr><th colspan="4"><h3>Endereço</h3></th></tr>
                
 <tr><th>Rua:</th>    <td> <input type="text" class="campo-cliente" name="rua" value=""></td> <th>N°:</th> <td> <input type="text" class="campo-cliente" name="numero" value=""></td></tr>
 <tr><th>Bairro:</th> <td> <input type="text" class="campo-cliente" name="bairro" value=""></td> <th>complemento:</th><td> <input type="text" class="campo-cliente" name="complemento" value=""></td>
 <tr><th>Cidade:</th><td><input type="text" class="campo-cliente" name="cidade" value=""></td><th>Estado</th><td><input type="text" class="campo-cliente" name="estado" value=""></td></tr>
 
 <tr>
     
     <th>CEP:</th><td> <input type="text" class="campo-cliente" name="cep" value=""></td><th>identidade</th><td><input type="text" class="campo-cliente" name="identidade" value=""></td>
 </tr>
           
               
 <tr><th colspan="4"><h3>Anotação:</h3></th></tr>
                <tr><td colspan="4"> <textarea id="text-cliente" name="note" rows="5" cols="50"></textarea>  </td></tr>
               
            
                <tr>
                    <td colspan="4">
                       <input type="hidden" class="bt-cliente" name="cadastrar" value="cadastrar"> 
                        <input type="submit" class="bt-cliente" name="add" value="Cadastrar"> 
                    </td>
                </tr> 
                <tr><td><?php echo "INSERT INTO `cliente`(`id_cliente`, `nome`, `telefone`, `rua`, `email`, `note`, `numero`, `bairro`, `cep`, `complemento`, `cidade`, `estado`, `identidade`) VALUES (null,'$customer','$phone','$street','$mail','$note','$number','$nwood','$cep', '$complemento','$town','$state','$identidade')"?></td></tr>
            </table> 
        </form>
</div>