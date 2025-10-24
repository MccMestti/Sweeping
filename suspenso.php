<?php
    session_start();
    require('bd.php');
    $sql=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result=mysqli_query($con,$sql);
    $arraie=mysqli_fetch_assoc($result);
    if($arraie['susp']==0){
        header('location:index.php');
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
                <a class="navbar-brand">Sweeping</a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
            </div>
            <div class="navbar-collapse collapse">
            </div>
        </div>
    </header>
    <!-- ==========================
    	HEADER - END 
    =========================== -->  
    <section class="content account">
        <div class="container">
        	<div class="row">
            	<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
                	<div class="login-form-wrapper">
                        <form method="post">
                            <h3>Foi suspenso</h3>
                             <br>
                            
                            <h4 align="center">Você foi suspenso do sweeping.</h4>
                            
                            
                        </form>
                        
                            <div align="center"><a href="logout.php" class="btn btn-primary pull-centre">Terminar sessão</a></div>
                            <br>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </section>