<?php
    session_start();
    if(isset($_POST['repnum'])){        
        session_destroy();
    }
    if(!isset($_SESSION["soma"])){
        $_SESSION["soma"]=0;
        $_SESSION["count"] = 0;
        $_SESSION["maior"] = 0;
        $_SESSION["menor"] = 0;
    } 
    if(isset($_POST['mais'])){
        if(is_numeric($_POST['numsom'])){
            $_SESSION["soma"]=$_SESSION["soma"]+$_POST['numsom'];
            $_SESSION["count"]++;
            if($_SESSION["count"]==1){
                $_SESSION["menor"]=$_POST['numsom'];
                $_SESSION["maior"]=$_POST['numsom'];
            }
            if($_POST['numsom']>$_SESSION["maior"]){
                $_SESSION["maior"]=$_POST['numsom'];
            }
            if($_POST['numsom']<$_SESSION["menor"]){
                $_SESSION["menor"]=$_POST['numsom'];
            } 
            echo '<br>'. 'Soma dos números:' . $_SESSION["soma"]. '<br>';
            echo '<br>'.'Números acumulados: '. $_SESSION["count"] .'<br>';
            echo '<br>'.'Média: '. round($_SESSION["soma"]/$_SESSION["count"],2) .'<br>';
            echo '<br>'.'Maior: '. $_SESSION["maior"] .'<br>';
            echo '<br>'.'Menor: '. $_SESSION["menor"] .'<br>';
        } else {
            echo 'Não é um número'.'<br>';            
        }
    } else {
            echo 'Insira um número'.'<br>';  
    }
    
?>
<h1>Insira os números que quer somar</h1>
<form name="form" action="" method="post">
  <input type="text" name="numsom" id="numsom">
  <input type="submit" name="mais" value="OK">
  <input type="submit" name="repnum" id="repnum" value="Repor números">
</form>

<a href="index.html"> Voltar </a>