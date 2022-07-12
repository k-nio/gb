<?php
include '../../conection/Conection.php';
include '../../conection/Query.php';
$con = new Query();
$id = 2;
?>
<link rel="stylesheet" type="text/css" href="../../_CSS/_select_standard.css"/>
<section class="folha">
    <table class="margin">
        <tr>
            <td>
                <h1>Formula Padrão</h1> 
                <h2>Informações Gerais</h2> 
                <?php
                include './_header.php';
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <h2>Composição</h2>
                <table>
                <?php
                include './_composition.php';
                ?>
                </table>
            </td>
            
        </tr>
        <tr>
            <td><h2>Procedimento</h2>
            <?php
                include './_procedimento.php';
                ?>
            </td>
        </tr>
        <tr>
            <td>Especificações do produto
            <?php
                include './_especification.php';
                ?>
            </td>
        </tr>
        <tr>
            <td>Recomendções
            <?php
                include './_caution.php';
                ?>
            </td>
        </tr>
    </table>
</section>