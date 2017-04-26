
    <!-- Wrap all page content here -->
    
                
        <!-- Fixed navbar -->
<h1 align="center">Coloque destino y fecha de envio para registrar el Envio</h1>

<div class="jumbotron col-sm-10 col-sm-offset-1">
        <!-- Begin page content -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form action="<?php echo base_url('Envio/destino_Post')?>" method="post" role="form">
                    
                        <div class="form-horizontal" role="form">
                            
                            <input name="txtLat" id="latitude" class="form-control" type="hidden" value="">
                            <input name="txtLatLon" id="longitude" class="form-control" type="hidden" value="">
                            
                            <div class="form-group">
                                <label for="address" class="col-md-3 control-label">Origen</label>
                                <div class="col-md-9">
                                    <input name="txtdirOrigen" id="address" class="form-control" type="textbox" value="Junín 2175, Corrientes, Argentina" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-md-3 control-label">Destino</label>
                                <div class="col-md-9">
                                    <input name="txtdirDestino" id="addressDest" class="form-control" type="textbox" value="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="highways">Autopista</label>
                                <div class="col-md-9">
                                    <select id="highways" class="form-control">
                                        <option>Ok</option>
                                        <option>Evitar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="tolls">Peaje</label>
                                <div class="col-md-9">
                                    <select id="tolls" class="form-control">
                                        <option>Ok</option>
                                        <option>Evitar</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <!--DEFINO LA FORMA EN QUE SE HACE EL RECORRIDO Y LA FORMA DE MEDIR LA DISTANCIA-->
                                <div id="travelMode">
                                    <script>travelMode:"driving"</script>
                                </div>
                                <div id="unit"> 
                                    <script>unit:"metric"</script>
                                </div>

                                <div class="col-md-offset-3 col-md-4">
                                    <button type="button" class="btn btn-primary" onclick="directions();">Generar Ruta</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-md-3 control-label">Fecha Entrega</label>
                                <div class="col-md-9">
                                    <input name="txtFechaEntrega" id="datetimepecker" class="form-control" type="text" >
                                    
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" class="form-control" name="codEnvio" id="codEnvio" value="<?php echo $codEnvio ?>" >
                        <input type="hidden" class="form-control" name="codDetalleEnvio" id="codDetalleEnvio" value="<?php echo $codDetalleEnvio ?>" >

                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                    
                </div>
                
                <div class="col-md-8">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Seleccione un destino y genere la ruta</div>
                            <div class="panel-body">
                                <div id="map_canvas" ></div>
                        </div>
                    </div>
                
                    <div id="directionsPanel"></div>
                </div>

            </div>
        </div>
     </div>
        
  
<?php
    if (isset($msj)){
        echo '<script>alert("'.$msj.'");</script>';
    }

?>