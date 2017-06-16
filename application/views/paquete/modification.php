<h1 align="center">Alta de Paquete</h1>

<div class="jumbotron col-sm-8 col-sm-offset-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">

                <?php echo form_open('Paquete/modification_Post'); ?>

                <?php
                        $row = $getOne[0];
                        // print_r($row);

                        // exit();
                    ?>    
                    <div class="row">
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="Label1">Ancho (centímetros)</label>
                                <input type="text" class="form-control" name="txtAncho" id="txtAncho" aria-describedby="emailHelp" value="<?= $row->Ancho; ?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="Label1">Largo (centímetros)</label>
                                <input type="text" class="form-control" name="txtLargo" id="txtLargo" aria-describedby="emailHelp" value="<?= $row->Largo; ?>">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="form-group">
                                <label for="Label1">Alto (centímetros)</label>
                                <input type="text" class="form-control" name="txtAlto" id="txtAlto" aria-describedby="emailHelp" value="<?= $row->Alto; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label3">Nivel de Fragilidad</label>
                                <select class="form-control" name="txtNivelFragilidad"  id="txtNivelFragilidad" value="<?= $row->NivelFragilidad; ?>">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label2">Peso</label>
                                <input type="text" class="form-control" name="txtPeso" id="txtPeso" value="<?= $row->Peso; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Label2">Observaciones</label>
                        <textarea class="form-control" rows="5" id="txtObservaciones" name="txtObservaciones" ><?= $row->Observaciones; ?></textarea>
                    </div>

                    <div class="form-group" align="right">
                        <input type="hidden" class="form-control" name="codPaquete" id="codPaquete" value="<?php echo $row->Largo; ?>" >
                        <a class="btn btn-default" href="<?php echo base_url('Paquete/')?>" role="button">Cancelar</a>
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