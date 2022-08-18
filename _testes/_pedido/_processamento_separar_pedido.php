<?php

include '../conection/Conection.php';
include '../conection/Query.php';
$con = new Query();
include '../conection/_login_autentication.php';

$filter_string = FILTER_SANITIZE_STRING;
$filter_number = FILTER_SANITIZE_NUMBER_INT;


$id_order = filter_input(INPUT_POST,'id_order',$filter_number);
$id_estoque = filter_input(INPUT_POST,'id_estoque',$filter_number);

echo "id_order: $id_order<br> id_estoque: $id_estoque<br>";


if($id_order){
    $result = $con->pesquisar("SELECT * FROM `_pedido_order` WHERE `id_order` = '$id_order'");
    while ($dados = mysqli_fetch_array($result)){
        $id_order = $dados['id_order'];
        $id_pedido = $dados['id_pedido'];
        $id_produto = $dados['id_produto'];
        $quantidade_pedido = $dados['quantidade'];
        $volume = $dados['volume'];
        $unidade = $dados['unidade'];
        $status = $dados['status'];
        
    }
    
    
    $result_ = $con->pesquisar("SELECT * FROM `estoque_produto` WHERE `id_estoque` = $id_estoque");
    
    while ($dado = mysqli_fetch_array($result_)){
       
        $id_produto_ = $dado['id_produto'];
        $volume_ = $dado['volume'];
        $unidade_ = $dado['unidade'];
        $id_estoque_ = $dado['id_estoque'];       
        $quantidade_estoque = $dado['quantidade'];      
        $lote_ = $dado['lote'];
        $fabricacao_ = $dado['fabricacao'];
        $validade_ = $dado['validade'];
        $status_ = $dado['status'];
        $situacao_ = $dado['situacao'];
    }
    
    
    $quantidade_total = $quantidade_estoque - $quantidade_pedido;
    echo "Total => $quantidade_total = $quantidade_estoque - $quantidade_pedido;";
    
   
    
    
}

$action = filter_input(INPUT_POST,'confirmar', FILTER_SANITIZE_STRING);

if($action){
    
     
  if($quantidade_total == 0){
      
      echo "Igual a que zero:$quantidade_total <br>";
     // atualiza o estoque para vendido 
      $update_estoque = $con->pesquisar("UPDATE `estoque_produto` SET `status` = 'Vendido' WHERE `estoque_produto`.`id_estoque` = $id_estoque");
     $quantidade = $quantidade_pedido;
     // insere um novo registro em pedido_order com o id_estoque e mantém a quantidade do pedido e o pedido_order do pedido inicial.
     $insert_pedido  = $con->pesquisar("INSERT INTO `_pedido_order`(`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`, `volume`, `unidade`, `status`) VALUES (null,'$id_produto','$id_pedido','$id_estoque_','$quantidade','$id_funcionario','$volume','$unidade','Concluído')");
     $update_pedido = $con->pesquisar("UPDATE `_pedido_order` SET `status` = 'Concluído' WHERE `_pedido_order`.`id_order` = $id_order");
  }  
    if($quantidade_total > 0){
        echo "maior que zero: $quantidade_total";
         //atualiza a quantidade com o valor do pedido e muda o status para vendido.
         $update_estoque  = $con->pesquisar("UPDATE `estoque_produto` SET `quantidade` = '$quantidade_pedido', `status` = 'Vendido' WHERE `estoque_produto`.`id_estoque` = $id_estoque");
         // insere um novo registro no estoque com as mesmas informações do estoque com a quantidade atualizada para o que restou em estoque
         $inserir_estoque = $con->pesquisar("INSERT INTO `estoque_produto`(`id_estoque`, `id_produto`, `quantidade`, `volume`, `unidade`, `lote`, `fabricacao`, `validade`, `situacao`, `status`) VALUES (null,'$id_produto_','$quantidade_total','$volume_','$unidade_','$lote_','$fabricacao_','$validade_','$situacao_','$status_')");
         $quantidade = $quantidade_pedido;
         // insere um novo registro em pedido_order com o id_estoque e mantém a quantidade do pedido e o pedido_order do pedido inicial
         $insert_pedido  = $con->pesquisar("INSERT INTO `_pedido_order`(`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`, `volume`, `unidade`, `status`) VALUES (null,'$id_produto','$id_pedido','$id_estoque_','$quantidade','$id_funcionario','$volume','$unidade','Concluído')");
         $update_pedido = $con->pesquisar("UPDATE `_pedido_order` SET `status` = 'Concluído' WHERE `_pedido_order`.`id_order` = $id_order");
    }

    if($quantidade_total < 0){
        echo "menor que zero: ".(-$quantidade_total);
       $quantidade_ = - $quantidade_total;
       //atualiza o estoque para vendido
       $update_estoque = $con->pesquisar("UPDATE `estoque_produto` SET `status` = 'Vendido' WHERE `estoque_produto`.`id_estoque` = $id_estoque");
       // insere um novo registro com a quantidade faltando e status = falta
       $insert_pedido_order = $con->pesquisar("INSERT INTO `_pedido_order`(`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`, `volume`, `unidade`, `status`) VALUES (null,'$id_produto','$id_pedido','$id_estoque_','$quantidade_','$id_funcionario','$volume','$unidade','Separando')");
       $quantidade = $quantidade_estoque;
       // insere um novo registro em pedido_order com a quantidade em estoque e muda o status para concluído
       $insert_pedido = $con->pesquisar("INSERT INTO `_pedido_order`(`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`, `volume`, `unidade`, `status`) VALUES (null,'$id_produto','$id_pedido','$id_estoque_','$quantidade','$id_funcionario','$volume','$unidade','Concluído')");
        
    }
}
?>
<link rel="stylesheet" href="_separar_portrait.css"/>
<section id="close-pedido">
    <div id="interface-s">
        <button onclick="window.history.go(-2);">Voltar para o pedido</button>
        <button onclick="window.history.go(-1);">Continuar separando produto</button>
    </div>    
</section>