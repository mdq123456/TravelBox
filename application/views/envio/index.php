<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Waypoints in directions</title>
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 70%;
        height: 100%;
      }
      #right-panel {
        margin: 20px;
        border-width: 2px;
        width: 20%;
        height: 400px;
        float: left;
        text-align: left;
        padding-top: 0;
      }
      #directions-panel {
        margin-top: 10px;
        background-color: #FFEE77;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <div id="right-panel">
    <div>
      <div class="form-group">
        <label for="start" class="col-md-3 control-label">Origen</label>
        <div class="col-md-9">
          <input name="txtdirOrigen" id="start" class="form-control" type="textbox" size = "25" value="Junín 2175, Corrientes, Argentina" disabled>
        </div>
      </div>
    
    <br>
    <b>Waypoints:</b> <br>
    <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> <br>
    <select multiple id="waypoints">
       <?php
            foreach ($getAll as $row) {
        ?>     
              <option value="<?= $row->DireccionDestino; ?>"><?= $row->DireccionDestino; ?></option>
        <?php        
        }
        ?>
    </select>
    <br>
    <div class="form-group">
        <label for="end" class="col-md-3 control-label">Destino</label>
        <div class="col-md-9">
          <input name="txtdirOrigen" id="end" class="form-control" type="textbox" size = "25" value="Junín 2175, Corrientes, Argentina" disabled >
        </div>
      </div>
    <br>
      <input type="submit" id="submit">
    </div>
    <div id="directions-panel"></div>
    </div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: -27.468802, lng: -58.823392}
        });
        directionsDisplay.setMap(map);

        document.getElementById('submit').addEventListener('click', function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        });
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].value,
              stopover: true
            });
          }
        }

        directionsService.route({
          origin: document.getElementById('start').value,
          destination: document.getElementById('end').value,
          waypoints: waypts,
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('directions-panel');
            var distancia = 0;
            var tiempo = 0;
            summaryPanel.innerHTML = '';
            // For each route, display summary information.
            for (var i = 0; i < route.legs.length; i++) {
              var routeSegment = i + 1;
              summaryPanel.innerHTML += '<b>Punto de entrega: ' + routeSegment +
                  '</b><br>';
              summaryPanel.innerHTML += route.legs[i].end_address + '<br><strong>Distancia: </strong>';
              summaryPanel.innerHTML += route.legs[i].distance.text + '<br><strong>Tiempo estimado de llegada: </strong>';
              summaryPanel.innerHTML += route.legs[i].duration.text + '<br><br>';
              distancia = distancia + route.legs[i].distance.value;
              tiempo = tiempo + route.legs[i].duration.value/60;

            }
            summaryPanel.innerHTML += '<strong>Calculos TOTALES:</strong><br>'
            summaryPanel.innerHTML += '<strong>Distancia Recorrido:</strong> ' + Math.trunc(distancia/1000) + ' KM <br>';
            summaryPanel.innerHTML += '<strong>Tiempo Recorrido:</strong> ' + Math.trunc(tiempo) + ' Minutos';
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-f9Nfs9Vu94eyPtllliLxwpZqUKEP1u4&callback=initMap">
    </script>
  </body>
</html>