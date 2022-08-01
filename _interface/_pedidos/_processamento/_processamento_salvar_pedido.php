<?php

    $data_entrega = filter_input(INPUT_POST,'data-entrega');
    $nota = filter_input(INPUT_POST,'nota');
    $data_emissao = date('Y-m-d');
    
    
    $salva = $con->pesquisar("INSERT INTO `_pedido`(`id_pedido`, `id_cliente`, `data_emissao`, `data_entrega`, `notas`, `id_funcionario`,`status`) VALUES (null,'$id_cliente','$data_emissao','$data_entrega','$nota','$id_funcionario','Rascunho')");