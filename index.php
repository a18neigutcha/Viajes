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


    <!--- Resto de tu HTML -->

    <div class="container" style="background-color: #aaa">
      <!--Contenido de la página-->
      <!--clase text-center: centra el texto-->
      <div class="row">
        <img class="col-2" border="0" alt="logo" src="./img/logo/logo_transparent.png" width="150" height="100">
        <h1 class="text-center col">Viat-1 Projecte Transversal</h1>
        <!--clase lead: resalta el texto-->
      </div>
      <!--barra de Sign-->
      <div id="barraSign" class="row">
        <div id="barraSignVacio" class="col-10"></div>
        <!--clase btn: botón-->
        <button id="botLogIn" class="btn col-1 link buzz-out-on-hover">SignIn</button>
        <!--clase btn-primary: botón primario-->
        <button id="botLogUp" class="btn btn-primary col-1 link buzz-out-on-hover">SignUp</button>
        <!--clase btn: botón-
        <button id="botLogOut" class="btn btn-primary col-1 link buzz-out-on-hover" style="display: none;">SignOut</button>
        -->
        <div id="listUsuario" class="btn-group" role="group" aria-label="Button group with nested dropdown" style="display: none;" >
          <div class="btn-group" role="group">
            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              User...
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
              <a class="dropdown-item">Perfil</a>
              <a id="botLogOut" class="dropdown-item">SignOut</a>
            </div>
          </div>
        </div>
        
      </div>
      <div class="container">
        <div class="row">
          <button id="botInicio" class="btn btn-primary col-2">Inicio</button>
            <div class="btn-group">
              <button type="button" class="btn btn-danger colorBot">Experiencias</button>

              <button type="button" class="btn btn-danger dropdown-toggle colorBot"
                      data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Desplegar menú</span>
              </button>

              <ul class="dropdown-menu" role="menu">
                <li><a id="botMisExp" href="#">Mis experiencias</a></li>
                <li><a id="botNewExp" href="#">Nueva experiencia</a></li>
                <li><a id="botUpdExp" href="#">Actualiza una experiencia</a></li>
              </ul>
            </div>
          <button id="botReport" class="btn btn-primary col-2">Reportar</button>
          <div class="col-2"></div>
        </div>
      </div>

    </div>
    
    <!-- texto introductivo-->
    <div class="container">
      <p class="col">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
    </div>

    <!--Barra de filtros -->
    <div id="barraFiltros" class="container">
          <div class="row">
            <p class="col-1">Filtrar: </p>
            <div class="btn-group">
              <button type="button" class="btn btn-danger colorBot">Escull una opció:</button>

              <button type="button" class="btn btn-danger dropdown-toggle colorBot"
                      data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Desplegar menú</span>
              </button>

              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-item filtroCat">Platja</button></li>
                <li class="dropdown-item filtroCat">Muntanya</li>
                <li class="dropdown-item filtroCat">Interior</li>
                <li class="dropdown-item filtroCat">Aventures</li>
                <li class="dropdown-item filtroCat">Relax</li>
              </ul>
            </div>

            <p class="col-1">Ordenar: </p>
            <div class="btn-group">
              <button type="button" class="btn btn-danger colorBot">Escull una opció:</button>

              <button type="button" class="btn btn-danger dropdown-toggle colorBot"
                      data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Desplegar menú</span>
              </button>

              <ul class="dropdown-menu" role="menu">
                <li class="dropdown-item ordenExp">Ascendent</li>
                <li class="dropdown-item ordenExp">Descendent</li>
              </ul>
            </div>
            <div id="botAplicaFiltros" class="btn btn-primary">
              Aplicar filtros
            </div>
            <div id="botBorraFiltros" class="btn btn-primary">
              Borrar filtros
            </div>
          </div>
    </div>

    <div class="container">

    </div>
    <div class="container">
      <div class="carga animation-load"></div>
    </div>
    <!--Contenido de la página-->
    <div class="container caja">

      
         
      <!--Experiencias de inicio -->
      <ul id="contExp" class="row accordion">
        
      </ul>
      <div id="barraAntSig" class="container">
        <div class="row">
            <div class="col-10"></div>
            <button id="botAnterior" type="button" class="btn btn-primary btn-sm col-1"><<<</button>
            <button id="botSiguiente" type="button" class="btn btn-secondary btn-sm col-1">>>></button>
        </div>
      </div>
      <!--Experiencias de inicio -->
      <ul id="misExp" class="row accordion" style="display: none;">
          <div>Carga las experiencias del usuario</div>
      </ul>
      <!--login-->
      <div class="container">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
              <div id="log" class="log" style="display: none;">
                <form>
                  <p>Usuario:</p> <input class="barLog" id="inputLogInUsuari" type="text" name="login"> 
                  <p>Contraseña:</p> <input class="barLog" id="inputLogInPwd" type="password" name="password"><br>
                  <a href="admin/index.php">Acceder como administrador</a>
                  <br>
                  <input class="barLogBut" id="botAcceso"  type="button" value="Acceder">
                </form> 
              </div>
          </div>
        </div>
        </div>
      <!--Registrarse-->
      <div id="formRegistro" style="display: none;">
        <div>Formulario de registro: </div>
        <form>
          <p>Usuario:</p> <input id="logUpName" type="text" name="logUpName"> 
          <p>Contraseña:</p> <input id="logUpPwd" type="password" name="logUpPwd">
          <br>
          <input id="botRegistrarse"  type="button" value="Registrarse">
          <input id="botCancelar" class="cancelar"  type="button" value="Cancelar">
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
          <p>Estado:</p>
          <select id="newExpEst">
              <option value="publicada">Publicar</option>
              <option value="esborrany">Esborrany</option>
          </select>
          <br>
          
          <input id="botCreaExp"  type="button" value="Registrarse">
          <input id="botCancelar" class="cancelar" type="reset" value="Cancelar">
        </form> 
      </div>
      <!-- Actualizar experiencia -->
      <div id="Upd8Exp"  class="container" style="display: none;" >
        <div class="row">
          <div id="formUpd8Exp" class="col-6">
         </div>
         <form id="contenidoExp" class="col-6">
         <p>Titulo:</p> <input id="updExpTitulo" type="text" value=""> 
          <p>Descripcion:</p> <input id="updExpDescrip" type="text" value="">
          <p>URL(Imagen):</p> <input id="updExpImg" type="text" value="">
          <p>URL (Maps):</p> <input id="updExpMaps" type="text"value="">
          <p>Categoria:</p>
          <select id="updExpCat">
              <option value="Platja">Platja</option>
              <option value="Muntanya">Muntanya</option>
              <option value="Interior">Interior</option>
              <option value="Aventures">Aventures</option>
              <option value="Relax">Relax</option>
          </select>
          <p>Estado:</p>
          <select id="updExpEst">
              <option value="publicada">Publicar</option>
              <option value="esborrany">Esborrany</option>
          </select>
          <input id="botUpdConfirm"  type="reset" value="Confirmar">
          <input id="botUpdCancelar"  type="reset" value="Cancelar">
         </form>
         </div>
      </div>
      <!--Reportar spam-->
      <div id="formSpam" style="display: none;">
        <div>Reportar un spam</div>
        <form>
          <textarea id="reporteExp" name="reporte" rows="10" cols="40">¿En que te puedo ayudar?</textarea>
          <br>
          
          <input id="botLogUp"  type="button" value="Reportar">
          <input id="botCancelar"  type="button" value="Cancelar">
        </form>
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
                  <a href="README.md">Readme</a>
                  <a>|</a>
                  <a href="doc/Guia.md">Guide</a>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>


    <!--Scripts del js-->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>


