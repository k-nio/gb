
<section class="display-content">
    <div class="folha">
       <?php
       $menu_pedido = filter_input(INPUT_GET,'menu-pedido');
     if($menu_pedido){
         switch ($menu_pedido){
             case 1: 
                 include './_interface/_pedidos/_novo_pedido.php';
                 
                 $add = filter_input(INPUT_POST,'add');
                 if($add){
                     include './_interface/_pedidos/_cadastrar_cliente.php';
                 }
                 $selecionar = filter_input(INPUT_POST,'selecionar');
                 if($selecionar){
                     include './_interface/_pedidos/_pedido_produto.php';
                 }
                 
                 
                 break;
             case 2: include './_interface/_pedidos/_consultar.php'; break;
             case 5: echo 'novo cliente'; break;
            
         }
     }  
     
       ?>
    </div>
</section>