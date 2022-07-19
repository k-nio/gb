
<section class="display-content">
    <div class="folha">
       <?php
       $menu_new = filter_input(INPUT_GET,'menu-new');
     if($menu_new){
         switch ($menu_new){
             case 1: include './_interface/_new/_cadastrar_nova_ordem.php'; break;
             case 2: include './_interface/_new/_cadastrar_produto.php'; break;
             case 3: include './_interface/_new/_cadastrar_cliente.php'; break;
             case 4: include './_interface/_new/_cadastrar_materia_prima.php'; break;
             case 4: include './_interface/_new/_cadastrar_fornecedor.php'; break;
         }
     }  
     
       ?>
    </div>
</section>