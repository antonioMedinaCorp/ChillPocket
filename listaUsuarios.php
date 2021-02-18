<?php include("includes/a_config.php"); 
require_once './model/UsuarioController.php';
?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

<?php 
    $limit = 5;
   $total_pages= UsuarioController::calculoDeRowsPorPaginas($limit);
    if(!isset($_GET['page'])){
        $page = 1;
    } else {
        $page = $_GET['page'];
        
    }    
     $start = ($page-1)*$limit;
       
    
    

    $usuarios = UsuarioController::usuariosPorPagina($start, $limit);
    $no = $page > 1 ? $start+1 : 1;
    

    if (isset($_POST['borrar'])) {
        UsuarioController::deleteUser($_POST['borrar']);
        header("Location: /listaUsuarios.php");
    }

 ?>
    <div class="container-fluid">
        <?php include("includes/navbar.php"); ?>

        <main>
            <div class="d-flex justify-content-center mt-2 mb-2">
                <h2>Lista de usuarios</h2>
            </div>
            
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col"></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    
                    
                    foreach ($usuarios as $usuario) { ?>
                        <tr>
                            <td><?php echo $usuario->id; ?></td>
                            <td><?php echo $usuario->user_name; ?></td>
                            <td><?php echo $usuario->name; ?></td>
                            <td><?php echo $usuario->apel1." ".$usuario->apel2; ?></td>
                            <td><?php echo $usuario->phone; ?></td>                            
                            <td><form action="" method="post"><button class="btn btn-outline-danger" type="submit" name="borrar" value="<?php echo $usuario->id;?>"> Borrar&nbsp;<i class="far fa-trash-alt"></button></form></td>
                        </tr>
                    <?php
                     $no++;
                    }                  
                    ?>
                   
                </tbody>
            </table>
            <ul class="pagination paginationLists">
                <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
        
                    <?php for($p=1; $p<=$total_pages; $p++){?>
                        
                        <li class="<?= $page == $p ? 'active' : ''; ?>"><a class="page-link" href="<?= '?page='.$p; ?>"><?= $p; ?></a></li>
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