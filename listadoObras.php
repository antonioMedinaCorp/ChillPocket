<?php include("includes/a_config.php");
require_once "./model/ObraController.php";

if (isset($_POST['editar'])) {
    $_SESSION['obra'] = $_POST['editar'];
    //echo $_SESSION['obra']. "soy el de la sesión linea 6";
    header("location:editarObra.php");
}

if (isset($_POST['borrar'])) {
    ObraController::delete($_POST['borrar']);
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php //echo $_SESSION['obra']." iloooo el de la sesión <br>";
    //echo $_POST['id']. "soy el del post"; 
    ?>
    <div class="container-fluid">
        <?php include("includes/navbar.php"); ?>
        <h1>Listado de obras actualmente disponibles</h1>
        <main>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $obras = ObraController::findAllObras();
                    foreach ($obras as $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value->id; ?></th>
                            <td><?php echo $value->title; ?></td>
                            <td><?php echo $value->tipo; ?></td>
                            <td>
                                <form action="" method="post"><button class="btn btn-outline-warning" type="submit" name="editar" value="<?php echo $value->id; ?>"> Editar&nbsp;<i class="far fa-edit"></button></form>
                            </td>
                            <td>
                                <form action="" method="post"><button class="btn btn-outline-danger" type="submit" name="borrar" value="<?php echo $value->id; ?>"> Borrar&nbsp;<i class="far fa-trash-alt"></button></form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>

        </main>
        <div>
            <?php include("includes/footer.php"); ?>
        </div>

    </div>
</body>

</html>