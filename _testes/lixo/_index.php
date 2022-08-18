<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../conection/Conection.php';
        include '../conection/Query.php';
        
        $con = new Query();
        include '../conection/_login_autentication.php';
        
        echo $_SESSION['id_funcionario'];
        echo $id_funcionario;
        
        
        ?>
    </body>
</html>
