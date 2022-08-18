<?php
$action = filter_input(INPUT_POST,'Add',FILTER_SANITIZE_STRING);
if($action){
    
//$quantidade = filter_input(INPUT_POST,'quantidade',FILTER_SANITIZE_NUMBER_INT);
$quantidade = $_POST['quantidade'];

$x = count($quantidade);
echo "Valor de x: $x<br><br>";
$var = (array_sum($quantidade) + 100);
echo 'Valor de soma:'.$var.'<br><br>';

for($i = 0; $i < count($quantidade); $i++){
    
    echo "$quantidade[$i]<br>";
}
    
}
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" method="post">
        <?php
        include '../conection/Conection.php';
        include '../conection/Query.php';
        $con = new Query();
        $buscar_lote = $con->pesquisar("SELECT * FROM `estoque_produto` WHERE `id_produto` = 52");
            
            while ($dados = mysqli_fetch_array($buscar_lote)){
                $lote = $dados['lote'];
                $id_estoque = $dados['id_estoque'];
                $quantidade_lote = $dados['quantidade'];
       ?>
            <label> <?php echo $quantidade_lote; ?></label>
            <input type="checkbox" name="quantidade[]" value="<?php echo $quantidade_lote; ?>"> 
            <label for=""><?php echo $lote; ?></label>
            <br>
            <br>
        <?php 
            }
        ?>
            <input type="submit" name="Add" value="Adicionar">
        </form>
    </body>
</html>
