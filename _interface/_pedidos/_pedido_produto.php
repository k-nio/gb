<section id="display-pedido">
    <?php
    $cliente = filter_input(INPUT_POST,'cliente');
    $data_entrega = filter_input(INPUT_POST,'data-entrega');
    $nota = filter_input(INPUT_POST,'nota');
    $data_emissao = date('Y-m-d');
    
    echo "$cliente
    <br> $data_entrega
    <br> $data_emissao
    <br> $nota";
    ?>
</section>
