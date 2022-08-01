<?php
$pesquisa = filter_input(INPUT_POST,'pesquisar');
if($pesquisa){
    include './_interface/_pedidos/_processamento/_resultado_consulta.php';
}
$mostrar = filter_input(INPUT_POST,'id');
if($mostrar){
    
    include './_interface/_pedidos/_pedido_select.php';
}

?>

<link rel="stylesheet" href="./_CSS/_pedido_consulta.css"/>

<form  id="search-form" method="post" action="_pedidos.php?menu-pedido=2">
        <table id="tb-search">
        
        <tr>
            <th rowspan="2" >Filtrar por:</th>
            <th style="">
                
             <select name="parametro" required="" class="campo-input">
                <option value="">Selecionar item de busca</option>
                <option value=" p.data_emissao">Data Emissão</option>
                <option value=" p.data_entrega">Data Entrega</option>
                <option value=" p.id_pedido">N° Pedido</option>
                <option value="c.nome">Cliente</option>
                <option value=" p.situacao">Situacao</option>
                <option value=" p.nf">Nota Fiscal</option>
            </select>
                <select name="ordem" class="campo-input">
                    <option value="ASC">Ordem</option>
                    <option value="ASC">Crescente</option>
                    <option value="DESC">Decrescente</option>
                </select>
            </th>
            <th style="">
                <input type="search" placeholder="DIGITE SUA BUSCA" class="campo-input" name="valor" value="">
            </th>
            <th rowspan="2" > &nbsp;</th>
        </tr>
        <tr>
            
            <th style="">
                <select name="status" required="" class="campo-input">
                <option value="">Selecione a situação</option>
                <option value="tudo">Tudo</option>
                <option value="Rascunho">Rascunho</option>
                <option value="Separando">Separando</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Entregue">Entregue</option>                
            </select>
        </th>
            
              <th style="">
               <input type="submit" class="bt"  name="pesquisar" value="PESQUISAR">
              
                
            </th>
            
        </tr>
        
    </table>      
    </form>