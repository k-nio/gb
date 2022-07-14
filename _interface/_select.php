<section class="display-content">
    <div class="folha">
         <?php
      $menu_select = filter_input(INPUT_GET,'menu-consulta');

if($menu_select){
    switch ($menu_select){
        case 1 : 
            include './_interface/_select/_select_order.php';           
            break;
        
        case 2 : 
            include './_interface/_select/_produto.php';            
            break;
        
        case 3 : 
            include './_interface/_select/_ordem/_ordem_show.php'; 
            include './_interface/_select/_select_order.php';           
            break;
           
        case 4 : 
            include './_interface/_select/_ordem/_imprimir.php'; 
            include './_interface/_select/_select_order.php';            
            break;
        
        case 5 : 
            include './_interface/_select/_report/_report_produto.php'; 
            include './_interface/_select/_select_order.php';            
            break;      
}

    }
        ?>
        
        
    </div>
</section>