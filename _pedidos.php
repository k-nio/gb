<?php
$var = 1;
include './conection/_conection.php';
include './conection/_login_autentication.php';
?><!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Bruno Pereira dos Santos">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="_CSS/_interface.css"/>
    </head>
    <body>
        <section id="conteiner-principal">
      <?php
   
      
      include './_interface/_interface/_header.php';
      include './_interface/_interface/_menu.php';
      include './_interface/_pedidos.php';
      include './_interface/_interface/_footer.php';
      
      ?>
        </section>
    </body>
</html>
