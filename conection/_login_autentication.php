<?php
include './conection/_conecta.php';

         SESSION_START();
         $email_user = $_SESSION['usuario'] ;
         $password_user = $_SESSION['password']; 
         
         
         $result = $con->pesquisar("select * from _admin where email = '$email_user' ")or die($con->error);
         
         while ($dados = mysqli_fetch_array($result)){
             $email_db = $dados['email'];
             $username = $dados['nome'];
             $senha_db = $dados['senha'];
             $nivel = $dados['nivel'];
         }
        
         if($email_db != "" && $senha_db != ""){   
            echo "<span style='color:#fff; position: absolute; top:27px; right:10%; z-index:2;'>$username <a style='padding-left:20px; color:#fff;' href='./conection/_logout.php'>SAIR</a></span>";
        
            
        } else {
             header('location: ./index.php');
}