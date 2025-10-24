<?php  
    session_start();
    require("bd.php");
    if(isset($_SESSION['passe'])){
        header('location:index.php');
    }
    if (isset($_POST['submeter'])){
        $sqlis=sprintf("SELECT * FROM contas WHERE email='%s'AND passe='%s';" ,$_POST['email'] ,md5($_POST['pass']));
        $result=mysqli_query($con,$sqlis);
        $numsql=mysqli_num_rows($result);
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
                    <h2>Sweeping</h2>
                    <p>Iniciar sessão</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li class="active">Iniciar sessão</li>
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
                	<div class="login-form-wrapper">
                        <form method="post">
                        <?php
                        if (isset($_POST['submeter'])){
                            header('location:login.php');
                            if (($numsql == 1)) {
                                $_SESSION ['passe']=md5($_POST['pass']);
                                $sql2=sprintf("SELECT * FROM `contas` WHERE email='%s'",$_POST['email']);
                                $result=mysqli_query($con,$sql2);
                                $array=mysqli_fetch_assoc($result);
                                $_SESSION['nome']=$array['nome'];
                                $_SESSION['adm']=$array['adm'];
                                ?>
                                <div class="alert alert-success" role="alert"><b>Bem vindo!</b> Login feito com sucesso</div>
                                <a href="indexonline.php" class="btn btn-success">Continuar</a>
                                <?php
                            } else {
                                ?>
                                <h3>Iniciar sessão</h3>
                                <?php
                                if (($numsql <> 1) && isset($_POST['submeter'])) {
                                    ?>
                                        <div class="alert alert-danger" role="alert"><b>ERRO!</b> Os seus dados não são válidos!</div>
                                    <?php   
                                }
                                ?>
                                <div class="form-group">
                                    <label>Email<span class="required">*</span></label>
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Palavra Passe<span class="required">*</span></label>
                                    <input type="password" name="pass" id="pass" class="form-control">
                                </div>
                                <button type="submit" name="submeter" class="btn btn-primary btn-lg btn-block">Submeter</button>
                                </form>
                                <p class="form-text">Não tem conta? <a href="signup.php">Criar conta</a></p>
                                <p class="form-text">Esqueceu-se da palavra passe? <a href="perdeupassword.php">Recuperar conta</a></p>
                            <?php
                            }
                        } else {
                        ?>
                        	<h3>Iniciar sessão</h3>
                            <?php
                            if (($numsql <> 1) && isset($_POST['submeter'])) {
                                ?>
                                    <div class="alert alert-danger" role="alert"><b>ERRO!</b> Os seus dados não são válidos!</div>
                                <?php   
                            }
                            ?>
                            <div class="form-group">
                                <label>Email<span class="required">*</span></label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Palavra Passe<span class="required">*</span></label>
                                <input type="password" name="pass" id="pass" class="form-control">
                            </div>
                            <button type="submit" name="submeter" class="btn btn-primary btn-lg btn-block">Submeter</button>
                            <div class="form-group">
                        </form>
                    </div>
                    <p class="form-text">Não tem conta? <a href="signup.php">Criar conta</a></p>
                    <p class="form-text">Esqueceu-se da palavra passe? <a href="perdeupassword.php">Recuperar conta</a></p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </section>
   
    <!-- ==========================
    	ACUNT - END 
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