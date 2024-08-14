<?php
include 'admin/acesso_com.php';
include 'conn/connect.php';
// implementação back-end a partir daqui...
if ($_POST) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $insereRes = "insert into reservas (nome, cpf, telefone) values ('$login', '$senha', '$telefone')";
    $resultado = $conn->query($insereRes);
    if(mysqli_insert_id($conn)) {
        header('location:reservas_lista.php');
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Reservas - Insere</title>
</head>

<body>
    <?php include "admin/menu_adm.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a href="reservas_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo uma Reserva
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="reservas_insere.php" method="post" name="form_insere" enctype="multipart/form-data"
                            id="form_insere">
                            <label for="nome">Nome:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="nome" id="nome" cols="50" rows="1" maxlength="20" class="form-control"
                                    placeholder="Digite o seu Nome" required></input>
                            </div>

                            <label for="cpf">CPF:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="cpf" id="cpf" class="form-control"
                                    placeholder="Digite seu CPF" maxlength="11" required>
                            </div>

                            <label for="telefone">Telefone:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="cpf" id="cpf" class="form-control"
                                    placeholder="Digite seu telefone" maxlength="11" required>
                            </div>

                            <br>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block"
                                value="Realizar reserva">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
