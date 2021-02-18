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
        
            foreach($valoraciones as $v){
                $valoracion = $v;
           // while ($row = $valoraciones->fetchObject()) {
        ?>
                <?php
                $titulo = ObraController::findByID($valoracion->id_obra);

                ?>
                <div class="container">
                    <div class="card text-center w-100 mt-2">
                        <div class="card-img-top bg-dark h-25">
                            <div class="card-title text-light h4">
                                <?php echo $titulo->title ?>
                            </div>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
                                <?php echo $valoracion->point; ?>
                            </p>
                            <p class="card-text">
                                <?php echo $valoracion->texto; ?>
                            </p>
                            <div class="row">
                                <div class="col">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $titulo->id; ?>">
                                        <button type="submit" class="btn btn-danger" name="borrar">
                                            Borrar&nbsp;<i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $titulo->id; ?>">
                                        <button type="button" class="btn btn-success text-light" data-toggle="modal" data-target="#myModal3">
                                            Editar&nbsp;<i class="far fa-edit"></i></button>
                                    </form>

                                </div>


                            </div>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModal3">
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
                                              <input type="hidden" name="id" value="<?php echo $valoracion->id; ?>">           
                                                <input type="hidden" name="id_usu" value="<?php echo $_SESSION['id']; ?>">
                                                <input type="hidden" name="id_obra" value="<?php echo $valoracion->id_obra; ?>">
                                                <div class="form-group">
                                                    <input type="number" name="point" value="<?php echo $valoracion->point; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="texto" value="<?php echo $valoracion->texto; ?>">
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
        


        ?>
    </div>

    <div>
        <?php include("includes/footer.php"); ?>
    </div>

</body>

</html>