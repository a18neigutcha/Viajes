var datosInicio;

window.onload = function() {



      var modelo={
        init:function(){

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
        dameDatosIniciales:function(){
            return datosInicio;
        }

      }

      var controlador={
          init:function(){
            modelo.init();
            let datos=modelo.dameDatosIniciales();
            view.mostrarExperiencias(datos);
          }
          

      }

      var view={
          init:function(){
              

          },
          mostrarExperiencias:function(datos){
            var contExp=document.getElementById("contExp");
            console.log(datos);
            for(let i=0;i<datos.length;i++){
                let divExp=document.createElement("div");
                divExp.setAttribute("id",i+"-exp");
                divExp.innerHTML=datos[i].titol;
                contExp.appendChild(divExp);
            }
          },
          mostrarInfoExp:function(datoExp){
            let img=document.getElementById("imgExp");
            let nom=document.getElementById("nomExp");
            let categ=document.getElementById("catExp");

            img.src=datosExp;

          }



      }

      controlador.init();

};