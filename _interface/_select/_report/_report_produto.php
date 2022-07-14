<title>Relatório de Produto Acabado</title>
 <?php
      $ids = filter_input(INPUT_POST,'rel');
      if ($ids){
        ?>
<section id="display-ord">
    <a href="" class="no-print" id="fx">&times;</a>
<?php echo $ids;?>
</section>
<?php
      }