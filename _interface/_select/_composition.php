<?php
     $result = $con->pesquisar("SELECT f.quantidade, m.materia_prima FROM _formula f JOIN materia_prima m ON f.id_materia_prima = m.id_materia_prima
where f.id_produto = 1 ");
     
     while ($dados = mysqli_fetch_array($result)){
         $quantidade = $dados['quantidade'];
         $id_mp = $dados['materia_prima'];
         echo "<tr><td>$quantidade</td><td>$id_mp</td><tr>";
     }