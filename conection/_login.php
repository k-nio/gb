<?php

$email_user = filter_input(INPUT_POST,'usuario');
$password_user = filter_input(INPUT_POST,'password');


if($email_user){
$result = $con->pesquisar("select * from funcionario where email = '$email_user' ");

while ($dados = mysqli_fetch_array($result))
{
     
$id_funcionario = $dados['id_funcionario'];
$nome_db = $dados['nome'];
$email_db = $dados['email'];
$senha_db = $dados['senha'];
$level_db = $dados['nivel'];
}
$contar = mysqli_num_rows($result);
   if($contar != 0){ 
                if($senha_db == $password_user){
                             
         SESSION_START();
        
        $_SESSION['usuario'] = $email_user;
        $_SESSION['password'] = $password_user; 
        $_SESSION['nome'] = $nome_db; 
        $_SESSION['id_funcionario'] = $id_funcionario; 
           
        header('location: ./_index.php');
                    
                    
                               } else {
                             echo "<span style='color: red; position: absolute;   top: 200px; left: 580px; z-index: 3;'>Senha Incorreta.</span>";
                            }   

                     } else {
                        echo "<span style='color: red; position: absolute;   top: 200px; left: 580px; z-index: 3;'>Nenhum usuário Cadastrado.</span>";
                     }

} 