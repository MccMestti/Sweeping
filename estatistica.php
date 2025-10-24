<?php
    session_start();
    require('bd.php');
    
    $sql2=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result2=mysqli_query($con,$sql2);
    $array=mysqli_fetch_assoc($result2);
    require('man_val.php');
    $sql=sprintf("SELECT * FROM `estatistica` WHERE `id_jogador`=%s",$array['id']);
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    $arrayjg=mysqli_fetch_assoc($result);
    
    
    $sqlupd=sprintf("UPDATE `estatistica` SET `jogos`=%s,`pontos`=%s,`jogos_ganhos`=%s,`jogos_perdidos`=%s,`bombas`=%s WHERE `id_jogador`=%s" , $arrayjg['jogos'],$arrayjg['pontos'],$arrayjg['jogos_ganhos'],$arrayjg['jogos_perdidos'],$arrayjg['bombas'],$array['id']);
    mysqli_query($con,$sqlupd);

    require('header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
                <input type="hidden" value="<?= $array['id'] ?>" id="id">
            	<div class="col-sm-3">
                	<aside class="sidebar">
                    	
                        <!-- WIDGET:CATEGORIES - START -->
                        <div class="widget widget-navigation">
                            <ul class="nav nav-pills nav-stacked">
                                <li ><a href="perfil.php">Perfil</a></li>
                                <li><a href="novapp.php">Mudar palavra passe</a></li>
                                <li class="active"><a href="estatistica.php">Estatiticas</a></li>
                                <li><a href="logout.php">Terminar sessão</a></li>
                                <li><a href="apagarconta.php">Apagar conta</a></li>
                                <li><a href="indexonline.php">Voltar</a></li>
                            </ul>
                        </div>
                        <!-- WIDGET:CATEGORIES - END -->
                        
                    </aside>
                </div>
                <div class="col-sm-9">
                <select class="form-control" name="mod" id="mod" onchange="estatistica()" require>
                    <option value="estatistica">1 Jogador</option>
                    <option value="tempo">Modo de Tempo</option>  
                </select>
                    <div class="icon-nav row" id="estatistica">
                        
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
    <script type="text/javascript">
        var mod="";
        var id=document.getElementById('id').value;
        var query="";
        
        function modo(){
            mod=document.getElementById('mod').value;
            query="SELECT * FROM `"+mod+"` WHERE id_jogador="+id;
        }

        function estatistica(){
            modo();
            $.ajax({
                url:'/ajax_estatistica.php',
                method:'POST',
                data:{query:query,mod:mod},
                error:function(){

                },
                success:function(response){
                    $("#estatistica").html(response);

                }

            }); 
        }
    estatistica();
    </script>
</body>
</html>