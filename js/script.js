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
        

      }

      var controlador={
          init:function(){
            modelo.init();
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
          }
          


      }
      var view={
          init:function(){
              

          },
          mostrarExperiencias:function(datos){
            var contExp=document.getElementById("contExp");
            for(let i=0;i<datos.length;i++){
                let divExp=document.createElement("div");
                divExp.setAttribute("id",i+"-exp");
                divExp.innerHTML=datos[i].titol;
                contExp.appendChild(divExp);
                divExp.addEventListener("click",function(){
                  //SetTime puestos por que es necesario esperar un rato a que se cargen los datos
                  modelo.cargaExperienciaPorTitulo(divExp.innerHTML);
                  
                  window.setTimeout(function(){
                    let datosExp=controlador.dameExperienciaPorTitulo();
                    view.mostrarInfoExp(datosExp);
                  },1000);
                  
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

          }



      }
    //  window.setTimeout(function (){alert("Hola")},1000);
      controlador.init();
     
      

};