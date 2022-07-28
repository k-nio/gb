<?php

include '../../conection/Conection.php';
include '../../conection/Query.php';
$con = new Query();

$select = filter_input(INPUT_POST, 'selecionar');
    
    if($select){
        $cliente = filter_input(INPUT_POST,'cliente');
                  $data_entrega = filter_input(INPUT_POST,'data-entrega');
                  $nota = filter_input(INPUT_POST,'nota');
                  $data_emissao = date('Y-m-d');
                  $id_funcionario = 1;
        
        $salva = $con->pesquisar("INSERT INTO `_pedido`(`id_pedido`, `id_cliente`, `data_emissao`, `data_entrega`, `notas`, `id_funcionario`) VALUES (null,'$cliente','$data_emissao','$data_entrega','$nota','$id_funcionario')");
        
        
        $result = $con->pesquisar("SELECT * FROM _pedido");
        while ($dado = mysqli_fetch_array($result)){
            $id_pedido = $dado['id_pedido'];
        }
        if(!isset($_SESSION)) 
    { 
        session_start(); 
        $_SESSION['id_pedido'] = $id_pedido;
        
            
       
    }    
    }else {
        session_start();
        $add = filter_input(INPUT_POST,'add');
        echo $add;
    }
    ?>

<link rel="stylesheet" href="../../_CSS/_pedido.css"/>

<section id="display-pedido">
    
<form action="" method="post">
    <table>
        <tr><th><h2>Pedido n° <?php echo $_SESSION['id_pedido'];?></h2></tr>
        <tr><td> <select name="produto">
        <?php
        $result = $con->pesquisar("SELECT p.id_produto, e.id_estoque, p.produto,p.versao, e.volume, e.unidade FROM `estoque_produto` e JOIN _produto p on p.id_produto = e.id_produto WHERE 1");
        while ($dados = mysqli_fetch_array($result)){
            $produto = $dados['produto'];
            $versao = $dados['versao'];
            $volume = $dados['volume'];
            $id_produto = $dados['id_produto'];
            $id_estoque = $dados['id_estoque'];
        
        ?>
        
            <option value="<?php echo $id_estoque;?>"><?php echo "$produto $versao $volume"?></option>
            <?php
            }
            ?>
        </select>
            </td><td>
        <input type="submit" name="add" value="Adicionar">
            </td></tr>
    </table>
    <label for="busca">Buscar países</label>
    
    <input type="search" id="busca" list="paises">

<datalist id="destino">
    
  <option value="Salvador"></option>
  
</datalist>
</form>
</section>