<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="container" id="center">
        <div class="row mt-5">
            <div class="col-sm-4">
                <div class="card games">
                    <img class="card-img-top" src="/media/images/juegoPopcorn2.jpeg" alt="" style="max-height: 400px;">
                    <div class="card-body">
                        <h4 class="card-title">Popcorn</h4>
                        <p class="card-text">¿Cúantas palomitas eres capaz de atrapar para ver tu película favorita?</p>
                        <a href="media/games/popcorn/index.html" class="btn btn-success text-light">Jugar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
            <div class="card games">
                    <img class="card-img-top" src="/media/images/juegoVirus2.jpeg" alt="" style="max-height: 400px;">
                    <div class="card-body">
                        <h4 class="card-title">Virus</h4>
                        <p class="card-text">¿Estás preparado o preparada para acabar con el virus?</p>
                        <a href="media/games/virus/virus.html" class="btn btn-success text-light">Jugar</a>
                    </div>
                </div></div>
            <div class="col-sm-4">
            <div class="card games">


                    <img class="card-img-top" src="/media/images/miniaturaLucha.png" alt="" style="max-height: 400px;">

                    <div class="card-body">
                        <h4 class="card-title">Stick Fighter</h4>
                        <p class="card-text">Frenética batalla de dos jugadores, ¿Quién ganará esta lucha?</p>
                        <a href="media/games/stickFighter/index.html" class="btn btn-success text-light">Jugar</a>
                    </div>
                </div></div>
        </div>

    </div>
    <?php include("includes/footer.php"); ?>
</body>

</html>