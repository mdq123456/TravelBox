<h1 align="center">Alta de Conductor</h1>

<div class="jumbotron col-sm-8 col-sm-offset-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">


                <?php echo form_open('Conductor/create_Post'); ?>

                    <div class="form-group">
                        <label for="Label4">Tipo De Carnet</label>
                        <select class="form-control" name="txtcodCarnet"  id="txtcodCarnet">
                            <option>A-Motocicleta</option>
                            <option>B-Automoviles O Camionetas</option>
                            <option>C-Camiones Sin Acoplados</option>
                            <option>E-Camion Articulado</option>
                      </select>
                    </div>
                    


                    <div class="form-group">
                        <label for="Label1">Apellidos</label>
                        <input type="text" class="form-control" name="txtApellidos" id="txtApellidos"  placeholder="Apellidos">
                    </div>


                    <div class="form-group">
                        <label for="Label1">Nombres</label>
                        <input type="text" class="form-control" name="txtNombres" id="txtNombres" aria-describedby="emailHelp" placeholder="Nombres">
                    </div>


                    <div class="form-group">
                        <label for="Label2">Telefono</label>
                        <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" placeholder="Telefono">
                    </div>

                      <div class="form-group">
                        <label for="Label4">Correo Electronico</label>
                        <input type="email" class="form-control" name="txtEmail" id="txtEmail" aria-describedby="emailHelp" placeholder="Email">
                       
                      </div>

                    <div class="form-group">
                        <label for="Label2">Direccion</label>
                        <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion">
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="txtEstado" id="txtEstado" value="Disponible">
                    </div>

                            <div class="form-group">
                                <label for="Label2">Estado Civil</label>
                                <select class="form-control" name="txtEstadoCivil"  id="txtEstadoCivil">
                                    <option>Casado</option>
                                    <option>Soltero</option>
                                    <option>Divorciado</option>
                                    <option>Viudo</option>
                                    <option>Separado</option>
                                    <option>Union de hecho</option>
                                 </select>
                            </div>

                            <div class="row">
                            <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label1">DNI</label>
                                <input type="text" class="form-control" name="txtDni" id="txtDni" aria-describedby="emailHelp" placeholder="DNI">
                            </div>
                        </div>

                        </div>
                    </div>
                    
                    <div class="form-group" align="right">
                        <a class="btn btn-default" href="<?php echo base_url('Conductor/')?>" role="button">Cancelar</a>
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