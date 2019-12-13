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
            for(let i=0;i<datos.length;i++){
                let divExp=document.createElement("div");
                divExp.setAttribute("id",i+"-exp");
                divExp.innerHTML=datos[i].titol;
                contExp.appendChild(divExp);
            }
          }


      }

      controlador.init();

};