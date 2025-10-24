<?php
   require('bd.php');
   $sql=sprintf("SELECT `susp` FROM `contas` WHERE `id`=%s",$_POST['id']);
   $result=mysqli_query($con,$sql);
   $array=mysqli_fetch_assoc($result);
   if ($array['susp']==1){
       $sql_sim=sprintf("UPDATE `contas` SET `susp`=0 WHERE `id`=%s",$_POST['id']);
       $result2=mysqli_query($con,$sql_sim);
   } else if ($array['susp']==0){
       $sql_nao=sprintf("UPDATE `contas` SET `susp`=1 WHERE `id`=%s",$_POST['id']);
       $result3=mysqli_query($con,$sql_nao);
   }
?>