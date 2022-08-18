<link rel="stylesheet" href="_CSS/_separar_portrait.css"/>
<link rel="stylesheet" href="_CSS/_separar_landscapes.css"/>
<section id="interface-sp">
            <label>Produto</label><br>
            <input class="campo-input name" type="text" value="<?php echo $produto_;?>" readonly=""><br>
            <label>Versão</label><br>
            <input class="campo-input name" type="text" value="<?php echo $versao_;?>" readonly=""><br>
            
            <label>Quantidade(Pedido)</label><br>
            
            <input class="campo-input name" type="text" value="<?php echo $quantidade_;?>" readonly=""><br>
            <label>Lote</label><br>
        <?php
        
           $buscar_lote = $con->pesquisar("SELECT * FROM `estoque_produto` WHERE `id_produto` = $id_produto_ AND volume = '$volume_'");
            
            while ($dados = mysqli_fetch_array($buscar_lote)){
                $lote = $dados['lote'];
                $id_estoque = $dados['id_estoque'];
                $quantidade_lote = $dados['quantidade'];
                
        ?>
        <form method="post" action="./_interface/_pedidos_1/_processamento/_processamento_separar_pedido.php">
         <input type="hidden" name="quantidade_" id="quantidadep" class="campo-input" value="<?php echo $quantidade_;?>"><br>
         <input type="hidden" name="quantidade" id="quantidadep" class="campo-input" value="<?php echo $quantidade_lote;?>"><br>
         <input type="hidden" name="id_order" value="<?php echo $id; ?>">
         <input type="hidden" name="id_pedido" value="<?php echo $id_pedido; ?>">
         <input class="ck" type="radio" name="id_estoque" value="<?php echo $id_estoque; ?>"><label class="campo-input" for=""><?php echo $lote;?></label>
         <label class="campo-input"for="">Quantidade: <?php echo $quantidade_lote; ?></label>
         <input type="submit" class="bt" name="confirmar" value="Confirmar">
         </form>
         <?php
            }
         ?>
        
    
</section>
<style>
    #interface-list, #interface-sp{
        display: none;
    }
</style>