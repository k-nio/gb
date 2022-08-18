<?php
include '../conection/Conection.php';
include '../conection/Query.php';
$con = new Query();
include '../conection/_login_autentication.php';

$filter_string = FILTER_SANITIZE_STRING;
$filter_number = FILTER_SANITIZE_NUMBER_INT;


$id_order = filter_input(INPUT_POST,'id_order',$filter_number);

if($id_pedido){
    $result = $con->pesquisar("SELECT * FROM `_pedido_order` WHERE `id_order` = '$id_order'");
    while ($dados = mysqli_fetch_array($result)){
        
    }
}


























/*
$action = filter_input(INPUT_POST,'action', FILTER_SANITIZE_STRING);

if($action){
    $quantidade_estoque = filter_input(INPUT_POST,'quantidade_estoque', FILTER_SANITIZE_NUMBER_INT);
    $quantidade_pedido = filter_input(INPUT_POST,'quantidade_pedido', FILTER_SANITIZE_NUMBER_INT);
    $quantidade_total = $quantidade_estoque - $quantidade_pedido;
  if($quantidade_total == 0){
      echo "Igual a que zero:$quantidade_total";
     $update_estoque = $con->pesquisar("UPDATE `estoque_produto` SET `status` = 'Vendido' WHERE `estoque_produto`.`id_estoque` = $id_estoque");
     $insert_pedido = $con->pesquisar("INSERT INTO `_pedido_order` (`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`, `volume`, `unidade`) VALUES (NULL, '$id_produto', '$id_pedido', '$id_estoque', '$quantidade', '$id_funcionario', '$volume', '$unidade')");
  }  
    if($quantidade_total > 0){
        echo "maior que zero: $quantidade_total";
        $query = "INSERT INTO `estoque_produto`(`id_estoque`, `id_produto`, `quantidade`, `volume`, `unidade`, `lote`, `fabricacao`, `validade`, `situacao`, `status`) VALUES (null,'$id_produto','$quantidade','$volume','$unidade','$lote','$fabricacao','$validade','$situacao','$status')";
    }

    if($quantidade_total < 0){
        echo "menor que zero: ".(-$quantidade_total);
        $quantidade = - $quantidade_total;
       // $update_estoque = $con->pesquisar("UPDATE `estoque_produto` SET `status` = 'Vendido' WHERE `estoque_produto`.`id_estoque` = $id_estoque");
        //$insert_pedido_order = $con->pesquisar("INSERT INTO `_pedido_order` (`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`, `volume`, `unidade`) VALUES (NULL, '$id_produto', '$id_pedido', '$id_estoque', '$quantidade', '$id_funcionario', '$volume', '$unidade')");
        //$insert_pedido = $con->pesquisar("INSERT INTO `_pedido_order` (`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`, `volume`, `unidade`) VALUES (NULL, '$id_produto', '$id_pedido', '0', '$quantidade', '$id_funcionario', '$volume', '$unidade')");
        
    }
}
    
    
 ?>   
*/