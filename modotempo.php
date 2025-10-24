<?php
    session_start();
    require('bd.php');
    if(!isset($_SESSION['passe'])){
        header('location:login.php');
    }
    require('header.php');
    $sql2=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result2=mysqli_query($con,$sql2);
    $array=mysqli_fetch_assoc($result2);
    require('man_val.php');
    $sql=sprintf("SELECT * FROM `tempo` WHERE `id_jogador`=%s",$array['id']);
    $result=mysqli_query($con,$sql);
    $num=mysqli_num_rows($result);
    $arrayjg=mysqli_fetch_assoc($result);

    if($num==0){
        $sqlins=sprintf("INSERT INTO `tempo`(`temp_facil`,`temp_medio`,`temp_dificil`, `temp_mestre`, `id_jogador`) VALUES (0,0,0,0,%s)", $array['id']);
        mysqli_query($con,$sqlins);
    }
    
?>
<!DOCTYPE html>
<html>
<head>
    
    <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1>Modo de tempo</h1>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Sweeping</a></li>
                        <li><a href="modotempo.php">Modo de tempo</a></li>
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
            <?php
            if($_SESSION['jogotemp']!=1) {
            ?>
            <form method="post">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Dificuldade <span class="required">*</span></label>
                        <select class="form-control" name="diff" id="diff" onchange="dificuldade()" require>
                            <option value="15">Fácil</option>
                            <option value="20">Médio</option>
                            <option value="25">Difícil</option>
                            <option value="35">Mestre</option>
                        </select>
                        <?php
                            if (isset($_POST['jogar'])){
                                $_SESSION['jogotemp']=1;
                                if($_POST['diff']==15){
                                    $_SESSION['tamanhotemp']=$_POST['diff'];
                                    $_SESSION['numbombastemp']=20;
                                } else if($_POST['diff']==20){
                                    $_SESSION['tamanhotemp']=$_POST['diff'];
                                    $_SESSION['numbombastemp']=35;
                                } else if($_POST['diff']==25){
                                    $_SESSION['tamanhotemp']=$_POST['diff'];
                                    $_SESSION['numbombastemp']=60;
                                } else if($_POST['diff']==30){
                                    $_SESSION['tamanhotemp']=$_POST['diff'];
                                    $_SESSION['numbombastemp']=100;
                                }
                                
                                $_SESSION['tempo_inicio']=microtime(true);
                            }
                        ?>
                    </div>
                    <div class="form-group col-sm-6">
                        <button type="submit" name="jogar" id="jogar" class="btn btn-primary btn-lg pull-right">Jogar</button>
                    </div> 
                </div>
            </form>
            <?php
            } else {
            ?>
                <div class="container">
                    <div>  
                        <div align="center">
                        <?php
                            define('MINEGRID_WIDTH', $_SESSION['tamanhotemp']);
                            define('MINEGRID_HEIGHT',$_SESSION['tamanhotemp']);
                            define('MINESWEEPER_NOT_EXPLORED', -1);
                            define('MINESWEEPER_MINE',         -2);
                            define('MINESWEEPER_FLAGGED',      -3);
                            define('MINESWEEPER_FLAGGED_MINE', -4);
                            define('ACTIVATED_MINE',           -5);

                            function check_field($field) {
                                if ($field === MINESWEEPER_MINE || $field === MINESWEEPER_FLAGGED_MINE) {
                                    return true;
                                }
                                else {
                                    return false;
                                }
                            }

                            function explore_field($field) {
                                if (!isset($_SESSION['minesweepertemp'][$field])
                                || !in_array($_SESSION['minesweepertemp'][$field],
                                            array(MINESWEEPER_NOT_EXPLORED, MINESWEEPER_FLAGGED))) {
                                    return;
                                }

                                $mines = 0;
                                $fields  = &$_SESSION['minesweepertemp'];

                                if ($field % MINEGRID_WIDTH !== 1) {
                                    $mines += check_field(@$fields[$field - MINEGRID_WIDTH - 1]);
                                    $mines += check_field(@$fields[$field - 1]);
                                    $mines += check_field(@$fields[$field + MINEGRID_WIDTH - 1]);
                                }

                                $mines += check_field(@$fields[$field - MINEGRID_WIDTH]);
                                $mines += check_field(@$fields[$field + MINEGRID_WIDTH]);

                                if ($field % MINEGRID_WIDTH !== 0) {
                                    $mines += check_field(@$fields[$field - MINEGRID_WIDTH + 1]);
                                    $mines += check_field(@$fields[$field + 1]);
                                    $mines += check_field(@$fields[$field + MINEGRID_WIDTH + 1]);
                                }


                                $fields[$field] = $mines;
                                if ($mines === 0) {
                                    if ($field % MINEGRID_WIDTH !== 1) {
                                        explore_field($field - MINEGRID_WIDTH - 1);
                                        explore_field($field - 1);
                                        explore_field($field + MINEGRID_WIDTH - 1);
                                    }
                                    explore_field($field - MINEGRID_WIDTH);
                                    explore_field($field + MINEGRID_WIDTH);
                                    if ($field % MINEGRID_WIDTH !== 0) {
                                        explore_field($field - MINEGRID_WIDTH + 1);
                                        explore_field($field + 1);
                                        explore_field($field + MINEGRID_WIDTH + 1);
                                    }
                                }
                            }

                            session_start(); 

                            if (!isset($_SESSION['minesweepertemp'])) {
                                $_SESSION['minesweepertemp'] = array_fill(1,MINEGRID_WIDTH * MINEGRID_HEIGHT,MINESWEEPER_NOT_EXPLORED);
                                $number_of_mines = $_SESSION['numbombastemp'];
                                $random_keys = array_rand($_SESSION['minesweepertemp'], $number_of_mines);

                                foreach ($random_keys as $key) {
                                    $_SESSION['minesweepertemp'][$key] = MINESWEEPER_MINE;
                                }

                            }


                            if (isset($_GET['explore'])) {

                                if(isset($_SESSION['minesweepertemp'][$_GET['explore']])) {
                                    switch ($_SESSION['minesweepertemp'][$_GET['explore']]) {
                                        case MINESWEEPER_NOT_EXPLORED:
                                            explore_field($_GET['explore']);
                                            break;
                                        case MINESWEEPER_MINE:
                                            $lost = 1;
                                            $_SESSION['minesweepertemp'][$_GET['explore']] = ACTIVATED_MINE;
                                            break;
                                        default:
                                            break;
                                    }
                                }

                                else {
                                    header('modotempo.php');
                                }
                            }

                            elseif (isset($_GET['flag'])) {

                                if(isset($_SESSION['minesweepertemp'][$_GET['flag']])) {
                                    $tile = &$_SESSION['minesweepertemp'][$_GET['flag']];
                                    switch ($tile) {

                                        case MINESWEEPER_NOT_EXPLORED:
                                            $tile = MINESWEEPER_FLAGGED;
                                            break;

                                        case MINESWEEPER_MINE:
                                            $tile = MINESWEEPER_FLAGGED_MINE;
                                            break;

                                        case MINESWEEPER_FLAGGED:
                                            $tile = MINESWEEPER_NOT_EXPLORED;
                                            break;

                                        case MINESWEEPER_FLAGGED_MINE:
                                            $tile = MINESWEEPER_MINE;
                                            break;

                                        default:

                                            break;

                                    }

                                }
                                else {
                                    header('modotempo.php');
                                }

                            }

                            if (!in_array(MINESWEEPER_NOT_EXPLORED, $_SESSION['minesweepertemp'])
                            && !in_array(MINESWEEPER_FLAGGED,      $_SESSION['minesweepertemp'])) {
                                $won = true;
                            }

                            ?>

                            <!DOCTYPE html>
                            <style>

                                .campo {

                                    display: block;
                                    color: black;
                                    background-color: #B9B9B9;
                                    text-decoration: none;
                                    font-size: 2em;

                                }

                            </style>
                            <script>

                            function flag(number, e) {

                                if (e.which === 2 || e.which === 3) {
                                    location = '?flag=' + number;
                                    return false;
                                }

                            }

                            </script>
                            
                            <?php
                                echo "<p>Minas: " ,$_SESSION['numbombastemp'], "<p>";
                            ?>

                            <table width="40%" border="1">
                                
                            <?php

                            $mine_copy = $_SESSION['minesweepertemp'];


                            for ($x = 1; $x <= MINEGRID_HEIGHT; $x++) {
                                echo '<tr>';
                                for ($y = 1; $y <= MINEGRID_WIDTH; $y++) {
                                    echo '<td>';
                                    $number = array_shift($mine_copy);
                                    switch ($number) {

                                        case MINESWEEPER_FLAGGED:
                                        case MINESWEEPER_FLAGGED_MINE:
                                            if (!empty($lost) || !empty($won)) {
                                                if ($number === MINESWEEPER_FLAGGED_MINE) {
                                                    echo '<a> <img src="../assets/images/minesweeper/bomba.png" style="width:30px;height:30px;"> </a>';
                                                }
                                                else {
                                                    echo '<a>
                                                            <img src="../assets/images/minesweeper/quadrado.png" style="width:30px;height:30px;">
                                                        </a>';
                                                }
                                            }

                                            else {
                                                echo '<a "href=# onmousedown="return flag(',
                                                    ($x - 1) * MINEGRID_WIDTH + $y,
                                                    ',event)" oncontextmenu="return false ""> <img src="../assets/images/minesweeper/bandeira.png" style="width30px;height:30px;"> </a>';
                                            }
                                            break;

                                        case ACTIVATED_MINE:
                                            echo '<a> <img src="../assets/images/minesweeper/bomba-explodida.png" style="width:30px;height:30px;"> </a>';
                                            break;
                                        case MINESWEEPER_MINE:

                                        case MINESWEEPER_NOT_EXPLORED:

                                            if (!empty($lost)) {
                                                if ($number === MINESWEEPER_MINE) {
                                                    echo '<a> <img src="../assets/images/minesweeper/bomba.png" style="width:30px;height:30px;"> </a>';
                                                }

                                                else {
                                                    echo '<a>
                                                            <img src="../assets/images/minesweeper/quadrado.png" style="width:30px;height:30px;">
                                                        </a>';
                                                }
                                            }

                                            elseif (!empty($won)) {
                                                echo '<a> <img src="../assets/images/minesweeper/bomba.png" style="width:30px;height:30px;"> </a>';
                                            }

                                            else {

                                                echo '<a  href="?explore=',
                                                    ($x - 1) * MINEGRID_WIDTH + $y,
                                                    '" onmousedown="return flag(',
                                                    ($x - 1) * MINEGRID_WIDTH + $y,
                                                    ',event)" oncontextmenu="return false"> <img src="../assets/images/minesweeper/quadrado.png" style="width:30px;height:30px;"> </a>';
                                            }
                                            break;
                                        case 0:
                                            echo '<a> <img src="../assets/images/minesweeper/quadrado-limpo.png" style="width:30px;height:30px;"> </a>';
                                            break;
                                        default:
                                            echo '<a> <img src="../assets/images/minesweeper/num'.$number.'.png" style="width:30px;height:30px;"> </a>'; 
                                    }

                                }

                            }
                        ?>
                        </table>
                        <?php
                            if (!empty($lost)) {
                                unset($_SESSION['minesweepertemp']);
                                $_SESSION['tempo_fim']=microtime(true);
                                $tempo_final=$_SESSION['tempo_fim']-$_SESSION['tempo_inicio'];

                                ?>

                                    <p>Perdeu o jogo aos <?= round($tempo_final,2) ?> segundos. <a href="?"> Recomeçar?</a></p>
                            
                                <?php
                                $_SESSION['jogotemp']=0;
                            }
                            elseif (!empty($won)) {
                                unset($_SESSION['minesweepertemp']);
                                $_SESSION['tempo_fim']=microtime(true);
                                $tempo_final=$_SESSION['tempo_fim']-$_SESSION['tempo_inicio'];
                                
                                if((($arrayjg['temp_facil']==0)||(round($tempo_final,2)<$arrayjg['temp_facil']))&&($_SESSION['tamanhotemp']==15)){
                                    $sqlfacil=sprintf("UPDATE `tempo` SET `temp_facil`=%s WHERE id_jogador=%s",round($tempo_final,2),$arrayjg['id_jogador']);
                                    $result=mysqli_query($con,$sqlfacil);
                                    ?>
                                        <p> NOVO RECORDE PESSOAL! Completou o jogo em <?= round($tempo_final,2) ?> segundos! <a href="?">Recomeçar?</a></p>
                                    <?php
                                } else if((($arrayjg['temp_medio']==0)||(round($tempo_final,2)<$arrayjg['temp_medio']))&&($_SESSION['tamanhotemp']==20)){
                                    $sqlfacil=sprintf("UPDATE `tempo` SET `temp_medio`=%s WHERE id_jogador=%s",round($tempo_final,2),$arrayjg['id_jogador']);
                                    $result=mysqli_query($con,$sqlfacil);
                                    ?>
                                        <p> NOVO RECORDE PESSOAL! Completou o jogo em <?= round($tempo_final,2) ?> segundos! <a href="?">Recomeçar?</a></p>
                                    <?php
                                } else if((($arrayjg['temp_dificil']==0)||(round($tempo_final,2)<$arrayjg['temp_dificil']))&&($_SESSION['tamanhotemp']==25)){
                                    $sqlfacil=sprintf("UPDATE `tempo` SET `temp_dificil`=%s WHERE id_jogador=%s",round($tempo_final,2),$arrayjg['id_jogador']);
                                    $result=mysqli_query($con,$sqlfacil);
                                    ?>
                                        <p> NOVO RECORDE PESSOAL! Completou o jogo em <?= round($tempo_final,2) ?> segundos! <a href="?">Recomeçar?</a></p>
                                    <?php
                                } else if((($arrayjg['temp_mestre']==0)||(round($tempo_final,2)<$arrayjg['temp_mestre']))&&($_SESSION['tamanhotemp']==35)){
                                    $sqlfacil=sprintf("UPDATE `tempo` SET `temp_mestre`=%s WHERE id_jogador=%s",round($tempo_final,2),$arrayjg['id_jogador']);
                                    $result=mysqli_query($con,$sqlfacil);
                                    ?>
                                        <p> NOVO RECORDE PESSOAL! Completou o jogo em <?= round($tempo_final,2) ?> segundos! <a href="?">Recomeçar?</a></p>
                                    <?php
                                } else {
                                    ?>
                                    <p>Completou o jogo em <?= round($tempo_final,2) ?> segundos. <a href="?">Recomeçar?</a></p>
                                    <?php
                                }

                                
                                $_SESSION['jogotemp']=0;
                            }
                        ?>
                    </div>
                </div> 
                <?php
                    }
                ?>
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