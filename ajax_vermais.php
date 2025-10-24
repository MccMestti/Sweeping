<?php
    require('bd.php');
    $result=$con->query($_POST['sql']);
    $num_rows=mysqli_num_rows($result);
    echo $num_rows;
?>