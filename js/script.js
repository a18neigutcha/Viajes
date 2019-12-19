var logIn={
  log:"logOut",
  nomUsuari:"",
};
var filtros={
  categoria:"",
  orden:""
}

var datosInicio;
var expPorTitol;
var confirmacionGuardado="";
var listaUsuario;
var expActualizar;
window.onload = function() {
      var modelo={
        init:function(){
          modelo.cargaDatosIniciales();
        },
        cargaDatosIniciales:function(){
            axios.get('api.php', {
                params: {
                  'logIn':logIn.log,
                  "tipo":"cargaDatosIniciales"
                }
            })
            .then(function (response) {
                datosInicio=response.data;
                //hideLoading();//oculta pantalla de load
                console.log("axios succes");
            })
            .catch(function (error) {
                console.log(error);
                //hideLoading();//oculta pantalla de load

                // var imagen = new Image();
                // imagen.onload = imagenCargada;
                // imagen.src = "../img/icons/ups.jpg"
            })
            .finally(function () {
              controlador.postActualizaDatos();
             // hideLoading();//oculta pantalla de load
            }); 
        },
        cargaDatosActualizados:function(){
          
          axios.get('api.php', {
              params: {
                'logIn':logIn.log,
                "tipo":"cargarDatosActualizados"
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
            controlador.postActualizaDatos();
            
          }); 
        },
        
        cargaExperienciaPorTitulo:function(titol){
              axios.get('api.php', {
                params: {
                  'titol':titol,
                  'tipo':'cargaExpTitol'
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
        logInUsuario:function(nomUsuari,pwd){
          axios.get('api.php', {
            params: {
              "nomUsuari":nomUsuari,
              "pwd":pwd,
              'tipo':'logInUsuario'
            }
          })
          .then(function (response) {
              logIn.log=response.data;
              logIn.nomUsuari=nomUsuari;
          })
          .catch(function (error) {
              console.log(error);
          })
          .finally(function () {
            controlador.postLogIn();
          }); 
        },

        listaExperienciasUsuario:function(){
          axios.get('api.php', {
            params: {
              "nomUsuari":logIn.nomUsuari,
              'tipo':'listaExpUsuario'
            }
          })
          .then(function(response){
             datosInicio=response.data;
             controlador.creaListaExpUsuario();
          })
          .catch(function (error) {
            console.log(error);
          })
          .finally(function () {
            console.log("listaExperienciasUsuario");
          }); 
        },
        insertaLaNuevaExperiencia:function(nuevaExp){
          axios.get('api.php', {
              params: {
                'nuevaExp':nuevaExp,
                'tipo':'insertaNuevaExp'
              }
          })
          .then(function (response) {
              confirmacionGuardado=response.data;
          })
          .catch(function (error) {
              console.log(error);
          })
          .finally(function () {
            controlador.postInsertaExperiencia();
              
          });
        },
        actualizaExperiencia:function(codExp,experiencia){
          axios.get('api.php', {
              params: {
                'codExp':codExp,
                'experiencia':experiencia,
                'tipo':'actualizaExperiencia'
              }
          })
          .then(function (response) {
              confirmacionGuardado=response.data;
          })
          .catch(function (error) {
              console.log(error);
          })
          .finally(function () {
            controlador.postInsertaExperiencia();
              
          });
        },
        actualizaLaValoracion:function(codExp,newVal,tipo){
          axios.get('api.php', {
            params: {
              'codExp':codExp,
              'newVal':newVal,
              'tipo':'valoracion',
              'positiva':tipo
            }
            })
            .then(function (response) {
                confirmacionGuardado=response.data;
                controlador.postActualizaValoracion();
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function () {
              
                
            });

        },
        cargaDatosPorCategoria:function(categoria){
          axios.get('api.php', {
            params: {
              'categoria':categoria,
              "tipo":"cargaDatosPorCategoria"
            }
          })
          .then(function (response) {
              datosInicio=response.data;
              console.log("axios succes");
          })
          .catch(function (error) {
              console.log(error);
            
          })
          .finally(function () {
            controlador.postActualizaDatos();
          }); 
        },
        cargaDatosOrdenados:function(orden){
          axios.get('api.php', {
            params: {
              'orden':orden,
              "tipo":"cargaDatosOrdenados"
            }
          })
          .then(function (response) {
              datosInicio=response.data;
              console.log("axios succes");
          })
          .catch(function (error) {
              console.log(error);
            
          })
          .finally(function () {
            controlador.postActualizaDatos();
          }); 
        },
        cargaDatosFiltradosYOrdenados:function(categoria,orden){
          axios.get('api.php', {
            params: {
              'categoria':categoria,
              'orden':orden,
              "tipo":"cargaDatosFiltradosYOrdenados"
            }
          })
          .then(function (response) {
              datosInicio=response.data;
              console.log("axios succes");
          })
          .catch(function (error) {
              console.log(error);
            
          })
          .finally(function () {
            controlador.postActualizaDatos();
          }); 
        },
        insertaUsuarioEnBD:function(nomUsuari,pwd){
          axios.get('api.php', {
            params: {
              'nomUsuari':nomUsuari,
              'pwd':pwd,
              "tipo":"insertaUsuarioEnBD"
            }
          })
          .then(function (response) {
              datosInicio=response.data;
              console.log("axios succes");
              if(response.data=="ok"){
                controlador.retornaALaPaginaInicial();
              }else{
                alert("El regitro fallo vuelva a intentarlo");
              }
              
          })
          .catch(function (error) {
              console.log(error);
            
          })
          .finally(function () {
            
          });
        }, 
        dameDatosExperiencia:function(codExp){
          axios.get('api.php',{
            params: {
              'codExp':codExp,
              "tipo":'datosExperiencia'
            }
          })
          .then(function(response){
            datos=response.data;
            controlador.rellenaFormularioUpd(datos[0]);

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
            modelo.logInUsuario(nomUsuari,pwd);
          },
          postLogIn:function(){
            if(logIn.log=="logIn"){
              console.log("Inicio session");
              modelo.cargaDatosIniciales();                
            }else{
              console.log("Fallo el acceso");
            }
          },
          postActualizaDatos:function(){
            let datos=controlador.dameDatosIniciales();
            view.creaCamposExperiencias(datos.length);
            view.actualizaExperiencias(datos);
            controlador.retornaALaPaginaInicial();
            console.log("Datos actualizados");
          },
          dameDatosExperiencia(codExp){
            modelo.dameDatosExperiencia(codExp);
          },
          creaListaExpUsuario:function(){
            let datos = controlador.dameDatosIniciales();
            let form = document.getElementById("formUpd8Exp");
            form.innerHTML ="Selecciona una experiencia a actualitzar:";
    
            let ul = document.createElement("ul");
            for(let i=0; i < datos.length;i++){

                let li =document.createElement("li");
                li.innerHTML=" Titol: "+datos[i].titol;
                li.addEventListener("click",(function(copia){
                  return function(){  
                      expActualizar =datos[i].codExp;                                  
                      obj=document.getElementById("contenidoExp");
                      controlador.dameDatosExperiencia(datos[i].codExp);
                  }

                })(i));
                ul.appendChild(li); 
            }
            form.appendChild(ul);
            let p =document.createElement("p");
            p.innerHTML="Volver atras";
            p.classList.add("updBack");
            p.classList.add("btn");
            p.classList.add("btn-primary");
            p.addEventListener("click",function(){
              view.ocultarTodo();
              view.mostrarPaginaPrincipal();
            });
            form.appendChild(p);
          },
          rellenaFormularioUpd(datos){
            console.log(datos);
            document.getElementById("updExpTitulo").value =datos.titol;
            document.getElementById("updExpDescrip").value =datos.text;
            document.getElementById("updExpImg").value =datos.imatge;
            document.getElementById("updExpMaps").value=datos.coordenades;
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
              
          },
          postInsertaExperiencia:function(){
            console.log(confirmacionGuardado);
            controlador.actualizaDatosExperiencias();
          },
          actualizaLaValoracion:function(codExp,newVal,tipo){
            modelo.actualizaLaValoracion(codExp,newVal,tipo);
          },
          postActualizaValoracion:function(){
            console.log("Valoracion guardada correctamente");
            modelo.cargaDatosIniciales();
          },
          filtraExperiencias:function(filtros){
            if(filtros.categoria!="" && filtros.orden!=""){
              console.log("filtra por categoria y ordena");
              modelo.cargaDatosFiltradosYOrdenados(filtros.categoria,filtros.orden);
            }else if(filtros.categoria=="" && filtros.orden!=""){
              console.log("ordena");
              modelo.cargaDatosOrdenados(filtros.orden);
            }else if(filtros.categoria!="" && filtros.orden==""){
              console.log("filtraPorCategoria");
              modelo.cargaDatosPorCategoria(filtros.categoria);
            }else{
              console.log("No hay filtros");
            }
              
          },
          dameLosFiltros:function(){
            return filtros;
          },
          registraNuevoUsuario:function(usu,pwd){
            modelo.insertaUsuarioEnBD(usu,pwd);
          },
          retornaALaPaginaInicial:function(){
            view.ocultarTodo();
            view.mostrarPaginaPrincipal();
          },
          actualizaExperiencia:function(codExp,experiencia){
            modelo.actualizaExperiencia(codExp,JSON.stringify(experiencia));
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
            view.filtraPorCategoria();
            view.ordenExperiencias();
            view.aplicarFiltros();     
            view.registrarUsuario();
            view.eventoCancelar();   
            view.actualizaExperiencia();        
          },
          creaCamposExperiencias:function(numExp){
            var contExp=document.getElementById("contExp");
            contExp.innerHTML="";
            for(let i=0;i<numExp;i++){
                  let divExp=document.createElement("li");
                  divExp.setAttribute("id",i+"-exp");
                  divExp.setAttribute("class","slide-0"+(i+1));

                    //Crea el div para el titulo de la experiencia
                    let divExpTitol=document.createElement("div");
                    divExpTitol.setAttribute("class","expTitol");
                    divExp.appendChild(divExpTitol);
                    
                    
                    if(logIn.log=="logIn"){
                      //Muestra el usuario creador de la experiencia
                      let divExpUsu=document.createElement("div");
                      divExpUsu.setAttribute("class","expUsu detalleExp");
                      divExp.appendChild(divExpUsu);
                    }

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

                    if(logIn.log=="logIn"){
                      let valExp=document.createElement("div");
                      valExp.setAttribute("class","valExp detalleExp");
  
                        //Crea un boton para dar megusta
                        let botMeGusta=document.createElement("button");
                        botMeGusta.setAttribute("class","botMeGusta");
                        botMeGusta.setAttribute("id","botMeGusta");
                        botMeGusta.innerHTML="Me gusta";
                        valExp.appendChild(botMeGusta);

                        let contMeGusta=document.createElement("div");
                        contMeGusta.setAttribute("class","contMeGusta");
                        valExp.appendChild(contMeGusta);

                        //Crea un boton para dar no megusta
                        let botNoMeGusta=document.createElement("button");
                        botNoMeGusta.setAttribute("class","botNoMeGusta");
                        botNoMeGusta.setAttribute("id","botNoMeGusta");
                        botNoMeGusta.innerHTML="No me gusta";
                        valExp.appendChild(botNoMeGusta);

                        let contNoMeGusta=document.createElement("div");
                        contNoMeGusta.setAttribute("class","contNoMeGusta");
                        valExp.appendChild(contNoMeGusta);
                        
                      divExp.appendChild(valExp);
                    }

                    
                    
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
              imgExp.src=datos[i].imatge+i;

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
              if(logIn.log=="logIn"){
                let contMeGusta=document.getElementsByClassName("contMeGusta")[i];
                contMeGusta.innerHTML=datos[i].valPos;

                let contNoMeGusta=document.getElementsByClassName("contNoMeGusta")[i];
                contNoMeGusta.innerHTML=datos[i].valNeg;
              }
            }
            //Eventos que se cargan exclusivamente cunando se accedio como usuario
            if(logIn.log=="logIn"){
              view.valoraUnaExperiencia();
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
              if(logIn.log=="logIn"){
                view.listaExperienciasUsuario();
                let formUpd=document.getElementById("Upd8Exp");
                if(formUpd.style.display=="none"){
                  view.ocultarTodo();
                  formUpd.style.display="block";
                }else{
                  view.ocultarTodo();
                  view.mostrarPaginaPrincipal();
                }
              }else alert("Necesitas iniciar sesion");
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

                controlador.actualizaDatosExperiencias();

                
              
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

          },
          actualizaExperiencia:function(){
            document.getElementById("botUpdConfirm").addEventListener("click",function(){
              let experiencia={
                titol:"",
                data:"",
                text:"",
                imatge:"",
                coordenades:"",
                valPos:0,
                valNeg:0,
                estat:"",
                usuari:logIn.nomUsuari,
                categoria:""
              };
              experiencia.titol=document.getElementById("updExpTitulo").value;
              experiencia.text=document.getElementById("updExpDescrip").value;
              experiencia.imatge=document.getElementById("updExpImg").value;
              experiencia.coordenades=document.getElementById("updExpMaps").value;
              experiencia.estat=document.getElementById("updExpEst").value;
              experiencia.categoria=document.getElementById("updExpCat").value;
              console.log(experiencia);

              controlador.actualizaExperiencia(expActualizar,experiencia);

            });

          },
          valoraUnaExperiencia:function(){
            let datos=controlador.dameDatosIniciales();
            for(let i=0;i<datos.length;i++){

              document.getElementsByClassName("botMeGusta")[i].addEventListener("click",function(){
                console.log("Evento valoracon positiva");
                let contValPos=document.getElementsByClassName("contMeGusta");
                /*Cuando haya tiempo corregir  estas linias para respetar el M-V-C*/
                contValPos[i].innerHTML=parseInt(contValPos[i].innerHTML)+1;
                controlador.actualizaLaValoracion(datos[i].codExp,contValPos[i].innerHTML,1);
              });

              document.getElementsByClassName("botNoMeGusta")[i].addEventListener("click",function(){
                console.log("Evento valoracon Negativa");
                let contValNeg=document.getElementsByClassName("contNoMeGusta");
                contValNeg[i].innerHTML=parseInt(contValNeg[i].innerHTML)+1;
                controlador.actualizaLaValoracion(datos[i].codExp,contValNeg[i].innerHTML,0);
              });

            }
            
          },
          listaExperienciasUsuario:function(){
            modelo.listaExperienciasUsuario();
          },
          filtraPorCategoria:function(){
            let categorias=document.getElementsByClassName("filtroCat");
            for(let i=0;i<categorias.length;i++){
              categorias[i].addEventListener("click",function(){
                  filtros.categoria=categorias[i].innerHTML;
                  console.log(filtros);
              });
            }
          },
          ordenExperiencias:function(){
            let ordenExp=document.getElementsByClassName("ordenExp");
            for(let i=0;i<ordenExp.length;i++){
              ordenExp[i].addEventListener("click",function(){
                  filtros.orden=ordenExp[i].innerHTML;
                  console.log(filtros);
              });
            }
          },
          aplicarFiltros:function(){
            document.getElementById("botAplicaFiltros").addEventListener("click",function (){
              if(logIn.log=="logIn"){
                let filtros=controlador.dameLosFiltros();
                console.log(filtros);
                controlador.filtraExperiencias(filtros);
              }else{
                alert("Necesitas iniciar sesion");
              }  
              
            });
            
          },
          registrarUsuario:function(){
            document.getElementById("botRegistrarse").addEventListener("click",function(){
                console.log("Evento registro usuario");
                let  nameUsu=document.getElementById("logUpName").value;
                let  pwdUsu=document.getElementById("logUpPwd").value;
                console.log(nameUsu);
                console.log(pwdUsu);
                controlador.registraNuevoUsuario(nameUsu,pwdUsu);
            });
          },
          eventoCancelar:function(){
            let botsCancelar=document.getElementsByClassName("cancelar");
            console.log(botsCancelar);
            for (let i=0;i<botsCancelar.length;i++){
              botsCancelar[i].addEventListener("click",function(){
                console.log("Pulso cancelar vuelvo al inicio");
                controlador.retornaALaPaginaInicial();
              });
            }
          }



      }

    //  window.setTimeout(function (){alert("Hola")},1000);
      controlador.init();
     
    

};