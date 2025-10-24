<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listagem</title>
    </head>
    <body>
        <h1>Lista de dados</h1>
        <form name="form" action="" method="post">
</body>
</html>
<?php
    require("bd.php");
    $sqllist=sprintf("SELECT * FROM alunos ORDER BY nome");
    $result=mysqli_query($con,$sqllist);
    $numsql=mysqli_num_rows($result);
    if($numsql==0){
        echo "Não exitem registos para serem exibidos!" ."<br>";
    } else{
?>
<table class="table">
         <tr>
         <td> Nome </td>
         <td> Morada </td>
         <td> Cód. Post. Local. </td>
         <td> Telefone </td>
         <td> Email </td>
         </tr>
<?php
    for($i=0;$i<$numsql;$i++){
        $row=mysqli_fetch_assoc($result);
        echo "<tr>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['morada'] . "</td>";
        echo "<td>" . $row['cod_post_local'] . "</td>";
        echo "<td>" . $row['telefone'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
    }
?>
</table>
<?php
    }
?>
<a href="index.html"> Voltar </a>
<a href="alt.php"> Alterar </a>