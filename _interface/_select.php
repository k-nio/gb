<section class="display-content">
    <div class="folha">
         <?php
      $menu_select = filter_input(INPUT_GET,'menu-consulta');

if($menu_select){
    switch ($menu_select){
        case 1 : include './_interface/_select/_select_order.php';            break;
        case 2 : include './_interface/_select/_produto.php';            break;
}

    }
        ?>
        
        
    </div>
</section>