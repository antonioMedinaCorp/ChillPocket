<?php include("includes/a_config.php");
require_once "./model/UsuarioController.php";
?>
<?php
if (isset($_POST['entrar']) && !empty($_POST['username']) && !empty($_POST['pass'])) {
  $u = UsuarioController::findUserByUsernameAndPass($_POST['username'], $_POST['pass']);

  if ($u != null) {
    $_SESSION['user_email_address'] = $u->user_name;
    $_SESSION['user_first_name'] = $u->name;
    $_SESSION['rol'] = $u-> rol;
    header("Location:index.php");
  }
}

?>


<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php");

  //This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
  if (!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    $login_button = '<a class="text-a" href="' . $google_client->createAuthUrl() . '"><div class="g-signin2" data-width="100" data-height="75" data-longtitle="true">Entra con<img src="https://img.icons8.com/clouds/100/000000/google-logo.png" class="g-signin3"/></div></a>';
  }

  ?>
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
              <input type="email" class="form-control form-control-user" name="username" id="usuOrEmail" aria-describedby="emailHelp" placeholder="Usuario o correo electr&oacute;nico" value="<?php
                  if (isset($_POST["username"])) {
                    echo $_POST["username"];
                  }
                  ?>">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" name="pass" id="pass" placeholder="Contrase&ntilde;a">
            </div>
            <span>
              <?php if (isset($_POST["username"])) {
                echo 'Usuario o mail incorrectos';
              } ?>
            </span>

            <div class="form-group"></div>

            <button type="submit" class="btn btn-dark btn-user btn-block" name="entrar" id="btnEntrar">
              Entrar
            </button>
            <button type="submit" class="btn btn-danger btn-user btn-block justify-content-center" name="entrarG" id="btnEntrar">
              <?php echo $login_button; ?>
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