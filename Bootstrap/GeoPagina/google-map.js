//Declaramos las variables que vamos a user
var lat = null;
var lng = null;
var map = null;
var geocoder = null;
var marker = null;
         
jQuery(document).ready(function(){
     //obtenemos los valores en caso de tenerlos en un formulario ya guardado en la base de datos
     lat = jQuery('#lat').val();
     lng = jQuery('#long').val();
     //Asignamos al evento click del boton la funcion codeAddress
     jQuery('#pasar').click(function(){
        codeAddress();
        return false;
     });
     //Inicializamos la función de google maps una vez el DOM este cargado
    initialize();
});
     
    function initialize() {
     
      geocoder = new google.maps.Geocoder();
        
       //Si hay valores creamos un objeto Latlng
       if(lat !='' && lng != '')
      {
         var latLng = new google.maps.LatLng(lat,lng);
      }
      else
      {
        //Si no creamos el objeto con una latitud cualquiera como la de Mar del Plata, Argentina por ej
         var latLng = new google.maps.LatLng(37.0625,-95.677068);
      }
      //Definimos algunas opciones del mapa a crear
       var myOptions = {
          center: latLng,//centro del mapa
          zoom: 8,//zoom del mapa
          mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, híbrido,etc
        };
        //creamos el mapa con las opciones anteriores y le pasamos el elemento div
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         
        //creamos el marcador en el mapa
        marker = new google.maps.Marker({
            map: map,//el mapa creado en el paso anterior
            position: latLng,//objeto con latitud y longitud
            draggable: true //que el marcador se pueda arrastrar
        });
        
       //función que actualiza los input del formulario con las nuevas latitudes
       //Estos campos suelen ser hidden
        updatePosition(latLng);
         
         
    }
     
    //funcion que traduce la direccion en coordenadas
    function codeAddress() {
         
        //obtengo la direccion del formulario
        var address = document.getElementById("direccion").value;
        //hago la llamada al geodecoder
        geocoder.geocode( { 'address': address}, function(results, status) {
         
        //si el estado de la llamado es OK
        if (status == google.maps.GeocoderStatus.OK) {
            //centro el mapa en las coordenadas obtenidas
            map.setCenter(results[0].geometry.location);
            //coloco el marcador en dichas coordenadas
            marker.setPosition(results[0].geometry.location);
            //actualizo el formulario      
            updatePosition(results[0].geometry.location);
             
            //Añado un listener para cuando el markador se termine de arrastrar
            //actualize el formulario con las nuevas coordenadas
            google.maps.event.addListener(marker, 'dragend', function(){
                updatePosition(marker.getPosition());
            });
      } else {
          //si no es OK devuelvo error
          alert("No podemos encontrar la direcci&oacute;n, error: " + status);
      }
    });
  }
   
  //funcion que simplemente actualiza los campos del formulario
  function updatePosition(latLng)
  {
       
       jQuery('#lat').val(latLng.lat());
       jQuery('#long').val(latLng.lng());
   
  }