<?php
include 'acesso_com.php';
include '../conn/connect.php';
 
if($_POST){
    $id = $_POST['id'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
 
    $updateUser = " update usuarios
    set login = '$login',
    senha = '$senha'
    where id = $id;";
    $resultado = $conn->query($updateUser);
    if($resultado){
        header('location:usuarios_lista.php');
        }    
}
if ($_GET){
    $id_user = $_GET['id'];
}else{
    $id_user = 0;
}
$listaUser = $conn->query('select * from usuarios where id ='.$id_user);
$rowUser = $listaUser->fetch_assoc();
?>
 
<!DOCTYPE html>
<html lang="pt-br">
 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Usuários - Atualiza</title>
</head>
 
<body>
    <?php include "menu_adm.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a href="usuarios_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Atualizando Usuários
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="usuarios_atualiza.php" method="post" name="form_insere"
                            enctype="multipart /form-data" id="form_insere">
                                <!-- O campo id deve permanecer oculto por isso estamos usando o hidden  -->
                                <input type="hidden" name="id" id="id" value="<?php echo $rowUser['id'];?>">
                                <label for="descri">Login:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                    </span>
                                    <input type="text" name="login" id="login" class="form-control"
                                        placeholder="Digite o login" maxlength="20"
                                        value="<?php echo $rowUser['login'];?>">
                                </div>
                                <label for="descri">Senha:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="senha" id="senha" class="form-control"
                                    placeholder="Digite a senha" maxlength="50"
                                    value="<?php echo $rowUser (md5['senha']); ?>">
                            </div>
                            <br>
                            <input type="submit" name="atualizar" id="atualizar" class="btn btn-danger btn-block"
                                value="Atualizar">
                        </form>
                        <div>
                    </div>
                </div>
            </div>
    </main>
 
</body>
 
</html>