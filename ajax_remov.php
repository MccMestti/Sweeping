<?php
    require('bd.php');
    $sql2=sprintf("DELETE FROM `contas` WHERE id='%s'",$_POST['id']);
    $result=mysqli_query($con,$sql2);
    $del=mysqli_fetch_assoc($result);

    $sql3=sprintf("DELETE FROM `estatistica` WHERE id_jogador='%s'",$_POST['id']);
    $result=mysqli_query($con,$sql3);
    $del=mysqli_fetch_assoc($result);
?>