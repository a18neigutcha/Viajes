/*function muestraExperiencias(datos){
    var contExp=document.getElementById("contExp");
    console.log(contExp);
    console.log(datos);
    for(let i=0;i<datos.length;i++){
        let divExp=document.createElement("div");
        divExp.setAttribute("id",i+"-exp");
        divExp.innerHTML=datos[i].titol;
        contExp.appendChild(divExp);
        console.log(contExp);
    }

}*/

var logIn={
  log:false,
  nomUsuari:"",
  pwd:""
};

var datosInicio;
var expPorTitol;
window.onload = function() {

     /*axios.get('api.php', {
        params: {
        }
      })
      .then(function (response) {
        console.log(response);
        muestraExperiencias(response.data);
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {
        
      }); */


      var modelo={
        init:function(){

            
        },
        cargaDatosIniciales:function(){
          
            axios.get('api.php', {
                params: {
                }
            })
            .then(function (response) {
                datosInicio=response.data;
            })
            .catch(function (error) {
                console.log(error);
            })
            .finally(function () {
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
        logInUsuario:function(nomUsuari,pwd){
          axios.get('api.php', {
            params: {
              "nomUsuari":nomUsuari,
              "pwd":pwd
            }
          })
          .then(function (response) {
              logIn.log=true;
              logIn.nomUsuari=response.data[0].nomUsuari;
              logIn.pwd=response.data[0].pwd;
              
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
            modelo.cargaDatosIniciales();
            window.setTimeout(function(){
              let datos=controlador.dameDatosIniciales();
              view.mostrarExperiencias(datos);
            },1000);
          },
          dameDatosIniciales:function(){
            return datosInicio;
          },
          dameExperienciaPorTitulo:function(){
            return expPorTitol;
          },
          iniciaSesion:function(){
            let nomUsuari=view.dameElnomUsuariLogIn();
            let pwd=view.dameElPwdLogIn();
            modelo.logInUsuario(nomUsuari,pwd);
          }
          


      }
      var view={
          init:function(){
              
            view.eventoAccederUsuario();
          },
          mostrarExperiencias:function(datos){
            var contExp=document.getElementById("contExp");
            for(let i=0;i<datos.length;i++){
                let divCol2=document.createElement("div");
                divCol2.setAttribute("class","col-2");

                  //Crea el div para la experiencia
                  let divExp=document.createElement("div");
                  divExp.setAttribute("id",i+"-exp");
                  divExp.setAttribute("class","experiencia");

                    //Crea el div para el titulo de la experiencia
                    let divExpTitol=document.createElement("div");
                    divExpTitol.setAttribute("class","expTitol");
                    divExpTitol.innerHTML=datos[i].titol;
                    divExp.appendChild(divExpTitol);
                    
                    //Muestra el usuario creador de la experiencia
                    let divExpUsu=document.createElement("div");
                    divExpUsu.setAttribute("class","expUsu detalleExp");
                    divExpUsu.innerHTML=datos[i].usuari;
                    divExp.appendChild(divExpUsu);

                    //Crea la img de la experiencia
                    let imgExp=document.createElement("img");
                    imgExp.setAttribute("class","imgExp");
                    imgExp.src="img/"+datos[i].imatge;
                    divExp.appendChild(imgExp);

                    //Despliege del mapa pendiente por problemas de api key

                    //Muestra las categorias de la experiencia
                    // !Pendiente ya que no puedo necesito una select con las categorias
                    // incluidas de cada experiencia!
                    // >Por cuestiones de produccion solo se pondra una categoria por experiencia
                    let catExp=document.createElement("div");
                    catExp.setAttribute("class","catExp");
                    catExp.innerHTML="¡PENDIENTE DE PRODUCIR!"
                    divExp.appendChild(catExp);

                    //Crea el texto de la descripcion de la experiencia
                    let textExp=document.createElement("div");
                    textExp.setAttribute("class","textExp");
                    textExp.innerHTML=datos[i].text;
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

                  divCol2.appendChild(divExp);
                contExp.appendChild(divCol2);
                /*Comentado de momento hasta desplegar el hover por css*/
                // botVer.addEventListener("click",function(){
                //   //SetTime puestos por que es necesario esperar un rato a que se cargen los datos
                //   if(logIn.log==true){
                //     //!!Corregir el modelo no puede ser accedido por la view!!
                //     modelo.cargaExperienciaPorTitulo(divExpTitol.innerHTML);
                    
                //     window.setTimeout(function(){
                //       let datosExp=controlador.dameExperienciaPorTitulo();
                //       view.mostrarInfoExp(datosExp);
                //     },1000);
                //   }else{
                //     alert("Necesitas ingresar tu usuario para var mas detalles");
                //   }  
                    
                  
                // });
            }
          },
          mostrarInfoExp:function(datosExp){
            let img=document.getElementById("imgExp");
            let nom=document.getElementById("nomExp");
            let categ=document.getElementById("catExp");
            let text=document.getElementById("text");
            let valPos=document.getElementById("pos");
            let valNeg=document.getElementById("neg");
            let estat=document.getElementById("estat");
            console.log(datosExp[0]);
            img.src="img/"+datosExp[0].imatge;
            nom.innerHTML="Nombre: "+datosExp[0].titol;
            categ.innerHTML="Categoria: ";
            text.innerHTML="Descripcion: "+datosExp[0].text;
            valPos.innerHTML="Me gustas "+datosExp[0].valPos;
            valNeg.innerHTML="No me gusta "+datosExp[0].valNeg;

          },
          dameElnomUsuariLogIn:function(){
            return document.getElementById("inputLogInUsuari").value;
          },
          dameElPwdLogIn:function(){
            return document.getElementById("inputLogInPwd").value;
          },
          eventoAccederUsuario:function(){
              document.getElementById("botLogIn").addEventListener("click",function(){
                  console.log("El evento acceso se desencadeno");
                  controlador.iniciaSesion();

                  /* Verifica si se pudo iniciar session * Se puede modificar para que dependiendo
                  de una cosa o otra muestre algo distinto*/
                  window.setTimeout(function (){
                    if(logIn.log==true){
                      console.log("Inicio session");
                      console.log(logIn);
                    }else{
                      console.log("Fallo el acceso");
                    }
                  },1000);
                  
              });

          }


      }

    //  window.setTimeout(function (){alert("Hola")},1000);
      controlador.init();
     
      

};