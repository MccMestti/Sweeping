<?php
    require("bd.php");
    $sql=sprintf("select * from alunos where email='%s';",$_GET['email']);
    $result=mysqli_query($con,$sql);
    $reg=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar</title>
    </head>
    <body>
        <h1>Altere os seus dados</h1>
        <form name="form" action="" method="post">
        <input type="text" name="nome" value="<?php echo $reg['nome']; ?>" >
                <input type="text" name="morada" value="<?php echo $reg['morada']; ?>" >
                <input type="text" name="cod_post_local" value="<?php echo $reg['cod_post_local']; ?>" >
                <input type="text" name="telefone" value="<?php echo $reg['telefone']; ?>" >
                <input type="email" name="email" value="<?php echo $reg['email']; ?>" >                
                <input type="submit" name="submeter" value="OK">
                <input type="hidden" name="id" value="<?php echo $reg['id']; ?>" >
        </form>
        
        <a href="index.php"> Voltar </a>
    </body>
</html>