<?php
    $con=mysqli_connect('localhost','aluno13107','938114503@aluno13107','aluno13107');

    if(!$con){
        echo 'Erro de ligação';
    }
    mysqli_set_charset($con,'UTF8');
?>