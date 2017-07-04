  <div class="jumbotron col-sm-12">
    <!-- Begin page content -->
    
      <div class="row">
        
        <div class="col-md-8">
        
          <div id="map"></div>
          <div id="directionsPanel"></div>
        </div>
        <?php echo form_open('Envio/completados_Post'); ?>
        <div class="col-md-4">
          <div id="right-panel">
            <div class="form-group">
              <label for="start" class="col-md-12 control-label">Origen</label>
              <div class="col-md-12">
                <input name="txtdirOrigen" id="start" class="form-control" type="textbox" value="Junín 2175, Corrientes, Argentina" disabled>
              </div>
            </div>
            <div class="col-md-12">
              <i>(Ctrl+Click or Cmd+Click for multiple selection)</i> 
            </div>
            
            <select multiple name="destinos[]" id="waypoints">
            <?php
                  foreach ($getAll as $row) {
              ?>     
                  <option label="<?= $row->DireccionDestino; ?>" value="<?= $row->codDetalleEnvio; ?>" selected></option>
              <?php        
              }
              ?>
            </select>
            <br>
            <div class="form-group">
                <div class="col-md-12">
                  <label for="end" class="control-label">Destino</label>
                </div>
                <div class="col-md-12">
                  <input name="txtdirOrigen" id="end" class="form-control" type="textbox" value="Junín 2175, Corrientes, Argentina" disabled >
                </div>
            </div>
            <?php
            if($this->session->userdata('logueado')
              && $this->session->userdata('rol') == 4){
              
            ?>
             <div class="col-md-6">
              <input type="submit" name="boton" class="btn btn-success" value ="Entregado">
             </div>
             <div class="col-md-6">
              <input type="submit" name="boton" class="btn btn-danger" value ="NO Entregado">
             </div>
             <?php        
              }
              ?>

             <div class="col-md-12">
              <div id="directions-panel"></div>
             </div>
              
          </div>
        </div>
        
        <?php echo form_close(); ?> 
      </div>
      
   
  </div>
 
    <!--</form>-->
</div> <!-- /container -->

<?php
    if (isset($msj)){
        echo '<script>alert("'.$msj.'");</script>';
    }

?>


    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: {lat: -27.468802, lng: -58.823392}
        });
        directionsDisplay.setMap(map);
          calculateAndDisplayRoute(directionsService, directionsDisplay);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = document.getElementById('waypoints');
        for (var i = 0; i < checkboxArray.length; i++) {
          if (checkboxArray.options[i].selected) {
            waypts.push({
              location: checkboxArray[i].label,
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
    
    <script src="<?php echo base_url('Bootstrap/assets/js/jquery-1.11.1.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/jquery.backstretch.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/scripts.js')?>"></script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-f9Nfs9Vu94eyPtllliLxwpZqUKEP1u4&callback=initMap">
    </script>
