<?php
    session_start();
    if(!isset($_SESSION['passe'])){
        header('location:login.php');
    }
    require("bd.php");

    $sql=sprintf("SELECT * FROM `contas` WHERE nome='%s'",$_SESSION['nome']);
    $result=mysqli_query($con,$sql);
    $array=mysqli_fetch_assoc($result);
    require('man_val.php');
    if (isset($_POST['eliminar'])){
        $envia=0;
        $sql_elim=sprintf("delete from ficheiros where nome_doc='%s';",$_POST['ficheiro']);
        if (mysqli_query($con, $sql_elim)){
            $fich='uploads/'.$array['id'].$_POST['ficheiro'];
            unlink($fich);
            $envia=1;
            
        } 
    }
    if(isset($_POST['submeter'])){
        $envia=0;
        if ((isset($_FILES['documento'])) && (!empty($_FILES['documento']['tmp_name'])))
            {
            if ($_FILES['documento']['size'] <= 3000000000){

                $extensoes_validas=array('jpg', 'png');


                $nome_original=$_FILES["documento"]["name"];

                //criar nome único baseado no nome do ficheiro e na hora atual
                $texto=$_FILES['documento']['tmp_name'].date('Y-m-d').date('H:i:s');                    
                $nome_codificado=md5($texto);

                $extensao_do_ficheiro=strtolower(pathinfo($_FILES['documento']['name'], PATHINFO_EXTENSION));

                if (in_array($extensao_do_ficheiro, $extensoes_validas)){

                    $pasta='uploads/'.$array['id'];
                    $nome_a_gravar=$nome_codificado.'.'.$extensao_do_ficheiro;

                    if (move_uploaded_file($_FILES['documento']['tmp_name'], $pasta.$nome_a_gravar)){

                        $insert=sprintf("INSERT INTO ficheiros (nome_doc,nome_original,tipo_doc,id_conta) VALUES ('%s','%s','%s','%s')", $nome_a_gravar,$nome_original,$extensao_do_ficheiro,$array['id']);

                        if (mysqli_query($con, $insert)){
                            $envia=1;                        
                        }
                    }
                } 
            } 
        }
    }
    $sql=sprintf("select * from ficheiros order by id desc;");
    $res=mysqli_query($con,$sql);
    $num=mysqli_num_rows($res);
    require('header.php');
?>
    
    <!-- ==========================
    	BREADCRUMB - START 
    =========================== -->
    <section class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h2>Sweeping</h2>
                    <p>Mudar avatar</p>
                </div>
                <div class="col-xs-6">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Sweeping</a></li>
                        <li class="active">Mudar avatar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
	<!-- ==========================
    	BREADCRUMB - END 
    =========================== -->

<body>
    <div class="container">
        <div class="row">
            
            <div class="col-md-12" align="center" style="top: 150px;">
                <?php
                if(isset($envia)){
                    if($envia==1){
                        ?>  
                        <div class="row" align="center">
                            <div class="col-md-12" align="center" >                  
                                <div class="alert alert-success" role="alert">
                                     OPERAÇÃO EFETUADA COM SUCESSO
                                </div>                       
                            </div>
                         </div>                
                        <?php
                    } else {
                        ?>  
                        <div class="row" align="center">
                            <div class="col-md-12" align="center" >                  
                                <div class="alert alert-danger" role="alert">
                                     OCORREU UM PROBLEMA INESPERADO. TENTE NOVAMENTE.
                                </div>                       
                            </div>
                         </div>                
                        <?php
                    }
                }
                
                ?>
                <?php
                if($num>0){
                    ?>
                    <hr>
                    <h3>FICHEIROS SUBMETIDOS PARA O SERVIDOR</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th scope="col">AVATAR</th>
                              <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <?php
                        while($reg=mysqli_fetch_array($res)){
                            ?>
                            <tr>
                                <td>
                                    <?php
                                        if($reg['tipo_doc']=='png' || $reg['tipo_doc']=='jpg'){
                                            ?>
                                            <a href="<?php echo 'imgs/'.$reg['nome_doc']; ?>" target="_blank">
                                                <img src="<?php echo 'imgs/'.$reg['nome_doc']; ?>" style="width: 80px;" ></a>
                                            <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form method="post">
                                        <input type="submit" name="eliminar" class="btn btn-outline-danger" value="REMOVER AVATAR">
                                        <input type="hidden" name="ficheiro" value="<?php echo $reg['nome_doc']; ?>">                               
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <?php
                }
                ?>
                <p>SUBMETER UM FICHEIRO </p>
                <br>

                <form enctype="multipart/form-data" method="post">

                    <label for="formFile" class="form-label">FICHEIRO DE UPLOAD</label>
                    <input class="form-control" type="file" name="documento" accept=".jpg,.png" required>
                    <br>
                    <input type="submit" class="btn btn-outline-success" name="submeter" value="SUBMETER">  
                    <a href="index.php" class="btn btn-outline-secondary">VOLTAR</a>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html> 