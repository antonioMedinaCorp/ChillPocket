<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
  <?php include("includes/navbar.php"); ?>

  <div class="jumbotron p-0" id="jumbo" style="background-image:url('/media/images/serie2.jpg');">
    <div class="h-100">
      <div class="position-absolute gradiente w-100 pl-5" style="bottom: 0;">

        <h1 class="text-light">Título de la película</h1>
        <p class="text-light pl-2">subtítulo se la película</p>

      </div>
    </div>
  </div>

  <div class="container" id="center">
    <h4>Sinopsis</h4>
    <p>The Umbrella Academy sigue a los miembros separados de una familia disfuncional de superhéroes, nacidos en circunstancias extrañas, llamada The Umbrella Academy — The Spaceboy, The Kraken, The Rumor, The Séance, The Boy, The Horror y White Violin—, que trabajan juntos para resolver la misteriosa muerte de su padre (the monocle) mientras se enfrentan a muchas dificultades, debido a sus personalidades y habilidades divergentes.2​ Además, deben enfrentarse a la amenaza del apocalipsis</p>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/KHucKOK-Vik" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <h4>Crítica</h4>
    <p>De entre todas las adaptaciones que iban a llegar este año en forma de serie, probablemente la de ‘The Umbrella Academy’ sea una de las que, a priori, capta más la atención. Basada en el cómic homónimo de Gerard Way, vocalista de My Chemichal Romance y Gabriel Bá, la serie llegará a Netflix el próximo 15 de febrero y en Espinof ya hemos podido ver la mitad de su primera temporada de 10 episodios.</p>
    <p>El encargado de desarrollar para televisión ‘The Umbrella Academy’ es Steve Blackman, que cuenta con unos créditos de guionista bastante eclécticos trabajando en dramas médicos como ‘Sin cita previa’, la criminal ‘Fargo’ y la ciencia ficción de ‘Altered Carbon’. Series tan distintas entre sí que no nos da una pista clara sobre lo que nos podríamos encontrar aquí.</p>
    <p>Y ver el primer episodio no ayuda a crearnos una imagen clara. Pero no nos adelantemos a los acontecimientos y hagamos una pequeña recapitulación, sin spoilers, de esta primera mitad de la temporada. La serie comienza con la muerte de Sir Reginald Hargreeves (Colm Feore), un extraño y millonario filántropo que hace 17 años presentó en sociedad la Academia Umbrella, un grupo de niños superhéroes con algo en común.</p>
    <p>Forman parte del grupo de 43 niños que nacieron en extrañas circunstancias (ninguna de sus madres estaba embarazada cuando se puso de parto) en 1989. Hargreeves se dedicó a rastrear y a comprar siete de estos niños, que resultaron tener habilidades especiales excepto Vanya (Ellen Page) que, literalmente, “no hay nada de extraordinario” en ella.</p>
    <p>Este grupo de superhéroes, una especie de X-Men en alma, se disolvió durante los años de la adolescencia, después de la desaparición de Cinco (Aidan Gallagher) y la muerte de Seis. Cada uno decidió llevar una nueva vida separado de los demás hasta que llegó el funeral de “su padre”, que reúne a tan disfuncional familia, con rencillas y rencores pendientes mientras se avecina el Apocalipsis.</p>
  </div>
  <section class="rating">
    <div class="container">
      <div class="row">
        <div class="stars col-6">
          <strong>Puntos Criticos: 4.5</strong>
          <span data-stars="num4.4">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star-half-alt" aria-hidden="true"></i>
          </span>
        </div>
        <div class="stars users col-6">
          <strong>Puntos Usuarios: 3</strong>
          <span data-stars="num4">
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="fas fa-star" aria-hidden="true"></i>
            <i class="far fa-star" aria-hidden="true"></i>
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