<?php
include 'acesso_com.php';
include '../conn/connect.php';
// implementação back-end a partir daqui...
if ($_POST) {
    $sigla = $_POST['sigla'];
    $rotulo = $_POST['rotulo'];
    $insereTipo = "insert into tipos (sigla, rotulo) values ('$sigla', '$rotulo')";
    $resultado = $conn->query($insereTipo);
    if(mysqli_insert_id($conn)) {
        header('location:tipos_lista.php');
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Tipo - Insere</title>
</head>

<body>
    <?php include "menu_adm.php";?>
    <main class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
                <h2 class="breadcrumb text-danger">
                    <a href="tipos_lista.php">
                        <button class="btn btn-danger">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                    </a>
                    Inserindo Tipo
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-danger" role="alert">
                        <form action="tipos_insere.php" method="post" name="form_insere" enctype="multipart/form-data"
                            id="form_insere">
                            <label for="sigla">Sigla:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <textarea name="sigla" id="sigla" cols="3" rows="1" maxlength="3" class="form-control"
                                    placeholder="Digite a sigla" required></textarea>
                            </div>

                            <label for="rotulo">Rótulo:</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="rotulo" id="rotulo" class="form-control"
                                    placeholder="Digite o novo tipo" maxlength="100" required>
                            </div>



                            <br>
                            <input type="submit" name="enviar" id="enviar" class="btn btn-danger btn-block"
                                value="Cadastrar novo tipo">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>