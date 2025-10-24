<?php
    require('header.php');
    define('MINEGRID_WIDTH', $_SESSION['tamanho']);
    define('MINEGRID_HEIGHT',$_SESSION['tamanho']);
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
        if (!isset($_SESSION['minesweeper'][$field])
        || !in_array($_SESSION['minesweeper'][$field],
                    array(MINESWEEPER_NOT_EXPLORED, MINESWEEPER_FLAGGED))) {
            return;
        }

        $mines = 0;
        $fields  = &$_SESSION['minesweeper'];

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

    if (!isset($_SESSION['minesweeper'])) {
        $_SESSION['minesweeper'] = array_fill(1,MINEGRID_WIDTH * MINEGRID_HEIGHT,MINESWEEPER_NOT_EXPLORED);
        $number_of_mines = $_SESSION['numbombas'];
        $random_keys = array_rand($_SESSION['minesweeper'], $number_of_mines);

        foreach ($random_keys as $key) {
            $_SESSION['minesweeper'][$key] = MINESWEEPER_MINE;
        }

    }


    if (isset($_GET['explore'])) {

        if(isset($_SESSION['minesweeper'][$_GET['explore']])) {
            switch ($_SESSION['minesweeper'][$_GET['explore']]) {
                case MINESWEEPER_NOT_EXPLORED:
                    explore_field($_GET['explore']);
                    break;
                case MINESWEEPER_MINE:
                    $lost = 1;
                    $_SESSION['minesweeper'][$_GET['explore']] = ACTIVATED_MINE;
                    break;
                default:
                    break;
            }
        }

        else {
            die('Tile doesn\'t exist.');
        }
    }

    elseif (isset($_GET['flag'])) {

        if(isset($_SESSION['minesweeper'][$_GET['flag']])) {
            $tile = &$_SESSION['minesweeper'][$_GET['flag']];
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
            die('Tile doesn\'t exist.');
        }

    }

    if (!in_array(MINESWEEPER_NOT_EXPLORED, $_SESSION['minesweeper'])
    && !in_array(MINESWEEPER_FLAGGED,      $_SESSION['minesweeper'])) {
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
        echo "<p>Minas: " ,$_SESSION['numbombas'], "<p>";
    ?>

    <table width="40%" border="1">
        
    <?php

    $mine_copy = $_SESSION['minesweeper'];


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
        unset($_SESSION['minesweeper']);
        echo '<p>Perdeu :( <a href="?">Recomeçar?</a>';
    }
    elseif (!empty($won)) {
        unset($_SESSION['minesweeper']);
        echo '<p>Parabéns, ganhou o jogo :) <a href="?">Recomeçar?</a>';
    }
?>
