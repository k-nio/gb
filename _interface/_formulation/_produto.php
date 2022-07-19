<link rel="stylesheet" href="./_CSS/_formulations.css"/>

<form id="formulations-produto" action="./conection/_session.php" method="post">
    <table>
        <tr>
            <th><h2>Selecionar Produto</h2></th>            
        </tr>
        <tr><th>Produto:</th></tr>
                <tr><td>
                        
                        <select name="id_produto" class="campo-input">
                            <?php
                            $result = $con->pesquisar("SELECT * FROM _produto ORDER BY produto ASC");
                            while ($dados = mysqli_fetch_array($result)){
                                $produto = $dados['produto'];
                                $id_produto = $dados['id_produto'];
                                $versao = $dados['versao'];
                            ?>
                            <option value="<?php echo $id_produto; ?>"><?php echo "$produto $versao";?></option>
                            <?php
                            
                            } ?>
                        </select>
            </td></tr>
                <tr>
                    <td>
                        <input type="submit" class="bt" name="enviar" value="Enviar">
                    </td>
                </tr>
    </table>
</form>