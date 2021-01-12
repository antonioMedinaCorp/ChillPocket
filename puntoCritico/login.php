
<?php 
if (isset($_POST['entrar']) && !empty($_POST['usuOrEmail']) && !empty($_POST['pass'])) {
  header("Location: index.php");
}
?>

<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="bg-login">  
      <div class="container">
            <div class="row mt-5 login-container">
             
              <div class="col-lg-4 col-md-12 col-sm-12 " id="fill-round-div">
                <div class="p-5">
                  <div class="text-center pb-4">
                   <a href="/index.php"> <img id="logo-login" src="media/images/LogoSinFondoRecortado.png"></a>
                  </div>
                  <form class="user" action="" method="POST">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="usuOrEmail" id="usuOrEmail" aria-describedby="emailHelp" placeholder="Usuario o correo electr&oacute;nico">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" id="pass" placeholder="Contrase&ntilde;a">
                    </div>                    
                    <button type="submit" class="btn btn-dark btn-user btn-block" name="entrar" id="btnEntrar">                      
                      Entrar
                    </button> 
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">¿Has olvidado tu contrase&ntilde;a?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="registro.php">¡Regístrate!</a>
                  </div>
                </div>
              </div>
            </div>
      </div>
</body>