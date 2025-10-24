<?php
    $sql=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result=mysqli_query($con,$sql);
    $arraie=mysqli_fetch_assoc($result);
    if($arraie['susp']==1){
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
                        	<li><a href="indexonline.php">Menu de jogo</a></li>     
                      	</ul>
                    </li>
                    <li class="dropdown megamenu">
                    	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true">Mais</a>
                      	<ul class="dropdown-menu">
                            <li class="col-sm-4">
                            	<ul class="list-unstyled">
                                	<li class="title">Tabelas de Liderança</li>
                                    <li><a href="tabelapontos.php">Tabela de pontos</a></li>
                                    <li><a href="tabelatempo.php">Tabela de tempo</a></li>
                                    <li><a href="tabelajogos.php">Tabela de jogos jogados</a></li>
                                    <li><a href="tabelabombas.php">Tabela de bombas encontradas</a></li>
                                </ul>
                            </li>
                            <li class="col-sm-4">
                                <ul class="list-unstyled">
                                	<li class="title">Conta</li>
                                    <?php if(!isset($_SESSION['passe'])){
                                        ?>
                                        <li><a href="signup.php">Criar Conta</a></li>
                                        <li><a href="login.php">Iniciar sessão</a></li> 
                                        <li><a href="perdeupassword.php">Password Perdida</a></li>
                                    <?php } else { ?>
                                        
                                        <li><a href="perfil.php">Perfil</a></li>
                                        <li><a href="estatistica.php">Estatísticas</a></li>
                                        <li><a href="logout.php">Terminar sessão</a></li> 
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php
                                if($_SESSION['adm']==1){
                                ?>
                                <li class="col-sm-4">
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
    