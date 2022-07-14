 <title>Produto</title>
 <link rel="stylesheet" href="./_CSS/_produto_select.css"/> 
  <form action="" method="post">
      <table id="table">
      <tr> 
          <td style="height: 80px; text-align: center;">
          
          
      
          <select name="id_produto" class="campo-input">
              <option value="">Selecionar o Produto</option>
              <?php 
              $result = $con->pesquisar("SELECT * FROM _produto WHERE 1");
              while ($dados = mysqli_fetch_array($result)){
                  $produto = $dados['produto'];
                  $id = $dados['id_produto'];
                  $versao = $dados['versao'];
              ?>
              <option value="<?php echo $id; ?>"><?php echo "$produto $versao"; ?></option>
              <?php }?>
          </select>
      
     <input type="submit" class="bt" name="action" value="Consultar">
          </td>
      </tr>
      <tr>
          <td colspan="2">
 
   <?php
   $action = filter_input(INPUT_POST,'action');
   if($action){
      $id_produto = filter_input(INPUT_POST,'id_produto') ;
      switch ($action){
          case 'Consultar':  
              
              $id = filter_input(INPUT_POST,'id_produto'); 
              include './_interface/_select/_standard/_header.php';          
              break;
          
          case 'Especificações': 
              
              $id_produto = filter_input(INPUT_POST,'id_') ; 
              $add = filter_input(INPUT_POST,'add') ;
              if($add){
                  $parametro_a = filter_input(INPUT_POST,'parametro');
                  $valor_a = filter_input(INPUT_POST,'valor');
                  $metodo_a = filter_input(INPUT_POST,'metodo');
                  $unidade_a = filter_input(INPUT_POST,'unidade');
                  
                  $adicionar = $con->salvar('especificacao','`id_especification`, `parametro`, `valor`, `metodo`, `id_produto`, `unidade`',"null,'$parametro_a','$valor_a','$metodo_a','$id_produto','$unidade_a'");
              }
              
              include './_interface/_select/_produto/_especification.php'; 
              
              break;
          
          case 'Editar': 
              
              $id_produto = filter_input(INPUT_POST,'id_') ;
              echo "Editar : $id_produto";
              break;
          
          case 'Deletar': 
              
              $id = filter_input(INPUT_POST,'id_') ; 
              include './_interface/_select/_standard/_header.php';
             if($id){?>
              <div id='span'>
                  <a id="fx" href="">&times;</a>
                  <span>Tem certeza que quer excluir este produto?</span>
                  <input type='hidden' name='id_' value='<?php echo $id_produto;?>'>
                  <input type='submit' name='action' class='bt' value='Confirmar'>
              </div>
             <?php
             
             }
              break;
          
          case 'Confirmar': 
              $id_produto = filter_input(INPUT_POST,'id_') ;
              echo "<div id='spans'><a id='fx' href=''>&times;</a><span>Deletado com sucesso!</span></div>"; 
              
              $deletar = $con->excluir('_produto','id_produto',"$id_produto");
              
              break;
          
      }
   }
     
        ?>
          </td>
      </tr>
      <tr>
          <td style="height: 60px; text-align: center;">
              
              <input type="hidden" name="id_" value="<?php echo $id_produto;?>">
              
              <input type="submit" class="bt"  name="action" value="Especificações">
              <input type="submit" class="bt"  name="action" value="Editar">
              <input type="submit" class="bt"  name="action" value="Deletar">
      
          </td>
      </tr>
      </table>
  </form>