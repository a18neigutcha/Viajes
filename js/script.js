var logIn={
  log:"logOut",
  nomUsuari:"",
};

var datosInicio;
var expPorTitol;
var confirmacionGuardado="";
window.onload = function() {
      var modelo={
        init:function(){
          modelo.cargaDatosIniciales();
        },
        cargaDatosIniciales:function(callback){
            axios.get('api.php', {
                params: {
                  'logIn':logIn.log
                }
            })
            .then(function (response) {
                datosInicio=response.data;
                //hideLoading();//oculta pantalla de load
                console.log("axios succes")
            })
            .catch(function (error) {
                console.log(error);
                //hideLoading();//oculta pantalla de load

                var imagen = new Image();
                imagen.onload = imagenCargada;
                imagen.src = "../img/icons/ups.jpg"
            })
            .finally(function () {
              console.log("cargadatos Inicio");
             // hideLoading();//oculta pantalla de load
            }); 
        },
        cargaDatosActualizados:function(callback){
          
          axios.get('api.php', {
              params: {
                'logIn':logIn.log,
                "tipo":"cargarDatosIniciales"
              }
          })
          .then(function (response) {
              datosInicio=response.data;
              console.log("axios succes")
          })
          .catch(function (error) {
              console.log(error);
          })
          .finally(function () {
            console.log("cargadatos actualizado");
            callback();
          }); 
        },
        
        cargaExperienciaPorTitulo:function(titol){
              axios.get('api.php', {
                params: {
                  'titol':titol
                }
            })
            .then(function (response) {
                expPorTitol=response.data;
                
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function () {
                
            }); 
            
        },
        logInUsuario:function(nomUsuari,pwd,callback){
          axios.get('api.php', {
            params: {
              "nomUsuari":nomUsuari,
              "pwd":pwd
            }
          })
          .then(function (response) {
              logIn.log=response.data;
              logIn.nomUsuari=nomUsuari;
              console.log(logIn);
             
          })
          .catch(function (error) {
              console.log(error);
          })
          .finally(function () {
            console.log("login usuario");
            callback();
          }); 
        },

        listaExperienciasUsuario:function(nomUsuari,callback){
          axios.get('api.php',{
            "nomUsuari":nomUsuari,
            "tipo":"actualizar"
          })
          .then(function(response){
              datos=response.data;
          })
          .catch(function (error) {
            console.log(error);
          })
          .finally(function () {
            console.log("login usuario");
            callback();
          }); 
        },
        insertaLaNuevaExperiencia:function(nuevaExp){
          axios.get('testCategoria.php', {
              params: {
                'nuevaExp':nuevaExp
              }
          })
          .then(function (response) {
              confirmacionGuardado=response.data;
          })
          .catch(function (error) {
              console.log(error);
          })
          .finally(function () {
              
          });
        }
      }

      var controlador={
          init:function(){
            modelo.init();
            view.init();
            //SetTime puestos por que es necesario esperar un rato a que se cargen los datos
            window.setTimeout(function(){
              let datos=controlador.dameDatosIniciales();
              view.creaCamposExperiencias(datos.length);
              view.actualizaExperiencias(datos);
              
            },1000);

          },
          dameDatosIniciales:function(){
            return datosInicio;
          },
          dameExperienciaPorTitulo:function(){
            return expPorTitol;
          },
         
          actualizaDatosExperiencias:function(){
            modelo.cargaDatosIniciales();
          },
          iniciaSesion:function(){
            let nomUsuari=view.dameElnomUsuariLogIn();
            let pwd=view.dameElPwdLogIn();
            modelo.logInUsuario(nomUsuari,pwd,function postLogin(){
              if(logIn.log=="logIn"){
                console.log("Inicio session");
                modelo.cargaDatosActualizados(function postActualizaDatos(){
                  
                  let datos=controlador.dameDatosIniciales();
                  view.actualizaExperiencias(datos);
                  view.ocultarTodo();
                  view.mostrarPaginaPrincipal();
                  console.log(datos);
                });                
              }else{
                console.log("Fallo el acceso");
              }
            });
          },
          postActualizaDatos:function(){
              view.actualizaExperiencias(datos);
          },
          fechaHoy:function(){
              let hoy = new Date();
              let dd = hoy.getDate();
              let mm = hoy.getMonth()+1;
              let yyyy = hoy.getFullYear();
                  
              return yyyy+'/'+mm+'/'+dd;
          },
          crearNuevaExperiencia:function(nuevaExp){
              console.log(JSON.stringify(nuevaExp));
              modelo.insertaLaNuevaExperiencia(JSON.stringify(nuevaExp));
          }
          

      }
      var view={
          init:function(){
            view.eventoAccederUsuario();
            view.eventoMostrarOcultarLogIn();
            view.eventoMostrarOcultarLogOut();
            view.eventoMuestraCrearNuevaExperiencia();
            view.eventoMuestraPaginaInicio();
            view.eventoMuestraReportarContenido();
            view.eventoMuestraMisExperiencias();
            view.crearNuevaExperiencia();
            view.eventoMostrarActualizarExp();
          },
          creaCamposExperiencias:function(numExp){
            var contExp=document.getElementById("contExp");
            for(let i=0;i<numExp;i++){
                  let divExp=document.createElement("li");
                  divExp.setAttribute("id",i+"-exp");
                  divExp.setAttribute("class","slide-0"+(i+1));

                    //Crea el div para el titulo de la experiencia
                    let divExpTitol=document.createElement("div");
                    divExpTitol.setAttribute("class","expTitol");
                    divExp.appendChild(divExpTitol);
                    
                    //Muestra el usuario creador de la experiencia
                    let divExpUsu=document.createElement("div");
                    divExpUsu.setAttribute("class","expUsu detalleExp");
                    divExp.appendChild(divExpUsu);

                    //Crea la img de la experiencia
                    let imgExp=document.createElement("img");
                    imgExp.setAttribute("class","imgExp");
                    divExp.appendChild(imgExp);

                    //Despliege del mapa pendiente por problemas de api key

                    //Muestra las categorias de la experiencia
                    // !Pendiente ya que no puedo necesito una select con las categorias
                    // incluidas de cada experiencia!
                    // >Por cuestiones de produccion solo se pondra una categoria por experiencia
                    let catExp=document.createElement("div");
                    catExp.setAttribute("class","catExp");
                    divExp.appendChild(catExp);

                    //Crea el texto de la descripcion de la experiencia
                    let textExp=document.createElement("div");
                    textExp.setAttribute("class","textExp");
                    divExp.appendChild(textExp);

                    let valExp=document.createElement("div");
                    valExp.setAttribute("class","valExp detalleExp");

                      //Crea un boton para dar megusta
                      let botMeGusta=document.createElement("button");
                      botMeGusta.setAttribute("class","botMeGusta");
                      botMeGusta.innerHTML="Me gusta";
                      valExp.appendChild(botMeGusta);

                      //Crea un boton para dar no megusta
                      let botNoMeGusta=document.createElement("button");
                      botNoMeGusta.setAttribute("class","botNoMeGusta");
                      botNoMeGusta.innerHTML="No me gusta";
                      valExp.appendChild(botNoMeGusta);
                      
                    divExp.appendChild(valExp);

                  //divCol2.appendChild(divExp);
                contExp.appendChild(divExp);
            }
          },
          actualizaExperiencias:function(datos){
            for(let i=0;i<datos.length;i++){
              //Actualiza datos titulo
              let divExpTitol=document.getElementsByClassName("expTitol")[i];
              divExpTitol.innerHTML=datos[i].titol;
              
              if(logIn.log=="logIn"){
                //Actualiza datos nombre del usuario
                let divExpUsu=document.getElementsByClassName("expUsu detalleExp")[i];
                divExpUsu.innerHTML=datos[i].usuari;
              }
            
              //Actualiza la imagen de la experiencia
              let imgExp=document.getElementsByClassName("imgExp")[i];
              imgExp.src="img/"+datos[i].imatge;

              //Despliege del mapa pendiente por problemas de api key

              //Muestra las categorias de la experiencia
              // !Pendiente ya que no puedo necesito una select con las categorias
              // incluidas de cada experiencia!
              // >Por cuestiones de produccion solo se pondra una categoria por experiencia
              //Actualiza las categorias de la experiencia
              let catExp=document.getElementsByClassName("catExp")[i];
              catExp.innerHTML="¡PENDIENTE DE PRODUCIR!"

              //Actualiza el texto de la experiencia
              let textExp=document.getElementsByClassName("textExp")[i];
              textExp.innerHTML=datos[i].text;
            }
          },
          dameElnomUsuariLogIn:function(){
            return document.getElementById("inputLogInUsuari").value;
          },
          dameElPwdLogIn:function(){
            return document.getElementById("inputLogInPwd").value;
          },
          eventoAccederUsuario:function(){
              document.getElementById("botAcceso").addEventListener("click",function(){
                  console.log("El evento acceso se desencadeno");
                  controlador.iniciaSesion();  
              });

          },
          eventoMostrarOcultarLogIn:function(){
            document.getElementById("botLogIn").addEventListener("click",function(){
              
              let formLog=document.getElementById("log");
                if(formLog.style.display=="none"){
                  view.ocultarTodo();
                  formLog.style.display="block";
                }else{
                  view.ocultarTodo();
                  view.mostrarPaginaPrincipal();
                }
              
            });
          },
          eventoMostrarActualizarExp:function(){
            document.getElementById("botUpdExp").addEventListener("click",function(){
              let formUpd=document.getElementById("Upd8Exp");
              if(formUpd.style.display=="none"){
                view.ocultarTodo();
                formUpd.style.display="block";
              }else{
                view.ocultarTodo();
                view.mostrarPaginaPrincipal();
              }
            });
          },
          eventoMostrarOcultarLogOut:function(){
            document.getElementById("botLogUp").addEventListener("click",function(){
              let formRegistro=document.getElementById("formRegistro");
                
                if(formRegistro.style.display=="none"){
                  view.ocultarTodo();
                  formRegistro.style.display="block";
          
                }else{
                  view.ocultarTodo();
                  view.mostrarPaginaPrincipal();
                }
              
            });
          },
          eventoMuestraCrearNuevaExperiencia:function(){
            document.getElementById("botNewExp").addEventListener("click",function(){
              let formNewExp=document.getElementById("formNewExp");
                console.log("Evento new exp");
                if(logIn.log=="logIn"){
                  if(formNewExp.style.display=="none"){
                    view.ocultarTodo();
                    formNewExp.style.display="block";
            
                  }else{
                    view.ocultarTodo();
                    view.mostrarPaginaPrincipal();
                  }
                }else{
                  alert("Necesitas iniciar sesion");
                }
                  
              
            });
          },
          eventoMuestraPaginaInicio:function(){
            document.getElementById("botInicio").addEventListener("click",function(){
                console.log("Evento inicio");
                view.ocultarTodo();
                view.mostrarPaginaPrincipal();
                
              
            });
          },
          eventoMuestraReportarContenido:function(){
            document.getElementById("botReport").addEventListener("click",function(){
              let formSpam=document.getElementById("formSpam");
                console.log("Evento Reportar");
                if(logIn.log=="logIn"){
                  if(formSpam.style.display=="none"){
                    view.ocultarTodo();
                    formSpam.style.display="block";
            
                  }else{
                    view.ocultarTodo();
                    view.mostrarPaginaPrincipal();
                  }
                }else{
                  alert("Necesitas iniciar sesion");
                }
                  
              
            });
          },
          eventoMuestraMisExperiencias:function(){
            document.getElementById("botMisExp").addEventListener("click",function(){
              let misExp=document.getElementById("misExp");
                console.log("Evento mis experiencias");
                if(logIn.log=="logIn"){
                  if(misExp.style.display=="none"){
                    view.ocultarTodo();
                    misExp.style.display="block";
            
                  }else{
                    view.ocultarTodo();
                    view.mostrarPaginaPrincipal();
                  }
                }else{
                  alert("Necesitas iniciar sesion");
                }
                  
              
            });
          },
          ocultarTodo:function(){
            console.log("Oculta todo");
            document.getElementById("contExp").style.display="none";
            document.getElementById("log").style.display="none";
            document.getElementById("formRegistro").style.display="none";
            document.getElementById("formNewExp").style.display="none";
            document.getElementById("formSpam").style.display="none";
            document.getElementById("Upd8Exp").style.display="none";
          },
          mostrarPaginaPrincipal:function(){
            document.getElementById("contExp").style.display="flex";
          },
          crearNuevaExperiencia:function(){
            document.getElementById("botCreaExp").addEventListener("click",function(){
              let experiencia={
                titol:"",
                data:controlador.fechaHoy(),
                text:"",
                imatge:"",
                coordenades:"",
                valPos:0,
                valNeg:0,
                estat:"",
                usuari:logIn.nomUsuari,
                categoria:""
              };
              experiencia.titol=document.getElementById("newExpTitulo").value;
              experiencia.text=document.getElementById("newExpDescrip").value;
              experiencia.imatge=document.getElementById("newExpImg").value;
              experiencia.coordenades=document.getElementById("newExpMaps").value;
              experiencia.estat=document.getElementById("newExpEst").value;
              experiencia.categoria=document.getElementById("newExpCat").value;
              console.log(experiencia);
              controlador.crearNuevaExperiencia(experiencia);

            });

          }



      }

    //  window.setTimeout(function (){alert("Hola")},1000);
      controlador.init();
     
      

};