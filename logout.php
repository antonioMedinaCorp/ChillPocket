<?php

//logout.php

include('includes/a_config.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
setcookie(session_name(), "", time() - 3600, "/");
session_unset();
session_destroy();

//redirect page to index.php
header('location:index.php');

?>
