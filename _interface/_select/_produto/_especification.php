
<table id="table-especification">
            <tr>
                <th>Propriedade</th>
                <th>Especificação</th>
                <th>Metódo</th>                
                <th colspan="2">Unidade</th>                
            </tr>
            <tr>
                <td><input type="text" class="campo" name="parametro" value="" required="required"></td>
                <td><input type="text" name="valor" value="" class="campo"></td>
        <td> <select name="metodo" class="campo">
            <option >Metodo</option>
            <option value="MA - 001 pH">MA - 001 pH</option>
            <option value="MA - 002 DENSIDADE">MA - 002 DENSIDADE</option>
            <option value="MA - 003 DENSIDADE APARENTE">MA - 003 DENSIDADE APARENTE</option>
            <option value="MA - 004 TEOR DE HCl">MA - 004 TEOR DE HCl</option>
            <option value="MA - 005 TEOR DE HIPOCLORITO DE SÓDIO">MA - 005 TEOR DE HIPOCLORITO DE SÓDIO</option>
            <option value="MA - 006 ORGANOLÉPTICA">MA - 006 ORGANOLÉPTICA</option>
            <option value="MA - 007 TEOR DE ESPUMA">MA - 007 TEOR DE ESPUMA</option>
            <option value="MA - 008 TEOR ALCOOLICO">MA - 008 TEOR ALCOOLICO</option>            
            <option value="MA - 009 MATERIAIS INSOLÚVEIS">MA - 009 MATERIAIS INSOLÚVEIS</option>
            <option value="MA - 010 SOLUBILIDADE DE SAIS">MA - 010 SOLUBILIDADE DE SAIS</option>
            <option value="MA - 011 PONTO DE TURVAÇÃO">MA - 011 PONTO DE TURVAÇÃO</option>
            <option value="MA - 012 ATIVO ANIÔNICO">MA - 012 ATIVO ANIÔNICO</option>
            <option value="MA - 013 ATIVO CATIÔNICO">MA - 013 ATIVO CATIÔNICO</option>
            <option value="MA - 014 VISCOSIDADE">MA - 014 VISCOSIDADE</option>
            <option value="MA - 015  CLORO RESIDUAL E TOTAL">MA - 015  CLORO RESIDUAL E TOTAL</option>
            <option value="MA - 016  pH DA ÁGUA">MA - 016  pH DA ÁGUA</option>
            <option value="MA - 017 ANALISE DE TURBIDEZ">MA - 017 ANALISE DE TURBIDEZ</option>
            
        </select></td>                
        <td> <input type="text" name="unidade" class="campo" value=""></td>                
                <td> <input type="submit" name="add" class="bt" value="Adicionar"></td>                
            </tr>
        </table> 
        
        
<input type="hidden" name="action" value="Especificações">
   
     
    <table id="especification">
        
        <tr><th colspan="4"><h2>Especificação</h2></th></tr>
        <tr>
            <th>Propriedade</th>
            <th>Especificação</th>
            <th>Metódo</th>
            <th>Unidade</th>
        </tr>
        <?php

        $result_ = $con->pesquisar("SELECT * FROM `especificacao` WHERE id_produto = '$id_produto'");
        while ($dado_ = mysqli_fetch_array($result_)){
            
            $metodo_ = $dado_['metodo'];
            $especifica_ = $dado_['valor'];
            $propriedade = $dado_['parametro'];
            $unidade_ = $dado_['unidade'];
            
        ?>
        <tr>
            <td>
        <?php echo $propriedade; ?>
            </td>
            <td>
                    <?php echo "$especifica_";  ?>
            </td>
                <td>
    <?php echo $metodo_; ?>
                </td>
                <td>
    <?php echo $unidade_; ?>
                </td>
            </tr>
                    <?php
                }
                ?>
    </table>