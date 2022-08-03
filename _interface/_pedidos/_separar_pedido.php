<link rel="stylesheet" href="./_CSS/_pedido.css"/>
<?php
 $id_cliente = filter_input(INPUT_POST, 'id_cliente');
 $id_pedido = filter_input(INPUT_POST, 'id');
 
include './_interface/_pedidos/_processamento/_consultas.php';

?>
<style>
    #tb-search,#search-form{
        display: none;
    }
</style>

<a id="fx" class="no-print" href="">&times;</a>
<div id="folhas">
    <div id="header-pedido">
                   <img id="logo" src="./_imagens/IMBA Química - 350pxb.png" alt="logo"/>
                    <div id='text-header'>  
                        IMBA – INDÚSTRIA QUÍMICA DA BAHIA<br>
                        Rua B s/n condomínio industrial, Distrito industrial - Guanambi – BA<br>
                        CNPJ: 09.391.726/0001-77 insc. Estadual: 076.556.429 PP<br>
                        Telefone: (77) 3452 3000 Email: imbaindustriaquimica@hotmail.com   <br>
                        Site: www.imbaquimica.com
                    </div>
    </div>
<fieldset id="dados-field">
    <legend>Dados cliente</legend>
   <p>
    <label>Id Cliente: </label><?php echo $id_cliente; ?> <br>
    <label>Cliente: </label><?php echo $nome; ?> <br>   
    <label>Endereço: </label><br>
    <label>Rua: </label><?php echo $rua; ?>       
    <label>N°:      </label><?php echo $numero; ?> 
    <label>Complemento: </label> <?php echo $complemento; ?><br>
    <label>Bairro: </label><?php echo $bairro; ?> 
    <label> Cidade: </label><?php echo $cidade; ?> <label>CEP:         </label><?php echo $cep; ?> <br>
    <label>Telefone: </label><?php echo $telefone; ?><br>
   
   </p>
   
</fieldset>
<fieldset id="pedido-field">
    <legend>Pedido</legend>
    <p>
        <label>Pedido N°:</label>       <?php echo "$id_pedido<br>";?>
        <label>Data de emissão:</label> <?php echo " $newDate<br>";?>
        <label>Data de entrega:</label> <?php echo " $newDates<br><br>";?>
        <label>Obs.:</label>            <?php echo " $nota_";?>
    </p>     
</fieldset>
<form action="" method="post"> 
<table id="tabela-produtos">
    <tr><th colspan="6"><h2>Dados dos produtos</h2></th></tr>
    <tr>
        <th>Código do produto</th>
        <th>Descrição do produto</th>
        <th>Quantidade</th>
        <th>Lote</th>
        <th></th>
        <th></th>
        
    </tr>
<?php
$consulta = $con->pesquisar("SELECT o.quantidade, p.produto, p.versao, p.id_produto FROM `_pedido_order` o JOIN _produto p ON p.id_produto = o.`id_produto` WHERE o.id_pedido = '$id_pedido' order by produto asc");
while ($dados = mysqli_fetch_array($consulta)){
       $quantidade_db = $dados['quantidade'];
       $versao_db = $dados['versao'];
       $produto_db = $dados['produto'];
       $id_produto_db = $dados['id_produto'];
?>
    
    <tr>
        <td><?php echo "$id_produto_db"; ?></td>
        <td><?php echo "$produto_db $versao_db";  ?></td>
        <td><input class="campo-input" value="<?php echo "$quantidade_db"; ?>"></td>
        <td>
            <input type="text" class="campo-input" name="lote" value="">
        </td>
        <td><input type="submit" class="bt" value="Confirmar"></td>
    </tr>
    <?php
    }
    ?>
    

</table>
</form>
    <form class="no-print" action="./_interface/_pedidos/_processamento/_finalizar.php" method="post">
        
        <input type="hidden" name="id_pedido" value="<?php echo $id_pedido;?>">
       
        <input  type="submit" class="bt" name="finalizar" value="Finalizar">
        
    </form>
</div>