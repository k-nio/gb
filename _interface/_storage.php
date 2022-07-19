<section class="display-content">
    <link rel="stylesheet" href="./_CSS/_estoque_mp.css"/>
    <div class="folha">
         <?php
      $menu_storage = filter_input(INPUT_GET,'menu-storage');

if($menu_storage){
    switch ($menu_storage){
       case 1:
         
           include './_interface/_storage/_materia_prima/_cadastrar.php'; 
           break;
       case 2:  
           $pesquisa = filter_input(INPUT_POST,'pesquisar');
           $search = filter_input(INPUT_POST,'search');
           $situacao = filter_input(INPUT_POST,'situacao');
           
           if($pesquisa){
               include './_interface/_storage/_materia_prima/_consultar.php';
           } else {
              include './_interface/_storage/_materia_prima/_pesquisar.php';
}
          
           
           break;
           
       case 3:
           
           include './_interface/_storage/_produto/_cadastrar.php'; 
           break;
       
       case 4:
           
           $pesquisa = filter_input(INPUT_POST,'pesquisar');
           $id_produto = filter_input(INPUT_POST,'id_produto');
           $situacao = filter_input(INPUT_POST,'situacao');
           
           if($pesquisa){
               include './_interface/_storage/_produto/_consultar.php';
           } else {
              include './_interface/_storage/_produto/_pesquisar.php';
              }
          

    }
}
        ?>
        
        
    </div>
</section>