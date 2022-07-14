
<?php

    $results = $con->consultaTudo('_produto','id_produto',"$id");
   // $results = $con->pesquisar("SELECT * FROM _produto where id_produto = $id");
    
    while ($dado = mysqli_fetch_array($results)){
    $id_produto = $dado['id_produto'];
    $produto = $dado['produto'];
    $versao = $dado['versao'];
    $linha = $dado['linha'];
    $categoria = $dado['categoria'];
    $embalagem_primaria = $dado['embalagem_primaria'];
    $forma = $dado['forma'];
    $tempo = $dado['tempo'];
    $volume = $dado['volume'];
    $caixas = $dado['caixas'];
    $embalagem_secundaria = $dado['embalagem_secundaria'];
    }?>

<table id="table-header">
        <tr><td><h4>Código:                </h4></td><td style="flex-grow: 1;"><?php echo $id_produto;?></td></tr>
        <tr><td><h4>Produto:               </h4></td><td style="flex-grow: 1;"><?php echo $produto;?></td></tr>
        <tr><td><h4>Versão:                </h4></td><td style="flex-grow: 1;"><?php echo $versao;?></td></tr>
        <tr><td><h4>Categoria:             </h4></td><td style="flex-grow: 1;"><?php echo $categoria;?></td></tr>
        <tr><td><h4>Destinação:            </h4></td><td style="flex-grow: 1;"><?php echo $linha;?></td></tr>
        <tr><td><h4>Embalagem primaria:    </h4></td><td style="flex-grow: 1;"><?php echo $embalagem_primaria;?></td></tr>
        <tr><td><h4>Embalagem secundaria:  </h4></td><td style="flex-grow: 1;"><?php echo $embalagem_secundaria;?></td></tr>
        <tr><td><h4>Volumes:               </h4></td><td style="flex-grow: 1;"><?php echo $volume;?></td></tr>
        <tr><td><h4>Caixas:                </h4></td><td style="flex-grow: 1;"><?php echo $caixas;?></td></tr>
        <tr><td><h4>Forma:                 </h4></td><td style="flex-grow: 1;"><?php echo $forma;?></td></tr>
        <tr><td><h4>Tempo médio de preparo:</h4></td><td style="flex-grow: 1;"><?php echo $tempo;?></td></tr>
</table>  