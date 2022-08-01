<?php
include './conection/_conecta.php';
include './conection/_login_autentication.php';

 if(!isset($_SESSION)){ 
        session_start(); 
    } 
?>

<!DOCTYPE html>

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
      include './_interface/_formulation.php';
      include './_interface/_interface/_footer.php';
      
      ?>
        </section>
    </body>
</html>
