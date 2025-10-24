<?php
session_start();
require("bd.php");
require('header.php');
$sql2=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
$result2=mysqli_query($con,$sql2);
$array=mysqli_fetch_assoc($result2);
require('man_val.php');
require("phpmailer/class.phpmailer.php");
if(isset($_POST['enviar'])){
    $sqlis=sprintf("SELECT email FROM contas WHERE email='%s'",$_POST['email']);
    $result=mysqli_query($con,$sqlis);
    $cont=mysqli_num_rows($result);
    $array=mysqli_fetch_assoc($result);
    if($cont==1){
        
        $envia=0;
        // VARIÁVEIS PARA COMPOSIÇÃO
        $assunto=$_POST['ass'];
        $email=$array['email'];
         
            
        $mensagem.='Nome: '.$_POST['nome'].'<br></br>';
        $mensagem.='Nº Telemóvel: '.$_POST['tlmv'].'<br></br>';
        $mensagem.=$_POST['mens'];
    //SENHA GERADA NA VARIÁVEL $string
        //ENVIO DE E-MAIL ATRAVÉS DA CLASSE

        $mail_send = new PHPMailer();            
        $mail_send->Host = "localhost";  // specify main and backup server
        $mail_send->From = "aluno13107@damiaodegoes.pt";
        $mail_send->FromName = 'Sweeping';
        $mail_send->AddAddress("aluno13107@damiaodegoes.pt");
        $mail_send->AddReplyTo($email);
                        
        $mail_send->IsHTML(true);  // set email format to HTML

        $mail_send->Subject = $assunto;

        $mail_send->Body = $mensagem;

        if($mail_send->Send()){ //ENVIA O MAIL
            $envia=1;
        }
    } else{}

}
?>

    
    <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Sweeping</h2>
                    <p>Contato</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li class="active">Contato</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
	<!-- ==========================
    	BREADCRUMB - END 
    =========================== -->

    <!-- ==========================
    	ACCOUNT - START 
    =========================== -->
    <section class="content account">
        <div class="container">
        	<div class="row">
            	<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                	<div class="no-border">
                        	<h3>Tem alguma dúvida? Contacte-nos!</h3>
                            <form method="post">
                                    <?php
                                        if(($envia==1)){
                                            ?>
                                                <div class="alert alert-success" role="alert">Email enviado com sucesso!</div>
                                            <?php
                                        } else if (isset($_POST['enviar']))  {
                                            if($array['email']!=$_POST['email']){
                                                ?>
                                                    <div class="alert alert-danger" role="alert"><b>ERRO! </b> Este email não está associado a uma conta.</div>
                                                <?php
                                            } else{
                                                ?>
                                                    <div class="alert alert-danger" role="alert"><b>ERRO! </b> Não foi possível enviar o email.</div>
                                                <?php
                                            }
                                            
                                        }
                                    ?>
                                <div class="form-group">
                                    <label>Email<span class="required">*</span></label>
                                <input type="text" name="email" id="email" class="form-control" require>
                                </div>
                                <div class="form-group">
                                    <label>Nome<span class="required">*</span></label>
                                    <input type="text" name="nome" id="nome" class="form-control" require>
                                </div>
                                <div class="form-group">
                                    <label>Assunto<span class="required">*</span></label>
                                    <input type="text" name="ass" id="ass" class="form-control" require>
                                </div>
                                <div class="form-group">
                                    <label>Telemóvel<span class="required">*</span></label>
                                    <input type="text" name="tlmv" id="tlmv" class="form-control" require>
                                </div>
                                <div class="form-group">
                                    <label>Mensagem<span class="required">*</span></label>
                                    <textarea name="mens" id="mens" class="form-control" require></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="enviar" id='enviar' class="btn btn-primary btn-lg btn-block">Enviar</button>
                                </div>
                            </form>
                    </div>
                    <p class="form-text"><a href="login.php">Voltar</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================
    	ACCOUNT - END 
    =========================== -->
    
    
    </div> <!-- PAGE - END -->
    
   	<!-- ==========================
    	JS 
    =========================== -->        
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=true"></script>
	<script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
    <script src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.dragtable.js"></script>
    <script src="assets/js/jquery.card.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/twitterFetcher_min.js"></script>
    <script src="assets/js/jquery.mb.YTPlayer.min.js"></script>
    <script src="assets/js/color-switcher.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>