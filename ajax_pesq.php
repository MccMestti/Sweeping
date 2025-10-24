<?php
    require('bd.php');
    $sql="SELECT `id` FROM `contas` WHERE `nome` LIKE '%".$_POST['pesquisa']."%'";
    $result=mysqli_query($con,$sql);
    $string='(';
    while($row=$result->fetch_array()){
        $string.=$row['id'].',';
    }
    $string=rtrim($string,',');
    $string.=')';
    echo $string;

?>