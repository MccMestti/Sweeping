<?php
   require('bd.php');
   $sql=sprintf("SELECT `adm` FROM `contas` WHERE `id`=%s",$_POST['id']);
   $result=mysqli_query($con,$sql);
   $array=mysqli_fetch_assoc($result);
   if ($array['adm']==1){
       $sql_sim=sprintf("UPDATE `contas` SET `adm`=0 WHERE `id`=%s",$_POST['id']);
       $result2=mysqli_query($con,$sql_sim);
   } else if ($array['adm']==0){
       $sql_nao=sprintf("UPDATE `contas` SET `adm`=1 WHERE `id`=%s",$_POST['id']);
       $result3=mysqli_query($con,$sql_nao);
   }
?>