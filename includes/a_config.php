<?php
	// switch ($_SERVER["SCRIPT_NAME"]) {
	// 	case "/php-template/about.php":
	// 		$CURRENT_PAGE = "About"; 
	// 		$PAGE_TITLE = "About Us";
	// 		break;
	// 	case "/php-template/contact.php":
	// 		$CURRENT_PAGE = "Contact"; 
	// 		$PAGE_TITLE = "Contact Us";
	// 		break;
	// 	default:
	// 		$CURRENT_PAGE = "Index";
	// 		$PAGE_TITLE = "PuntoCrítico";
	// }

	//Include Google Client Library for PHP autoload file
require_once 'googleSign/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('256959504312-fmqin0qvikmov5vohvuv5adcnaqlqdrp.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('pI4Ib2DYhIH1ys4RsyTErrcv');

//Set the OAuth 2.0 Redirect URI
//$google_client->setRedirectUri('http://localhost/index.php');
$google_client->setRedirectUri('http://localhost/registro.php');


//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();

$login_button = '';


?>