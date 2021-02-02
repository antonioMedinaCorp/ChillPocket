<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("includes/head-tag-contents.php"); ?>
</head>

<body>


    <?php include("includes/navbar.php"); ?>

    <div class="container" id="main-content">
        <main>
            <div class="jumbotron" id="jumbo" style="background-image:url('/media/images/contacto.jpeg');"> </div>
            <section class="page-section" id="contact">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 text-center">
                            <h2 class="mt-0">Contacta con nosotros</h2>
                            <hr class="divider my-4" />
                            <p class="text-muted mb-5">Si tienes algo que decirnos, puedes contactar con nosostros através por teléfono, correo electrónico o en nuestra oficina</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 ml-auto text-center mb-5 mb-lg-0">
                            <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                            <div>+34 666 666 000</div>
                        </div>
                        <div class="col-lg-6 mr-auto text-center">
                            <i class="fas fa-envelope fa-3x mb-3 text-muted"></i><!-- Make sure to change the email address in BOTH the anchor text and the link target below!--><a class="d-block" href="mailto:contact@chillpoket.com">contact@chillpoket.com</a>
                        </div>

                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <hr class="divider my-4" />
                            <p class="text-muted mb-2 mt-5">Con cita previa</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center mb-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12675.592833497994!2d-4.4696866!3d37.415880800000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd6d77336192ab19%3A0x13417153fad2ce31!2sIES%20Marqu%C3%A9s%20de%20Comares!5e0!3m2!1ses!2ses!4v1611132253539!5m2!1ses!2ses" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <?php include("includes/footer.php"); ?>

</body>

</html>