<?php include("includes/a_config.php"); ?>
<?php echo $_SESSION['obra']. " por aquí vengo"; 
require_once "./model/ObraController.php";

$saveCorretly = false;
$obra = ObraController::findByID($_SESSION['obra']);
//echo $obra->id;
//echo "<br>";

if(isset($_POST['enviar'])){

 
     if(is_uploaded_file($_FILES['foto']['tmp_name'])){
         
         $fich_unic=time()."-".$_FILES['foto']['name'];
         $ruta="./media/images/".$fich_unic;
         //para copiar el fichero en la carpeta usamos la funciçon move_uploaded_file
         move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
 
     $obra = new Obra($_SESSION['obra'],$_POST['titulo'], $_POST['subtitulo'], $_POST['sinopsis'],$_POST['critica'], $_POST['tipo'],$ruta, $ruta, $_POST['rating'], 4, $_POST['video'], $_POST['genre'], $_SESSION['id']);
     ObraController::update($obra);
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
                    Id del creador:<input type="text" class="form-control mt-2" name="id_creator" value="<?php echo $_SESSION['id'];?>" disabled>
                    Título: <input type="text" class="form-control mt-2" name="titulo"  value="<?php echo $obra->title;?>">
                    Subtítulo: <input type="text" class="form-control mt-2" name="subtitulo"  value="<?php echo $obra->subtitulo;?>">
                    Vídeo: <input type="text" class="form-control mt-2" name="video"  value="<?php echo $obra->video;?>">
                    Sinopsis: <textarea class="form-control mt-2" name="sinopsis" ><?php echo $obra->sinopsis;?></textarea>
                    <select name="tipo" class="custom-select mt-2" required>
                        <option  value="<?php echo $obra->tipo;?>"><?php echo $obra->tipo;?></option>
                        <option value="pelicula">Película</option>
                        <option value="serie">Serie</option>
                        <option value="comic">Comic</option>
                        <option value="libro">Libro</option>
                    </select>

                    <select multiple name="genre" class="custom-select mt-2" required>
                        <option  value="<?php echo $obra->genre;?>"><?php echo $obra->genre;?></option>
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
                    <input  type="file" name="foto"  value="<?php echo $obra->imagen;?>">

                    <div class="col-md-5 mt-2">
                        <h4>Puntuación:</h4>
                        <input type="number" name="rating"  value="<?php echo $obra->point_adm;?>">
                    </div>

                </div>
            </div>

            <input type="hidden" name="critica" id="quill-html">
            <div class="quill-container w-50 mx-auto  ">
                <div id="quillObra" style="height: 500px;" >
                    <?php echo $obra->$critica; ?>
                </div>
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