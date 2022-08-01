<?php
       $results = $con->pesquisar("SELECT * FROM _pedido p join cliente c on p.id_cliente = c.id_cliente where id_pedido = '$id_pedido'");
while ($dado = mysqli_fetch_array($results)){
    $data_emissao_ = $dado['data_emissao'];
    $data_entrega_ = $dado['data_entrega'];
    $nota_ = $dado['notas'];
    $timestamp = strtotime($data_emissao_); 
    $newDate = date("d/m/Y", $timestamp );
    $timestamps = strtotime($data_entrega_); 
    $newDates = date("d/m/Y", $timestamps );

    $id = $dado['id_cliente'];
    $nome = $dado['nome'];
    $rua = $dado['rua'];
    $complemento = $dado['complemento'];
    $numero = $dado['numero'];
    $bairro = $dado['bairro'];
    $cidade = $dado['cidade'];
    $cep = $dado['cep'];
    $telefone = $dado['telefone'];
    $identidade = $dado['identidade'];
    $email = $dado['email'];
    $estado = $dado['estado'];
    $nota = $dado['note'];
}
