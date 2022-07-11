<title>Cadastrar Ordem de produção</title>
<link rel="stylesheet" type="text/css" href="./_CSS/_new_cadastro_orderm.css"/>
<form class="form-cadastro" action="?menu-new=4" method="post">
        
<table id="new-table">
    <tr>
        <th colspan="3"><h1>Nova Ordem de Produção</h1></th>
    </tr>
    <tr>
        <td>
            PRODUTO:
             <select id="produto-ord" name="id" class="campo-input"> 
                <option value="">SELECIONE PRODUTO</option>
                
         <?php 
        
      $result = $con->pesquisar("SELECT * FROM `_produto` ORDER by produto ASC");
      While($dados = mysqli_fetch_array($result))  {
          $produtos = $dados['produto'];
          $versao = $dados['versao'];
          $id = $dados['id'];
     
      ?>
                
                <option style="display: block;" value="<?php echo "$id";?>">
                    <?php echo $produtos.' '.$versao;?>
                </option>
      
                
            
                
                <?php }?>
                
             </select>
            
        </td>
        <td>
            QUANTIDADE:
            <input type="number" name="quantidade" value="200" class="campo-input"/>
            
        </td>
        <td>
            LOTE:
         <select name="lote" class="campo-input""> 
                <option value="<?php echo date('ymd').'A';?>"><?php echo date('ymd').'A';?></option>
                <option value="<?php echo date('ymd').'B';?>"><?php echo date('ymd').'B';?></option>
                <option value="<?php echo date('ymd').'C';?>"><?php echo date('ymd').'C';?></option>
                <option value="<?php echo date('ymd').'D';?>"><?php echo date('ymd').'D';?></option>
                <option value="<?php echo date('ymd').'E';?>"><?php echo date('ymd').'E';?></option>
         </select>
        </td>
    </tr>
      
    <tr>
        <td>
            TANQUE:
        <select name="tanque" class="campo-input"> 
                
                <option value="Tanque I - Risco I">RISCO I - TANQUE 1</option>
                <option value="Tanque II - Risco I">RISCO I - TANQUE 2</option>
                <option value="Tanque III - Risco I">RISCO I - TANQUE 3</option>
                <option value="Tanque I - Risco II">RISCO II - TANQUE 1</option>
                <option value="Tanque II - Risco II">RISCO II - TANQUE 2</option>
                <option value="Tambor 200L - Risco I">RISCO I - TAMBOR 200L</option>
                <option value="Tambor 200L  - Risco II">RISCO II - TAMBOR 200L</option>
                <option value="Tanque corrosivo">TANQUE CORROSIVO</option>
                
            </select>
        </td>
        <td>
            SOLICITANTE:
        <select name="solicitante" class="campo-input""> 
                
                <option value="ADMINISTRAÇÃO">SOLICITADO POR:</option>
                <option value="ADEMILTON">ADEMILTON</option>
                <option value="BRENDO">BRENDO</option>
                <option value="BRUNO">BRUNO</option>
                <option value="CARLOS">CARLOS</option>
                <option value="EMERSON">EMERSON</option>
                <option value="THAILAN">THAILAN</option>
                
            </select> 
        </td>
        <td>
            <input type="hidden" name="status" value="EMITIDA" class="btn-ord">
            
            <input type="submit" name="nova_ord" value="ENVIAR" class="bt">
            <input type="reset" name="" value="RESET" class="bt">
        </td>
    </tr>
    
           
       
</table>
</form>