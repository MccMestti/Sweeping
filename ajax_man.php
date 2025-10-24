<?php
   require('bd.php');
   $sql=sprintf("SELECT * FROM `manutencao`");
   $result=mysqli_query($con,$sql);
   $array=mysqli_fetch_assoc($result);
   if ($array['man']==1){
       $sql_sim=sprintf("UPDATE `manutencao` SET `man`=0");
       $result2=mysqli_query($con,$sql_sim);
   } else if ($array['man']==0){
       $sql_nao=sprintf("UPDATE `manutencao` SET `man`=1");
       $result3=mysqli_query($con,$sql_nao);
   }
   echo $array['man'];
?>