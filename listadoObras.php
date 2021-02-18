<?php include("includes/a_config.php");
require_once "./model/ObraController.php";

if (isset($_POST['editar'])) {
    $_SESSION['obra'] = $_POST['editar'];
    //echo $_SESSION['obra']. "soy el de la sesión linea 6";
    header("location:editarObra.php");
}

if (isset($_POST['borrar'])) {
    ObraController::delete($_POST['borrar']);
    header("Location: /listadoObras.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

<?php 
$limit = 50;
$total_pages= ObraController::calculoDeRowsPorPaginas($limit);
if(!isset($_GET['page'])){
    $page = 1;
} else {
    $page = $_GET['page'];
    
} 
explode(" ", $page);
    
    if($page==1){
        $start = ($page-1)*$limit;
    }else
    $start = ($page[0]-1)*$limit;

 
 

 $obras = ObraController::obrasPorPagina($start, $limit);
 $no = $page > 1 ? $start+1 : 1;

?>

    <div class="container-fluid">
        <?php include("includes/navbar.php"); ?>
        <main>
        <div class="d-flex justify-content-center mt-2 mb-2">
                <h2>Listado de obras actualmente disponibles</h2>
            </div>
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

            <ul class="pagination paginationLists">
                <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
        
                    <?php for($p=1; $p<=$total_pages; $p++){?>
                        
                        <li class="<?= $page == $p ? 'active' : ''; ?>"><a class="page-link" href="<?='?page='.$p;?> page-item"><?= $p; ?></a></li>
                    <?php }?>
                <li class="page-item"><a class="page-link" href="?page=<?= $total_pages; ?>">Last</a></li>
            </ul>
            



        </main>
        <div>
            <?php include("includes/footer.php"); ?>
        </div>

    </div>
</body>

</html>