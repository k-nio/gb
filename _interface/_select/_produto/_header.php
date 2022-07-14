
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
<form method="post" action="">
<table id="table-header">
        <tr><td><h4>Código:                </h4></td><td style="flex-grow: 1;"><input type="text" name="id_produto" class="campo-input" value="<?php echo $id_produto;?>"></td></tr>
        <tr><td><h4>Produto:               </h4></td><td style="flex-grow: 1;"><input type="text" name="produto" class="campo-input" value="<?php echo $produto;?>"></td></tr>
        <tr><td><h4>Versão:                </h4></td><td style="flex-grow: 1;"><input type="text" name="versao" class="campo-input" value="<?php echo $versao;?>"></td></tr>
        <tr><td><h4>Categoria:             </h4></td><td style="flex-grow: 1;"><input type="text" name="categoria" class="campo-input" value="<?php echo $categoria;?>"></td></tr>
        <tr><td><h4>Destinação:            </h4></td><td style="flex-grow: 1;"><input type="text" name="linha" class="campo-input" value="<?php echo $linha;?>"></td></tr>
        <tr><td><h4>Embalagem primaria:    </h4></td><td style="flex-grow: 1;"><input type="text" name="embalagem_primaria" class="campo-input" value="<?php echo $embalagem_primaria;?>"></td></tr>
        <tr><td><h4>Embalagem secundaria:  </h4></td><td style="flex-grow: 1;"><input type="text" name="embalagem_secundaria" class="campo-input" value="<?php echo $embalagem_secundaria;?>"></td></tr>
        <tr><td><h4>Volumes:               </h4></td><td style="flex-grow: 1;"><input type="text" name="volume" class="campo-input" value="<?php echo $volume;?>"></td></tr>
        <tr><td><h4>Caixas:                </h4></td><td style="flex-grow: 1;"><input type="text" name="caixas" class="campo-input" value="<?php echo $caixas;?>"></td></tr>
        <tr><td><h4>Forma:                 </h4></td><td style="flex-grow: 1;"><input type="text" name="forma" class="campo-input" value="<?php echo $forma;?>"></td></tr>
        <tr><td><h4>Tempo médio de preparo:</h4></td><td style="flex-grow: 1;"><input type="text" name="tempo" class="campo-input" value="<?php echo $tempo;?>"></td></tr>
</table>
</form>

<input type='submit' name='action' class='bt' value='Confirmar'>