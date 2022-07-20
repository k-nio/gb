
<section class="display-content">
    <div class="folha">
       <?php
       $menu_registro = filter_input(INPUT_GET,'menu-registro');
     if($menu_registro){
         switch ($menu_registro){
             case 1: include './_interface/_new/_cadastrar_nova_ordem.php'; break;
           
         }
     }  
     
       ?>
    </div>
</section>