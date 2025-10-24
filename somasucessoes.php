<?php
    $num1=$_POST["num1"];
    $num2=$_POST["num2"];
    $num3=$_POST["num3"]; 
    $diff1=$num2-$num1;
    $diff2=$num3-$num2;
    $div1=$num2/$num1;
    $div2=$num3/$num2;
    $termo=0;
    $res=0;
    $soma=0;
    if (isset($_POST["calc"])){
        if (($_POST["soma1"]>$_POST["soma2"]) || ($_POST["soma1"] == $_POST["soma2"])){
            echo"O primeiro intervalo é maior ou igual ao segundo intervalo";
        }else{
            if( $diff1 == $diff2 ){
                echo "A sucessão é aritmética". "<br>";
                while ($res < $_POST["numterm"]){
                    $i++;
                    $res=$num1+($i-1)*$diff1;
                }
                if ($res == $_POST["numterm"]){
                    echo "O número ". $_POST["numterm"]. " faz parte da sucessão.". "<br>";
                } else {
                    echo "O número ". $_POST["numterm"]. " não faz parte da sucessão.". "<br>";
                }
                echo "A sucessão dos termos é: ";
                for($i=1;$i<=$_POST["quant"];$i++){
                    $termo=$num1+($i-1)*$diff1;
                    echo "/".$termo ."/";
                }
                echo "<br>"."Soma dos termos do intervalo ". $_POST["soma1"] . " ao intervalo ". $_POST["soma2"] . ": ";
                $termo=0;
                for($i=$_POST["soma1"];$i<=$_POST["soma2"];$i++){
                    $termo=$num1+($i-1)*$diff1;
                    $soma= $soma + $termo;
                    
                }
                echo $soma."<br>";
            } else if ( $div1 == $div2 ){
                echo "A sucessão é geométrica". "<br>";
                while ($res < $_POST["numterm"]){
                    $i++;
                    $res=$num1*pow($div1,$i-1);
                }
                if ($res == $_POST["numterm"]){
                    echo "O número ". $_POST["numterm"]. " faz parte da sucessão.". "<br>";
                } else {
                    echo "O número ". $_POST["numterm"]. " não faz parte da sucessão.". "<br>";
                }
                echo "A sucessão dos termos é: ";
                for($i=1;$i<=$_POST["quant"];$i++){
                    $termo=$num1*pow($div1,$i-1);
                    echo "/".$termo ."/";
                }
                echo "<br>"."Soma dos termos do intervalo ". $_POST["soma1"] . " ao intervalo ". $_POST["soma2"] . ": ";
                $termo=0;
                for($i=$_POST["soma1"];$i<=$_POST["soma2"];$i++){
                    $termo=$num1*pow($div1,$i-1);
                    $soma= $soma + $termo;
                    
                }
                echo $soma."<br>";
            } else {
                echo "Não é uma sucessão";
            }
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucessões</title>
</head>
<body>
    <h1>Sucessões</h1>
    
    <form method="post">
        <h3> Insira os 3 primeiros termos da sucessão que quer descobrir </h3>
        <input type="text" name="num1" id="num1" placeholder="1º termo" required>
        <input type="text" name="num2" id="num2" placeholder="2º termo" required>
        <input type="text" name="num3" id="num3" placeholder="3º termo" required>

        <h3> Insira o número para ver se faz parte da sucessão </h3>
        <input type="text" name="numterm" id="numterm" required>

        <h3> Insira a quantidade de termos que quer descobrir </h3>
        <input type="text" name="quant" id="quant" required>

        <h3> A soma dos termos vai ser feita em que intervalo? </h3>
        <p> de  <input type="text" name="soma1" id="soma1" required> a <input type="text" name="soma2" id="soma2" required></p>
        <input type="submit" name="calc" id="calc" value="Calcular">
    </form>

</body>
</html>