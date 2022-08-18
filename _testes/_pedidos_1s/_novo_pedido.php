<link rel="stylesheet" href="./_CSS/_novo_pedido.css"/>

<form action="./_pedidos.php?menu-pedido=3" method="post">
    <table id="table-pedido">
        <tr>
            <th colspan="3"><h2>Novo Pedido</h2></th>
        </tr>
        <tr>
            <th colspan="2">Cliente:</th>
            
            <th>Data da entrega:</th>
                    </tr>
                    <tr><td>
                            <select class="campo-input" name="id_cliente">
                   <?php
                   $results = $con->pesquisar("SELECT * FROM _pedido");
                   $row = mysqli_num_rows($results);
                   
                   $data = date('Y-m-d');
                   $result = $con->pesquisar("SELECT * FROM cliente order by nome asc");
                   while ($dados = mysqli_fetch_array($result)){
                       $nome = $dados['nome'];
                       $id_cliente = $dados['id_cliente'];
                   ?>
                   <option value="<?php echo $id_cliente; ?>"><?php echo $nome; ?></option>
                   <?php
                   }
                   ?>
               </select>
                        <td><input type="submit" formaction="./_pedidos.php?menu-pedido=1" name="add" id="add" value="&plus;"></td>
                        </td>
                        <td>
                            <input type="date" class="campo-input" name="data-entrega" value="">
                        </td>
                    </tr>
                    <tr><th colspan="3">Observações:</th>
</tr>
                    <tr>
                        <th colspan="2">
                            <textarea id="text-pedido" name="nota"></textarea>
                        </th>
                        <td colspan="3">
                            <input type="hidden" name="id_pedido" value="<?php echo $row + 1;?>">
                            <input type="submit" class="bt" name="selecionar" value="Selecionar">
                        </td>
                    </tr>
                   
    </table>    
</form>