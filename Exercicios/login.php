<?php
    session_start();
    require("bd.php");
    $nome=0;
    $morada=0;
    $cod_post_local=0;
    $telefone=0;
    $email=0;

    if (isset($_POST['btnform'])){
        if ((strlen($_POST['nome'])<=0)){
            echo "Insira um nome válido" . '<br>';
            $nome=1;
        }
        if (strlen($_POST['morada'])<=0){
            echo "Insira uma morada válida" . '<br>';
            $morada=1;
        }
        if (strlen($_POST['cod-post-local'])<=0){
            echo "Insira um código de postal ou localidade válido" . '<br>';
            $cod_post_local=1;
        }  
        if (strlen($_POST['telefone'])!=9 || !is_numeric($_POST['telefone'])){
            echo "Insira um número de telefone válido" . '<br>';
            $telefone=1;
        }  
        if (strlen($_POST['email'])<=0){
            echo "Insira um email válido" . '<br>';
            $email=1;
        }
        if (($nome==0)&&($morada==0)&&($cod_post_local==0)&&($telefone==0)&&($email==0)){
            $ins=0;
            $sqleml=sprintf("SELECT * FROM alunos WHERE email='%s';",$_POST['email']);
            $result=mysqli_query($con,$sqleml);
            $numsql=mysqli_num_rows($result);
            if($numsql==0){
                $sql=sprintf("INSERT INTO alunos (nome, morada, cod_post_local, telefone, email) VALUES ('%s','%s','%s',%d,'%s');",$_POST['nome'],$_POST['morada'],$_POST['cod-post-local'],$_POST['telefone'], $_POST['email']);
                echo $_POST['nome'] . '<br>' . $_POST['morada'] . '<br>' . $_POST['cod-post-local'] . '<br>' . $_POST['telefone'] . '<br>' . $_POST['email'] . '<br>';
            }else{
                echo "Este email já existe!";
            }
            if(mysqli_query($con,$sql)){
                $ins=1;
            } 
            if($ins==0 && isset($_POST['btnform'])){
                echo '<br>'.'Os seus dados não foram inseridos';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário</title>
    </head>
    <body>
        <h1>Insira os seus dados</h1>
        <form name="form" action="" method="post">
            <input type="text" name="nome" id="nome">
            <input type="text" name="morada" id="morada">
            <input type="text" name="cod-post-local" id="cod-post-local">
            <input type="text" name="telefone" id="telefone">
            <input type="email" name="email" id="text">
            <input type="submit" name="btnform" value="Submeter">
        </form>
        <a href="index.html"> Voltar </a>
    </body>
</html>