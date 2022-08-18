<?php
$filter_number = FILTER_SANITIZE_NUMBER_INT;

$id_order = filter_input(INPUT_POST, 'id_order', $filter_number);
$id_pedido = filter_input(INPUT_POST, 'id_pedido', $filter_number);

if($id_order){
    
    include './_interface/_pedidos/_separar_produto.php';
}

if($id_pedido){
    
      $results = $con->pesquisar("SELECT * FROM _pedido p join cliente c on p.id_cliente = c.id_cliente where id_pedido = '$id_pedido'");
      
while ($dado = mysqli_fetch_array($results)){
   

    $id = $dado['id_cliente'];
    $nome = $dado['nome'];
    
}

}
?>

        <style>
            
    body.html{
        width: 100vw;
        height: 100vh;
    } 
    #interface-list{
        display: none;
    }
@media only screen and (orientation:portrait ){
      
#interface-sp{
    width:100vw;
    height:100vh;
   
    background-color:#dcdcdc;
   
}
#interface-sp table{
    width: 100%;
    height:auto;
     padding:20px;
    margin: 5px auto;
    border: 2px #194574 solid;
    border-collapse: collapse;
    background-color:#fff;
}
#interface-sp table td{
    border: 1px #194574 solid;
    height: 70px;
    font-size: 22px;
    
    text-align:center;
}
#interface-sp table th{
    border: 1px #194574 solid;
    height: 70px;
    font-size: 22px;
    
    
}

#interface-sp .bt{
   width: 100px;
    height:50px;  
    background-color:#194574;
    color:#fff;
    border:none;
    font-size:22px;
}
    } 

    @media only screen and (orientation:landscape ){
        
          
#interface-sp{
    width:100%;
    height:auto;
    padding:20px;
    background-color:#dcdcdc;
    
    margin: 10px auto;
}

#interface-sp table{
    width: 100%;
    height: auto;
   
    margin: 5px auto;
    border: 2px #194574 solid;
    border-collapse: collapse;
    background-color:#fff;
}
#interface-sp table td{
    border: 1px #194574 solid;
    height: 50px;
    font-size: 23px;
    
    text-align:center;
}
#interface-sp table th{
    border: 1px #194574 solid;
    height: 50px;
    font-size: 23px;
    
    
}

#interface-sp .bt{
   width: 120px;
    height:40px;  
    background-color:#194574;
    color:#fff;
    border:none;
    font-size: 23px;
}
    }

.fx{
    font-size: 50px;
    position: absolute;
    top: 35px;
    right: 20px;
    color: red;
    font-weight: 600;
    text-decoration: none;
}
        </style>
   
        <section id="interface-sp">
            <a href="" class="fx">&times;</a>
        <table> 
            <tr><th colspan='5'><h3>Pedido Separação</h3></th></tr>
            
            <tr><th colspan='2'>Cliente</th><td colspan='3'><?php echo $nome;?></td></tr>
           
            <tr><th colspan='5'><h4>Pedido N°. <?php echo $id_pedido; ?></h4></th></tr>
            <tr>
                
                <th>Quantidade</th>
                <th>Un</th>
                <th>Produto</th>
                <th>Volume</th>
                <th></th>
            </tr>
<?php
       $consulta = $con->pesquisar("SELECT o.quantidade,o.id_order, p.produto, p.versao, p.id_produto, o.volume, o.unidade FROM `_pedido_order` o JOIN _produto p ON p.id_produto = o.`id_produto` WHERE o.id_pedido = '$id_pedido' and o.status = 'Emitido' order by produto asc");
while ($dados = mysqli_fetch_array($consulta)){
       $quantidade_db = $dados['quantidade'];
       $versao = $dados['versao'];
       $volume = $dados['volume'];
       $unidade = $dados['unidade'];
       $produto = $dados['produto'];
       $id_produto_db = $dados['id_produto'];
       $id_order_db = $dados['id_order'];
       switch ($unidade){
           case 'Unidade': $un = 'Un';               break;
           case 'Caixa': $un = 'Cx';               break;
       }
       
?>
             <tr>
                <td><?php echo "$quantidade_db";?></td>
                <td><?php echo " $un ";?></td>
                <td><?php echo "$produto $versao";?></td>
                <td><?php echo $volume;?></td>
                
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="action" class="bt" value="Mostrar">
                        <input type="hidden"  name="id_order" value="<?php echo $id_order_db; ?>">
                        <input type="hidden"  name="id_pedido" value="<?php echo $id_pedido; ?>">
                        <input type="submit" name="separar" class='bt' value="Separar">
                    </form>
                </td>
            </tr>
            
            <?php
}
?>
            <tr><td colspan="5"><button class="bt" onclick="window.history.go(0);">Atualizar</button></td></tr>
        </table>
        </section>
   