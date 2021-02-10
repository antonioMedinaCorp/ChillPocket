<?php
include("includes/a_config.php");
require_once "./model/UsuarioController.php";
require_once "./model/ValoracionController.php";
require_once "./model/ObraController.php";
//echo $_SESSION['user_first_name'];
//echo $_SESSION['id'];

if (isset($_POST['editar'])) {
    $valoracion = new Valoracion($_POST['id'], $_POST['id_usu'], $_POST['id_obra'], $_POST['point'], $_POST['texto']);
    ValoracionController::modificarValoracion($valoracion);
}

if (isset($_POST['borrar'])) {
    ValoracionController::delete($_POST['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container" id="center">

        <?php

        
        $valoraciones = ValoracionController::findAllValoracionesByIdUsuario($_SESSION['id']);
        if ($valoraciones->rowCount()) {
            while ($row = $valoraciones->fetchObject()) {
        ?>
                <div class="login-container mt-2 mb-2 rounded">
                    <div class="card text-center w-100">
                        <div class="card-body">
                            <?php
                            $titulo = ObraController::findByID($row->id_obra);

                            ?>
                            <h4 class="card-title"><?php echo $titulo->title; ?></h4>
                            <p class="card-text">
                                <?php echo $row->point; ?>
                            </p>
                            <p class="card-text">
                                <?php echo $row->texto; ?>
                            </p>
                            <div class="row">
                                <div class="col">
                                    <form action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                        <button type="submit" class="btn btn-danger" name="borrar">
                                            Borrar<i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                <div class="col">
                                    <button class="btn btn-success text-light" data-toggle="modal" data-target="#myModal2">
                                        Editar<i class="far fa-edit"></i></button>
                                </div>


                            </div>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModal2">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title"><?php echo $titulo->title; ?></h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" id="center">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                                                <input type="hidden" name="id_usu" value="<?php echo $_SESSION['id']; ?>">
                                                <input type="hidden" name="id_obra" value="<?php echo $row->id_obra; ?>">
                                                <div class="form-group">
                                                    <input type="number" name="point" value="<?php echo $row->point; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="texto" value="<?php echo $row->texto; ?>">
                                                </div>
                                                <button type="submit" class="btn btn-success  text-light" name="editar">Editar</button>

                                            </form>

                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
            }
        }


        ?>
    </div>

    <div>
        <?php include("includes/footer.php"); ?>
    </div>
</body>

</html>