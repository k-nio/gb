<?php
$var = 1;
include './conection/_conection.php';

$logar = filter_input(INPUT_POST,'logar');

if($logar){
 
    include './conection/_login.php';
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Bruno Pereira dos Santos">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="_CSS/_login.css"/>
        <link rel="stylesheet" type="text/css" href="_CSS/_interface.css"/>
    </head>
    <body>
        <section id="conteiner-principal">
      <?php
      
      include './_interface/_interface/_header.php';
      include './_interface/_interface/_menu.php';
      ?>
    
    <?php
      include './_interface/_index.php';
      include './_interface/_interface/_footer.php';
      
      ?>
           </section>
    </body>
</html>
