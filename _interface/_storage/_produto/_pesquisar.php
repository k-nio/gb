<form action="" method="post">
    <table id="search">
    <tr>
        <th>
        Escolha o Produto:
    </th>
    <th>
        Situação:
    </th>
    <td></td>
    </tr>
    <tr>
    <td>
        <select class="campo-input" name="id_produto">
            <?php
            $result = $con->pesquisar("SELECT * FROM estoque_produto e join _produto p on p.id_produto = e.id_produto group by e.id_produto order by produto asc");
            while ($dado = mysqli_fetch_array($result)){
                $id_produtos = $dado['id_produto'];
                $produto = $dado['produto'];
                $versao = $dado['versao'];
            
            ?>
            <option value="<?php echo $id_produtos;?>"><?php echo "$produto $versao"; ?></option>
            <?php
             }
            ?>
        </select>
    </td>
    <td>
        <select class="campo-input" name="situacao">
            <option value="">Tudo</option>
            <option value="Liberado">Liberado</option>
            <option value="Quarentena">Quarentena</option>
            <option value="Bloqueado">Bloqueado</option>
            
        </select>
    </td>
   
    <td>
        <input type="submit" class="bt" name="pesquisar" value="Pesquisar">
    </td>
    </tr>
</table>
</form>