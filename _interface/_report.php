<section class="display-content">
    <div class="folha">
         <?php
      $menu_reporter = filter_input(INPUT_GET,'menu-report');

if($menu_reporter){
    switch ($menu_reporter){
       case 1: 
           include './_interface/_new/_report/_report_produto.php';
           include './_interface/_select/_report_select.php';
           break;
       
       case 2: 
            include './_interface/_select/_report/_report_produto.php';
            include './_interface/_select/_report_select.php';       
            break;
        
       case 3: 
           include './_interface/_new/_report/_report_mp.php';
           include './_interface/_select/_report_select.php';
           break;
       
       case 4: 
           include './_interface/_select/_report/_report_mp.php';
           include './_interface/_select/_report_select.php';           
           break;
       
       case 5:
           include './_interface/_report/_select_order.php';
           include './_interface/_select/_report_select.php'; 
           break;
       
       case 6:
           include './_interface/_new/_report/_processamento.php'; 
        include './_interface/_select/_report_select.php'; 
    }

    }
        ?>
        
        
    </div>
</section>