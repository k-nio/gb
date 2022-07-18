<link rel="stylesheet" href="./_CSS/_select_order.css"/>

     <form  method="post" action="_report.php?menu-report=5">
        <table id="tb-search">
        
        <tr>
            <th rowspan="2" >Filtrar por:</th>
            <th style="">
                
                <select name="parametro" class="campo-input">
                <option value="data">DATA</option>
                <option value="lote">LOTE</option>
                <option value="id_produto">PRODUTO</option>
            </select>
            </th>
            <th style="">
                <input type="search" placeholder="DIGITE SUA BUSCA" class="campo-input" name="valor" value="">
            </th>
            <th rowspan="2" > &nbsp;</th>
        </tr>
        <tr>
            
            <th style="">
        <select name="status" class="campo-input">
                <option value="">Tudo</option>
                
                <option value="EM PRODUÇÃO">EM PRODUÇÃO</option>
                <option value="CONCLUÍDO">CONCLUÍDO</option>                
            </select>
        </th>
            
              <th style="">
               <input type="submit" class="bt"  name="pesquisar" value="PESQUISAR">
              
                
            </th>
            
        </tr>
        
    </table>      
    </form>