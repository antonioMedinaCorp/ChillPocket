<?php include("includes/a_config.php");
require_once "./model/UsuarioController.php";

if (isset($_GET["code"])) {
  //Intentará intercambiar un código por un token de autenticación válido.
  $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

  //Esta condición verificará que haya algún error durante la obtención del token de autenticación. Si no se produce ningún error, se ejecutará si el bloque de código /
  if (!isset($token['error'])) {
    //Establecer el token de acceso utilizado para las solicitudes
    $google_client->setAccessToken($token['access_token']);

    // Almacene el valor "access_token" en la variable $ _SESSION para uso futuro.
    $_SESSION['access_token'] = $token['access_token'];

    //Crea el Object of Google Service OAuth 2 class
    $google_service = new Google_Service_Oauth2($google_client);

    //Get user profile data from google
    $data = $google_service->userinfo->get();

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
}

?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head-tag-contents.php"); ?>
  <?php

  $incorrecto = false;
  $existeUsu = false;
  $mensaje = "";

  $caracteres_permitidos = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

  function generar_cadena($input, $longitud)
  {
    $input_lenght = strlen($input);
    $random_string = '';
    for ($i = 0; $i < $longitud; $i++) {
      $random_character = $input[mt_rand(0, $input_lenght - 1)];
      $random_string .= $random_character;
    }
    return $random_string;
  }





  if (isset($_POST['registrar']) && $_POST['pass'] == $_POST['pass2'] && $incorrecto == false) {
    $u = UsuarioController::findUserByUsername($_POST['email']);
    if ($u != null) {
      $existeUsu = true;
    } else {
      $existeUsu = false;
    }

    if ($existeUsu == false) {
      $u1 = new Usuario();
      $md5Pass = md5($_POST['pass']);
      $u1->newUser(0, $_POST['email'], $md5Pass, $_POST['name'], $_POST['apel1'], $_POST['apel2'], $_POST['birth'], $_POST['country'], $_POST['cod_post'], $_POST['phone'], 'usuario');
      UsuarioController::newUser($u1);
      $u1 = UsuarioController::findUserByUsername($_POST['email']);
      $_SESSION['id'] = $u1->id;
      $_SESSION['user_email_address'] = $_POST['email'];
      $_SESSION['user_first_name'] = $_POST['name'];
      header("location:index.php");
    } else {
      $mensaje = "El usuario ya existe en sistema";
    }
  }

  // || isset($_POST['actualizar'])
  if (!isset($_SESSION['captcha'])) {
    $string_lenght = 6;
    $captcha_string = generar_cadena($caracteres_permitidos, $string_lenght);
    $_SESSION['captcha'] = $captcha_string;
  }
  if (isset($_POST['code'])) {

    if ($_POST['code'] == $_SESSION['captcha']) {
      $incorrecto = false;

      echo "Captcha valido";
    } else {
      echo "Captcha incorrecto de los cojones";
      $incorrecto = true;
      session_destroy();
    }
  }


  //session_destroy();
  //session_start();



  //if (!isset($_POST['registrar']) || $captchaOK = true){
  ?>
</head>

<body class="bg-login">
  <div class="container">
    <div class="row mt-2  login-container">

      <div class="col-lg-6 col-md-12 col-sm-12 " id="fill-round-div">
        <div class="p-4">
          <div class="text-center pb-4">
            <a href="/index.php"> <img id="logo-login" src="media/images/LogoSinFondoRecortado.png"></a>

          </div>
          <div class="text-center pb-3">
            <h3 class="">Formulario de registro</h3>
          </div>
          <form class="user needs-validation" action="" method="post" novalidate>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" placeholder="Correo electrónico" required value="<?php
                                                                                                                                            if (isset($_POST["email"])) {
                                                                                                                                              echo $_POST["email"];
                                                                                                                                            } else {
                                                                                                                                              echo $data['email'];
                                                                                                                                            }
                                                                                                                                            ?>">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="pass" id="pass" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="pass2" id="pass" placeholder="Repite la contraseña" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="name" placeholder="Nombre de usuario" required value="<?php
                                                                                                                                        if (isset($_POST["name"])) {
                                                                                                                                          echo $_POST["name"];
                                                                                                                                        } else {
                                                                                                                                          $data['given_name'];
                                                                                                                                        }
                                                                                                                                        ?>">

                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="apel1" placeholder="Primer apellido" required value="<?php
                                                                                                                                        if (isset($_POST["apel1"])) {
                                                                                                                                          echo $_POST["apel1"];
                                                                                                                                        } else {
                                                                                                                                          echo  $data['family_name'];
                                                                                                                                        }
                                                                                                                                        ?>">
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="apel2" placeholder="Segundo apellido" required value="<?php
                                                                                                                                        if (isset($_POST["apel2"])) {
                                                                                                                                          echo $_POST["apel2"];
                                                                                                                                        }
                                                                                                                                        ?>">
                </div>
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" name="birth" placeholder="Fecha de nacimiento" required value="<?php
                                                                                                                                            if (isset($_POST["birth"])) {
                                                                                                                                              echo $_POST["birth"];
                                                                                                                                            }
                                                                                                                                            ?>">
                </div>
                <div class="form-group">
                  <select name="country" class="form-control" id="select" size="1" required>
                    <option value=" " selected> Selecciona un país</option>
                    <option value="AF">Afganistán</option>
                    <option value="AL">Albania</option>
                    <option value="DE">Alemania</option>
                    <option value="AD">Andorra</option>
                    <option value="AO">Angola</option>
                    <option value="AI">Anguilla</option>
                    <option value="AQ">Antártida</option>
                    <option value="AG">Antigua y Barbuda</option>
                    <option value="AN">Antillas Holandesas</option>
                    <option value="SA">Arabia Saudí</option>
                    <option value="DZ">Argelia</option>
                    <option value="AR">Argentina</option>
                    <option value="AM">Armenia</option>
                    <option value="AW">Aruba</option>
                    <option value="AU">Australia</option>
                    <option value="AT">Austria</option>
                    <option value="AZ">Azerbaiyán</option>
                    <option value="BS">Bahamas</option>
                    <option value="BH">Bahrein</option>
                    <option value="BD">Bangladesh</option>
                    <option value="BB">Barbados</option>
                    <option value="BE">Bélgica</option>
                    <option value="BZ">Belice</option>
                    <option value="BJ">Benin</option>
                    <option value="BM">Bermudas</option>
                    <option value="BY">Bielorrusia</option>
                    <option value="MM">Birmania</option>
                    <option value="BO">Bolivia</option>
                    <option value="BA">Bosnia y Herzegovina</option>
                    <option value="BW">Botswana</option>
                    <option value="BR">Brasil</option>
                    <option value="BN">Brunei</option>
                    <option value="BG">Bulgaria</option>
                    <option value="BF">Burkina Faso</option>
                    <option value="BI">Burundi</option>
                    <option value="BT">Bután</option>
                    <option value="CV">Cabo Verde</option>
                    <option value="KH">Camboya</option>
                    <option value="CM">Camerún</option>
                    <option value="CA">Canadá</option>
                    <option value="TD">Chad</option>
                    <option value="CL">Chile</option>
                    <option value="CN">China</option>
                    <option value="CY">Chipre</option>
                    <option value="VA">Ciudad del Vaticano (Santa Sede)</option>
                    <option value="CO">Colombia</option>
                    <option value="KM">Comores</option>
                    <option value="CG">Congo</option>
                    <option value="CD">Congo, República Democrática del</option>
                    <option value="KR">Corea</option>
                    <option value="KP">Corea del Norte</option>
                    <option value="CI">Costa de Marfíl</option>
                    <option value="CR">Costa Rica</option>
                    <option value="HR">Croacia (Hrvatska)</option>
                    <option value="CU">Cuba</option>
                    <option value="DK">Dinamarca</option>
                    <option value="DJ">Djibouti</option>
                    <option value="DM">Dominica</option>
                    <option value="EC">Ecuador</option>
                    <option value="EG">Egipto</option>
                    <option value="SV">El Salvador</option>
                    <option value="AE">Emiratos Árabes Unidos</option>
                    <option value="ER">Eritrea</option>
                    <option value="SI">Eslovenia</option>
                    <option value="ES">España</option>
                    <option value="US">Estados Unidos</option>
                    <option value="EE">Estonia</option>
                    <option value="ET">Etiopía</option>
                    <option value="FJ">Fiji</option>
                    <option value="PH">Filipinas</option>
                    <option value="FI">Finlandia</option>
                    <option value="FR">Francia</option>
                    <option value="GA">Gabón</option>
                    <option value="GM">Gambia</option>
                    <option value="GE">Georgia</option>
                    <option value="GH">Ghana</option>
                    <option value="GI">Gibraltar</option>
                    <option value="GD">Granada</option>
                    <option value="GR">Grecia</option>
                    <option value="GL">Groenlandia</option>
                    <option value="GP">Guadalupe</option>
                    <option value="GU">Guam</option>
                    <option value="GT">Guatemala</option>
                    <option value="GY">Guayana</option>
                    <option value="GF">Guayana Francesa</option>
                    <option value="GN">Guinea</option>
                    <option value="GQ">Guinea Ecuatorial</option>
                    <option value="GW">Guinea-Bissau</option>
                    <option value="HT">Haití</option>
                    <option value="HN">Honduras</option>
                    <option value="HU">Hungría</option>
                    <option value="IN">India</option>
                    <option value="ID">Indonesia</option>
                    <option value="IQ">Irak</option>
                    <option value="IR">Irán</option>
                    <option value="IE">Irlanda</option>
                    <option value="BV">Isla Bouvet</option>
                    <option value="CX">Isla de Christmas</option>
                    <option value="IS">Islandia</option>
                    <option value="KY">Islas Caimán</option>
                    <option value="CK">Islas Cook</option>
                    <option value="CC">Islas de Cocos o Keeling</option>
                    <option value="FO">Islas Faroe</option>
                    <option value="HM">Islas Heard y McDonald</option>
                    <option value="FK">Islas Malvinas</option>
                    <option value="MP">Islas Marianas del Norte</option>
                    <option value="MH">Islas Marshall</option>
                    <option value="UM">Islas menores de Estados Unidos</option>
                    <option value="PW">Islas Palau</option>
                    <option value="SB">Islas Salomón</option>
                    <option value="SJ">Islas Svalbard y Jan Mayen</option>
                    <option value="TK">Islas Tokelau</option>
                    <option value="TC">Islas Turks y Caicos</option>
                    <option value="VI">Islas Vírgenes (EEUU)</option>
                    <option value="VG">Islas Vírgenes (Reino Unido)</option>
                    <option value="WF">Islas Wallis y Futuna</option>
                    <option value="IL">Israel</option>
                    <option value="IT">Italia</option>
                    <option value="JM">Jamaica</option>
                    <option value="JP">Japón</option>
                    <option value="JO">Jordania</option>
                    <option value="KZ">Kazajistán</option>
                    <option value="KE">Kenia</option>
                    <option value="KG">Kirguizistán</option>
                    <option value="KI">Kiribati</option>
                    <option value="KW">Kuwait</option>
                    <option value="LA">Laos</option>
                    <option value="LS">Lesotho</option>
                    <option value="LV">Letonia</option>
                    <option value="LB">Líbano</option>
                    <option value="LR">Liberia</option>
                    <option value="LY">Libia</option>
                    <option value="LI">Liechtenstein</option>
                    <option value="LT">Lituania</option>
                    <option value="LU">Luxemburgo</option>
                    <option value="MK">Macedonia, Ex-República Yugoslava de</option>
                    <option value="MG">Madagascar</option>
                    <option value="MY">Malasia</option>
                    <option value="MW">Malawi</option>
                    <option value="MV">Maldivas</option>
                    <option value="ML">Malí</option>
                    <option value="MT">Malta</option>
                    <option value="MA">Marruecos</option>
                    <option value="MQ">Martinica</option>
                    <option value="MU">Mauricio</option>
                    <option value="MR">Mauritania</option>
                    <option value="YT">Mayotte</option>
                    <option value="MX">México</option>
                    <option value="FM">Micronesia</option>
                    <option value="MD">Moldavia</option>
                    <option value="MC">Mónaco</option>
                    <option value="MN">Mongolia</option>
                    <option value="MS">Montserrat</option>
                    <option value="MZ">Mozambique</option>
                    <option value="NA">Namibia</option>
                    <option value="NR">Nauru</option>
                    <option value="NP">Nepal</option>
                    <option value="NI">Nicaragua</option>
                    <option value="NE">Níger</option>
                    <option value="NG">Nigeria</option>
                    <option value="NU">Niue</option>
                    <option value="NF">Norfolk</option>
                    <option value="NO">Noruega</option>
                    <option value="NC">Nueva Caledonia</option>
                    <option value="NZ">Nueva Zelanda</option>
                    <option value="OM">Omán</option>
                    <option value="NL">Países Bajos</option>
                    <option value="PA">Panamá</option>
                    <option value="PG">Papúa Nueva Guinea</option>
                    <option value="PK">Paquistán</option>
                    <option value="PY">Paraguay</option>
                    <option value="PE">Perú</option>
                    <option value="PN">Pitcairn</option>
                    <option value="PF">Polinesia Francesa</option>
                    <option value="PL">Polonia</option>
                    <option value="PT">Portugal</option>
                    <option value="PR">Puerto Rico</option>
                    <option value="QA">Qatar</option>
                    <option value="UK">Reino Unido</option>
                    <option value="CF">República Centroafricana</option>
                    <option value="CZ">República Checa</option>
                    <option value="ZA">República de Sudáfrica</option>
                    <option value="DO">República Dominicana</option>
                    <option value="SK">República Eslovaca</option>
                    <option value="RE">Reunión</option>
                    <option value="RW">Ruanda</option>
                    <option value="RO">Rumania</option>
                    <option value="RU">Rusia</option>
                    <option value="EH">Sahara Occidental</option>
                    <option value="KN">Saint Kitts y Nevis</option>
                    <option value="WS">Samoa</option>
                    <option value="AS">Samoa Americana</option>
                    <option value="SM">San Marino</option>
                    <option value="VC">San Vicente y Granadinas</option>
                    <option value="SH">Santa Helena</option>
                    <option value="LC">Santa Lucía</option>
                    <option value="ST">Santo Tomé y Príncipe</option>
                    <option value="SN">Senegal</option>
                    <option value="SC">Seychelles</option>
                    <option value="SL">Sierra Leona</option>
                    <option value="SG">Singapur</option>
                    <option value="SY">Siria</option>
                    <option value="SO">Somalia</option>
                    <option value="LK">Sri Lanka</option>
                    <option value="PM">St Pierre y Miquelon</option>
                    <option value="SZ">Suazilandia</option>
                    <option value="SD">Sudán</option>
                    <option value="SE">Suecia</option>
                    <option value="CH">Suiza</option>
                    <option value="SR">Surinam</option>
                    <option value="TH">Tailandia</option>
                    <option value="TW">Taiwán</option>
                    <option value="TZ">Tanzania</option>
                    <option value="TJ">Tayikistán</option>
                    <option value="TF">Territorios franceses del Sur</option>
                    <option value="TP">Timor Oriental</option>
                    <option value="TG">Togo</option>
                    <option value="TO">Tonga</option>
                    <option value="TT">Trinidad y Tobago</option>
                    <option value="TN">Túnez</option>
                    <option value="TM">Turkmenistán</option>
                    <option value="TR">Turquía</option>
                    <option value="TV">Tuvalu</option>
                    <option value="UA">Ucrania</option>
                    <option value="UG">Uganda</option>
                    <option value="UY">Uruguay</option>
                    <option value="UZ">Uzbekistán</option>
                    <option value="VU">Vanuatu</option>
                    <option value="VE">Venezuela</option>
                    <option value="VN">Vietnam</option>
                    <option value="YE">Yemen</option>
                    <option value="YU">Yugoslavia</option>
                    <option value="ZM">Zambia</option>
                    <option value="ZW">Zimbabue</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="cod_post" placeholder="Código postal" required value="<?php
                                                                                                                                        if (isset($_POST["cod_post"])) {
                                                                                                                                          echo $_POST["cod_post"];
                                                                                                                                        }
                                                                                                                                        ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="phone" placeholder="Teléfono" required value="<?php
                                                                                                                                if (isset($_POST["phone"])) {
                                                                                                                                  echo $_POST["phone"];
                                                                                                                                }
                                                                                                                                ?>">
                </div>
              </div>
            </div>
            <div class="form-group">
              <?php if ($existeUsu) { ?>
                <p><span><?php echo $mensaje ?></span></p>
              <?php

              }  ?>
              <p>Introduce los caracteres que verás a continuación distinguiendo entre mayúsculas y minúsculas:</p>
              <p class="we text-center" style="font-size:x-large;"> <?php echo $_SESSION['captcha']; ?> </p>
              <p><input type="text" name="code" class="form-control form-control-user" required>
              <p class="we text-center"><?php if ($incorrecto == true) {
                                          echo "Captcha inocorrecto primo";
                                        } ?></p>

            </div>

            <button type="submit" name="registrar" class="btn btn-dark btn-user btn-block">
              Registrarme
            </button>
            <hr>
            <div class="text-center">
              <a class="small" href="/login.php" style="font-size: medium;">¿Ya eres usuario? Entra</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>

  <?php

  ?>

  <script>
    // Deshabilita el envío de formularios si hay campos no válidos 
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Obtengo los formularios a los que queremos agregar estilos de validación 
        var forms = document.getElementsByClassName('needs-validation');
        // Hacemos un bucle sobre los campos para evitar la presentación
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>

</body>