<?php
$select = $con->pesquisar("SELECT o.quantidade,o.id_order, p.produto, p.versao, p.id_produto, o.volume, o.unidade FROM `_pedido_order` o JOIN _produto p ON p.id_produto = o.`id_produto` WHERE o.`id_order` = $id_order");
while ($dado = mysqli_fetch_array($select)){
    $id_produto_ = $dado['id_produto'];
    $volume_ = $dado['volume'];
    $unidade_ = $dado['unidade'];
    $quantidade_pedido = $dado['quantidade'];
    $produto_ = $dado['produto']; 
    $versao_ = $dado['versao'];
    $id_order = $dado['id_order'];
}

?>
<link rel="stylesheet" href="./_interface/_pedidos/_CSS/_separar_portrait_1.css"/>

<section id="interface-s">
    <form action="" method="post">
        <input type="hidden" name="action" class="bt" value="Mostrar">
        <button type="submit" name="id_pedido" class="fx" value="<?php echo $id_pedido; ?>">&times;</button>
    </form>
    
    <div class="tr th">
            <label>Produto</label><br>
    </div>
    <div class="tr td">
            <output class="campo-output" ><?php echo $produto_;?></output><br>
         </div>
    <div class="tr th">    
            <label>Versão</label><br>
         </div>
    <div class="tr td">    <output class="campo-output" ><?php echo $versao_;?></output><br>
            
           </div>
    <div class="tr th">  <label>Quantidade(Pedido)</label><br>
            
          </div>
    <div class="tr td">   <output class="campo-output"> <?php echo $quantidade_pedido;?></output><br>
         </div>
    <div class="tr th">    <label>Lote</label><br></div>
        <?php
        
          
           $buscar_lote = $con->pesquisar("SELECT * FROM `estoque_produto` WHERE `id_produto` = $id_produto_ AND volume = '$volume_' AND status = 'Em estoque' ORDER BY `fabricacao` ASC");
            
    while ($dados = mysqli_fetch_array($buscar_lote)){
        $id_estoque_ = $dados['id_estoque'];       
        $quantidade_estoque = $dados['quantidade'];      
        $lote_ = $dados['lote'];
        $fabricacao_ = $dados['fabricacao'];
        $validade_ = $dados['validade'];
        $status_ = $dados['status'];
        $situacao_ = $dados['situacao'];
                
        ?>
         
             
            <form method="post" action="./_interface/_pedidos/_processamento/_processamento_separar_pedido.php">
         
        
    <div class="tr td">  <input type="hidden" name="id_estoque" value="<?php echo $id_estoque_; ?>">
         <input type="hidden" name="id_order" value="<?php echo $id_order; ?>">
         
         <output class="campo-output"><?php echo "$quantidade_estoque Unidades"; ?></output>
         
       <label class="campo-input" for=""><?php echo $lote_;?></label>         
        
       <input type="submit" class="bt" name="confirmar" value="Confirmar"></div>
         </form><br>
        
         <?php
            }
         ?>
         
    
    <div class="tr">   
        <button class="bt" onclick="window.history.go(0);">Atualizar</button>
        <input type="submit" value="+" class="bt"/>
    </div>
</section>
<style>
  
    #interface-list, #interface-sp{
        display: none;
    }
</style>
