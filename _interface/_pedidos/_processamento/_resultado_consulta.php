<style>
    #tb-search,#search-form{
        display: none;
    }
</style>
<a id="fx" href="">&times;</a>
<form action="" id="mostrar" method="post"></form>
<form action="./_pedidos.php?menu-pedido=4" id="separar" method="post"></form>
<table id="tabela-consulta">
    <tr><th style="background-color: #fff; color: #000; height: 50px;" colspan="7"><h1>Pedidos</h1></th></tr>
    <tr>
        <th>N° Pedido</th>
        <th>Cliente</th>
        <th>Emissão</th>
        <th>Entrega</th>
        <th>Situação</th>
        <th>Nota fiscal</th>
        <th colspan="2"></th>
       
    </tr>
<?php
$parametro = filter_input(INPUT_POST,'parametro');
$valor = filter_input(INPUT_POST,'valor');
$status = filter_input(INPUT_POST,'status');
$ordem = filter_input(INPUT_POST, 'ordem');
if($status == 'tudo'){
$result = $con->pesquisar("SELECT * FROM `_pedido` p JOIN cliente c on p.id_cliente = c.id_cliente order by $parametro $ordem");
}else {
    $result = $con->pesquisar("SELECT * FROM `_pedido` p JOIN cliente c on p.id_cliente = c.id_cliente WHERE $parametro like '%$valor%' AND p.status = '$status' order by $parametro $ordem");
}
while($dados = mysqli_fetch_array($result)){
    $id_pedido = $dados['id_pedido'];
    $cliente = $dados['nome'];
    $id_cliente = $dados['id_cliente'];
    $emissao = $dados['data_emissao'];
    $entrega = $dados['data_entrega'];
    $status = $dados['status'];
    $nota_fiscal = $dados['nf'];
    $timestamp = strtotime($emissao); 
    $newDate = date("d/m/Y", $timestamp );
    $timestamps = strtotime($entrega); 
    $newDates = date("d/m/Y", $timestamps );
    switch ($status){
        case 'Rascunho':
            $color = 'background-color:rgba(255, 255, 0,0.3);';
            break;
        case 'Cancelado':
            $color = 'background-color:rgba(255, 0, 0, 0.3);';
            break;
        case 'Entregue':
            $color = 'background-color:rgba(108, 254, 0,0.3);';
            break;
        case 'Separando':
            $color = 'background-color:rgba(108, 182, 235,0.3);';
            break;
    }

?>

    <tr style="<?php echo $color; ?>">
        <td><?php echo $id_pedido; ?></td>
        <td><?php echo $cliente; ?></td>
        <td><?php echo $newDate; ?></td>
        <td><?php echo $newDates; ?></td>
        <td><?php echo $status; ?></td>
        <td><?php echo $nota_fiscal; ?></td>
        <td><input type="hidden" name="id_cliente" form="mostrar" value="<?php echo $id_cliente; ?>"><button type="submit" class="bt" form="mostrar" name="id" value="<?php echo $id_pedido; ?>"> Mostrar</button></td>
        <td><input type="hidden" name="id_cliente" form="mostrar" value="<?php echo $id_cliente; ?>"><button type="submit" class="bt" form="separar" name="id" value="<?php echo $id_pedido; ?>"> Separar</button></td>
    </tr>
    <?php
    }
    ?>
</table>
