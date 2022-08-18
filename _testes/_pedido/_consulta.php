<?php
include '../conection/Conection.php';
include '../conection/Query.php';
$con = new Query();
$action = filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING);
if($action){
    include './_pedido_consulta.php';
}
?>
<!DOCTYPE html>

<html>
    <head>
       <meta charset="UTF-8">
        <meta name="author" content="Bruno Pereira dos Santos">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Consulta</title>
<style>
    *{
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .icon-img{
        height: 25px;
        width: 25px;
    }
    #interface-list{
        height: 100vh;
        width: 100vw;
    }
@media only screen and (orientation:portrait ){
    #interface-list table{
    width: 100%;
    height:auto;
    padding:50px;
    margin: 5px auto;
    border: 2px #194574 solid;
    border-collapse: collapse;
    background-color:#fff;

    }
    .icon-img{
        height: 25px;
        width: 25px;
    }
    #interface-list table th{
 border: 1px #194574 solid;
    height: 70px;
    font-size: 22px;
   
    }
    #interface-list table td{
  border: 1px #194574 solid;
    height: 70px;
    font-size: 22px; 
    text-align:center;
    }
    #interface-list .bt{
      width: 100px;
    height: 40px;
    background-color: #194574;
    color: #fff;
    border: none;
}
}
@media only screen and (orientation:landscape ){
    #interface-list table{
    width: 100%;
    height:auto;
    padding:50px;
    margin: 5px auto;
    border: 2px #194574 solid;
    border-collapse: collapse;
    background-color:#fff;

    }
    #interface-list table th{
 border: 1px #194574 solid;
    height: 70px;
    font-size: 22px;
   
    }
    #interface-list table td{
  border: 1px #194574 solid;
    height: 70px;
    font-size: 22px; 
    text-align:center;
    }
    #interface-list .bt{
       width: 100px;
    height: 40px;
    background-color: #194574;
    color: #fff;
    border: none;
}
}
</style>
 </head>
    <body>
<section id="interface-list">
    <nav>
        <ul>
            <li>
                
            </li>
        </ul>
    </nav>
    <table>
        <tr>
            <th>ST</th>
            <th>N°</th>
            <th>Cliente</th>
            <th>Data</th>
            <th></th>
        </tr>
        <?php
        $result = $con->pesquisar("SELECT * FROM `_pedido` p JOIN cliente c on p.id_cliente = c.id_cliente order by p.id_pedido desc");
        while ($dados = mysqli_fetch_array($result)) {
            $id_pedido = $dados['id_pedido'];
            $cliente = $dados['nome'];
            $id_cliente = $dados['id_cliente'];
            $emissao = $dados['data_emissao'];
            $entrega = $dados['data_entrega'];
            $status = $dados['status'];
            $nota_fiscal = $dados['nf'];
            $timestamp = strtotime($emissao);
            $newDate = date("d/m/Y", $timestamp);
            $timestamps = strtotime($entrega);
            $newDates = date("d/m/Y", $timestamps);
            switch ($status) {
                case 'Rascunho':
                    $img = 'aguardando.png';
                    break;
                case 'Cancelado':
                    $img = 'cancelado.png';
                    break;
                case 'Entregue':
                    $img = 'ok.png';
                    break;
                case 'Separando':
                    $img = 'concluido.png';
                    break;
            }
            ?>

    <tr>
        <td><img src="../_imagens/<?php echo "$img";?>" class="icon-img" alt="alt"/></td>
        <td><?php echo $id_pedido; ?></td>
        <td><?php echo $cliente; ?></td>
        <td><?php echo $newDates; ?></td>
        <td>
            <form action="" method="post">
                
                <input type="hidden"  name="id_pedido" value="<?php echo $id_pedido; ?>">
                
                <input type="submit" name="action" class="bt" value="Mostrar">
            </form>
               
            </td>
        </tr>
       <?php
        }
       ?>
    </table>
</section>
         </body>
</html>
