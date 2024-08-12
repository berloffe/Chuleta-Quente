<?php 

include('acesso_com.php');
include('../conn/connect.php');
$lista = $conn->query("select * from tipos");
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos - Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>

<body>
    <?php include ('menu_adm.php'); ?>
    <main class="container">
        <h2 class="breadcrumb alert-danger">Lista de Tipos</h2>
        <table class="table table-hover table-condensed tb-opacidade bg-warning">
            <thead>
                <th class="hidden">ID</th>
                <th>SIGLA</th>
                <th>RÓTULO</th>
                <a href="tipos_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    <span class="hidden-xs">ADICIONAR</span>
                </a>
                </th>
            </thead>

            <tbody>
                <?php do {?>
                <tr>
                    <td class="hidden">
                        <?php echo $row['id']; ?>
                        <span class="visible-xs"></span>
                        <span class="hidden-xs"></span>
                    </td>

                    <td>
                    <td>
                        <h4><?php echo $row['sigla']?></h4>
                        <span class="visible-xs"></span>
                        <span class="hidden-xs"></span>

                    </td>

                    <td>
                        <h5><?php echo $row['rotulo']?></h5>
                        <span class="visible-xs"></span>
                        <span class="hidden-xs"></span>
                    </td>
                    <td>
                        <button data-nome="<?php echo $row['rotulo'];?>" data-id="<?php echo $row['id']; ?>" class="delete btn-xs btn-block btn-danger
                                ">
                            <span class="glyphicon glyphicon-trash"></span>
                            <span class="hidden-xs">Deletar</span>
                        </button>
                    </td>
                </tr>


                <?php }while($row=$lista->fetch_assoc());?>
            </tbody>