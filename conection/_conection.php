
        <?php

switch ($var) {
    case 1:
        include './conection/Conection.php';
        include './conection/Query.php';
        $con = new Query();

        break;
    case 2:
        include '../conection/Conection.php';
        include '../conection/Query.php';
        $con = new Query();
        break;
    case 3:
        include '../../conection/Conection.php';
        include '../../conection/Query.php';
        $con = new Query();
        break;
    case 4:
        include '../../../conection/Conection.php';
        include '../../../conection/Query.php';
        $con = new Query();
        break;
    case 5:
        include '../../../../conection/Conection.php';
        include '../../../../conection/Query.php';
        $con = new Query();
        break;
}