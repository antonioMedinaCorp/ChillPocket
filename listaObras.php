<?php
include("includes/a_config.php");
require_once("model/ObraController.php");

$arrayPeliculas = ObraController::findAllObrasByTipo($_GET['tipo']);
$filasTotales = ceil(count($arrayPeliculas) / 4);

$obraIndex = 0;
$linkIndex = 0;

?>



<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>

  

  <div class="container">
  <?php include("includes/navbar.php"); ?>
    <h2>
    
    <?php
      switch ($_GET['tipo']) {
        case 'pelicula':
            echo "Películas";
            break;
        case 'serie':
            echo "Series";
            break;
        case 'comic':
            echo "Comics";
            break;
        case 'libro';
          echo "Libros";
          break;
    }
    ?>
    
    </h2>

    <?php
    for ($z = 0; $z < $filasTotales; $z++) {
      if(isset($arrayPeliculas[$obraIndex])){

      
    ?>
      <div class="row mt-5">


        <div class="col-sm-12">
          <!--Carousel Wrapper-->
          <div id="multi-item-example<?php echo $linkIndex ?>" class="carousel slide carousel-multi-item" data-ride="carousel">


            <!--Slides-->
            <div class="carousel-inner" role="listbox">


              <?php
              for ($i = 0; $i < 2; $i++) {
                echo ' <div class="carousel-item ';
                if ($i == 0) {
                  echo 'active';
                }
                echo ' ">';

                for ($j = 0; $j < 4; $j++) {
                  if (isset($arrayPeliculas[$obraIndex])) {
              ?>

                    <div class="col-md-3 item" style="float:left">
                      <a href="paginaObra.php?id=<?php echo $arrayPeliculas[$obraIndex]->id ?>">

                        <div class="card text-white text-bold">
                          <img class="card-img-top img-fluid" src=<?php echo $arrayPeliculas[$obraIndex]->imagen ?> alt="">
                          <div class="card-img-overlay d-flex flex-column">
                            <div class="mt-auto">
                              <h5 class="card-title"><?php echo $arrayPeliculas[$obraIndex]->title ?></h5>
                              <p class="card-text"><?php echo $arrayPeliculas[$obraIndex]->subtitulo ?></p>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>

              <?php
                    $obraIndex++;
                  } else {
                    break;
                  }
                }



                echo '</div>';
              }
              ?>


            </div>



            <a class="carousel-control-prev" href="#multi-item-example<?php echo $linkIndex ?>" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#multi-item-example<?php echo $linkIndex ?>" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div>
        </div>

      </div>


    <?php
      $linkIndex++;
          }
    }
    ?>



    <?php include("includes/footer.php"); ?>
  </div> <!-- DIV CONTAINER -->

  

</body>

</html>