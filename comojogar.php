<?php
    session_start();
    $sql2=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result2=mysqli_query($con,$sql2);
    $array=mysqli_fetch_assoc($result2);
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
                    <h2>Sweeping</h2>
                    <p>Como jogar</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li class="active">Como jogar</li>
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
        	<div class="default-style faq">
                                
                <div class="tabs vertical-tabs">
                	<div class="row">
                    	<div class="col-sm-3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a href="#faq-1" role="tab" data-toggle="tab" aria-controls="faq-1" aria-expanded="false">Conceito</a></li>
                                <li role="presentation" class=""><a href="#faq-2" role="tab" data-toggle="tab" aria-controls="faq-2" aria-expanded="true">Como Jogar</a></li>
                                <li role="presentation" class=""><a href="#faq-3" role="tab" data-toggle="tab" aria-controls="faq-3" aria-expanded="true">Modos de Jogo</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active in" id="faq-1">
									
                                    <div class="panel-group" id="faq-1-accordion" role="tablist" aria-multiselectable="true">
                                    	
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#faq-1-accordion" href="#faq-1-q-1" aria-expanded="true" aria-controls="faq-1-q-1">O que é minesweeper?</a></h4>
                                        	</div>
                                        	<div id="faq-1-q-1" class="panel-collapse collapse in" role="tabpanel">
                                          		<div class="panel-body">
                                            		Minesweeper é um jogo muito conhecido onde o objetivo é encontrar todas as bombas numa grade de quadrados.
                                          		</div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                      	
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-1-accordion" href="#faq-1-q-2" aria-expanded="false" aria-controls="faq-1-q-2">Qual é o propósito deste site?</a></h4>
                                        	</div>
                                        	<div id="faq-1-q-2" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
													Este site tem o objetivo de melhorar a maneira que minesweeper é jogado, usando um sistema de pontos e tabelas de liderança turnando-o mais rejogável.
                                          		</div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                                                              
                                    </div>
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane" id="faq-2">

                                    <div class="panel-group" id="faq-2-accordion" role="tablist" aria-multiselectable="true">
                                    	
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#faq-2-accordion" href="#faq-2-q-1" aria-expanded="true" aria-controls="faq-2-q-1">Grelha</a></h4>
                                        	</div>
                                        	<div id="faq-2-q-1" class="panel-collapse collapse in" role="tabpanel">
                                          		<div class="panel-body">
                                            		Assim que o botão "JOGAR" é carregado, haverá uma grelha cheia de quadrados cinzentos, esse é o espaço de jogo. Comece por carregar em um desses quadrados para abrir o jogo.
                                          		</div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                      	
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-2-accordion" href="#faq-2-q-2" aria-expanded="false" aria-controls="faq-2-q-2">Números</a></h4>
                                        	</div>
                                        	<div id="faq-2-q-2" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
													Os números representam o número de bombas adjacentes a esse espaço, se conter o número 1 significa que há uma bomba em um dos oito espaços adjacentes. 
                                          		</div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                        
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-2-accordion" href="#faq-2-q-3" aria-expanded="false" aria-controls="faq-2-q-3">Bombas</a></h4>
                                        	</div>
                                        	<div id="faq-2-q-3" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
													O objetivo principal é encontrar todas as bombas sem que nenhuma delas exploda, para as marcar basta carregar com o botão direito do rato no espaço que achar conter uma bomba, se carregar em um espaço com uma bomba, ela explodirá e o jogo acabará.
                                          		</div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                      
                                    </div>
                                    
                                </div>
                                <div role="tabpanel" class="tab-pane" id="faq-3">
                                    
                                    <div class="panel-group" id="faq-3-accordion" role="tablist" aria-multiselectable="true">
                                    	
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#faq-3-accordion" href="#faq-3-q-1" aria-expanded="true" aria-controls="faq-3-q-1">1 Jogador</a></h4>
                                        	</div>
                                        	<div id="faq-3-q-1" class="panel-collapse collapse in" role="tabpanel">
                                          		<div class="panel-body">
                                                  No modo de 1 jogador terá que preencher dois campos: a dificuldade e o número de bombas. Existem 4 dificuldades e são o que decidem o tamanho da grelha, também há a opção de introduzir um tamanho à sua escolha. Após introduzir ambos os campos, carregue em "JOGAR" para começar.
                                          		</div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                      	
                                        <!-- QUESTION - START -->
                                        <div class="panel panel-primary">
                                        	<div class="panel-heading" role="tab">
                                          		<h4 class="panel-title"><a class="collapsed" role="button" data-toggle="collapse" data-parent="#faq-3-accordion" href="#faq-3-q-2" aria-expanded="false" aria-controls="faq-3-q-2">Modo Tempo</a></h4>
                                        	</div>
                                        	<div id="faq-3-q-2" class="panel-collapse collapse" role="tabpanel">
                                          		<div class="panel-body">
                                                    No modo de tempo o jogador terá que escolher uma dificuldade e completar a grelha o mais rápido que conseguir. O tempo recorde de cada jogador em cada uma das dificuldades irá ser colocado na tabela de tempo.
                                          		</div>
                                        	</div>
                                      	</div>
                                        <!-- QUESTION - END -->
                                                       
                                    </div>
                                    
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                
        	</div>
        </div>
    </section>
    <!-- ==========================
    	ESHOP - END 
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