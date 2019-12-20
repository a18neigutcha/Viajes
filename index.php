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
    <link href="css/fonts.css" rel="stylesheet" media="screen" type="text/css">
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--Tipografias-->
    <link href="https://fonts.googleapis.com/css?family=Girassol&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inria+Serif&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">

  </head>
  <body>


    <!--- Resto de tu HTML -->

    <div class="container" style="background-color: #8aeef5 opacity:0.6">
      <!--Contenido de la página-->
      <!--clase text-center: centra el texto-->
      <div class="row">
        <img class="col-3" border="0" alt="logo" src="./img/logo/logo_transparent.png" width="200" height="150">
        <h1 class="text-center col titulo">Viat-1 Projecte Transversal</h1>
        <!--clase lead: resalta el texto-->
      </div>
      <div class="row">
        <div class="col-10"></div>
        <!--clase btn: botón-->
        <button id="botLogIn" class="btn col-1 link buzz-out-on-hover">SignIn</button>
        <!--clase btn-primary: botón primario-->
        <button id="botLogUp" class="btn btn-primary col-1 link buzz-out-on-hover">SignUp</button>
      </div>
      <div class="container">
        <div class="row">
          <button id="botInicio" class="btn btn-primary col-2 boton">Inicio</button>
            <div class="btn-group">
              <button type="button" class="btn btn-danger colorBot boton">Experiencias</button>

              <button type="button" class="btn btn-danger dropdown-toggle colorBot"
                      data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only boton">Desplegar menú</span>
              </button>

              <ul class="dropdown-menu" role="menu">
                <li><a id="botMisExp boton" href="#">Mis experiencias</a></li>
                <li><a id="botNewExp boton" href="#">Nueva experiencia</a></li>
                <li><a id="botUpdExp boton" href="#">Actualiza una experiencia</a></li>
              </ul>
            </div>
          <!--<button id="botMisExp" class="btn btn-primary col-2">Mis experiencias</button>
          <button id="botNewExp" class="btn btn-primary col-2">Nueva experiencia</button>
          <button id="botUpdExp" class="btn btn-primary col-2">Actualiza una experiencia</button>-->
          <button id="botReport" class="btn btn-primary col-2 boton">Reportar</button>
          <div class="col-2"></div>
        </div>
      </div>

    </div>
    
    <!-- texto introductivo-->
    <div class="container">
      <p class="col introText">Aunque al principio de nuestra andadura viajera, tuvimos un par de experiencias viajando en grupos organizados a día de hoy todos nuestros viajes son por libre, organizados por nosotros y siempre, partiendo de un itinerario que parimos desde 0, basándonos principalmente en información que leemos en guías de viaje y otros blogs.</p>
    </div>

    <div class="container">
      <div class="row">
        <p class="col-1 boton">Filtrar: </p>
        <div class="btn-group">
          <button type="button" class="btn btn-danger colorBot boton">Escull una opció:</button>

          <button type="button" class="btn btn-danger dropdown-toggle colorBot"
                  data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only boton">Desplegar menú</span>
          </button>

          <ul class="dropdown-menu" role="menu">
            <li class="dropdown-item filtroCat boton">Platja</button></li>
            <li class="dropdown-item filtroCat boton">Muntanya</li>
            <li class="dropdown-item filtroCat boton">Interior</li>
            <li class="dropdown-item filtroCat boton">Aventures</li>
            <li class="dropdown-item filtroCat boton">Relax</li>
          </ul>
        </div>

        <p class="col-1">Ordenar: </p>
        <div class="btn-group">
          <button type="button" class="btn btn-danger colorBot boton">Escull una opció:</button>

          <button type="button" class="btn btn-danger dropdown-toggle colorBot"
                  data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only boton">Desplegar menú</span>
          </button>

          <ul class="dropdown-menu" role="menu">
            <li class="dropdown-item ordenExp boton">Ascendent</li>
            <li class="dropdown-item ordenExp boton">Descendent</li>
          </ul>
        </div>
        <div class="col-4">
        </div>
        <div id="botAplicaFiltros" class="btn btn-primary col-2 boton">
          Aplicar filtros
        </div>
      </div>
    </div>

    <div class="container">

    </div>

    <!--<div class="container">
      <div class="row">
        <p class="col-1">Filtrar: </p>
        <select class="col-2" name="OS">
          <option value="Categoria">Escull una opció:</option> 
          <option value="Platja">Platja</option>
          <option value="Muntanya">Muntanya</option>
          <option value="Interior">Interior</option>
          <option value="Aventures">Aventures</option>
          <option value="Relax">Relax</option>
        </select>
        <p class="col-1">Ordenar: </p>
        <select class="col-2" name="OS">
          <option value="Categoria">Escull una opció:</option> 
          <option value="Platja">Ascendent</option>
          <option value="Muntanya">Descendent</option>
        </select>
      <div>
    </div>-->

    <div class="container">
      <div class="carga animation-load"></div>
    </div>
    <!--Contenido de la página-->
    <div class="container caja">
      
      <!--Experiencias de inicio -->
      <ul id="contExp" class="row accordion">
          
      </ul>
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
                  <input class="barLogBut btn btn-primary" id="botAcceso"  type="button" value="Acceder">
                </form> 
              </div>
          </div>
        </div>
        </div>
      <!--Registrarse-->
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-8">
            <div id="formRegistro" class="log" style="display: none;">
              <div>Formulario de registro: </div>
              <form>
                <p>Usuario:</p> <input id="logUpName" type="text" name="logUpName"> 
                <p>Contraseña:</p> <input id="logUpPwd" type="password" name="logUpPwd">
                <br>
                <input id="botRegistrarse"  type="button" value="Registrarse">
                <input id="botCancelar" class="cancelar"  type="button" value="Cancelar">
              </form> 
            </div>
          </div>
        </div>
      </div>
      <!--Nueva experiencia-->
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-8">
            <div id="formNewExp" class="log" style="width:80%" style="display: none;" >
              <div>Crea una nueva experiencia:</div>
              <form>
                <p>Titulo:</p> <input id="newExpTitulo" type="text" class="logExp"> 
                <p>Descripcion:</p> <input id="newExpDescrip" type="text" class="logExp">
                <p>URL(Imagen):</p> <input id="newExpImg" type="text" class="logExp">
                <p>URL (Maps):</p> <input id="newExpMaps" type="text" class="logExp">
                <p>Categoria:</p>
                <select id="newExpCat" class="btn btn-primary">
                    <option value="Platja">Platja</option>
                    <option value="Muntanya">Muntanya</option>
                    <option value="Interior">Interior</option>
                    <option value="Aventures">Aventures</option>
                    <option value="Relax">Relax</option>
                </select>
                <p>Estado:</p>
                <select id="newExpEst" class="btn btn-primary">
                    <option value="publicada">Publicar</option><br>
                    <option value="esborrany">Esborrany</option>
                </select>
                <br>
                <br>
                <div class="container">
                  <div class="row">
                    <div class="col-8">
                        <input id="botCreaExp"  type="button" value="Registrarse" class="logExp btn btn-primary">
                      </div>
                      <div class="col-4">
                        <input id="botCancelar" class="cancelar logExp btn btn-primary"  type="button" value="Cancelar">                
                      </div>
                  </div>
                </div>
              </form> 
            </div>
          </div>
        </div>
      </div>
      <!-- Actualizar experiencia -->
      <div id="Upd8Exp" style="display: none;" >
        <div>Selecciona una experiencia a actualitzar:</div>
        <form id="formUpd8Exp">
        </form>
      </div>
      <!--Reportar spam-->
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-8">
            <div id="formSpam" style="display: none;" class="logReport">
              <div>Reportar un spam</div>
              <form>
                <textarea id="reporteExp" name="reporte" rows="10" cols="40">¿En que te puedo ayudar?</textarea>
                <br>
                
                <input id="botLogUp"  type="button" value="Reportar" class="btn btn-primary">
                <input id="botCancelar"  type="button" value="Cancelar" class="btn btn-primary">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="carga animation-load"></div>
    </div>

    <!-- fotter-->
    <div class="container footer">
      <div class="row">
          <div class="col-8 footer">
              <p class="legal">D’acord amb  l’article 17.1 de la Llei 19/2014, de 29 de desembre, de transparència, accés a la informació pública, la reutilització de la informació pública és lliure i no està subjecta a restriccions, llevat dels supòsits en què, per via reglamentària, se sotmeti a l’obtenció d’una llicència específica, per raó de la tutela d’altres drets o béns jurídics, o a la sol·licitud prèvia de l’interessat.</p>
              <div class="col-12 readme">
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


