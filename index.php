<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VIAT-1</title>

    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/animacion.css" rel="stylesheet" media="screen"> 
    <link href="css/style.css" rel="stylesheet" media="screen" type="text/css">
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>

    <div class="container" style="background-color: #aaa">
      <!--Contenido de la página-->
      <!--clase text-center: centra el texto-->
      <div class="row">
        <img class="col-2" border="0" alt="logo" src="./img/logo/logo_transparent.png" width="150" height="100">
        <h1 class="text-center col">Viat-1 Projecte Transversal</h1>
        <!--clase lead: resalta el texto-->
      </div>
      <div class="row">
        <div class="col-10"></div>
        <!--clase btn: botón-->
        <button id="botLogIn" class="btn col-1 link buzz-out-on-hover">SingIn</button>
        <!--clase btn-primary: botón primario-->
        <button id="botLogUp" class="btn btn-primary col-1 link buzz-out-on-hover">SingUp</button>
      </div>
      <div class="row">
      <button id="botInicio" class="btn btn-primary col-2">Inicio</button>
      <button id="botMisExp" class="btn btn-primary col-2">Mis experiencias</button>
      <button id="botNewExp" class="btn btn-primary col-2">Nueva experiencia</button>
      <button id="botReport" class="btn btn-primary col-2">Reportar</button>
      <div class="col-2"></div>
    </div>
    </div>

    
    

    <!-- texto introductivo-->
    <div class="container">
      <p class="col">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    </div>

    <div class="container">
      <div class="carga animation-load"></div>
    </div>
    <!--Contenido de la página-->
    <div class="container caja">
      
        <!--Experiencias de inicio -->
      <div id="contExp" class="row contExp">
          
      </div>
      <!--login-->
      <div id="log" class="log" style="display: none;">
        <form>
        <p>Usuario:</p> <input class="barLog" id="inputLogInUsuari" type="text" name="login"> 
        <p>Contraseña:</p> <input class="barLog" id="inputLogInPwd" type="password" name="password">
        <a>Acceder como administrador</a>
        <input class="barLogBut" id="botAcceso"  type="button" value="Acceder">
        </form> 
      </div>
      <!--Registrarse-->
      <div id="formRegistro" style="display: none;">
        <div>Formulario de registro: </div>
        <form>
          <p>Usuario:</p> <input id="logUpName" type="text" name="logUpName"> 
          <p>Contraseña:</p> <input id="logUpPwd" type="password" name="logUpPwd">
          <input id="botLogUp"  type="button" value="Registrarse">
          <input id="botCancelar"  type="button" value="Cancelar">
        </form> 
      </div>
      <!--Nueva experiencia-->
      <div id="formNewExp" style="display: none;" >
        <div>Crea una nueva experiencia:</div>
        <form>
          <p>Titulo:</p> <input id="newExpTitulo" type="text"> 
          <p>Descripcion:</p> <input id="newExpDescrip" type="text">
          <p>URL(Imagen):</p> <input id="newExpImg" type="text">
          <p>URL (Maps):</p> <input id="newExpMaps" type="text">
          <p>Categoria:</p>
          <select id="newExpCat">
              <option value="Platja">Platja</option>
              <option value="Muntanya">Muntanya</option>
              <option value="Interior">Interior</option>
              <option value="Aventures">Aventures</option>
              <option value="Relax">Relax</option>
          </select>
          <select id="newExpEst">
              <option value="publicada">Publicar</option>
              <option value="esborrany">Esborrany</option>
          </select>
          <p>Estado:</p>
          <input id="botLogUp"  type="button" value="Registrarse">
          <input id="botCancelar"  type="button" value="Cancelar">
        </form> 
      </div>
      <!--Reportar spam-->
      <div id="formSpam" style="display: none;">
        <div>Reportar un spam</div>
      </div>
    </div>

    <div class="container">
      <div class="carga animation-load"></div>
    </div>

    <!-- fotter-->
    <div class="container footer">
      <div class="row">
          <div class="col-8 footer">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
              <div class="col-12 legal">
                  <a href="url">Readme</a>
                  <a>|</a>
                  <a href="url">StyleGuide</a>
              </div>
          </div>
          <div class="col-4 maps">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2993.438862338542!2d2.1038899157269384!3d41.386274704026405!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a499e386a0bfa3%3A0x241820329ee7632!2sInstitut%20Pedralbes!5e0!3m2!1sca!2ses!4v1575891763027!5m2!1sca!2ses" width="250" height="150" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
          </div>
      </div>
    <div>
    </div>
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>

    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>


    <!--Scripts del js-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>


