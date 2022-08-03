 <?php
 $id_produto_ = filter_input(INPUT_POST,'id_produto');
  $produtos = filter_input(INPUT_POST,'produto');
  $quantidades = filter_input(INPUT_POST,'quantidade');
  $unidade = filter_input(INPUT_POST,'unidade');
  $volume = filter_input(INPUT_POST,'volume');
  $lote = date('Ymd').'A';
 if($id_produto_){
     $id_produtos = $id_produto_;
 } else {
    $id_produtos = $produtos;
}
    $salvar = $con->pesquisar("INSERT INTO `_pedido_order`(`id_order`, `id_produto`, `id_pedido`, `id_estoque`, `quantidade`, `id_funcionario`,`lote`,`unidade`,`volume`) VALUES (null,'$id_produtos','$id_pedido','0','$quantidades','$id_funcionario','$lote','$unidade','$volume')");
   
 