<input type="search" id="search" name="search" onkeyup="pesquisar(this.value)">
   <ul> 
      
                   <?php
                   include '../conection/Conection.php';
                   include '../conection/Query.php';
                   $con = new Query();
                   $nome = filter_input(INPUT_GET,'valor',FILTER_SANITIZE_STRING);        
                   $results = $con->pesquisar("SELECT * FROM _pedido");
                   $row = mysqli_num_rows($results);
                   $data = date('Y-m-d');
                   
                   
                   if(!empty($nome)){
                   $result = $con->pesquisar("SELECT * FROM cliente where nome like '%$nome%' order by nome asc");
                   while ($dados = mysqli_fetch_array($result)){
                       $nome = $dados['nome'];
                       $id_cliente = $dados['id_cliente'];
                   ?>
                    <li class="brands"><?php echo $nome; ?></li>
                   <?php
                   }}
                   ?>
             
   </ul>
<script>
async  function pesquisar(valor){
    if(valor.length >= 3){
    const dados = await fetch('_lista.php?valor=' + valor);
    alert(valor);
}
}

</script>