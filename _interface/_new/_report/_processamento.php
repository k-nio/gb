
        <?php
    $action = filter_input(INPUT_POST,'action');
    
    if($action){
        
       
        
        switch ($action){
            case 'Salvar': 
                              
                $id_produto = filter_input(INPUT_POST,'id_produto');
        $id_ordem = filter_input(INPUT_POST,'id_ordem');
        $concluir = filter_input(INPUT_POST,'conclusao');
        $lote = filter_input(INPUT_POST,'lote');
        $id_funcionario = 1;
        $data = date('Y-m-d');
        $salvar = $con-> pesquisar("INSERT INTO `report_produto`(`id_report`, `id_ordem`,`conclusao`, `data`, `id_funcionario`) VALUES (null,'$id_ordem','$concluir','$data','$id_funcionario')");
        
        $result_ = $con->pesquisar("SELECT * FROM `especificacao` WHERE `id_produto` = '$id_produto'");
                while ($dado = mysqli_fetch_array($result_)){
                    $id_especification = $dado['id_especification'];
                    $propriedade = $dado['parametro'];
                    
                    $propriedade_ = iconv( "UTF-8" , "ASCII//TRANSLIT//IGNORE" , $propriedade );
                    $string = preg_replace( array( '/[ ]/' , '/[^A-Za-z0-9\-]/' ) , array( '' , '' ) , $propriedade_ );
                    
                    
                    $paramentro = filter_input(INPUT_POST, $string);
                    
                   
                    
                    $salvar = $con-> pesquisar("INSERT INTO `_report_resultados`(`id_resultado`, `resultado`, `id_especification`,`id_ordem`) VALUES (null,'$paramentro','$id_especification','$id_ordem')");
                    
                    

                    }
                  
                    
                
            break;            
        } 
    }