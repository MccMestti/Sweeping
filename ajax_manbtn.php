<?php
   require('bd.php');
   $sql=sprintf("SELECT * FROM `manutencao`");
   $result=mysqli_query($con,$sql);
   $array=mysqli_fetch_assoc($result);
   if ($array['man']==1){
       echo '<button class="btn btn-primary btn-lg pull-center" name="man" id="man" onclick="manutencao()">Manutenção</button>';
   } else if ($array['man']==0){
    echo '<button class="btn btn-success btn-lg pull-center" name="man" id="man" onclick="manutencao()">Manutenção</button>';
   }
?>