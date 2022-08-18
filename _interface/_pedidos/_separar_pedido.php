<?php

 $id_cliente = filter_input(INPUT_POST, 'id_cliente');
 $id_pedido = filter_input(INPUT_POST, 'id_pedido');
 
include './_interface/_pedidos/_processamento/_consultas.php';
$confirma = filter_input(INPUT_POST,'confirma', FILTER_SANITIZE_STRING);
if ($confirma){
    $id = filter_input(INPUT_POST,'id_order',FILTER_SANITIZE_NUMBER_INT);
    $quantidade_ = filter_input(INPUT_POST,'quantidade',FILTER_SANITIZE_NUMBER_INT);
    $lt = filter_input(INPUT_POST,'lote',FILTER_SANITIZE_STRING);
    $id_cliente = filter_input(INPUT_POST, 'id_cliente',FILTER_SANITIZE_NUMBER_INT);
    $id_pedido = filter_input(INPUT_POST, 'id_pedido',FILTER_SANITIZE_NUMBER_INT);
    $produto_ = filter_input(INPUT_POST,'produto',FILTER_SANITIZE_STRING);
    $id_produto_ = filter_input(INPUT_POST,'id_produto',FILTER_SANITIZE_NUMBER_INT);
    $volume_ = filter_input(INPUT_POST,'volume',FILTER_SANITIZE_STRING);
    $versao_ = filter_input(INPUT_POST,'versao',FILTER_SANITIZE_STRING);
   
    include './_interface/_pedidos/_processamento/_separar_produto.php';
}
?><link rel="stylesheet" href="./_CSS/_pedido.css"/>
<style>
    #tb-search,#search-form{
        display: none;
    }
</style>

<a id="fx" class="no-print" href="./_pedidos.php?menu-pedido=2">&times;</a>
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

<table id="tabela-produtos">
    <tr><th colspan="6"><h2>Dados dos produtos</h2></th></tr>
    <tr>
        <th>Código do produto</th>
        <th>Descrição do produto</th>
        <th>Quantidade</th>
        <th></th>
        
    </tr>
<?php
$consulta = $con->pesquisar("SELECT o.quantidade,o.id_order, p.produto, p.versao, p.id_produto, o.volume FROM `_pedido_order` o JOIN _produto p ON p.id_produto = o.`id_produto` WHERE o.id_pedido = '$id_pedido' order by produto asc");
while ($dados = mysqli_fetch_array($consulta)){
       $quantidade_db = $dados['quantidade'];
       $versao_db = $dados['versao'];
       $volume_db = $dados['volume'];
       $unidade_db = $dados['volume'];
       $produto_db = $dados['produto'];
       $id_produto_db = $dados['id_produto'];
       $id_order_db = $dados['id_order'];
?>
    <form action="" id="<?php echo $id_order_db;?>" method="post">
        <input type="hidden" name="id_pedido" value="<?php echo $id_pedido;?>">
        <input type="hidden" name="id_cliente" value="<?php echo $id_cliente;?>">
        <input type="hidden" name="id_funcionario" value="<?php echo $id_funcionario;?>"> 
        <input type="hidden" name="produto"  value="<?php echo $produto_db;?>">
        <input type="hidden" name="versao"  value="<?php echo $versao_db;?>">
        <input type="hidden" name="id_produto"  value="<?php echo $id_produto_db;?>">
        <input type="hidden" name="quantidade"  value="<?php echo $quantidade_db;?>">
        <input type="hidden" name="unidade"  value="<?php echo $unidade_db;?>">
        <input type="hidden" name="id_order"  value="<?php echo $id_order_db;?>">
        <input type="hidden" name="volume"  value="<?php echo $volume_db;?>">
    </form>
    <tr>
        <td><?php echo "$id_produto_db"; ?></td>
        <td><?php echo "$produto_db $versao_db";  ?></td>
        
        <td><input type="number" class="campo-input" form="<?php echo $id_order_db;?>" name="quantidade" value="<?php echo "$quantidade_db"; ?>"></td>
        <td>
            
            
           
        </td>
        <td><input type="submit" class="bt" name="confirma" form="<?php echo $id_order_db;?>" value="Confirmar"></td>
    </tr>
    <?php
    }
    ?>
    

</table>

    <form class="no-print" action="./_interface/_pedidos/_processamento/_finalizar.php" method="post">
        
        <input type="hidden" name="id_pedido" value="<?php echo $id_pedido;?>">
       
        <input  type="submit" class="bt" name="finalizar" value="Finalizar">
        
    </form>
</div>
