<nav class="navbar navbar-expand-md bg-dark navbar-dark justify-content-center">
        <!-- Para introducir el logo-->
        <a class="navbar-brand" href="#">
            <img src="media/LogoSinFondo.png" alt="Logo" id="imgNav">
        </a>
        <!-- Para colapsar el menú en un botón al disminuir la pantalla en dispositivos pequeños Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Lo siguiente se mostrará colapsado en dispositivos pequeños (navbar-expand-md) -->
        <div class="navbar-collapse collapse " id="collapsingNavbar">
            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Películas</a>
					<div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="#">Acción</a>
                        <a class="dropdown-item" href="#">Animación</a>
                        <a class="dropdown-item" href="#">Aventuras</a>
						<a class="dropdown-item" href="#">Bélico</a>
                        <a class="dropdown-item" href="#">Comedia</a>
                        <a class="dropdown-item" href="#">Ciencia Ficción</a>
						<a class="dropdown-item" href="#">Drama</a>
                        <a class="dropdown-item" href="#">Infantil</a>
                        <a class="dropdown-item" href="#">Terror</a>
						<a class="dropdown-item" href="#">Musical</a>
                        <a class="dropdown-item" href="#">Romántica</a>
                        <a class="dropdown-item" href="#">Documental</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Series</a>
					<div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="#">Acción</a>
                        <a class="dropdown-item" href="#">Animación</a>
                        <a class="dropdown-item" href="#">Aventuras</a>
						<a class="dropdown-item" href="#">Bélico</a>
                        <a class="dropdown-item" href="#">Comedia</a>
                        <a class="dropdown-item" href="#">Ciencia Ficción</a>
						<a class="dropdown-item" href="#">Drama</a>
                        <a class="dropdown-item" href="#">Infantil</a>
                        <a class="dropdown-item" href="#">Terror</a>
						<a class="dropdown-item" href="#">Musical</a>
                        <a class="dropdown-item" href="#">Romántica</a>
                        <a class="dropdown-item" href="#">Documental</a>
                    </div>
                </li>

                <!-- Menú desplegable -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Libros</a>
					<div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="#">Aventuras</a>
                        <a class="dropdown-item" href="#">Bélico</a>
                        <a class="dropdown-item" href="#">Histórico</a>
						<a class="dropdown-item" href="#">Ciencia ficción</a>
                        <a class="dropdown-item" href="#">Humor</a>
                        <a class="dropdown-item" href="#">Superhéroes </a>
						<a class="dropdown-item" href="#">Infantil</a>
                        <a class="dropdown-item" href="#">Sobrenatural</a>
                        <a class="dropdown-item" href="#">Novela negra</a>
						<a class="dropdown-item" href="#">Underground</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Quienes somos</a>
					<div class="dropdown-menu bg-dark ">
                        <a class="dropdown-item text-light" href="#">Presentación</a>
                        <a class="dropdown-item" href="#">Condiciones</a>
                    </div>
                </li>
            </ul>
            <!--Búsqueda-->
            <div class="ml-auto">
                <!--La clase ml-auto "empuja a los demás elementos a la izquierda"-->
				<!-- <form class="form-inline" action="/action_page.php">
                    <input class="form-control m-2" type="text" placeholder="Search">
                    <button class="btn btn-success" type="submit">Buscar</button>
                </form>-->
				<button class="btn btn-success text-light" type="submit">Login</button>
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