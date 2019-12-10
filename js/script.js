window.onload = function() {

    axios.get('http://localhost/Viajes/api.php', {
        params: {
        }
      })
      .then(function (response) {
        console.log(response);
      })
      .catch(function (error) {
        console.log(error);
      })
      .finally(function () {
        // always executed
      }); 
      /* 
    $.ajax({
        url: 'https://randomuser.me/api/',
        dataType: 'json',
        success: function(data) {
    
            generaUsuario(data);
          
    
    
        }
      });
      */



};