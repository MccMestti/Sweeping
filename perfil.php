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
    if(isset($_POST['atualizar'])){
        $sqlnom=sprintf("SELECT * FROM contas WHERE nome='%s'AND id NOT LIKE '%s' ",$_POST['nome'],$array['id']);
        $result=mysqli_query($con,$sqlnom);
        $nomsql=mysqli_num_rows($result);
        
        $sqleml=sprintf("SELECT * FROM contas WHERE email='%s' AND id NOT LIKE '%s'",$_POST['email'],$array['id']);
        $result=mysqli_query($con,$sqleml);
        $emlsql=mysqli_num_rows($result);
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
                                <li class="active"><a href="perfil.php">Perfil</a></li>
                                <li><a href="novapp.php">Mudar palavra passe</a></li>
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

                        <div class="account-profile-top">
                            
                            <div></div>
                            <div><h3><?php echo $_SESSION['nome'] ?> 
                            
                                <small>
                                    <?php 
                                        echo $array['email'];
                                        $_SESSION['email']=$array['email'];
                                        $_SESSION['id']=$array['id'];
                                    ?>
                                </small></h3></div>
                        </div>
                        

                        <form class="form-horizontal" method="post">
                            <?php
                                if (isset($_POST['atualizar'])){
                                    if ( (strlen($_POST['nome'])<=4) || (strlen($_POST['telemovel'])!=9 || !is_numeric($_POST['telemovel'])) || (strlen($_POST['email'])<=0) || ($_SESSION['passe'] <> md5($_POST['pass']))){
                                        ?>
                                            <div class="alert alert-danger" role="alert"><b>ERRO!</b> Os seus dados não são válidos!</div>
                                        <?php
                                    } else if (($nomsql==0) && ($emlsql==0)){
                                        $sql2=sprintf("UPDATE `contas` SET nome='%s', telemovel='%s', email='%s' WHERE id='%s'",$_POST['nome'], $_POST['telemovel'], $_POST['email'], $array['id']);
                                        $result=mysqli_query($con,$sql2);
                                        $numsql=mysqli_fetch_assoc($result);
                                        $_SESSION['nome']= $_POST['nome'];
                                        ?>
                                            <div class="alert alert-success" role="alert"><b>SUCESSO!</b> Dados atualizados com sucesso!</div>
                                        <?php
                                    } else if ($emlsql=1){
                                        ?>
                                            <div class="alert alert-danger" role="alert"><b>ERRO!</b> Este email já existe!</div>
                                        <?php
                                    } else{
                                        ?>
                                            <div class="alert alert-danger" role="alert"><b>ERRO!</b> Este nome já existe!</div>
                                        <?php
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Nome:</label>
                                <div class="col-md-8 col-lg-6">
                                    <input type="text" name="nome" class="form-control" value="<?php echo $_SESSION['nome']?>" require>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Email:</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="email" name="email" class="form-control" value="<?php echo $array['email'] ?>" require>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Telemóvel:</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" name="telemovel" class="form-control" value="<?php echo $array['telemovel'] ?>" require> 
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 col-lg-3 control-label">Palavra passe:<span class="required">*</span></label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="password" name="pass" class="form-control" placeholder="" require>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-8 col-lg-offset-3 col-lg-9">
                                    <button type="submit" name="atualizar" id="atualizar" class="btn btn-primary">Atualizar</button>
                                </div>
                            </div>
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