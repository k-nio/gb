<?php
include '../../../conection/Conection.php';
include '../../../conection/Query.php';
$con = new Query();

     $finalizar = filter_input(INPUT_POST,'finalizar');
     
     $id_pedido = filter_input(INPUT_POST,'id_pedido');
     switch ($finalizar)
     {
     case 'Finalizar':
         $editar = $con->pesquisar("UPDATE `_pedido` SET `status`='Separando' WHERE `id_pedido` = '$id_pedido'");
         $img = "../../../_imagens/check-mark.png";
         $msg = "Pedido enviado com sucesso para separação, 
            verifique a situação do pedido no menu de consulta dos pedidos.";
         break;
     case 'Cancelar':
         $editar = $con->pesquisar("UPDATE `_pedido` SET `status`='Cancelado' WHERE `id_pedido` = '$id_pedido'");
         $img = "../../../_imagens/cancelar.png";
          $msg = "Pedido Cancelado com sucesso!";
          break;
     case 'Rascunho':
         
         header('Location:../../../_pedidos.php?menu-pedido=1');
         $img = "../../../_imagens/chemistry.png";
          $msg = "Salvo nos rascunhos, para continuar com o pedido, vá para o menu consultar pedidos!";
         break;
     }
?>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    section{
        width: 100%;
        height: 800px;
        background: linear-gradient(to bottom, #003333 20%, #194574 100%);
}
div{
    width: calc(100% - 600px);
    height: 600px;
    border: 1px #fff solid;
    margin: 50px 300px;
    float: left;
    text-align: center;
    color: #fff;
    font-size: 32px;
    
}
</style>
<section>
    <div>
        
            <img src="<?php echo $img;?>" width="width" height="height" alt="alt"/>
           <p> <?php echo $msg;?>
               <a href="../../../_pedidos.php?menu-pedido=1">Voltar</a>
        </p>
    </div>
</section>