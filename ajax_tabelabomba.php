<?php
    require('bd.php');
    $i=1;
    $result_select=$con->query($_POST['sql']);
    $html='';
    while($row=$result_select->fetch_assoc()){
            $sql=sprintf("SELECT * FROM `contas` WHERE id=%s",$row['id_jogador']);
            $result2=mysqli_query($con,$sql);
            $array=mysqli_fetch_assoc($result2);
            $html.='<tr>
            <td>
                '.$array['nome'].'
            </td>
            <td>
                '. $row['bombas'].'
            </td>
            <td>
                '. $i++ ."º".'
            </td>
        </tr>';
        
    }
    echo $html;

?>