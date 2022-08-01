<?php
include './conection/_conecta.php';
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <form method="post" action="">
    <table id="login-table">
        <tr><td><h1>Login</h1></td></tr>
        
        
        <tr><td><i class="fa fa-envelope icon"></i><input type="usuario" placeholder="Email" name="usuario" class="campo-login email"></td></tr>
        
        <tr><td><i class="fa fa-key icon"></i><input type="password" placeholder="Senha" name="password" class="campo-login senha"></td></tr>
        
        <tr><td><input type="submit" name="logar" value="Logar" class="bt"></td></tr>
        <tr><td><input type="reset" name="" value="RESET" class="bt"></td></tr>
    </table>
      </form>
    <?php
      include './_interface/_index.php';
      include './_interface/_interface/_footer.php';
      
      ?>
           </section>
    </body>
</html>
