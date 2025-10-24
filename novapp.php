<?php
    session_start();
    require('bd.php');
    $sql=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result=mysqli_query($con,$sql);
    $array=mysqli_fetch_assoc($result);
    require('man_val.php');
    require('header.php');
    
?>

 <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Perfil</h1>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li><a href="conta.php">Perfil</a></li>
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
                                <li class="active"><a href="novapp.php">Mudar palavra passe</a></li>
                                <li><a href="estatistica.php">Estatiticas</a></li>
                                <li><a href="logout.php">Terminar sessão</a></li>
                                <li><a href="apagarconta.php">Apagar conta</a></li>
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
                                <label class="col-md-4 col-lg-3 control-label">Nova palavra passe:</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" name="novapass" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Confirmar nova palavra passe:</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" name="novapassconf" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Palavra passe atual:</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" name="pass" class="form-control" require>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9">
                                    <button type="submit" name="atualizar" id="atualizar" class="btn btn-primary">Atualizar</button>
                                </div>
                            </div>
                            <?php
                                if (isset($_POST['atualizar'])){
                                    if((md5($_POST['pass'])==$array['passe'])&&(strlen($_POST['novapass']))&&($_POST['novapass']==$_POST['novapassconf'])){
                                        $sqlupd=sprintf("UPDATE `contas` SET passe='%s' WHERE id='%s'",md5($_POST['novapass']),$array['id']);
                                        $result=mysqli_query($con,$sqlupd);
                                        $numsql=mysqli_fetch_assoc($result);
                                        ?>
                                            <div class="alert alert-success" role="alert"><b>SUCESSO!</b> Palavra passe atualizada com sucesso!</div>
                                        <?php
                                    } else {
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