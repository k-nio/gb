             
<section class="display-content">
    <div class="folha">
        <nav ><ul style="color:#000;">
                <li><a href="_pedidos_1.php?menu-pedido=1">Novo Pedido</a></li>
                <li><a href="_pedidos_1.php?menu-pedido=2">Consultar Pedidos</a></li>
                <li><a href="_pedidos_1.php?menu-pedido=3">Pedidos concluidos</a></li>
            </ul>
        </nav>
        
       <?php
        
       $menu_pedido = filter_input(INPUT_GET,'menu-pedido');
     if($menu_pedido){
         switch ($menu_pedido){
             case 1: 
                 include './_interface/_pedidos_1/_novo_pedido.php';
                 
                 $add = filter_input(INPUT_POST,'add');
                 if($add){
                     include './_interface/_pedidos_1/_processamento/_cadastrar_cliente.php';
                 }
                 break;
             case 2: 
                 include './_interface/_pedidos_1/_consultar.php'; 
                 break;
             case 3:
                 include './_interface/_pedidos_1/_processamento/_pedido_produto.php';
                 break;
             case 4: 
                 include './_interface/_pedidos_1/_separar_pedido.php'; 
                 break;
            
         }
     }  
     
       ?>
    </div>
</section>