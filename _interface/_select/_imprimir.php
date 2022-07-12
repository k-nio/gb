<?php

$id = filter_input(INPUT_POST, 'id');

 $results = $con->pesquisar("SELECT * FROM _ord where num = '$id' ");
       while ($dado = mysqli_fetch_array($results)){
           $produto = $dado['produto'];
           $id_produto = $dado['id_produto'];
           $versao= $dado['versao'];
           $data = $dado['data'];
           $lote = $dado['lote'];
           $ord = $dado['num'];
           $tanque = $dado['tanque'];
           $solicitante = $dado['solicitante'];
           $status = $dado['situacao'];
           $quantidade = $dado['quantidade'];
           $timestamp = strtotime($data); 
           $newDate = date("d/m/Y", $timestamp );

       }
?>
<style>
   *{
        font-family: monospace;
        
        box-sizing: border-box;
    }
    #display-ord{
        width: 100%;
        height: auto;
        min-height: 700px;
        position: absolute;
        top: 0;
        left: 0;
        background-color: rgba(0,0,0,.9);
        z-index: 25;
    }
    .folha{
        width: 297mm;
        height: 209.8mm;
        background-color: #fff;
        margin: 0 auto 0;
        border: 1px #696969 solid;
        overflow: hidden;
    }
    .margin-folha{
        width: 287mm;
        height: 200mm;
        margin: 5mm;
        border: 1px #696969 solid;
        overflow: hidden;
        border-collapse: collapse;
    }
    .margin-folha th{
        border: 1px #696969 solid;
    }
    .margin-folha td{
        border: 1px #696969 solid;
        height: auto;
        
    }
    #header-ord{
        height: 20mm;
    }
    #logo{
       height: 60px;
    width: 100px;
        float: left;
        margin: 5px 0 0 50px;
    }
   #header-ord pre{
        float: left;
        font-size: 13px;
        color: #696969;
    }
    .margin-folha ul{
        width: 100%;
        
    }
    .margin-folha ul li{
    display: inline-block;
    margin: 5px 0 0 8px;
    width: 90mm;
    height: 8mm;
    vertical-align: middle;    
    line-height: 8mm;
        
    }
    #composition-ord{
        width: 100%;
        height: auto;
        border-collapse: collapse;
        font-size: 16px;
        border: none;
    }
    
    #composition-ord td{
        height: 7mm;
        text-align: center;
    }
    .margin-folha td h3{
    height: 8mm;
    text-align: center;
    padding: 5px 0 10px;
    border-bottom: 1px #000 solid;
   
    margin-bottom: 0px;
    width: calc(100% + 4mm);
    }
    #title-ord{
        height: 8mm;
    }
  #composition-ord th{
       height:  8mm;
       background-color: #194574;
       color: #fff;
    }
  #composition-ord tr:nth-child(even) {
	background-color:#e8e3e3;
	}
        #procedimento-ord h3{
             margin-left: -2mm;
        }
        #procedimento-ord{
            height: 100%; 
            width: calc(100% - 84mm); 
            float: left; 
            padding: 0 2mm; 
            font-size: 12px;
            border: 1px #000 solid;
        }
        #resp-ord{
            border-collapse: collapse;
            height: 100%;
            width: 100%;
            border: 1px #000 solid;
        }
        #resp-ord td{
            text-indent: 15px;
        }
        
        .control-1 td{
            height: 6mm;
            border: 1px #000 solid;
            text-indent: 5px;
        }
        .control-1 th{
            height: 10mm;
           
        }
        .control-1{
            border-collapse: collapse;
            width: 100%;
            height: 100%;
            border: none;
        }
       .print:last-child {
       page-break-after: avoid;
    }

    @media print{
        .no-print{
            display: none;
        }
        #composition-ord th{
    
       background-color: #fff;
       color: #000;
    }
    }
    
</style>
<div id="display-ord"> <a class="no-print" href="">Fechar</a>
    <div class="folha">
        <table class="margin-folha">
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
     
     
     $result = $con->pesquisar("SELECT f.quantidade,m.materia_prima, m.fornecedor,m.lote,f.procedimento FROM `_formula` f
JOIN _mp m on f.codigo = m.codigo
WHERE f.id_produto = '$id_produto' and m.status = 'EM USO' ");
     
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
    <div class="folha">
        <table class="margin-folha">
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
                         $result_ = $con->pesquisar("SELECT `propriedade` FROM `produtos_especifications` WHERE id_produto ='$id_produto'");
                         while ($dado_ = mysqli_fetch_array($result_)){
                             $propriedade = $dado_['propriedade'];
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
</div> 