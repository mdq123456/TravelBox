<h1 align="center">Alta de Vehiculo</h1>

<div class="jumbotron col-sm-8 col-sm-offset-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">

                <?php echo form_open('Vehiculo/create_Post'); ?>
                    <div class="form-group">
                        <label for="Label1">Patente</label>
                        <input type="text" class="form-control" name="txtPatente" id="txtPatente" aria-describedby="emailHelp" placeholder="Patente de Vehiculo">
                    </div>
                    <div class="form-group">
                        <label for="Label1">Modelo</label>
                        <input type="text" class="form-control" name="txtModelo" id="txtModelo" aria-describedby="emailHelp" placeholder="Modelo del Vehiculo">
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label1">Marca</label>
                                <input type="text" class="form-control" name="txtMarca" id="txtMarco" aria-describedby="emailHelp" placeholder="Marca del Vehiculo">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label2">Capacidad</label>
                                <input type="text" class="form-control" name="txtCapacidad" id="txtCapacidad" placeholder="Capacidad Maxima">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label3">Tipo de Vehiculo</label>
                                <select class="form-control" name="txtTipoVehiculo"  id="txtTipoVehiculo" value="<?= $row->TipoVehiculo; ?>">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" align="right">
                        <a class="btn btn-default" href="<?php echo base_url('Vehiculo/')?>" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <?php echo form_close(); ?>  
                <!--</form>-->
                
            </div>
        </div>
    </div>
</div>
<?php
    if (isset($msj)){
        echo '<script>alert("'.$msj.'");</script>';
    }

?>