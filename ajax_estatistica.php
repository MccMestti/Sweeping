<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
    require('bd.php');
    $i=1;
    $result_select=$con->query($_POST['query']);
    $array=mysqli_fetch_assoc($result_select);
    $html='';
    if($_POST['mod']=="estatistica"){
        $html='
        <div class="col-xs-6 col-md-6"><a><i class="fa fa-gamepad"></i>Número de jogos:<br>'. $array['jogos'] .'</a></div>
        <div class="col-xs-6 col-md-6"><a><i class="fa fa-bomb"></i>Bombas encontradas:<br> '. $array['bombas'] .'</a></div>
        <div class="col-xs-6 col-md-12"><a><i class="fa fa-caret-up"></i>Pontos:<br> '. $array['pontos'] .'</a></div>
        <div class="col-xs-6 col-md-6"><a><i class="fa fa-check"></i>Jogos ganhos:<br> '.$array['jogos_ganhos'] .'</a></div>
        <div class="col-xs-6 col-md-6"><a><i class="fa fa-minus"></i>Jogos perdidos:<br> '. $array['jogos_perdidos'] .'</a></div>
        ';
    } else {
        if($array['temp_facil']==0){
            $tempo_facil='-';
        } else {
            $tempo_facil=$array['temp_facil'].'s';
        }
        if($array['temp_medio']==0){
            $tempo_medio='-';
        } else {
            $tempo_medio=$array['temp_medio'].'s';
        }
        if($array['temp_dificil']==0){
            $tempo_dificil='-';
        } else {
            $tempo_dificil=$array['temp_dificil'].'s';
        }
        if($array['temp_mestre']==0){
            $tempo_mestre='-';
        } else {
            $tempo_mestre=$array['temp_mestre'].'s';
        }
        $html='
        <div class="col-xs-6 col-md-6"><a><i class="fa fa-clock-o"></i>Tempo modo fácil:<br>'. $tempo_facil .'</a></div>
        <div class="col-xs-6 col-md-6"><a><i class="fa fa-clock-o"></i>Tempo modo médio:<br> '.$tempo_medio .'</a></div>
        <div class="col-xs-6 col-md-6"><a><i class="fa fa-clock-o"></i>Tempo modo difícil:<br> '. $tempo_dificil .'</a></div>
        <div class="col-xs-6 col-md-6"><a><i class="fa fa-clock-o"></i>Tempo modo mestre:<br> '. $tempo_mestre .'</a></div>
        ';
    }


            
    echo $html;

?>