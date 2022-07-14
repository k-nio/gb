
<?php
     $results = $con->consultaTudo('_formula','id_produto',"$id");
      while ($dado = mysqli_fetch_array($results)){
          $procedimento = $dado['procedimento'];
          echo "<span class='procedimento-text'>$procedimento</span>";
      }