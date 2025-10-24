<?php
    session_start();
    require('bd.php');
    if(!isset($_SESSION['passe'])){
        header('location:login.php');
    }
    $sql=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result=mysqli_query($con,$sql);
    $array=mysqli_fetch_assoc($result);
    require('man_val.php');
    if($array['susp']==1){
        header('location:suspenso.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <!-- ==========================
    	Meta Tags 
    =========================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ==========================
    	Title 
    =========================== -->
    <title>Sweeping</title>
    <link rel="icon" href="../assets/images/logo-transparente.png">
        
    <!-- ==========================
    	Fonts 
    =========================== -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,900,800' rel='stylesheet' type='text/css'>

    <!-- ==========================
    	CSS 
    =========================== -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/dragtable.css" rel="stylesheet" type="text/css">
    <link href="assets/css/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.css" rel="stylesheet" type="text/css">
    <link href="assets/css/color-switcher.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="assets/css/color/red.css" id="main-color" rel="stylesheet" type="text/css">
    
    <!-- ==========================
    	JS 
    =========================== -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
	
    <!-- ==========================
    	SCROLL TOP - START 
    =========================== -->
    <div id="scrolltop" class="hidden-xs"><i class="fa fa-angle-up"></i></div>
    <!-- ==========================
    	SCROLL TOP - END 
    =========================== -->
    
    <div id="page-wrapper"> <!-- PAGE - START -->
    
	<!-- ==========================
    	HEADER - START 
    =========================== -->
    <header class="navbar navbar-transparent navbar-fixed-top">
    	<div class="container">
            <div class="navbar-header">
            <a href="index.php" class="navbar-brand"> <img src="../assets/images/logo-transparente.png" style="width:50px;height:50px;"> </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Jogar</a>
                      	<ul class="dropdown-menu">
                        	<li><a href="1jogador.php">1 Jogador</a></li>
                            <li><a href="modotempo.php">Modo de tempo</a></li>
                      	</ul>
                    </li>
                    <li class="dropdown megamenu">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Mais</a>
                      	<ul class="dropdown-menu">
                            <li class="col-sm-4 col-md-3">
                                <ul class="list-unstyled">
                                	<li class="title">Tabelas de Liderança</li>
                                    <li><a href="tabelapontos.php">Tabela de pontos</a></li>
                                    <li><a href="tabelatempo.php">Tabela de tempo</a></li>
                                    <li><a href="tabelajogos.php">Tabela de jogos realizados</a></li>
                                    <li><a href="tabelabombas.php">Tabela de bombas encontradas</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-4 col-md-3">
                            <ul class="list-unstyled navbar-transparent">
                                	<li class="title">Conta</li>
                                    <?php if(!isset($_SESSION['passe'])){
                                        ?>
                                        <li><a href="signup.php">Criar Conta</a></li>
                                        <li><a href="login.php">Iniciar sessão</a></li> 
                                        <li><a href="lost-password.html">Password Perdida</a></li>
                                    <?php } else { ?>
                                        
                                        <li><a href="perfil.php">Perfil</a></li>
                                        <li><a href="estatistica.php">Estatística</a></li>
                                        <li><a href="logout.php">Terminar sessão</a></li> 
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php
                                if($_SESSION['adm']==1){
                                ?>
                                <li class="col-sm-4 col-md-3">
                                    <ul class="list-unstyled">
                                        <li class="title">Administrador</li>
                                        <li><a href="adm.php">Gerir utilizadores</a></li>
                                    </ul>
                                </li>
                            <?php
                                }                               
                            ?>
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                    <li class="title">Informação</li>
                                    <li><a href="termos.php">Termos e condições</a></li>
                                    <li><a href="comojogar.php">Sobre o jogo</a></li>
                                </ul>
                            </li>
                      	</ul>
                    </li>
                    
                </ul>
            </div>
        </div>
    </header>
    <!-- ==========================
    	HEADER - END 
    =========================== -->  
           
    <!-- ==========================
    	JUMBOTRON - START 
    =========================== -->
    <section class="content jumbotron jumbotron-full-height">
        <div id="homepage-2-carousel" class="nav-inside">
            
            <div class="item slide-1">
                <div class="slide-mask"></div>
                <div class="slide-body">
                    <div class="container">
                        <h1>Bem vindo de volta, <?php echo $_SESSION['nome'] ?>!</h1>
                        <h2></h2>
                        <a href="1jogador.php" class="btn btn-default btn-lg">1 Jogador</a>
                        <a href="modotempo.php" class="btn btn-inverse btn-lg">Modo de Tempo</a>
                    </div>
                </div>
            </div>
            <div class="item slide-2">
                <div class="slide-mask"></div>
                <div class="slide-body">
                    <div class="container">
                    	<h1 class="grey-background">Sweeping</h1>
                        <div><h2 class="color-background">Versão 1.0</h2></div>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check"></i>Entre no topo da tabela de pontos</li>
                            <li><i class="fa fa-check"></i>Desafie-se no Modo de Tempo</li>
                            <li><i class="fa fa-check"></i>Aprenda as regras no 'Como Jogar'</li>
                        </ul>
                    </div>
                </div>
            </div>
                        
        </div>
    </section>
    <!-- ==========================
    	JUMBOTRON - END 
    =========================== -->
    
    <!-- ==========================
    	SERVICES - START 
    =========================== -->
    
    <!-- ==========================
    	SERVICES - END 
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