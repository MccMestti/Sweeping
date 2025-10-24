<?php
    $sqlman=sprintf("SELECT * FROM `manutencao` WHERE `man`=1");
    $result=mysqli_query($con,$sqlman);
    $arrayman=mysqli_fetch_assoc($result);
    if($arrayman['man']==1){
        if($array['adm']==0 || !isset($_SESSION['nome'])){
            require('logout.php');
            header('location:manutencao.php');
        }
    }
?>