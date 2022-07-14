<?php
include '../../conection/Conection.php';
include '../../conection/Query.php';
$con = new Query();
$id = 1;
?>
<link rel="stylesheet" type="text/css" href="../../_CSS/_select_standard.css"/>
<section class="folha">
    <table class="margin">
        <tr>
            <td>
                <h1>Formula Padrão</h1> 
                <h2>Informações Gerais</h2> 
                <?php
                include './_standard/_header.php';
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <h2>Composição</h2>
                
                <?php
                include './_standard/_composition.php';
                ?>
                
            </td>
            
        </tr>
        <tr>
            <td><h2>Procedimento</h2>
            <?php
                include './_standard/_procedimento.php';
                ?>
            </td>
        </tr>
        <tr>
            <td>Especificações do produto
            <?php
                include './_standard/_especification.php';
                ?>
            </td>
        </tr>
        <tr>
            <td>Recomendções
            <?php
                include './_standard/_caution.php';
                ?>
            </td>
        </tr>
    </table>
</section>