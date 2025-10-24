<?php
    session_start();
    if(!isset($_SESSION['nome'])){
        echo "Insira ambos os dados antes de continuar";
        $_SESSION['ano']=0;
        $_SESSION['nome']=0;
    }
    if(isset($_POST['valdados'])){
        if((strlen($_POST['nomep'])>0) && (is_numeric($_POST['anonasc'])) && (strlen($_POST['anonasc'])==4)){
            $_SESSION['ano']=$_POST['anonasc'];
            $_SESSION['nome']=$_POST['nomep'];
            $_SESSION['ano']=date("Y")-$_SESSION['ano'];
            echo $_SESSION['nome'].'<br>';
            echo $_SESSION['ano'].'<br>';
        } else {
            echo "Insira valores válidos!";
        }   
    }

?>
<h1>Insira o seu nome e data de nascimento</h1>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajudaram-me</title>
    </head>
    <body>
    <form name="form" action="" method="post">
        <input type="text" name="nomep" id="nomep">
        <input type="text" name="anonasc" id="anonasc">
        <input type="submit" name="valdados" value="OK">
    </form>
</body>
</html>
