<?php
    session_start();
    if(!isset($_SESSION['passe'])){
        header('location:login.php');
    }
    require('header.php'); 
?>
<!DOCTYPE html>
<html>
<head>
    <script>
       function dificuldade(){
        var dific=document.getElementById('diff').value;
        if(dific==1){
            document.getElementById('tamanho').type = 'text';
            document.getElementById('tamanho').value = '';
        } else {
            document.getElementById('tamanho').type = 'hidden';
        }
       }
    </script>
    
    <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1>1 Jogador</h1>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li><a href="criarsala.php">1 Jogador</a></li>
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
            <form method="post">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Número de bombas <span class="required">*</span></label>
                        <input type="text" name="numbombas" class="form-control" require>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Tempo <span class="required">*</span></label>
                        <input type="text" name="tempo" class="form-control" require>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Dificuldade <span class="required">*</span></label>
                        <select class="form-control" name="diff" id="diff" onchange="dificuldade()" require>
                            <option value="0">Selecione uma opção</option>
                            <option value="5">Iniciante</option>
                            <option value="15">Fácil</option>
                            <option value="20">Médio</option>
                            <option value="30">Difícil</option>
                            <option value="35">Mestre</option>
                            <option value="1">Personalizada</option>
                        </select>
                        <div class="form-group pull-left">
                                <input type="hidden" name="tamanho" id="tamanho" class="form-control" placeholder="Tamanho do campo" >
                        </div>
                        <?php
                            if (isset($_POST['jogar'])){
                                $_SESSION['numbombas']=$_POST['numbombas'];
                                $_SESSION['temp']=$_POST['tempo'];
                                if($_POST['diff']==1){
                                    $_SESSION['tamanho']=$_POST['tamanho'];
                                } else if($_POST['diff']>1) {
                                    $_SESSION['tamanho']=$_POST['diff'];
                                }              
                                $abrir=1;    
                            }
                        ?>
                    </div>
                    <div class="form-group col-sm-6">
                        <button type="submit" name="jogar" id="jogar" class="btn btn-primary btn-lg pull-right">Jogar</button>
                    </div> 
                </div>
            </form>
                <div class="container">
                    <div>
                            
                        <div align="center">
                            <?php
                                if($abrir==1){
                                    ?>
                                    <script>
                                        window.location = "http://aluno13107.damiaodegoes.pt/minesweeper.php";
                                    </script>
                                    <?php
                                }
                            ?>
                        </div>
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