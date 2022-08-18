<?php
include './conection/_conecta.php';
  $id_produto = filter_input(INPUT_POST,'id_produto');
  $id_pedido = filter_input(INPUT_POST,'id_pedido');
  $id_funcionario = filter_input(INPUT_POST,'id_funcionario');
  $quantidades = filter_input(INPUT_POST,'quantidade');
  $unidade = filter_input(INPUT_POST,'unidade');
  $volume = filter_input(INPUT_POST,'volume');
  $lote = filter_input(INPUT_POST,'lote');
  $id_order = filter_input(INPUT_POST,'id_order', FILTER_SANITIZE_NUMBER_INT);

    $salvar = $con->pesquisar("INSERT INTO `_pedido_order`(`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`,`unidade`,`volume`) VALUES (null,'$id_produto','$id_pedido','$lote','$quantidades','$id_funcionario','$unidade','$volume')");
    
    $editar = $con->pesquisar("UPDATE `_pedido_order` SET `id_estoque`= 1 WHERE `id_order` = $id_order");