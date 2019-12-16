var logIn={
  log:"logOut",
  nomUsuari:"",
};

var datosInicio;
var expPorTitol;
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
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function () {
              callback;
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
            console.log(callback);
            callback();
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
                controlador.actualizaDatosExperiencias(function postActualizaDatos(){
                  console.log("HI THERE");
                  let datos=controlador.dameDatosIniciales();
                  console.log(datos);
                  view.actualizaExperiencias(datos);
                  console.log("GENERAL KENOBI");
                });
                console.log("actualizaDatosExperiencias")
              }else{
                console.log("Fallo el acceso");
              }
              //console.log(logIn.log);
            });
          }/*,
          postActualizaDatos:function(){
            window.setTimeout(function (){
              let datos=controlador.dameDatosIniciales();
              view.actualizaExperiencias(datos);
            },1000);
          }*/
          


      }
      var view={
          init:function(){
            view.eventoAccederUsuario();
            view.eventoMostrarOcultarLogIn();
            view.eventoMostrarOcultarLogOut()
          },
          creaCamposExperiencias:function(numExp){
            var contExp=document.getElementById("contExp");
            for(let i=0;i<numExp;i++){
                  let divExp=document.createElement("div");
                  divExp.setAttribute("id",i+"-exp");
                  divExp.setAttribute("class","experiencia");

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

                  /* Verifica si se pudo iniciar session * Se puede modificar para que dependiendo
                  de una cosa o otra muestre algo distinto*/    
              });

          },
          eventoMostrarOcultarLogIn:function(){
            document.getElementById("botLogIn").addEventListener("click",function(){
              
              let formLog=document.getElementById("log");
                if(formLog.style.display=="none"){
                  formLog.style.display="block";
                  document.getElementById("contExp").style.display="none";
                  document.getElementById("formRegistro").style.display="none";
                }else{
                  formLog.style.display="none";
                  document.getElementById("formRegistro").style.display="none";
                  document.getElementById("contExp").style.display="flex";
                }
              
            });
      
            document.getElementById("cross").addEventListener("click",function(){
              let formLog=document.getElementById("log");
              formLog.style.display="none";
            });
          },
          eventoMostrarOcultarLogOut:function(){
            document.getElementById("botLogUp").addEventListener("click",function(){
              
              let formRegistro=document.getElementById("formRegistro");
                if(formRegistro.style.display=="none"){
                  formRegistro.style.display="block";
                  document.getElementById("contExp").style.display="none";
                  document.getElementById("log").style.display="none";
                }else{
                  formRegistro.style.display="none";
                  document.getElementById("log").style.display="none";
                  document.getElementById("contExp").style.display="flex";
                }
              
            });
      
            document.getElementById("cross").addEventListener("click",function(){
              let formLog=document.getElementById("log");
              formLog.style.display="none";
            });
          }


      }

    //  window.setTimeout(function (){alert("Hola")},1000);
      controlador.init();
     
      

};