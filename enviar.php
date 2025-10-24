<?php
session_start();
require("phpmailer/class.phpmailer.php");
$sql2=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
$result2=mysqli_query($con,$sql2);
$array=mysqli_fetch_assoc($result2);
require('man_val.php');
if(isset($_POST['enviar'])){
    $envia=0;
    // VARIÁVEIS PARA COMPOSIÇÃO
    $mail_destino=$_POST['destino'];
    if(strlen($_POST['assunto'])>0){
        $assunto=$_POST['assunto'];
    } else {
        $assunto='NOVO MAIL';
    }  
    
    $mensagem=file_get_contents("email-template.php");
    
    //ENVIO DE E-MAIL ATRAVÉS DA CLASSE

    $mail_send = new PHPMailer();            
    $mail_send->Host = "localhost";  // specify main and backup server
    $mail_send->From = "aluno@damiaodegoes.pt";
    $mail_send->FromName = 'AULAS';
    $mail_send->AddAddress($mail_destino);
    $mail_send->AddReplyTo('aluno13107@damiaodegoes.pt');
                       
    $mail_send->IsHTML(true);  // set email format to HTML

    $mail_send->Subject = $assunto;

    $mail_send->Body = $mensagem;

    if($mail_send->Send()){ //ENVIA O MAIL
        $envia=1;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>AULAS</title>
</head>

<body>
    <div class="container" style="margin-top: 200px;">     
        <h1>ENVIAR EMAIL</h1>
        <?php
        if(isset($envia)){
            if($envia==1){
                ?>  
                <div class="row" align="center">
                    <div class="col-md-12" align="center" >                  
                        <div class="alert alert-success" role="alert">
                            EMAIL ENVIADO COM SUCESSO
                        </div>                       
                    </div>
                 </div>                
                <?php
            } else {
                ?>  
                <div class="row" align="center">
                    <div class="col-md-12" align="center" >                  
                        <div class="alert alert-danger" role="alert">
                            OCORREU UM PROBLEMA NO ENVIO DO EMAIL. TENTE NOVAMENTE SFF.
                        </div>                       
                    </div>
                 </div>                
                <?php
            }
            ?>
            <a href="enviar.php" class="btn btn-outline-success">CONTINUAR</a>
            <a href="index.php" class="btn btn-outline-secondary">VOLTAR</a>
            <?php
        }
        ?>
        <hr>
        <div class="row" align="center">
            <form method="post">
                <label>DESTINO: </label>
                <input type="text" name="destino">
                <br><br>
                <label>ASSUNTO: </label>
                <input type="text" name="assunto">
                <br><br>
                <label>MENSAGEM: </label>
                <textarea name="mensagem" rows="8" style="width: 500px;"></textarea>
                <hr>
                <a href="index.php" class="btn btn-outline-secondary">VOLTAR</a>
                <input type="submit" class="btn btn-outline-success" name="enviar" value="ENVIAR">
            </form>
        </div>
    </div>
</body>
</html>