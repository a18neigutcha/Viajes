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
              logIn.nomUsuari=response.data.nomUsuari;
              logIn.pwd=response.data.pwd;
              
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
            console.log("nom: "+nomUsuari);
            console.log("pwd: "+pwd);
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
                //Crea el div para la experiencia
                let divExp=document.createElement("div");
                divExp.setAttribute("id",i+"-exp");
                divExp.setAttribute("class","experiencia");

                //Crea el div para el titulo de la experiencia
                let divExpTitol=document.createElement("div");
                divExpTitol.setAttribute("class","expTitol");
                divExpTitol.innerHTML=datos[i].titol;
                divExp.appendChild(divExpTitol);

                //Crea un boton para ver mas informacion de la experiencia
                let botVer=document.createElement("div");
                botVer.setAttribute("class","botVer");
                botVer.innerHTML="Ver mas";
                divExp.appendChild(botVer);

                contExp.appendChild(divExp);
                botVer.addEventListener("click",function(){
                  //SetTime puestos por que es necesario esperar un rato a que se cargen los datos
                  if(logIn.log==true){
                    //!!Corregir el modelo no puede ser accedido por la view!!
                    modelo.cargaExperienciaPorTitulo(divExpTitol.innerHTML);
                    
                    window.setTimeout(function(){
                      let datosExp=controlador.dameExperienciaPorTitulo();
                      view.mostrarInfoExp(datosExp);
                    },1000);
                  }else{
                    alert("Necesitas ingresar tu usuario para var mas detalles");
                  }  
                    
                  
                })
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