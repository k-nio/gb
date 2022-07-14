<?php
$print = filter_input(INPUT_POST,'id');
if($print){
$id = filter_input(INPUT_POST, 'id');

 $results = $con->pesquisar("SELECT * FROM ordem_producao o join _produto p on p.id_produto = o.id_produto where id_ordem = '$id' ");
       while ($dado = mysqli_fetch_array($results)){
           $produto = $dado['produto'];
           $id_produto = $dado['id_produto'];
           $versao= $dado['versao'];
           $data = $dado['data'];
           $lote = $dado['lote'];
           $ord = $dado['id_ordem'];
           $tanque = $dado['tanque'];
          
           $status = $dado['situacao'];
           $quantidade = $dado['quantidade'];
           $timestamp = strtotime($data); 
           $newDate = date("d/m/Y", $timestamp );

       }
?>

<link rel="stylesheet" type="text/css" href="./_CSS/_print_ordem.css"/>
<div id="display-ord">
    <a class="no-print" id="fx" href="">&times;</a>
    <div class="folhas">
        <table class="margin">
            <tr>
                <th id="header-ord">
                    <img id="logo" src="./_imagens/IMBA Química - 350pxb.png" alt="logo"/>
                    <pre>  IMBA – INDÚSTRIA QUÍMICA DA BAHIA
                        Rua B s/n condomínio industrial, Distrito industrial - Guanambi – BA
                        CNPJ: 09.391.726/0001-77 insc. Estadual: 076.556.429 PP
                        Telefone: (77) 3452 3000 Email: imbaindustriaquimica@hotmail.com   Site: www.imbaquimica.com</pre>
                </th>
            </tr>
            <tr>
                <th id="title-ord">
                <h3>ORDEM DE PRODUÇÃO <?php echo $produto; ?></h3>
            </th> 
            </tr>
            <tr>
                <td style="height: 15mm;">
            <ul>
            <li>QUANTIDADE(kg):<?php echo $quantidade; ?></li>
            <li>DATA:<?php  echo $newDate; ?></li>
            <li>VERSÃO:<?php echo $versao; ?></li>
            <li>LOTE:<?php echo $lote; ?></li>
            <li>TANQUE:<?php echo $tanque; ?></li>
            <li>ORDEM N°:<?php echo $id; ?></li>
            
            </ul>
            </td>
            </tr>
            <tr>
                <td style="line-height: 100%; vertical-align: top;">
           
                    <table id="composition-ord">
                        <tr><th colspan="6"  style="background-color: #fff; color:#000;"><h4>Composição</h4></th></tr>
        <tr>
            <th>QUANTIDADE(KG)</th>
            <th>MATÉRIA PRIMA</th>
            <th>FORNECEDOR</th>
            <th>LOTE</th>
            <th>PESAGEM</th>
            <th>CONFERÊNCIA</th>
        </tr>
    
     <?php
     
     
     $result = $con->pesquisar("SELECT f.quantidade,m.materia_prima, e.fornecedor,e.lote,f.procedimento FROM `_formula` f
JOIN materia_prima m on f.id_materia_prima = m.id_materia_prima JOIN estoque_materia_prima e on e.id_materia_prima = m.id_materia_prima WHERE f.id_produto = '$id_produto' and e.status = 'EM USO'");
     
     while ($dados = mysqli_fetch_array($result)){
            $quantidade_formula = $dados['quantidade'];
            $materia_prima = $dados['materia_prima'];
            $fornecedor = $dados['fornecedor'];
            $lote = $dados['lote'];
            $number = ($quantidade_formula)*($quantidade/100);
            
            ?>
        <tr>
            <td><?php echo number_format($number,3,',','');?></td>
            <td><?php echo $materia_prima;?></td> 
            <td><?php echo $fornecedor;?></td> 
            <td><?php echo $lote;?></td> 
            <td><input type="text" name="name" style="border: 2px #000 solid; width: 15px;"> PESAGEM</td> 
            <td><input type="text" name="name" style="border: 2px #000 solid; width: 15px;"> CONFERÊNCIA</td> 
        </tr>
  <?php      
    } 
     ?>
     </table> 
           
                </td>
            </tr>
            <tr>
                <td style="height: 70mm;  vertical-align: top;">
                    <div id="procedimento-ord"">
                        <h3>Procedimento</h3>
     <?php
     $pesquisa = $con->pesquisar("SELECT `procedimento` FROM `_formula` WHERE `id_produto` = '$id_produto'");
      while ($dado = mysqli_fetch_array($pesquisa)){
          
            $procedimento = $dado['procedimento'];
     echo $procedimento.'<br>';
     
     } ?></div>
                    <div style="height: 100%; width: 84mm; float: left;">
                        <table id="resp-ord">
                            <tr><th>EPIS</th></tr>
                            <tr><td>1. Luvas e botas impermeavéis.</td></tr>
                            <tr><td>2. Mascara e óculos de proteção.</td></tr>
                            <tr><td>3. Avental de PVC</td></tr>
                            <tr><th>Responsáveis</th></tr>
                            <tr><td>Pesagem:</td></tr>
                            <tr><td>Conferência:</td></tr>
                            <tr><td>Manipulação:</td></tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="folhas">
        <table class="margin">
             <tr>
                <td style="width:34%;">
                    <table id="control-1" class="control-1" >
                       <tr><th>ANALISES CONTROLE QUALIDADE EMBALAGEM</th></tr>
            <tr><td>QUANTIDADE DE FARDO (Qf):</td></tr>
            <tr><td>QUANTIDADE POR FARDO (QPF):</td></tr>
            <tr><td>QUANTIDADE COM DEFEITO (QD):</td></tr>
            <tr><td>QUANTIDADE TOTAL (QT):</td></tr>
            <tr><td>% COM DEFEITO (%D):</td></tr>
            <tr><td><h4>TIPOS DE DEFEITOS</h4></td></tr>
            <tr><td>1. Furos ( )</td></tr>
            <tr><td>2. Amassado( )</td></tr>
            <tr><td>3. distorcido( )</td></tr>
            <tr><td><h5>CALCULO: %D = (QD/QT) x 100 &emsp;|&emsp; QT = QF x QPF</h5></th></tr>
                    </table>
                </td>
                <td style="width:34%;">
                    <table id="control-2" class="control-1" >
                <tr><th>CONTROLE DE QUALIDADE RÓTULOS</th></tr>
           <tr><td>QUANTIDADE DE ROLOS(QR):</td></tr>
           <tr><td>QUANTIDADE POR ROLO (QPR):</td></tr>
           <tr><td>QUANTIDADE COM DEFEITO (QD):</td></tr>
            <tr><td>QUANTIDADE TOTAL (QT):</td></tr>
            <tr><td>% COM DEFEITO (%D):</td></tr>
            <tr><td><h4>TIPOS DE DEFEITOS</h4></td></tr>
            <tr><td>1. Rasgado( ) </td></tr>
            <tr><td>2. Borrado( ) </td></tr>
            <tr><td>3. Sem cola( ) </td></tr>
            <tr><td><h5>CALCULO: %D = (QD/QT) x 100 &emsp;|&emsp; QT = QR x QPR</h5></td></tr>
                    </table>
                </td>
                <td style="width:32%;">
                 <table id="control-3" class="control-1">
                         <tr><th>ANALISES FISICO QUIMICAS</th></tr>
                         <?php
                         $result_ = $con->pesquisar("SELECT parametro FROM `especificacao` WHERE id_produto ='1'");
                         while ($dado_ = mysqli_fetch_array($result_)){
                             $propriedade = $dado_['parametro'];
                         ?>
                          <tr><td> <?php
                                  echo $propriedade.':';
                         ?>   </td></tr>
                         <?php
                         }
                         ?>
           
            
            <tr> <td>(  )APROVADO(  )RE-TRABALHO</td></tr>
            <tr><td><h5> ANALISTA:</h5></td></tr>
            </table>
                </td>
            </tr>
             <tr>
                 <td colspan="2">
                     <table class="control-1">
                <tr>
                    <th colspan="3"><h4>MATÉRIA PRIMA AVULSA</h4></th>
                </tr>
                <tr>
                <th>QUANTIDADE</th>
                <th>MATÉRIA PRIMA</th>
                <th>LOTE</th></tr>
                <tr>
                    <td>&nbsp;  </td>
                    <td> &nbsp; </td>
                    <td>&nbsp;  </td>
                </tr> 
                <tr>
                    <td> &nbsp;</td>
                    <td> &nbsp;</td>
                    <td> &nbsp;</td>
                </tr> 
                <tr>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                    <td> &nbsp;</td>
                </tr> 
                <tr>
                    <td> &nbsp;</td>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                </tr> 
                <tr>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                </tr> 
                <tr>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                </tr> 
                <tr>
                    <td> &nbsp;</td>
                    <td>&nbsp; </td>
                    <td>&nbsp; </td>
                </tr> 
               
               
               
                <tr>
                    <td colspan="3">SOLICITANTE:</td>
                </tr>
            </table>
                </td>
                <td>
                <table id="rendimento" class="control-1">
            <tr><th>RENDIMENTO EM UNIDADES</th></tr>
            <tr><td>QUANTIDADE PREVISTA(KG):</td></tr>
            <tr><td>QUANTIDADE TOTAL(KG):</td></tr>
            <tr><td>RENDIMENTO EM %:</td></tr>
            <tr><td>QUANTIDADE DE CAIXAS:</td></tr>
            <tr><td>VOLUME TOTAL (L):</td></tr>
           
            <tr><td><h4>DIVISÃO EM CAIXAS</h4></td></tr>
            <tr><td>500 ML:</td></tr>
            <tr><td>1 LITRO:</td></tr>
            <tr><td>2 LITROS:</td></tr>
            <tr><td>5 LITROS:</td></tr>
            
            </table>
                </td>                
            </tr>
             <tr>
                 <td colspan="2">
                <table id="anotar" class="control-1">
            
                <tr><th>ANOTAÇÕES</th></tr>
                <tr><td> </td></tr>
                <tr><td> </td></tr>
                <tr><td> </td></tr>
                <tr><td> </td></tr>
                
               
                
            </table>
                </td>
                <td>
                <table id="resp" class="control-1">
            <tr><th>RESPONSÁVEIS</th></tr>
            <tr><td>RESP. TÉCNICO:</td></tr>
            <tr><td>ENVASE:</td></tr>
            <tr><td>ROTULAGEM:</td></tr>
            <tr><td> </td></tr>
                          
            </table>
                </td>                
            </tr>
        </table>
    </div>
</div> <?php }