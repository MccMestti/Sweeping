<?php
        session_start();
        require("bd.php");
        if(isset($_SESSION['passe'])){
            header('location:index.php');
        }
        $sql=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
        $result=mysqli_query($con,$sql);
        $array=mysqli_fetch_assoc($result);
        require('man_val.php');
        $nome=0;
        $telemovel=0;
        $email=0;
        $password=0;
        $conta=0;
        if (isset($_POST['submeter'])){
            if ((strlen($_POST['nome'])<=4)){
                $nome=1;
            }
            if (strlen($_POST['telemovel'])!=9 || !is_numeric($_POST['telemovel'])){
                $telemovel=1;
            }
            if (strlen($_POST['email'])<=0){
                $email=1;
            }
            if (strlen($_POST['pass'])<=8){
                $password=1;
            }
            if (($nome==0)&&($telemovel==0)&&($email==0)&&($password==0)){
                $ins=0;
                
                $sqlnom=sprintf("SELECT * FROM contas WHERE nome='%s'",$_POST['nome']);
                $result2=mysqli_query($con,$sqlnom);
                $nomsql=mysqli_num_rows($result2);
               
                $sqlnum=sprintf("SELECT * FROM contas WHERE email='%s'",$_POST['email']);
                $result3=mysqli_query($con,$sqlnum);
                $numsql=mysqli_num_rows($result3);

                if(($numsql== 0) && ($nomsql== 0)){
                    $sql=sprintf("INSERT INTO contas (nome, telemovel, email, passe) VALUES ('%s',%d,'%s','%s');",$_POST['nome'],$_POST['telemovel'],$_POST['email'],md5($_POST['pass']));
                    $conta=1;
                    $sqlup=sprintf("SELECT `id` FROM contas WHERE email='%s';",$_POST['email']);
                    $result2=mysqli_query($con,$sqlup);
                    $array=mysqli_fetch_assoc($result2);
                    $dir='uploads/'.$array['id'];
                    mkdir($dir,0777,true);
                }
                if(mysqli_query($con,$sql)){
                    $ins=1;
                }
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
                    <h2>Sweeping</h2>
                    <p>Criar Conta</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li class="active">Criar Conta</li>
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
                            if(isset($_POST['submeter']) && $conta==1){
                                $_SESSION['email']=$_POST['email'];
                            ?>
                                <div class="alert alert-success" role="alert"><b>Bem vindo!</b> Conta criada com sucesso</div>
                                <a href="login.php" class="btn btn-success">Fazer Login</a>
                                </form>
                            <?php
                            } else {
                            ?>
                                <h3>Criar Conta</h3>

                                
                            <div class="form-group">
                                <label>Nome de utilizador<span class="required">*</span></label>
                                <input type="text" name="nome" id="nome" class="form-control">
                            </div>
                            <?php
                                if (isset($_POST['submeter'])){
                                    if ((strlen($_POST['nome'])<=4)||(strlen($_POST['nome'])>=16)){
                                        ?>
                                        <p style="color:red;">O seu nome não é válido!</p>
                                        <?php
                                    } else if ($nomsql== 1){
                                        ?>
                                            <p style="color:red;"> Este nome já existe</p>
                                        <?php
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label>Telemóvel<span class="required">*</span></label>
                                <input type="text" name="telemovel" id="telemovel" class="form-control">
                            </div>
                            <?php
                                if (isset($_POST['submeter'])){
                                    if (strlen($_POST['telemovel'])!=9 || !is_numeric($_POST['telemovel'])){
                                        ?>
                                            <p style="color:red;">O seu número não é válido!</p>
                                        <?php
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label>Email<span class="required">*</span></label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <?php
                                if (isset($_POST['submeter'])){
                                    if ((strlen($_POST['email'])<=0)){
                                        ?>
                                            <p style="color:red;">O seu email não é válido!</p>
                                        <?php
                                    } else if ($numsql== 1){
                                        ?>
                                           <p style="color:red;">Este email já existe</p>
                                        <?php
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label>Palavra Passe<span class="required">*</span></label>
                                <input type="password" name="pass" id="pass" class="form-control">
                            </div>
                            <?php
                                if (isset($_POST['submeter'])){
                                    if(strlen($_POST['pass'])<=8){
                                        ?>
                                            <p style="color:red;"> A palavra passe deve conter mais de oito caracteres</p>
                                        <?php
                                    }
                                }
                            ?>
                            <div class="form-group">
                                <label>
                                <input type="checkbox" name="caixa" id="caixa" class=""> Eu li e aceito os <a href="termos.php">termos e condições</a>
                                </label>
                                <?php
                                    if (isset($_POST['submeter'])){
                                        if(!isset($_POST['caixa'])){
                                            ?>
                                                <p style="color:red;"> Aceite os termos e condições para continuar</p>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                            <button type="submit" name="submeter" class="btn btn-primary btn-lg btn-block">Submeter</button>
                            
                        </form>
                        <p class="form-text">Já tem uma conta? <a href="login.php">Iniciar sessão</a></p>
                        <?php
                            }
                        ?>
                    </div>
                    
                </div>
            </div>
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