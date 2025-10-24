<?php
    require("bd.php");
    session_start();
    if(!isset($_SESSION['passe'])){
        header('location:login.php');
    }
    $sql=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result=mysqli_query($con,$sql);
    $array=mysqli_fetch_assoc($result);
    require('man_val.php');
    if(isset($_POST['apagar'])){
        if(md5($_POST['pass'])==$array['passe']){
            $sql2=sprintf("DELETE FROM `contas` WHERE id='%s'",$array['id']);
            $result=mysqli_query($con,$sql2);
            $del=mysqli_fetch_assoc($result);

            $sql3=sprintf("DELETE FROM `estatistica` WHERE id_jogador='%s'",$array['id']);
            $result=mysqli_query($con,$sql3);
            $del=mysqli_fetch_assoc($result);
            require("logout.php");
        }
        
    }
    require('header.php');
?>
    
    <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Apagar conta</h1>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li><a href="conta.php">Apagar conta</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
	<!-- ==========================
    	BREADCRUMB - END 
    =========================== -->
    
    <!-- ==========================
    	MY ACCOUNT - START 
    =========================== -->
    <section class="content account">
        <div class="container">
            <div class="row">
            	<div class="col-sm-3">
                	<aside class="sidebar">
                    	
                        <!-- WIDGET:CATEGORIES - START -->
                        <div class="widget widget-navigation">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="perfil.php">Perfil</a></li>
                                <li><a href="novapp.php">Mudar palavra passe</a></li>
                                <li><a href="estatistica.php">Estatiticas</a></li>
                                <li><a href="logout.php">Terminar sessão</a></li>
                                <li class="active"><a href="apagarconta.php">Apagar conta</a></li>
                                <li><a href="indexonline.php">Voltar</a></li>
                            </ul>
                        </div>
                        <!-- WIDGET:CATEGORIES - END -->
                        
                    </aside>
                </div>
                <div class="col-sm-9">
                    
                    <article class="account-content">

                        <form class="form-horizontal" method="post">
                            
                            
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Palavra passe:<span class="required">*</span></label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" name="pass" class="form-control" require>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9">
                                    <button type="submit" name="apagar" id="apagar" class="btn btn-primary">Apagar</button>
                                </div>
                            </div>
                            <?php
                                if (isset($_POST['atualizar'])){
                                    if((md5($_POST['pass'])!=$array['passe'])){
                                        ?>
                                            <div class="alert alert-danger" role="alert"><b>ERRO!</b> As informações introduzidas não são válidas!</div>
                                        <?php
                                    }
                                }
                            ?>
                        </form>
                        
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================
    	MY ACCOUNT - END 
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