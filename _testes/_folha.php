<style>
    #header-pedido{
        width: 204mm;
        border: 1px red solid;
        text-align: center;
        margin: auto;
        color: #696969;
    }
    #logo{
        height: 65px;
        margin: 15px 0 0 0;
        float: left;
    }
</style>
<div id="folhas">
<div id="header-pedido">
                   <img id="logo" src="../_imagens/IMBA Química - 350pxb.png" alt="logo"/>
                    <div>  
                        IMBA – INDÚSTRIA QUÍMICA DA BAHIA<br>
                        Rua B s/n condomínio industrial, Distrito industrial - Guanambi – BA<br>
                        CNPJ: 09.391.726/0001-77 insc. Estadual: 076.556.429 PP<br>
                        Telefone: (77) 3452 3000 Email: imbaindustriaquimica@hotmail.com   <br>
                        Site: www.imbaquimica.com
                    </div>
    </div>
<fieldset id="dados-field">
    <legend>Dados cliente</legend>
   <p>
    <label>Id Cliente: </label><?php echo "Bruno Pereira dos santos";//$id; ?><br>
    <label>Cliente: </label><?php //echo $nome; ?><label> <br>   
    <label>Endereço:</label>
        <?php /*echo "
                
                Rua: $rua N°:$numero<br>
                Bairro: $bairro <br>
                ";*/
        ?>
    <br>
   
       Telefone:</label><?php //echo $telefone; ?><br>
   <?php /*echo "Complemento: $complemento <br>
                Cidade: $cidade <br>
                CEP: $cep";*/?>
   </p>
   
</fieldset>
<fieldset id="pedido-field">
    <legend>Pedido</legend>
    
    <?php /*
    echo "N°: $id_pedido<br>";
    
    echo "Data de emissão: $newDate<br>";
    echo "Data de entrega: $newDates<br><br>";
    echo "Obs.: $nota_";*/?>
</fieldset>
</div>