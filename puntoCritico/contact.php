<?php include("includes/a_config.php");?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>


<?php include("includes/navigation2.php");?>

<div class="container" id="main-content">
	<main>
	<div class="jumbotron" id="jumbo" style="background-image:url('/media/images/contacto.jpeg');"> </div>
		<section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Contacta con nosotros</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Si tienes algo que decirnos, puedes contactar con nosostros através por teléfono o correo electrónico</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>+34 666 666 000</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i
                        ><!-- Make sure to change the email address in BOTH the anchor text and the link target below!--><a class="d-block" href="mailto:contact@chillpoket.com">contact@chillpoket.com</a>
                    </div>
                </div>
            </div>
        </section>
	</main>
</div>

<?php include("includes/footer.php");?>

</body>
</html>