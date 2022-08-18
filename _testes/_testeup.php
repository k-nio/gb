<?php

?>
<head><meta charset="UTF-8">
        <meta name="author" content="Bruno Pereira dos Santos">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
*{
    margin:0;
    padding:0;
}
 #display-lote{
        width: 600px;
        height: 600px;
        background-color: #fff;
        position: absolute;
        z-index: 999;
        top: 50px;
        left: 500px;
        border: 1px #ccc solid;
       
    }
   #display-lote form{
        
        height:550px;
        width:100%;
        border: 1px #696969 solid;
        padding: 25px;
        
    }
   #display-lote table{
        border-collapse:collapse;
        height:550px;
        width:100%;
        border: 1px #696969 solid;
        
    }
   #display-lote th{
        height:40px;
        color:red;
        font-size:18px;
        width:275px; 
        border: 1px #696969 solid;
    }
  #display-lote td{
       
        height:40px;
        color:#000;
        font-size:18px;
        width:275px;
       border: 1px #696969 solid;
        text-align:center;
    }
   #display-lote .campo-input{
        height:50px;
        font-size:18px;
        width:220px;
        margin: 10px 125px;
        text-align:center;
        
    }
  #display-lote  .bt{
        height:50px;
        font-size:18px;
        width:225px;
        margin: 10px 15px;
        background-color:#194874;
        border:none;
        color:#fff;
    }
@media only screen and (max-width: 980px) {
    #display-lote{
        width: 1020px;
        height: 1800px;
        background-color: #fff;
        position: absolute;
        z-index: 999;
        top: 20px;
        left: 10px;
        border: 1px #ccc solid;
        background-color:yellow;
    }
   #display-lote table{
        border-collapse:collapse;
        height:980px;
        width:980px;
        border:3px green solid;
        background-color:#ccc;
    }
  #display-lote th{
        height:120px;
        color:#000;
        font-size:72px;
        width:100%; 
        border:1px #696969 solid;
    }
  #display-lote td{
        
        height:150px;
        color:#000;
        font-size:72px;
        width:100%;
       border:1px #696969 solid;
        text-align:center;
    }
 #display-lote .campo-input{
        height:150px;
        font-size:72px;
        width:700px;
        margin: 50px 125px;
        text-align:center;
        border:1px #696969 solid;
    }
    #display-lote .bt{
        height:150px;
        font-size:72px;
        width:700px;
        margin: 50px 125px;
        background-color:#194874;
        border:none;
        color:#fff;
    }}
   
</style>
</head>
<div id="display-lote">
     
    <form action="_processamento_teste.php" method="post">
     <table>
        
         <tr><th>Produto</th></tr>  
         <tr><td><?php echo $produto_; ?></td> </tr>
         <tr><th>Versão</th></tr>
         <tr><td><?php echo $versao_; ?></td></tr>
         <tr><th>Quantidade</th></tr>
         <tr><td><?php echo $qt; ?></td></tr>
         <tr><th>Lote</th></tr>
         <tr><th>Quantidade</th></tr>
         <tr><td>
                 
                 <input type="number" name="quantidade" value="">        
     
            <?php
            $buscar_lote = $con->pesquisar("SELECT * FROM `estoque_produto` WHERE `id_produto` = $id_produto_ AND volume = '$volume_'");
            
            while ($dados = mysqli_fetch_array($buscar_lote)){
                $lote = $dados['lote'];
                $id_lote = $dados['id_estoque'];
                $quantidade_lote = $dados['quantidade'];
                
            
            ?>
                
          <input type="checkbox" name="lote" value="<?php echo $id_lote;?>">
          <label class="campo-input" for=""> Quantidade: <?php echo "$quantidade_lote | $lote";?></label>
            <?php
          }
            $id_produto = filter_input(INPUT_POST,'id_produto', FILTER_SANITIZE_NUMBER_INT);
            $id_order = filter_input(INPUT_POST,'id_order', FILTER_SANITIZE_NUMBER_INT);
            $id_pedido = filter_input(INPUT_POST,'id_pedido', FILTER_SANITIZE_NUMBER_INT);
            $id_funcionario = filter_input(INPUT_POST,'id_funcionario', FILTER_SANITIZE_NUMBER_INT);
            $volume = filter_input(INPUT_POST,'volume', FILTER_SANITIZE_STRING);
            $unidade = filter_input(INPUT_POST,'unidade', FILTER_SANITIZE_STRING);
           ?>
             
          
                
             </td>
         </tr>
         <tr>
             <td>
                 <input type="hidden" name="id_order"  value="<?php echo $id_order;?>">
                 <input type="hidden" name="id_produto"  value="<?php echo $id_produto; ?>">
                 <input type="hidden" name="id_pedido" value="<?php echo $id_pedido; ?>">
                 <input type="hidden" name="id_funcionario" value="<?php echo $id_funcionario; ?>">  
                 <input type="hidden" name="volume"  value="<?php echo $volume; ?>">
                 <input type="hidden" name="unidade"  value="<?php echo $unidade; ?>">
                 
             </td>
         </tr>
         </tr>
        <tr>
            <td>
                <input class="bt"type="submit" value="Selecionar">
               
            </td></tr>
        <tr> 
        <td><a class="bt" href="">Fechar</a></td></tr>
     </table>
        
        
    </form>
</div>