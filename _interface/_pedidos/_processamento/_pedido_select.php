<link rel="stylesheet" href="./_CSS/_pedido.css"/>
<style>
    #search-form{
        display: none;
    }
</style>
<?php

$selecionar = filter_input(INPUT_POST,'selecionar');
$id_cliente = filter_input(INPUT_POST,'id_cliente');
$id_pedido = filter_input(INPUT_POST,'id_pedido');
$id_funcionario = $_SESSION['id_funcionario'];
if($selecionar){
    
    include './_interface/_pedidos/_processamento/_processamento_salvar_pedido.php';
    
}
$adicionar = filter_input(INPUT_POST,'adicionar');
if($adicionar){
    include './_interface/_pedidos/_processamento/_processamento_adicionar.php';                              
}
$editar = filter_input(INPUT_POST,'Editar');
if($editar){
    $id_order = filter_input(INPUT_POST,'id_order');
    echo "$id_order";
}
include './_interface/_pedidos/_processamento/_consultas.php';
?>
<a id="fx" class="no-print" href="./_pedidos.php?menu-pedido=1">&times;</a>
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
    <label>Id Cliente: </label><?php echo $id; ?> <br>
    <label>Cliente: </label><?php echo $nome; ?> <br>   
    
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
    <form action="" id="arrow" method="post"><input type="hidden" name="id_cliente" value="<?php echo $id_cliente;?>">
    <input type="hidden" name="id_pedido" value="<?php echo $id_pedido;?>"> </form>
<form action="" method="post"> 
<table id="tabela-produtos">
    <tr><th colspan="6"><h2>Dados dos produtos</h2></th></tr>
    <tr>
        <th>Código do produto</th>
        <th><button type="submit" style="width: 20px; height: 20px; background: none;border: none; margin: 0 20px;" name="ordem" form="arrow" value="ASC"><img style="width: 20px; height: 20px;" src="./_imagens/seta-dupla-para-cima.png"></button >Descrição do produto <button style="width: 20px; height: 20px; background: none;border: none; margin: 0 20px;" type="submit" name="ordem" form="arrow" value="DESC"><img style="width: 20px; height: 20px;" src="./_imagens/setas-duplas-para-baixo.png"></button></th>
        <th>Quantidade  </th>
        <th>Unidade</th>
        <th>Volume</th>
        <th></th>
        
    </tr>
<?php
$ordem = filter_input(INPUT_POST, 'ordem');

$consulta = $con->pesquisar("SELECT o.quantidade, o.id_order, p.produto, p.versao, p.id_produto, o.volume,o.unidade FROM `_pedido_order` o JOIN _produto p ON p.id_produto = o.`id_produto` WHERE o.id_pedido = '$id_pedido' order by produto $ordem");
while ($dados = mysqli_fetch_array($consulta)){
       $quantidade_db = $dados['quantidade'];
       $versao_db = $dados['versao'];
       $produto_db = $dados['produto'];
       $id_produto_db = $dados['id_produto'];
       $unidade_db = $dados['unidade'];
       $volume_db = $dados['volume'];
       $id_db = $dados['id_order'];
?>
    <?php echo "<form action='' id='$id_db' method='post'></form>";?>
    <tr>
        <td><input type="text" class="campo-input" readonly="" name="id_produto" form="<?php echo $id_db;?>" value="<?php echo $id_produto_db; ?>"> </td>
        <td><input type="text" class="campo-input" readonly="" name="produto" form="<?php echo $id_db;?>" value="<?php echo $produto_db.' '.$versao_db;?>"> </td>
        <td><input type="text" class="campo-input" name="quantidade" form="<?php echo $id_db;?>" value="<?php echo $quantidade_db; ?>"></td>
        <td>
              <select class="campo-input" form="<?php echo $id_db;?>" name="unidade">
                   <option value="<?php echo $unidade_db; ?>"><?php echo $unidade_db; ?></option>
                   <option value="unidade">Unidade</option>
                   <option value="caixa">Caixa</option>
               </select>
        </td>
        <td>
    
              <select class="campo-input" form="<?php echo $id_db;?>" name="volume">
                  <option  value="<?php echo $volume_db;?>"><?php echo $volume_db;?></option>
                   <option value="500 ml">500 mL</option>
                   <option value="1 Litro">1 Litro</option>
                   <option value="2 Litros">2 Litros</option>
                   <option value="5 Litros">5 Litros</option>
                   <option value="1kg">1 Quilo</option>
               </select>
        
        
        
        </td>
        <td><input type="submit" class="bt" name="Editar" form="<?php echo $id_db;?>" value="Editar">
            <input type="hidden" name="id_order" form="<?php echo $id_db;?>" value="<?php echo $id_db;?>">
            <input type="hidden" name="id_cliente" value="<?php echo $id_cliente;?>" form="<?php echo $id_db;?>" >
            <input type="hidden" name="id_pedido" value="<?php echo $id_pedido;?>" form="<?php echo $id_db;?>" >
            
        </td>
        
    </tr>
    <?php
    } 
    ?>
    <tr class="no-print">
        <td>
    <input type="hidden" name="id_cliente" value="<?php echo $id_cliente;?>">
    <input type="hidden" name="id_pedido" value="<?php echo $id_pedido;?>">
    <input type="number" class="campo-input" name="id_produto" value="">
        </td>
        <td>
    
    <select class="campo-input" name="produto">
        
        <option value="">Selecione o produto</option>
     <?php 
     $result_ = $con->pesquisar("SELECT * FROM _produto order by produto asc") ;
     
     while ($dados = mysqli_fetch_array($result_)){
         $id_produto = $dados['id_produto'];
         $produto = $dados['produto'];
         $versao = $dados['versao'];
        
     ?>   
        <option value="<?php echo $id_produto;?>">
            <?php echo "$produto $versao ";?>
        </option>
        
     <?php
     }
     ?>   
        

        
    </select >
        </td>
        <td>      
            <input type="text" class="campo-input" required="Preencha a quantidade" placeholder="Quantidade" name="quantidade" value="">
           </td>
                   <td>
                       <select class="campo-input" name="unidade">
                   <option value="unidade">Unidade</option>
                   <option value="caixa">Caixa</option>
               </select>
                   </td>
                   <td>
                       <select class="campo-input" name="volume">
                   <option value="500 ml">500 mL</option>
                   <option value="1 Litro">1 Litro</option>
                   <option value="2 Litros">2 Litros</option>
                   <option value="5 Litros">5 Litros</option>
                   <option value="1kg">1 Quilo</option>
               </select></td>
           <td>
    <input type="submit" class="bt" name="adicionar" value="Adicionar">
        </td>
    
    </tr>

</table>
</form>
    <form action="./_interface/_pedidos/_processamento/_finalizar.php" method="post">
        
        <input type="hidden" name="id_pedido" value="<?php echo $id_pedido;?>">
        
        <input  type="submit" class="bt" name="finalizar" value="Cancelar">
        <input  type="submit" class="bt" name="finalizar" value="Rascunho">
        <input  type="submit" class="bt" name="finalizar" value="Finalizar">
        
    </form>
</div>