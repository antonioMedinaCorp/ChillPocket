<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>

</head>

<body>
  <?php include("includes/navbar.php"); ?>

  <div class="jumbotron p-0" id="jumbo" style="background-image:url('/media/images/joker.jpg');">
    <div class="h-100 ">
      <div class="position-absolute gradiente w-100 pl-5" style="bottom: 0;">
        <h1 class="text-light">The Joker</h1>
        <p class="text-light pl-2">Cónoce el origen de este mítico villano</p>
      </div>
    </div>
  </div>

  <div class="container" id="center">
    <h4>Sinopsis</h4>
    <p>Arthur Fleck (Phoenix) vive en Gotham con su madre, y su única motivación en la vida es hacer reír a la gente. Actúa haciendo de payaso en pequeños trabajos, pero tiene problemas mentales que hacen que la gente le vea como un bicho raro. Su gran sueño es actuar como cómico delante del público, pero una serie de trágicos acontecimientos le hará ir incrementando su ira contra una sociedad que le ignora.</p>


    <div class="d-flex justify-content-center">
      <div id="video-container">
        <!-- Video -->
        <video id="video" width="640" height="365">

          <source src="media/Joker.mp4" type="video/mp4">
          <p>
            Your browser doesn't support HTML5 video.
            <a href="media/Joker.mp4">Download</a> the video instead.
          </p>
        </video>
        <!-- Video Controls -->
        <div id="video-controls">
          <button type="button" id="play-pause"><i class="far fa-play-circle"></i></button>
          <input type="range" id="seek-bar" value="0">
          <button type="button" id="mute"><i class="fas fa-volume-mute"></i></button>
          <input type="range" id="volume-bar" min="0" max="1" step="0.1" value="1">
          <button type="button" id="full-screen"><i class="fas fa-expand-arrows-alt"></i></button>
        </div>
      </div>
    </div>




    <h4>Crítica</h4>
    <p>Ha arrasado. No tiene rival. 'Joker' es la película del año y ha puesto de acuerdo a los espectadores del mundo, aunque la crítica se ha mostrado bastante más dividida. Mientras se acerca a los 300 millones de dólares en su primera semana, convertida ya en un fenómeno de masas, intentaré explicar las razones por las que, sinceramente, pienso que nos estamos dejando llevar por el entusiasmo.</p>
    <p>Cuando se anunció el proyecto, se vendió solo y de manera inmediata: "Martin Scorsese estará detrás de una película para adultos (eso ha sonado porno) sobre el Joker ambientada en los setenta". Wow, desde ese momento DC ya había ganado una batalla. A partir de ahí, un desfile de nombres con posibilidades de usar el blanco maquillaje del protagonista, hasta que Joaquin Phoenix se confirmó a las órdenes de Todd Phillips, el cerebro detrás de la jugada maestra.</p>
    <p>El director de la trilogía de 'Resacón en Las Vegas', 'Aquellas juergas universitarias' o 'Starsky & Hutch' (por aquello de seguir en los setenta), se marcaba un reto imposible de creer hace unos años si no tenemos en cuenta su muy tenue intento de cambiar de registro con 'Juego de armas', una película que ya intentó jugar en la liga del Scorsese más moderno, pero cuyo resultado ni siquiera se aproximó al (excelso) trabajo de Michael Bay en 'Pain & Gain', curiosamente, mucho más goodfelliana, mucho más Scorsese que la película de moda.</p>
    <p>La famosa incompatibilidad de agendas hollywoodiense impidió la participación del director de 'Taxi Driver' en la producción, pero la maniobra salió bien, y ahora no hay nadie que no mencione sus trabajos más obvios (porque en 'Joker' casi todo es bastante obvio) a la salida de la proyección de la película.</p>
  </div>
  <section class="rating">
    <div class="container">
      <div class="row">
        <div class="stars col-6">
          <strong>Puntos Criticos: 4</strong>
          <span data-stars="num4">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="far fa-star" aria-hidden="true"></i>
          </span>
        </div>
        <div class="stars users col-6">
          <strong>Puntos Usuarios: 4.5</strong>
          <span data-stars="num4">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
          </span>
        </div>
      </div>
    </div>
  </section>

  <hr width=70%>

  <section>


    <div class="container">

      <form action="" method="POST">
        <div class="row">
          <div class=" w-100 d-flex flex-column ">

            <div class="col-md-6">
              <h3>Deja tu opinión</h3>
              <textarea name="opinion" id="" cols="105" rows="10"></textarea>
            </div>
          </div>


        </div>

        <div class="row">
          <div class="d-flex flex-row "></div>
          <div class="col-md-7 ml-auto mr-4">
            <div class="stars users ">
              <strong>Puntos Usuarios: </strong>
              <span data-stars="num4">
                <i class="far fa-star" aria-hidden="true"></i>
                <i class="far fa-star" aria-hidden="true"></i>
                <i class="far fa-star" aria-hidden="true"></i>
                <i class="far fa-star" aria-hidden="true"></i>
                <i class="far fa-star" aria-hidden="true"></i>
              </span>


            </div>
            <button type="submit" name="enviar" class="btn btn-success text-light ml-5">Guardar</button>
          </div>
        </div>


      </form>
    </div>

  </section>
  <div>
    <?php include("includes/footer.php"); ?>
  </div>
  <script src="js/video.js"></script>
</body>

</html>