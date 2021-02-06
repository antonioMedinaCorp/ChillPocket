<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="bg-light">

    <?php include("includes/navbar.php"); ?>




    <div class="container ">

        <form class="form-group" action="" method="post">

            <div class="row mb-2">
                <div class="col-sm-6 mt-5 mx-auto">
                    <input type="text" class="form-control mt-2" name="titulo" placeholder="Título">
                    <input type="text" class="form-control mt-2" name="subtitulo" placeholder="Subtítulo">
                    <textarea class="form-control mt-2" name="sinopsis" placeholder="Sinopsis"></textarea>
                </div>
            </div>

            <input type="hidden" name="quill-html" id="quill-html">
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