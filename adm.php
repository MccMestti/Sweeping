<html>
    <?php
        session_start();
        require("bd.php");

        $sql=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
        $result=mysqli_query($con,$sql);
        $array=mysqli_fetch_assoc($result);
        $sqlman=sprintf("SELECT * FROM `manutencao`");
        $result=mysqli_query($con,$sqlman);
        $arrayman=mysqli_fetch_assoc($result);
        if($array['susp']==1){
            header('location:suspenso.php');
        }
        if($array['adm']==0){
            header('location:index.php');
        }

        if (!isset($mais)){
            $mais=6;
        }
        $i=1;
        require('header.php');
    ?>
    <style>
        .man {
            margin: 50px;
        }
    </style>
    <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Sweeping</h2>
                    <p>Admin</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li class="active">Admin</li>
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
    <div style="width:14%;padding-left:9%">
        <label>ID: </span></label>
        <input type="text" id='pesq' name="pesq" class="form-control" style='' onkeyup="pesquisa()">
    </div>
        
        <div class="row" align="center">
            <table class="table table-striped" style="width:80%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME UTILIZADOR</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">ESTATUTO</th>
                    <th scope="col">SUSPENSO</th>
                    <th scope="col">SUSPENDER</th>
                    <th scope="col">REMOVER</th>
                </tr>
            </thead>
            
            <tbody id="tabela">
                

            </tbody>
              </table>
              <button class="btn btn-primary btn-lg pull-center" name="vermais" id="vermais" onclick="ver_mais()">Ver Mais</button>
              
              <div>
              <?php
                    if($arrayman['man']==1){
                        echo '<button style="background-color:red" class="btn btn-primary btn-lg pull-center man"  name="man" id="man" onclick="manutencao()">Manutenção</button>';
                    } else {
                        echo '<button style="background-color:green" class="btn btn-primary btn-lg pull-center man" name="man" id="man" onclick="manutencao()">Manutenção</button>';
                    }
                    
                ?>
                
                
              </div>
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
        var query="SELECT * FROM `contas` ";
        var query2=" ORDER BY `id` ASC ";
    function ver_mais(){
        user_count=user_count+6;
        pesquisa();
    }
    </script>
    <script type = "text/javascript">
    function pesquisa(){
        var pesquisa=document.getElementById('pesq').value;
        var sql=query+ " WHERE `id` LIKE '%"+ pesquisa +"%'" + query2 ;
        var sql_limit=sql+ " LIMIT "+user_count;
        

        $.ajax({
            url:'/ajax_list.php',
            method:'POST',
            data:{sql:sql_limit},
            error:function(){
                alert('Ocorreu um erro!');
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
    <script type = "text/javascript">
        function suspender(idcont){
            $.ajax({
                url:'ajax_susp.php',
                method:'POST',
                data:{id:idcont},
                success:function(response){
                    pesquisa();
                }
            }); 
        }
    </script>
    <script type = "text/javascript">
        function remover(idcont){
            if(confirm("Quer mesmo remover esta conta?")){
                $.ajax({
                    url:'ajax_remov.php',
                    method:'POST',
                    data:{id:idcont},
                    success:function(response){
                        pesquisa();
                    }
                }); 
            }
        }
    </script>
    <script type = "text/javascript">
        function admin(idcont){
            $.ajax({
                url:'/ajax_adm.php',
                method:'POST',
                data:{id:idcont},
                success:function(response){
                    pesquisa();
                }
            }); 
        }
    </script>
    <script type = "text/javascript">
        function manutencao(){
            $.ajax({
                url:'/ajax_man.php',
                method:'POST',
                success:function(response){
                    if(response==1){
                        document.getElementById('man').style.backgroundColor="green";
                    } else{
                        document.getElementById('man').style.backgroundColor="red";
                    }
                }
            });
        }
    </script>
</body>
</html>