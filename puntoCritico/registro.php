<?php include("includes/a_config.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
</head>

<body class="bg-login">  
            <div class="row mt-2  login-container">
             
              <div class="col-lg-4 col-md-12 col-sm-12 " id="fill-round-div">
                <div class="p-4">
                  <div class="text-center pb-4">
                   <a href="/index.php"> <img id="logo-login" src="media/images/LogoSinFondoRecortado.png"></a>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <label class="txt-register">Nombre de usuario:</label>
                      <input type="text" class="form-control form-control-user" id="usuOrEmail" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                      <label class="txt-register">Email</label>
                      <input type="email" class="form-control form-control-user" id="usuOrEmail" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                      <label class="txt-register">Contraseña</label>
                      <input type="password" class="form-control form-control-user" id="pass" >
                    </div>
                    <div class="form-group">
                      <label class="txt-register">Repite la contraseña</label>
                      <input type="password" class="form-control form-control-user" id="pass" >
                    </div>                     
                    <button type="button" class="btn btn-dark btn-user btn-block" >                      
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
        </div>

      </div>

    </div>

  </div>
</body>