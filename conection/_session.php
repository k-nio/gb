<?php
 $enviar = filter_input(INPUT_POST,'enviar');
 if($enviar){
     $produto = filter_input(INPUT_POST,'produto');
     $versao = filter_input(INPUT_POST,'versao');
     $id_produto = filter_input(INPUT_POST,'id_produto');
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        $_SESSION['produto'] = $produto;
        $_SESSION['id_produto'] = $id_produto;
        
 }
 header("Location: ../_formulations.php?menu-formula=1");
 exit();
 
    }
 $mostrar = filter_input(INPUT_POST,'mostrar');
 if($mostrar){
     
     $id_produto_versao = filter_input(INPUT_POST,'id_produto');
     
     $select = explode(",", $id_produto_versao);
     
     $produto = $select[1];
     $versao = $select[2];     
     $id_produto = $select[0];
     
    if(!isset($_SESSION)) 
    { 
        session_start(); 
        $_SESSION['produto'] = $produto;
        $_SESSION['versao'] = $versao;
        $_SESSION['id_produto'] = $id_produto;
        
 }
 header("Location: ../_formulations.php?menu-formula=6");
 exit();
 
    }
    $concluir = filter_input(INPUT_POST,'concluir');
    if($concluir){
        session_start();
     unset ($_SESSION['produto']);
     unset ($_SESSION['versao']);
     unset ($_SESSION['id_produto']);
     
     header("Location: ../_formulations.php?menu-formula=5");
     exit();
     
    }
    
    