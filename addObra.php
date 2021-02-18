<?php include("includes/a_config.php"); ?>
<?php
require_once 'model/ObraController.php';
$saveCorretly = false;
if(isset($_POST['enviar'])){
   /*echo $_POST['tipo'];

    echo $_POST['rating']."<br>";
    echo $_POST['genre']."<br>";
    echo $_POST['foto']."<br>";
    echo $_FILES;
    foreach($_FILES as $value){
        echo $value;
    }
    echo $_FILES['foto']['tmp_name']."<br>";
    echo $_FILES['foto']['name']."<br>";
    echo $_FILES['foto']."<br>";
*/
    // $string = "$_POST[title]";
    // $expr = '/(?<=\s|^)[a-z]/i';
    // preg_match_all($expr, $string, $matches);
    // $result = implode('', $matches[0]);
    // $result = strtoupper($result);

    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        //echo "Archivo ". $_FILES['foto']['name'] ." subido con éxtio.\n";
        //echo "Monstrar contenido\n";
        //readfile($_FILES['foto']['tmp_name']);
        
        $fich_unic=time()."-".$_FILES['foto']['name'];
        $ruta="./media/images/".$fich_unic;
        //para copiar el fichero en la carpeta usamos la funciçon move_uploaded_file
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

    ObraController::setObra($_POST['titulo'], $_POST['subtitulo'], $_POST['sinopsis'],$_POST['critica'], $_POST['tipo'],$ruta, $ruta, $_POST['rating'], 4, $_POST['video'], $_POST['genre'], $_SESSION['id'] );
    $saveCorretly = true;
    }else{
        echo 'ERROR al cargar la imagen';
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="bg-light">

    <?php include("includes/navbar.php"); ?>

    <div class="container ">
        <?php if($saveCorretly == true){ ?>
            <h3><span>Guardado correctamente!!</span></h3>
        <?php } ?>

        <form class="form-group" action="" method="post" enctype="multipart/form-data">

            <div class="row mb-2">
                <div class="col-sm-6 mt-5 mx-auto">
                    <input type="hidden"  name="id_creator" value="<?php echo $_SESSION['id'];?>">
                    <input type="text" class="form-control mt-2" name="titulo" placeholder="Título" required>
                    <input type="text" class="form-control mt-2" name="subtitulo" placeholder="Subtítulo" required>
                    <input type="text" class="form-control mt-2" name="video" placeholder="Enlace del trailer" required>
                    <textarea class="form-control mt-2" name="sinopsis" placeholder="Sinopsis" required></textarea>
                    <select name="tipo" class="custom-select mt-2" required>
                        <option selected disabled>Seleccione el tipo de obra</option>
                        <option value="pelicula">Película</option>
                        <option value="serie">Serie</option>
                        <option value="comic">Comic</option>
                        <option value="libro">Libro</option>
                    </select>

                    <select multiple name="genre" class="custom-select mt-2" required>
                        <option selected disabled>Seleccione el género</option>
                        <option value="accion">Acción</option>
                        <option value="animacion">Animación</option>
                        <option value="aventuras">Aventuras</option>
                        <option value="belico">Bélico</option>
                        <option value="comedia">Comedia</option>
                        <option value="ficcion">Ficción</option>
                        <option value="drama">Drama</option>
                        <option value="infantil">Infantil</option>
                        <option value="terror">Terror</option>
                        <option value="musical">Musical</option>
                        <option value="romantica">Romántica</option>
                        <option value="documental">Documental</option>
                        <option value="historico">Histórico</option>
                        <option value="humor">Humor</option>
                        <option value="sobrenatural">Sobrenatural</option>
                        <option value="negro">Serie negra</option>
                        <option value="underground">Underground</option>
                        <option value="biografia">Biografía</option>
                        <option value="clasico">Clásico</option>
                        <option value="poesia">poesía</option>
                        <option value="viajes">Viajes</option> 
                        
                    </select>

                    <label class="form-label" for="imagen">Seleccionar imagen</label>
                    <input  type="file" name="foto">

                    <div class="col-md-5 mt-2">
                        <h4>Puntuación:</h4>
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
            </div>

            <input type="hidden" name="critica" id="quill-html">
            <div class="quill-container w-50 mx-auto  ">
                <div id="quillObra" style="height: 500px;"></div>
            </div>

            <div class="row pt-5 pb-5">
                <div class="col-sm-4 mx-auto ">
                    <span class="h4">Enviar opinión</span>
                    <button type="submit" name="enviar" class="btn btn-success text-light ml-2" onclick="submitCriticaConQuill()">Guardar</button>
                </div>
            </div>

        </form>
    </div>


    <!-- Initialize Quill editor -->
    <!-- Main Quill library -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

    <script src="/js/quill.js"></script>
    <script>
        var quill = new Quill('#quillObra', {
            placeholder: 'Introduce la crítica',
            theme: 'snow'
        });
    </script>

</body>

</html>