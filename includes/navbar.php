<?php
if (isset($_POST['logout'])) {
    session_destroy();
    
}

?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark ">
    <!-- Para introducir el logo-->
    <a class="navbar-brand" href="index.php">
        <img src="media/images/LogoSinFondoRecortado.png" alt="Logo" id="imgNav">
    </a>
    <!-- Para colapsar el menú en un botón al disminuir la pantalla en dispositivos pequeños Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Lo siguiente se mostrará colapsado en dispositivos pequeños (navbar-expand-md) -->
    <div class="navbar-collapse collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle h5" href="listaObras.php?tipo=pelicula" id="navbardrop" data-toggle="dropdown">
                    Películas</a>
<!-- 
                <div class="dropdown-menu bg-dark ">
                    <a class="dropdown-item text-light" href="listaObras.php?tipo=pelicula">Acción</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Animación</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Aventuras</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Bélico</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Comedia</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Ciencia Ficción</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Drama</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Infantil</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Terror</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Musical</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Romántica</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=pelicula">Documental</a>
                </div>
-->
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle h5" href="listaObras.php?tipo=serie" id="navbardrop" data-toggle="dropdown">
                    Series</a>

                    <!-- 
                <div class="dropdown-menu bg-dark ">
                    <a class="dropdown-item text-light" href="listaObras.php?tipo=serie">Acción</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Animación</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Aventuras</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Bélico</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Comedia</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Ciencia Ficción</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Drama</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Infantil</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Terror</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Musical</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Romántica</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=serie">Documental</a>
                </div>
                -->
            </li>

            <!-- Menú desplegable -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle h5" href="#" id="navbardrop" data-toggle="dropdown">
                    Cómics</a>

                    <!-- 
                <div class="dropdown-menu bg-dark ">
                    <a class="dropdown-item text-light" href="listaObras.php?tipo=comic">Aventuras</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Bélico</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Histórico</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Ciencia ficción</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Humor</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Superhéroes </a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Infantil</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Sobrenatural</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Serie negra</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=comic">Underground</a>
                </div>
                -->
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle h5" href="listaObras.php?tipo=libro" id="navbardrop" data-toggle="dropdown">
                    Libros</a>
                    <!-- 
                <div class="dropdown-menu bg-dark ">
                    <a class="dropdown-item text-light" href="listaObras.php?tipo=libro">Aventuras</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Biográficos</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Clásicos</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Ciencia ficción</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Poesía</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Juvenil </a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Infantil</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Terror</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Novela negra</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Romances</a>
                    <a class="dropdown-item" href="listaObras.php?tipo=libro">Viajes</a>
                </div>
                -->
            </li>
            <li>
                <a href="juegos.php" class="nav-link h5" id="navbardrop">Juegos</a>
            </li>
        </ul>
        <!--Búsqueda-->
        <div class="ml-auto">
            <!--La clase ml-auto "empuja a los demás elementos a la izquierda"-->
            <!-- <form class="form-inline" action="/action_page.php">
                    <input class="form-control m-2" type="text" placeholder="Search">
                    <button class="btn btn-success" type="submit">Buscar</button>
                    <a href="logout.php"></a>
                </form>-->
            <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == "admin"){?>
                <button class="btn btn-danger text-light" data-toggle="modal" data-target="#myModal2" ><i class="fas fa-brain"></i>&nbsp;Administrador</button>
                <?php } ?>    
            <?php //echo session_status(); 
            if (isset($_SESSION['user_email_address'])) { ?>
                 <!-- The Modal -->
                 <div class="modal fade" id="myModal2">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">¿Qué piensas hacer hoy admin?</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->

                            <div class="modal-body" id="center">
                            <button class="btn btn-outline-info"  type="submit" onclick="window.location.href='/addObra.php'">Generar obra</button>
                            <button class="btn btn-outline-warning"  type="submit" onclick="window.location.href='/listadoObras.php'">Lista de obras</button>
                            <button class="btn btn-outline-success"  type="submit" onclick="window.location.href='/listaUsuarios.php'">Lista de usuarios</button>
                            

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

                <button class="btn btn-success text-light" data-toggle="modal" data-target="#myModal">
                <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == "admin"){?>
                    <i class="fab fa-old-republic"></i>
                <?php
                } else{ ?>
                    <i class="fas fa-user-check fa-1x">
                <?php

                } ?>
                </i>&nbsp;<?php echo $_SESSION['user_first_name']?></button>

                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">¿Qué quieres hacer?</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->

                            <div class="modal-body" id="center">
                            <button class="btn btn-success text-light"  type="submit" onclick="window.location.href='/perfilUsuario.php'">Mis datos</button>
                            <button class="btn btn-success text-light"  type="submit" onclick="window.location.href='/contribuciones.php'">Contribuciones</button>
                            <button class="btn btn-primary"  type="submit" onclick="window.location.href='/logout.php'">Loguot</button>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>

            <?php } else {
            ?>
                <button class="btn btn-success text-light" type="submit" onclick="window.location.href='/login.php'">Login</button>
            <?php
            } ?>

        </div>
    </div>
</nav>




<!--
<nav class="main-nav">
  <div class="container">
    <ul>
    <li class="mobile-button"><a href="#">Menu</a></li>
    <li><a href="about.php">About Us</a></li>
    <li><a href="work.php">Work</a></li>
    <li><a href="methods.php">Methods</a></li>
    <li><a href="results.php">Results</a></li>
    <li><a href="contact.php">Contact</a></li>
  </ul>
  </div>
</nav>
-->
<!--
<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") { ?>active<?php } ?>" href="index.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "About") { ?>active<?php } ?>" href="about.php">About Us</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") { ?>active<?php } ?>" href="contact.php">Contact</a>
	  </li>
	</ul>
</div>
-->