<?php
 include('conn/connect.php');
 //inicia a verificação do login
 if($_POST){
    $id = $_POST['id'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $loginRes = $conn->query("select * from clientes where cpf = '$cpf' and email  = '$email' ");
    $rowLogin = $loginRes->fetch_assoc();
    $numRow = $loginRes->num_rows; 
    //se a sessão não existir
    if(!isset($_SESSION)) {
        $sessaoAntiga = session_name('chulettaaa');
        session_start();
        $session_name_new = session_name();
    }

    
    if($numRow > 0){
        $_SESSION['id_clientes'] = $id;
        $_SESSION['nome_da_sessao'] = session_name();
        if($rowLogin['id'] == $id) {
            echo "<script>window.open('reservas_insere.php?cliente=".$id."','_self')</script>";
        } 
        else {
            echo "<script>window.open('invasor.php','_self')</script>";
        }   
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="30;URL=index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/estilo.css" type="text/css">

    <title>Chuleta Quente - Login reservas</title>
</head>

<body>
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                        <h1 class="breadcrumb text-info text-center">Faça seu login</h1>
                        <div class="thumbnail">
                            <p class="text-info text-center" role="alert">
                                <i class="fas fa-users fa-10x"></i>
                            </p>
                            <br>
                            <div class="alert alert-info" role="alert">
                                <form action="login_reservas.php" name="form_cpf" id="form_cpf" method="POST"
                                    enctype="multipart/form-data">
                                    <label for="cpf">CPF:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user text-info" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" name="cpf" id="cpf" class="form-control" autofocus required
                                            autocomplete="off" placeholder="Digite seu CPF">
                                    </p>
                                    <label for="email">Email:</label>
                                    <p class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-qrcode text-info"
                                                aria-hidden="true"></span>
                                        </span>
                                        <input type="email" name="email" id="email" class="form-control" required
                                            autocomplete="off" placeholder="Digite seu email">
                                    </p>
                                    <p class="text-right">
                                        <input type="submit" value="Entrar" class="btn btn-primary">
                                    </p>
                                </form>
                                <p class="text-center">
                                    <small>
                                        <br>
                                        Caso não faça uma escolha em 30 segundos será redirecionado automaticamente para
                                        página inicial.
                                    </small>
                                </p>
                            </div><!-- fecha alert -->
                        </div><!-- fecha thumbnail -->
                    </div><!-- fecha dimensionamento -->
                </div><!-- fecha row -->
            </article>
        </section>
    </main>


    <!-- Link arquivos Bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>