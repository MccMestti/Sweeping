<?php
    session_start();
    if(!isset($_SESSION['passe'])){
        header('location:login.php');
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
                    <h1>Juntar-se a uma sala</h1>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li><a href="salas.php">Juntar-se a uma sala</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
	<!-- ==========================
    	BREADCRUMB - END 
    =========================== -->
    
    
    
    <!-- ==========================
    	ESHOP - START 
    =========================== -->
    <section class="content eshop">
        <div class="container">
            <div class="stores">
                
                <div class="row">
                    <div class="col-sm-7">
                        <h2>Lista de salas</h2>
                    </div>
                    <div class="col-sm-5">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="change-region">Selecionar dificuldade:</label>
                                <select class="form-control"  id="change-region">
                                    <option value="1" selected>Iniciante</option>
                                    <option value="2">Fácil</option>
                                    <option value="3">Médio</option>
                                    <option value="4">Difícil</option>
                                    <option value="5">Mestre</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                    
                <div id="test"></div>    
                            
                <div class="tabs" id="tabs-regions">
                    <ul class="nav nav-tabs hidden" role="tablist">
                        <li role="presentation" class="active"><a href="#region-1" role="tab" data-toggle="tab" aria-controls="region-1" aria-expanded="false">Prague</a></li>
                        <li role="presentation" class=""><a href="#region-2" role="tab" data-toggle="tab" aria-controls="region-2" aria-expanded="true">New York</a></li>
                        <li role="presentation" class=""><a href="#region-3" role="tab" data-toggle="tab" aria-controls="region-3" aria-expanded="true">Berlin</a></li>
                        <li role="presentation" class=""><a href="#region-4" role="tab" data-toggle="tab" aria-controls="region-4" aria-expanded="true">Paris</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active in" id="region-1">
                            
                            <!-- STORE - START -->
                            <div class="default-style store row row-no-padding" id="marker-1">
                    			<div class="col-sm-7">
                            		<div class="store-body">
                            			<h3>sala1</h3>
                                        <div class="row">
                                            <ul class="list-unstyled col-sm-6">
                                                <li><i class="fa fa-user"></i> <b>jogador</b></li>
                                                <li><b>Nº de bombas: </b></li>
                                                <li><b>Tempo: </b></li>
                                                <li><b>Dificuldade: </b></li>
                                            </ul>
                                            
                                        </div>
                            		</div>
                            	</div>
                                <div class="col-sm-5">
                                	<div class="store-image">
                                		<img src="assets/images/store-2.jpg" class="img-responsive" alt="">
                                        <div class="store-opening-hours">
                                        <div class="clearfix">
                                                <a href="checkout-shipping.html" class="btn btn-primary btn-lg pull-right ">Entrar</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <!-- STORE - END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================
    	ESHOP - END 
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