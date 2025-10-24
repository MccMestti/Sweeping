
<h1>Insira os números que quer somar</h1>
<?php
    if(!isset($_POST['hd'])){
        $maior=0;
        $somanum=0;
        $count=0;
        $menor=0;
    } else{
        $somanum=$_POST['hd'];
        $count=$_POST['contador']; 
        $maior=$_POST['maior'];
        $menor=$_POST['menor'];
    }
    if(isset($_POST['numsom'])){
        if(is_numeric($_POST['numsom'])){
            $somanum=$somanum+$_POST['numsom'];
            $count++;
            if($count==1){
                $menor=$_POST['numsom'];
                $maior=$_POST['numsom'];
            }
            if($_POST['numsom']>$maior){
                $maior=$_POST['numsom'];
            }
            if($_POST['numsom']<$menor){
                $menor=$_POST['numsom'];
            } 
        } else {
            echo 'Não é um número'.'<br>';            
        }
    } else {
        echo 'Insira um número'.'<br>';   
    }
    echo '<br>'. 'Soma dos números:' . $somanum. '<br>';
    echo '<br>'.'Números acumulados: '. $count .'<br>';
    echo '<br>'.'Média: '. round($somanum/$count,2) .'<br>';
    echo '<br>'.'Maior: '. $maior .'<br>';
    echo '<br>'.'Menor: '. $menor .'<br>';
?>
<form name="form" action="" method="post">
  <input type="text" name="numsom" id="numsom">
  <input type="hidden" id="hd" name="hd" value="<?php echo $somanum ?>">
  <input type="hidden" id="contador" name="contador" value="<?php echo $count ?>">
  <input type="hidden" id="maior" name="maior" value="<?php echo $maior ?>">
  <input type="hidden" id="menor" name="menor" value="<?php echo $menor ?>">
</form>
<a href="index.html"> Voltar </a>