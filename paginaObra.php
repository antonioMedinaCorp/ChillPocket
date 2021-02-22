<?php include("includes/a_config.php"); ?>
<?php

require_once 'model/ValoracionController.php';
require_once 'model/ObraController.php';

if (isset($_POST['enviar']) && !empty($_POST['quill-html'])) {

  ValoracionController::setValoracion($_SESSION['id'], $_GET['id'], $_POST['rating'], $_POST['quill-html']);
}

if (isset($_POST['borrarValoracion'])) {
  ValoracionController::delete($_POST['valoracionId']);
}


$obra = ObraController::findByID($_GET['id']);

$valoraciones = ValoracionController::findAllValoracionesByObra($obra);


?>


<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
  <?php include("includes/navbar.php"); ?>

  <div class="jumbotron p-0" id="jumbo" style="background-image:url('<?php echo $obra->imagen; ?>');">
    <div class="h-100">
      <div class="position-absolute gradiente w-100 pl-5" style="bottom: 0;">

        <h1 class="text-light"><?php echo $obra->title; ?></h1>
        <p class="text-light pl-2"><?php echo $obra->subtitulo; ?></p>

      </div>
    </div>
  </div>

  <div class="container mb-5" id="center">
    <h4>Sinopsis</h4>
    <div class="mb-2">
      <?php echo $obra->sinopsis; ?>
    </div>

    <div class="row">
      <div class="col-md-12 embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="<?php echo $obra->video; ?>" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    

    <h4>Crítica</h4>
    <div class="mt-2 mb-2">
      <?php echo $obra->critica; ?>
    </div>

    <section class="rating">

      <div class="row ">
        <div class="stars col-6">
          <strong>Puntos Criticos: <?php echo round($obra->point_adm); ?></strong>
          <span data-stars="num4.4">
            <?php
            $counterADM = 0;
            for ($i = 0; $i < $obra->point_adm; $i++) {
              echo '<i class="fas fa-star"></i>';
              $counterADM++;
            }
            for ($i = $counterADM; $i < 5; $i++) {
              echo '<i class="far fa-star"></i>';
            }
            ?>
          </span>
        </div>
        <div class="stars users col-6">
          <strong>Puntos Usuarios: <?php echo round($obra->point_avg); ?> </strong>
          <span data-stars="num4">
            <?php
            $counterAVG = 0;
            for ($i = 0; $i < $obra->point_avg; $i++) {
              echo '<i class="fas fa-star"></i>';
              $counterAVG++;
            }
            for ($i = $counterAVG; $i < 5; $i++) {
              echo '<i class="far fa-star"></i>';
            }

            ?>
          </span>
        </div>
      </div>

    </section>

    <section id="valoraciones">
    <?php
    if(!empty($valoraciones) || isset($_SESSION['id']) ){
      echo '<h4>Valoraciones</h4>';
    }
    ?>
            
      <div class="row">
        <?php
        if (!empty($valoraciones)) {
          foreach ($valoraciones as $val) {

            echo '<div class="col-md-6 pt-2 jus">';

        ?>
            <div class="card bg-light h-100 valoracion">
              <div class="card-img-top bg-dark h-25">
                <div class="card-title text-light">
                  Puntuación:
                  <?php
                  $counterVAL = 0;
                  for ($i = 0; $i < $val->point; $i++) {
                    echo '<i class="fas fa-star"></i>';
                    $counterVAL++;
                  }
                  for ($i = $counterVAL; $i < 5; $i++) {
                    echo '<i class="far fa-star"></i>';
                  }
                  ?>
                </div>
              </div>

              <div class="card-body ">
                <?php echo $val->texto ?>
                <?php

                if (isset($_SESSION['id']) && isset($_SESSION['rol'])) {
                  if ($val->id_usu == $_SESSION['id'] || $_SESSION['rol'] == 'admin') {
                ?>
                    <div class="row">
                      <div class="col-md-4 ml-auto">
                        <form action="" method="post">
                          <input type="hidden" name="valoracionId" value="<?php echo $val->id ?>">
                          <button type="submit" name="borrarValoracion" class="btn btn-danger ml-auto">Eliminar &nbsp;<i class="fas fa-trash-alt"></i></button>
                        </form>
                      </div>
                    </div>

                <?php
                  }
                }
                ?>


              </div>
            </div>
        <?php
            echo '</div>';
          }
        }
        ?>

      </div>


    </section>

    <hr width=70%>
    <!-- VALORACIONES -->
    <section>
      
      <?php if (isset($_SESSION['id'])) { ?>
        <form action="" method="POST" id="formCritica">
          <div class="row">
            <div class=" w-100 d-flex flex-row ">

              <div class="col-md-12">
                <div class="row w-75 mx-auto pl-5">
                  <div class="col-md-4">
                    <h3>Deja tu opinión</h3>
                  </div>

                  <div class="col-sm-6 ml-auto pl-5">

                    <span class="star-cb-group">
                      <input type="radio" id="rating-5" name="rating" value="5" />
                      <label for="rating-5"></i></label>
                      <input type="radio" id="rating-4" name="rating" value="4" />
                      <label for="rating-4"></label>
                      <input type="radio" id="rating-3" name="rating" value="3" />
                      <label for="rating-3"></label>
                      <input type="radio" id="rating-2" name="rating" value="2" />
                      <label for="rating-2"></label>
                      <input type="radio" id="rating-1" name="rating" value="1" class="star-cb-clear" />
                      <label for="rating-1"></label>

                    </span>
                  </div>
                </div>


                <div class="mx-auto" style="max-width: 700px;">
                  <div id="editorCriticas" style="height: 350px;">
                  </div>
                </div>
              </div>
            </div>


          </div>

          <input type="hidden" name="quill-html" id="quill-html">
          <div class="row pt-5 pb-5">
            <div class="col-md-12 ">
              <span class="h4">Enviar opinión</span>
              <button type="submit" name="enviar" class="btn btn-success text-light ml-5" onclick="submitCriticaConQuill()">Guardar</button>
            </div>
          </div>


        </form>

      <?php
      } ?>


    </section><!-- END VALORACIONES -->



  </div>


  <div  class="pt-5">
    <?php include("includes/footer.php"); ?>
  </div>
  <!-- Initialize Quill editor -->
  <!-- Main Quill library -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

  <script src="/js/quill.js"></script>
  <script>
    var quill = new Quill('#editorCriticas', {
      placeholder: 'Déjanos tu opinión',
      theme: 'snow'
    });
  </script>
</body>

</html>