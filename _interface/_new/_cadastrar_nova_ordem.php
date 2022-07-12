<?php
$cadastrar_ord = filter_input(INPUT_POST,'nova_ord');
if($cadastrar_ord){
 $produto = filter_input(INPUT_POST,'id');
 $quantidade = filter_input(INPUT_POST,'quantidade');
 $tanque = filter_input(INPUT_POST,'tanque');
 $solicitante = filter_input(INPUT_POST,'solicitante');
 $lote = filter_input(INPUT_POST,'lote');
 $data = date('Y-m-d');
    
 $salvar = $con->salvar('ordem_producao','`id_ordem`, `data`, `id_produto`, `lote`, `quantidade`, `tanque`, `id_funcionario`, `situacao`',"null,'$data','$produto','$lote','$quantidade','$tanque','$solicitante','Emitida'");
 
}
?>
<title>Cadastrar Ordem de produção</title>
<link rel="stylesheet" type="text/css" href="./_CSS/_new_cadastro_orderm.css"/>
<form class="form-cadastro" action="?menu-new=1" method="post">
        
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
          $id = $dados['id_produto'];
     
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
                
                <option value="2">SOLICITADO POR:</option>
                <option value="3">ADEMILTON</option>
                <option value="7">BRENDO</option>
                <option value="1">BRUNO</option>
                <option value="6">CARLOS</option>
                <option value="8">EMERSON</option>
                <option value="10">THAILAN</option>
                <option value="9">JUNIOR</option>
                
            </select> 
        </td>
        <td>
                  
            <input type="submit" name="nova_ord" value="ENVIAR" class="bt">
            <input type="reset" name="" value="RESET" class="bt">
        </td>
    </tr>
    
           
       
</table>
</form>