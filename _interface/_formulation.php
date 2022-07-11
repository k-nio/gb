
<section class="display-content">
    <div class="folha">
       <?php
       $menu_new = filter_input(INPUT_GET,'menu-formula');
     if($menu_new){
         switch ($menu_new){
             case 1: include './_interface/_formulation/_composition.php'; break;
             case 2: include './_interface/_formulation/_especifications.php'; break;
             case 3: include './_interface/_formulation/_select.php'; break;
             case 4: include './_interface/_formulation/_formula_padrao.php'; break;
             case 5: include './_interface/_formulation/_produto.php';    break;
             case 6: include './_interface/_formulation/_mostrar.php';    break;
         }
     }  
     
       ?>
    </div>
</section>