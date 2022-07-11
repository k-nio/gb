<?php

$email_user = filter_input(INPUT_POST,'usuario');
$password_user = filter_input(INPUT_POST,'password');


if($email_user){
$result = $con->pesquisar("select * from _admin where email = '$email_user' ");

while ($dados = mysqli_fetch_array($result))
{
     
$nome_db = $dados['nome'];
$email_db = $dados['email'];
$senha_db = $dados['senha'];
$level_db = $dados['nivel'];
}
$contar = $contar = mysqli_num_rows($result);
   if($contar != 0){ 
                if($senha_db == $password_user){
                             
         SESSION_START();
        
        $_SESSION['usuario'] = $email_user;
        $_SESSION['password'] = $password_user; 
           
        header('location: ./_index.php');
                    
                    
                               } else {
                             echo "<span style='color:red; position: absolute; top:39px; left:528px;'>Senha Incorreta.</span>";
                            }   

                     } else {
                        echo "<span style='color:red; position: absolute; top:39px; left:528px;'>Nenhum usuário Cadastrado.</span>";
                     }

}











/*
if($username){
    $result = $con->pesquisar("select * from _admin where email = '$username' ");
    
    
    while ($dados = mysqli_fetch_array($result))
{
     
$nome_db = $line['nome'];
$email_db = $line['email'];
$senha_db = $line['senha'];
$level_db = $line['nivel'];
}
    
    
    
    
    
    
    $contar = mysqli_num_rows($result);
    
    if($contar !=0){
       
    if($userpass != $email_db){
                echo "<span style='color:red; position: absolute; top:39px; left:528px;'>Nenhum usuário Cadastrado com esse Login.</span>";
        
    } else {
    if($senha_db != $userpass){
             echo "<span style='color:red; position: absolute; top:39px; left:528px;'>Senha incorreta!!</span>";
             } else {
           
                 
        if($level_db != 'administrador' ){
            
           SESSION_START();
        
        $_SESSION['user_email'] = $email_login;
        $_SESSION['senha_user'] = $senha_login; 
           
        header('location: ./_index.php');
        
              }else{
        SESSION_START();
        
        $_SESSION['user_email'] = $email_login;
        $_SESSION['senha_user'] = $senha_login;
        
        header('location: ./_index.php');
        }
             }
        
        
        
    }
    }
}*/
