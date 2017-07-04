<h1 align="center">Modificacion de Vehiculo</h1>

<div class="jumbotron col-sm-8 col-sm-offset-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">

                <?php echo form_open('Vehiculo/editar_Post'); ?>
                <?php 
                    $row = $getOne[0];
                    ?>
                    <div class="form-group">
                        <label for="Label1">Patente</label>
                        <input type="text" class="form-control" name="txtPatente" id="txtPatente" aria-describedby="emailHelp" value="<?= $row->Patente; ?>">
                    </div>
                    <div class="form-group">
                        <label for="Label1">Modelo</label>
                        <input type="text" class="form-control" name="txtModelo" id="txtModelo" aria-describedby="emailHelp" value="<?= $row->Modelo; ?>">
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label1">Marca</label>
                                <input type="text" class="form-control" name="txtMarca" id="txtMarca" aria-describedby="emailHelp" value="<?= $row->Marca; ?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label2">Capacidad</label>
                                <input type="text" class="form-control" name="txtCapacidad" id="txtCapacidad" aria-describedby="emailHelp" value="<?= $row->Capacidad; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label3">Tipo de Vehiculo</label>
                                <select class="form-control" name="txtTipoVehiculo"  id="txtTipoVehiculo" value="<?= $row->TipoVehiculo; ?>">
                                    <?php
                                        if($row->TipoVehiculo == 1){
                                            echo '<option selected>1</option>';
                                        }else{
                                            echo '<option>1</option>';
                                        }
                                    ?>
                                    <?php
                                        if($row->TipoVehiculo == 2){
                                            echo '<option selected>2</option>';
                                        }else{
                                            echo '<option>2</option>';
                                        }
                                    ?>
                                    <?php
                                        if($row->TipoVehiculo == 3){
                                            echo '<option selected>3</option>';
                                        }else{
                                            echo '<option>3</option>';
                                        }
                                    ?>
                                    <?php
                                        if($row->TipoVehiculo == 4){
                                            echo '<option selected>4</option>';
                                        }else{
                                            echo '<option>4</option>"';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" align="right">
                        <input type="hidden" class="form-control" name="codVehiculo" id="codVehiculo" value="<?php echo $row->codVehiculo; ?>" >
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