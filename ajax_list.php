<?php
    require('bd.php');
    $result_select=$con->query($_POST['sql']);
    $html='';
    while($row=$result_select->fetch_assoc()){
            $html.='<tr>
                <td>
                    '.$row['id'].'
                </td>
                <td>
                    '.$row['nome'].'
                </td>
                <td>
                    '.$row['email'].'
                </td>
                <td>';
                    if($row['adm']==0){
                        $html.='<i style="color:blue; cursor:pointer;" onclick="admin('.$row['id'].')">USER</i>';
                    } else {
                        $html.='<i style="color:orange; cursor:pointer;" onclick="admin('.$row['id'].')">ADMIN</i>';
                    }
                $html.='</td>
                <td>';
                    if($row['susp']==0){
                        $html.='NÃO';
                    } else {
                        $html.='SIM';
                    }
                $html.='</td>
                <td>
                    <i class="fa fa-eye-slash" style="color:red; cursor:pointer;" onclick="suspender('.$row['id'].')"></i> 
                </td>
                <td>
                    <i class="fa fa-minus" style="color:red; cursor:pointer;" onclick="remover('.$row['id'].')"></i>
                </td>
            </tr>';
        
    }
    echo $html;

?>