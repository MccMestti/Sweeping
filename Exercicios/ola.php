<?php
for ($i = 1; $i <=5 ;$i++){
    echo $i . '<br>';
    $soma = $soma + $i;
}
echo $soma .'<br>';
echo 'OLÁ MUNDO' . '<br>';
while ($i2<=5){
    echo $i2 . '<br>';
    $soma2 = $soma2 + $i2;
    $i2++;
}
echo $soma2 .'<br>';

for($i3=1 ; $i3<=10 ; $i3++){
    if ($i3 % 2 == 0){
        $somapar = $somapar + $i3;
    }
    else{
        $somaimpar = $somaimpar + $i3;
    }
}
echo '<br>' . $somapar . '<br>';
echo $somaimpar . '<br>';
?>
<h1> EU SOU O LUCAS </h1>
<h2>Insira um número para ver se é primo</h2>
<form name="form" action="" method="post">
  <input type="text" name="nump" id="nump">
</form>
<?php
    $num = $_POST['nump'];
    $var=0;
    if(isset($num)){
        if(is_numeric($num)){
            for($i4=$num-1;$i4>=2;$i4--){
                if ($num % $i4 == 0){
                    echo 'Este número não é primo'.'<br>';
                    $var++;
                    break;
                }
            }
            if($var==0){
                echo 'Este número é primo' . '<br>';
            }
        } else {
            echo 'Não é um número'.'<br>';
        }
        if($num % 2 == 0){
            echo 'Este número é par' . '<br>';
        } else {
            echo 'Este número é impar' . '<br>';
        }
    } else{
        echo 'Insira um número'.'<br>';
    }
    
?>
<a href="index.html"> Voltar </a>