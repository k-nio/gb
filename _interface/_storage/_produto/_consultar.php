
<a href="" id="fx">&times;</a>
<table id="estoque-mp">
    <tr>
        <th>Quantidade</th>
        <th>Produto</th>
        <th>Volume</th>
        <th>Unidade</th>
        <th>Lote</th>
        <th>Validade</th>
        <th>Fabricação</th>
        <th>Situação</th>
        <th>Status</th>
        
    </tr>
    <?php
    
    if($situacao){
        $complemento = "SELECT p.id_produto, e.quantidade,p.produto, e.volume, e.unidade,e.lote,e.validade,e.fabricacao,e.situacao,e.status FROM `estoque_produto` e JOIN _produto p on p.id_produto = e.id_produto 
WHERE e.id_produto = '$id_produto' AND e.`situacao` = '$situacao' ORDER BY p.produto ASC
";
        } else {
        $complemento = "SELECT p.id_produto, e.quantidade,p.produto, e.volume, e.unidade,e.lote,e.validade,e.fabricacao,e.situacao,e.status FROM `estoque_produto` e JOIN _produto p on p.id_produto = e.id_produto 
WHERE 1 ORDER BY p.produto ASC";
        }
    $id_produto = filter_input(INPUT_POST,'search');
    $result = $con->pesquisar($complemento);
    while ($dados = mysqli_fetch_array($result)){
        $quantidade = $dados['quantidade'];
        $produto = $dados['produto'];
        $volume = $dados['volume'];
        $unidade = $dados['unidade'];
        $lote = $dados['lote'];
        $validade = $dados['validade'];
        $fabricacao = $dados['fabricacao'];
        $situacao = $dados['situacao'];
        $status = $dados['status'];
  
    ?>
    <tr>
        <td><?php echo $quantidade; ?></td>
        <td><?php echo $produto; ?></td>
        <td><?php echo $volume; ?></td>
        <td><?php echo $unidade; ?></td>
        <td><?php  echo $lote;?></td>
        <td><?php  echo $validade;?></td>
        <td><?php  echo $fabricacao?></td>
        <td><?php  echo $situacao?></td>
        <td><?php echo $status?></td>
        
    </tr>
        <?php } ?>
</table>
        