<?php 
if(isset($_POST['registrar'])&&!empty($_POST['usu'])&&!empty($_POST['email'])&&!empty($_POST['pass'])){
  header('Location: index.php');
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
            <div class="row mt-2  login-container">
             
              <div class="col-lg-4 col-md-12 col-sm-12 " id="fill-round-div">
                <div class="p-4">
                  <div class="text-center pb-4">
                   <a href="/index.php"> <img id="logo-login" src="media/images/LogoSinFondoRecortado.png"></a>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group">                      
                      <input type="text" class="form-control form-control-user" name="usu"  placeholder="Nombre de usuario">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" placeholder="Correo electrónico" >
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" id="pass" placeholder="Contraseña" >
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="pass" id="pass" placeholder="Repite la contraseña" >
                    </div>                     
                    <button type="submit" name="registrar" class="btn btn-dark btn-user btn-block" >                      
                      Registrarme
                    </button> 
                    <hr>
                  <div class="text-center">
                    <a class="small" href="/login.php">¿Ya eres usuario? Entra</a>
                  </div>
                  </form>                  
                </div>
              </div>
            </div>
        </div>
       

  
</body>