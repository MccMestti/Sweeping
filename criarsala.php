<?php
    session_start();
    if(!isset($_SESSION['passe'])){
        header('location:login.php');
    }
    require('header.php');
    $sql2=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result2=mysqli_query($con,$sql2);
    $array=mysqli_fetch_assoc($result2);
    require('man_val.php');
?>
    
    <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Criar Sala</h1>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li><a href="criarsala.php">Criar sala</a></li>
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
                <div class="col-sm-12">
                    <article class="account-content checkout-steps">
                        
                        
                        
                        <div class="progress checkout-progress hidden-xs"><div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0;"></div></div>
                        
                        <form>
                            <div class="products-order checkout billing-information">
                                <button class="btn btn-primary addresses-toggle" type="button" data-toggle="collapse" data-target="#my-addresses-billing" aria-expanded="false" aria-controls="my-addresses-billing">Sala guardada</button>
                                <div id="my-addresses-billing" class="collapse">
                                	<div class="table-responsive border">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Nome da sala</th>
                                                <th>Número de bombas</th>
                                                <th>Tempo</th>
                                                <th>Dificuldade</th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <td>sala1</td>
                                                <td>15</td>
                                                <td>120s</td>
                                                <td>fácil</td>
                                                <td><a class="btn btn-primary btn-sm">Selecionar</a></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-sm-12">
                                        <label>Nome da sala <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Número de bombas <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Tempo <span class="required">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label>Dificuldade <span class="required">*</span></label>
                                        <select class="form-control">
                                            <option value="15">Iniciante</option>
                                            <option value="25">Fácil</option>
                                            <option value="35">Médio</option>
                                            <option value="50">Difícil</option>
                                            <option value="75">Mestre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <a href="checkout-shipping.html" class="btn btn-primary btn-lg pull-left ">Guardar sala</a>
                                <a href="checkout-shipping.html" class="btn btn-primary btn-lg pull-right ">Criar sala</a>
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