<nav class="navbar navbar-expand-md bg-dark navbar-dark justify-content-center">
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
                    <a class="nav-link dropdown-toggle h5" href="peliculas.php" id="navbardrop" data-toggle="dropdown">
					Películas</a>
					<div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="peliculas.php">Acción</a>
                        <a class="dropdown-item" href="peliculas.php">Animación</a>
                        <a class="dropdown-item" href="peliculas.php">Aventuras</a>
						<a class="dropdown-item" href="peliculas.php">Bélico</a>
                        <a class="dropdown-item" href="peliculas.php">Comedia</a>
                        <a class="dropdown-item" href="peliculas.php">Ciencia Ficción</a>
						<a class="dropdown-item" href="peliculas.php">Drama</a>
                        <a class="dropdown-item" href="peliculas.php">Infantil</a>
                        <a class="dropdown-item" href="peliculas.php">Terror</a>
						<a class="dropdown-item" href="peliculas.php">Musical</a>
                        <a class="dropdown-item" href="peliculas.php">Romántica</a>
                        <a class="dropdown-item" href="peliculas.php">Documental</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle h5" href="series.php" id="navbardrop" data-toggle="dropdown">
					Series</a>
					<div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="series.php">Acción</a>
                        <a class="dropdown-item" href="series.php">Animación</a>
                        <a class="dropdown-item" href="series.php">Aventuras</a>
						<a class="dropdown-item" href="series.php">Bélico</a>
                        <a class="dropdown-item" href="series.php">Comedia</a>
                        <a class="dropdown-item" href="series.php">Ciencia Ficción</a>
						<a class="dropdown-item" href="series.php">Drama</a>
                        <a class="dropdown-item" href="series.php">Infantil</a>
                        <a class="dropdown-item" href="series.php">Terror</a>
						<a class="dropdown-item" href="series.php">Musical</a>
                        <a class="dropdown-item" href="series.php">Romántica</a>
                        <a class="dropdown-item" href="series.php">Documental</a>
                    </div>
                </li>

                <!-- Menú desplegable -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle h5" href="#" id="navbardrop" data-toggle="dropdown">
					Cómics</a>
					<div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="comics.php">Aventuras</a>
                        <a class="dropdown-item" href="comics.php">Bélico</a>
                        <a class="dropdown-item" href="comics.php">Histórico</a>
						<a class="dropdown-item" href="comics.php">Ciencia ficción</a>
                        <a class="dropdown-item" href="comics.php">Humor</a>
                        <a class="dropdown-item" href="comics.php">Superhéroes </a>
						<a class="dropdown-item" href="comics.php">Infantil</a>
                        <a class="dropdown-item" href="comics.php">Sobrenatural</a>
                        <a class="dropdown-item" href="comics.php">Serie negra</a>
						<a class="dropdown-item" href="comics.php">Underground</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle h5" href="comics.php" id="navbardrop" data-toggle="dropdown">
					Libros</a>
					<div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="libros.php">Aventuras</a>
                        <a class="dropdown-item" href="libros.php">Biográficos</a>
                        <a class="dropdown-item" href="libros.php">Clásicos</a>
						<a class="dropdown-item" href="libros.php">Ciencia ficción</a>
                        <a class="dropdown-item" href="libros.php">Poesía</a>
                        <a class="dropdown-item" href="libros.php">Juvenil </a>
						<a class="dropdown-item" href="libros.php">Infantil</a>
                        <a class="dropdown-item" href="libros.php">Terror</a>
                        <a class="dropdown-item" href="libros.php">Novela negra</a>
                        <a class="dropdown-item" href="libros.php">Romances</a>
                        <a class="dropdown-item" href="libros.php">Viajes</a>
                    </div>
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
                </form>-->                
				<button class="btn btn-success text-light" type="submit" onclick="window.location.href='/login.php'">Login</button>
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
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Index") {?>active<?php }?>" href="index.php">Home</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "About") {?>active<?php }?>" href="about.php">About Us</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link <?php if ($CURRENT_PAGE == "Contact") {?>active<?php }?>" href="contact.php">Contact</a>
	  </li>
	</ul>
</div>
-->