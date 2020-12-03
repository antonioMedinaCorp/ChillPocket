<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
  <?php include("includes/navigation2.php"); ?>

  <div class="jumbotron p-0" id="jumbo" style="background-image:url('/media/images/elprincipito.jpg');  min-height: 400px;">
    <div class="h-100">
      <div class="position-absolute gradiente w-100 pl-5" style="bottom: 0;">
        <h1 class="text-light">Título de la película</h1>
        <p class="text-light pl-2">subtítulo se la película</p>

      </div>
    </div>
  </div>

  <div class="container" id="center">
    <h4>Sinopsis</h4>
    <p>Un aviador queda incomunicado en el desierto tras sufrir una avería en su avión a mil millas de cualquier región habitada. Allí se encontrará con un pequeño príncipe de cabellos de oro que afirma vivir en el asteroide B 612 (donde hay una rosa y tres volcanes) con el que no tardará en congeniar. En sus conversaciones, el principito le relatará su visión sobre la vida y la gente, de esa sabiduría que se pierde cuando las personas abandonamos la infancia.</p>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/_LyQH01rfo8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h4>Crítica</h4>
    <p>La historia de la génesis de El principito quizás sea una de mis favoritas de todos los tiempos, a la altura de la propia obra, si se me permite. Tras ser llamado a filas en 1939 y participar en varias arriesgadas misiones aéreas, Antoine de Saint-Exupéry abandona Francia una vez producida la ocupación alemana, instalándose en Estados Unidos con el firme objetivo de convencer a los norteamericanos para que entren en el conflicto mundial. El autor francés será requerido por el ejército cuatro años después, pero en ese lapso, aparte de incesantes intentos por volver al frente, Antoine escribió El principito.</p>
    <p>No se me ocurre un momento mejor (o quizás sea más preciso decir idóneo) para escribir una obra de la sensibilidad y el calado filosófico de El principito que durante una guerra. Imagino que pocos contextos deben trastocarnos tanto por dentro como una contienda de la magnitud de la Segunda Guerra Mundial. El estado emocional de aquellos que lo vivieron desde dentro se me antoja inaccesible, y quizás por ello no deja de fascinarme que de una situación tan horripilante puedan nacer historias tan hermosas como la que Saint-Exupéry cuenta en El principito.</p>
    <p>El principito es la historia de los niños y las personas grandes, del extenso mundo que nos rodea, de los pequeños mundos en los que a veces aterrizamos. Una oda a la vida, una crítica a esas cosas que tanto nos preocupan y que tanto nos limitan cuando llegamos a la edad adulta. Es el mundo visto desde los ojos de un niño, el que somos o el que fuimos, también el que siempre seremos por dentro.</p>
    <p>Un catálogo de inspiradoras frases, hermosas metáforas y surrealistas escenas en las que se suceden variados y capitales temas universales tales como la amistad, el amor, la inocencia, la responsabilidad o la relación del ser humano con la naturaleza. Una historia tan entrañable como rica en sabiduría, apta para todas las edades y que no caduca ni pasa de moda. Un clásico con todas las letras que es capaz de acariciarnos el alma.</p>
  </div>
  <section class="rating">
    <div class="container">
      <div class="row">
        <div class="stars col-6">
          <strong>Puntos Criticos: 5</strong>
          <span data-stars="num4.4">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
          </span>
        </div>
        <div class="stars users col-6">
          <strong>Puntos Usuarios: 4</strong>
          <span data-stars="num4">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="far fa-star" aria-hidden="true"></i>
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
          <div class=" w-100 d-flex flex-row ">

            <div class="col-md-11 ml-auto">
            <h3>Deja tu opinión</h3>
              <textarea name="opinion" id="" cols="100" rows="10"></textarea>
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
</body>

</html>