<title>Consultar Formula</title>

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
                            $result = $con->consulta('_produto','produto','');
                            while ($dados = mysqli_fetch_array($result)){
                                $produto = $dados['produto'];
                                $id_produto = $dados['id_produto'];
                                $versao = $dados['versao'];
                            ?>
                            <option value="<?php echo "$id_produto,$produto,$versao"; ?>"><?php echo "$produto $versao";?></option>
                            <?php
                            
                            } ?>
                        </select>
            </td></tr>
                <tr>
                    <td>
                        <input type="submit" class="bt" name="mostrar" value="Enviar">
                    </td>
                </tr>
    </table>
</form>