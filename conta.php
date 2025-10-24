<?php
    session_start();
    if(!isset($_SESSION['passe'])){
        header('location:login.php');
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
    <link href="assets/css/color/yellow.css" id="main-color" rel="stylesheet" type="text/css">
    
    <!-- ==========================
    	JS 
    =========================== -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
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
    <header class="navbar navbar-default navbar-static-top">
    	<div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Sweeping</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="navbar-collapse collapse">
            	<ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Jogar</a>
                      	<ul class="dropdown-menu">
                            <li><a href="homepage-2.html">Um Jogador</a></li>
                            <li><a href="homepage-3.html">Criar Sala</a></li>
                            <li><a href="homepage-4.html">Juntar-se a uma sala</a></li>
                            <li><a href="homepage-5.html">Modo de Tempo</a></li>
                            <li><a href="homepage-6.html">Como Jogar</a></li>
                      	</ul>
                    </li>
                    <li class="dropdown megamenu">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Mais</a>
                      	<ul class="dropdown-menu">
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                	<li class="title">Tabelas de Liderança</li>
                                    <li><a href="products.html">Tabela de pontos</a></li>
                                    <li><a href="cart.html">Tabela de tempo</a></li>
                                    <li><a href="checkout.html">Tabela de jogos jogados</a></li>
                                    <li><a href="compare.html">Tabela de bombas encontradas</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-4">
                            <ul class="list-unstyled">
                                    <li class="title">Conta</li>
                                    
                                    <li><a href="perfil.php">Perfil</a></li>
                                    <li><a href="logout.php">Terminar sessão</a></li> 
                                </ul>
                            </li>
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                	<li class="title">Jogo</li>
                                    <li><a href="conta.php">Definições de jogo</a></li>
                                    <li><a href="profile.html">Sobre o jogo</a></li>
                                    <li><a href="profile.html">Termos e condições</a></li>
                                    <li><a href="profile.html">Regras</a></li>
                                </ul>
                            </li>
                      	</ul>
                    </li>
                    
                    
                    <li class="dropdown navbar-search hidden-xs">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>
                      	<ul class="dropdown-menu">
                        	<li>
                                <form>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control" placeholder="Search ...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">Search</button>
                                        </span>
                                    </div>
                                </form>
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
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Conta</h1>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li><a href="conta.php">Conta</a></li>
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
                                <li class="active"><a href="conta.php">Conta</a></li>
                                <li><a href="perfil.php">Perfil</a></li>
                                <li><a href="address.html">Estatiticas</a></li>
                                <li><a href="logout.php">Terminar sessão</a></li>
                                <li><a href="warranty-claims.html">Apagar conta</a></li>
                                <li><a href="products.html">Voltar</a></li>
                            </ul>
                        </div>
                        <!-- WIDGET:CATEGORIES - END -->
                        
                    </aside>
                </div>
                <div class="col-sm-9">
                    <article class="account-content">
                        <h3>Olá , <?php echo $_SESSION['nome'] ?>!</h3>
                        <p>Aqui pode ver o seu perfil, alterar o seu nome, ver os seus melhores jogos e muito mais!</p>
                        <div class="icon-nav row">  
                            <div class="col-xs-6 col-md-3"><a href="perfil.php"><i class="fa fa-user"></i> Perfil</a></div>
                            <div class="col-xs-6 col-md-3"><a href="wishlist.html"><i class="fa fa-heart"></i> Melhores jogos</a></div>
                            
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================
    	MY ACCOUNT - END 
    =========================== -->
    
    <!-- ==========================
    	FOOTER - START 
    =========================== -->
    <footer class="navbar navbar-default">
    	<div class="container">
        	<div class="row">
                <div class="col-sm-3 col-xs-6">
                	<div class="footer-widget footer-widget-contacts">
                    	<h4>Contato</h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-envelope"></i> aluno13107@damiaodegoes.pt</li>
                        </ul>
                	</div>
                </div>
                <div class="col-sm-3 col-xs-6">
                	<div class="footer-widget footer-widget-links">
                    	<h4>Informação</h4>
                        <ul class="list-unstyled">
                        	<li><a href="about-shop.html">Sobre o site</a></li>
                            <li><a href="stores.html">Sobre o jogo</a></li>
                        </ul>
                	</div>
                </div>
               
            </div>
            <div class="footer-bottom">
            	<div class="row">
                    <div class="col-sm-6">
                        <p class="copyright">Realizado por Lucas Reis.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==========================
    	FOOTER - END 
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