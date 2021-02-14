<?php

include("includes/a_config.php");
require_once "./model/UsuarioController.php";


// echo $_SESSION['user_first_name'];
// echo $_SESSION['id'];


 //This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
 //if (isset($_GET["code"])) {
    //It will Attempt to exchange a code for an valid authentication token.
  //   $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //   //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
  //   if (!isset($token['error'])) {
  //     //Set the access token used for requests
  //     $google_client->setAccessToken($token['access_token']);

  //     //Store "access_token" value in $_SESSION variable for future use.
  //     $_SESSION['access_token'] = $token['access_token'];

  //     //Create Object of Google Service OAuth 2 class
  //     $google_service = new Google_Service_Oauth2($google_client);

  //     //Get user profile data from google
  //     $data = $google_service->userinfo->get();



  //       $u = UsuarioController::findUserByUsername( $data['email']);
       
      

        if ($u == null) {
			//$google_client->revokeToken();
			//session_destroy();
			//header('location:registro.php');
			//$conex->exec("INSERT INTO usuario  VALUES ('$u->id', '$u->user_name', '$u->password', '$u->name', '$u->apel1', '$u->apel2', '$u->birthdate', '$u->country', '$u->cod_postal', '$u->phone', '$u->rol')");
			$u1 = new Usuario();
			$u1 -> newUser(0, $data['email'], null, $data['given_name'], $data['family_name'], null, '1000-01-01', $data['locale'], null, null, 'usuario');
			UsuarioController::newUser($u1);
			$u1 = UsuarioController::findUserByUsername( $data['email']);
			$_SESSION['user_email_address'] = $data['email'];
			$_SESSION['user_first_name'] = $data['given_name'];
      $_SESSION['id'] = $u1->id;
		}
      else{
        $_SESSION['id'] = $u->id;

      //Below you can find Get profile data and store into $_SESSION variable
      if (!empty($data['given_name'])) {
        $_SESSION['user_first_name'] = $data['given_name'];
      }

      if (!empty($data['family_name'])) {
        $_SESSION['user_last_name'] = $data['family_name'];
      }

      if (!empty($data['email'])) {
        $_SESSION['user_email_address'] = $data['email'];
      }

      if (!empty($data['gender'])) {
        $_SESSION['user_gender'] = $data['gender'];
      }

      if (!empty($data['picture'])) {
        $_SESSION['user_image'] = $data['picture'];
      }
    }
  


  //       if ($u == null) {
	// 		//$google_client->revokeToken();
	// 		//session_destroy();
	// 		//header('location:registro.php');
	// 		//$conex->exec("INSERT INTO usuario  VALUES ('$u->id', '$u->user_name', '$u->password', '$u->name', '$u->apel1', '$u->apel2', '$u->birthdate', '$u->country', '$u->cod_postal', '$u->phone', '$u->rol')");
	// 		$u1 = new Usuario();
	// 		$u1 -> newUser(0, $data['email'], null, $data['given_name'], $data['family_name'], null, '1000-01-01', $data['locale'], null, null, 'usuario');
	// 		UsuarioController::newUser($u1);
	// 		$u1 = UsuarioController::findUserByUsername( $data['email']);
	// 		$_SESSION['user_email_address'] = $data['email'];
	// 		$_SESSION['user_first_name'] = $data['given_name'];
  //     $_SESSION['id'] = $u1->id;
      
	// 	}
  //     else{
  //       $_SESSION['id'] = $u->id;

  //     //Below you can find Get profile data and store into $_SESSION variable
  //     if (!empty($data['given_name'])) {
  //       $_SESSION['user_first_name'] = $data['given_name'];
  //     }

  //     if (!empty($data['family_name'])) {
  //       $_SESSION['user_last_name'] = $data['family_name'];
  //     }

  //     if (!empty($data['email'])) {
  //       $_SESSION['user_email_address'] = $data['email'];
  //     }

  //     if (!empty($data['gender'])) {
  //       $_SESSION['user_gender'] = $data['gender'];
  //     }

  //     if (!empty($data['picture'])) {
  //       $_SESSION['user_image'] = $data['picture'];
  //     }
  //   }
  // }
//}

?>
<!DOCTYPE html>
<html>
<head>
	<?php include("includes/head-tag-contents.php");?>
</head>
<body>
<?php include("includes/navbar.php");?>
<?php include("includes/design-top.php");?>
<main>

<section>
<?php include("includes/cookies.php") ?>
</section>

<section>
<?php include("includes/bodyDesign.php");?>
</section>



<div>
<?php include("includes/footer.php");?>
</div>



</main>



</body>
</html>