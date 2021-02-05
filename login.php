<?php include("includes/a_config.php"); ?>
<?php 
if (isset($_POST['entrar']) && !empty($_POST['usuOrEmail']) && !empty($_POST['pass'])) {
  header("Location: index.php");
}
?>


<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); 

    //This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a class="text-a" href="'.$google_client->createAuthUrl().'"><div class="g-signin2" data-width="100" data-height="75" data-longtitle="true">Entra con<img src="https://img.icons8.com/clouds/100/000000/google-logo.png" class="g-signin3"/></div></a>';
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
                      <input type="email" class="form-control form-control-user" name="usuOrEmail" id="usuOrEmail" aria-describedby="emailHelp" placeholder="Usuario o correo electr&oacute;nico">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" id="pass" placeholder="Contrase&ntilde;a">
                    </div>                    
                    <button type="submit" class="btn btn-dark btn-user btn-block" name="entrar" id="btnEntrar">                      
                      Entrar
                    </button> 
                    <button type="submit" class="btn btn-danger btn-user btn-block justify-content-center" name="entrar" id="btnEntrar">                      
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