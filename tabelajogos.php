<?php
    session_start();
    require("bd.php");
    $sql2=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result2=mysqli_query($con,$sql2);
    $array=mysqli_fetch_assoc($result2);
    require('man_val.php');

    if (!isset($mais)){
        $mais=6;
    }
    $i=1;
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
                    <p>Bombas encontradas</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li class="active">Jogos realizados</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
	<!-- ==========================
    	BREADCRUMB - END 
    =========================== -->

<body>
    <div class="container">
        <div class="col-sm-3">
            <aside class="sidebar">
                                
                <!-- WIDGET:CATEGORIES - START -->
                    <div class="widget widget-navigation">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="tabelapontos.php">Tabela de pontos</a></li>
                            <li><a href="tabelatempo.php">Tabela de tempo</a></li>
                            <li class="active"><a href="tabelajogos.php">Tabela de jogos realizados</a></li>
                            <li><a href="tabelabombas.php">Tabela de bombas encontradas</a></li>
                        </ul>
                    </div>
                <!-- WIDGET:CATEGORIES - END -->
                                
            </aside>
        </div>
        <div class="col-sm-9">
                    
        <article class="account-content">
        <div class="row" align="center">
        <div style="width:30%;padding-bottom:1%">
        <label>Nome do jogador<input type="text" id='pesq' name="pesq" class="form-control" onkeyup="pesquisa()"> </span> </label>
        </div>
            <table class="table table-striped" style="width:80%">
                <thead>
                    <tr>
                        <th scope="col">JOGADOR</th>
                        <th scope="col">JOGOS REALIZADOS</th>
                        <th scope="col">POSIÇÃO</th>
                    </tr>
                </thead>
                
                <tbody id="tabela">
                    

                </tbody>
            </table>
              <button class="btn btn-primary btn-lg pull-center" name="vermais" id="vermais" onclick="ver_mais()">Ver Mais</button>
            </div>
        </div>
    </div>

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

    <script type = "text/javascript">
        var user_count=6;
        var query="SELECT * FROM `estatistica` ";
        var query2=" ORDER BY `jogos` DESC ";
    function ver_mais(){
        user_count=user_count+6;
        pesquisa();
    }
    </script>
    <script type = "text/javascript">
    function pesquisa(){
        var pesquisa=document.getElementById('pesq').value;
        var string=0;
        $.ajax({
            async:false,
            url:'/ajax_pesq.php',
            method:'POST',
            data:{pesquisa:pesquisa},
            error:function(){
                alert('Ocorreu um erro!');
            },
            success:function(response){
                string=response;
            }

        }); 
        if (string=='()'){
            var sql=query+ " WHERE `jogos`='bomdia'";
            var sql_limit=sql+ " LIMIT "+user_count;
        } else {
            var sql=query+ " WHERE `id_jogador` IN " + string +" AND `jogos`!=0 "+ query2 ;
            var sql_limit=sql+ " LIMIT "+user_count;
        }

        $.ajax({
            url:'/ajax_tabelajogos.php',
            method:'POST',
            data:{sql:sql_limit},
            error:function(){

            },
            success:function(response){
                
                $("#tabela").html(response);
            }

        }); 

        $.ajax({
            url:'/ajax_vermais.php',
            method:'POST',
            data:{sql:sql},
            
            success:function(response){
                if(parseInt(response)<=user_count){
                    $("#vermais").hide();
                }else{
                    $("#vermais").show();
                }
            }


        });

        

    }
    pesquisa();
    </script>

</body>
</html>