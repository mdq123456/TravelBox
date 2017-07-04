<h1 align="center">Modificar Conductor</h1>

<div class="jumbotron col-sm-8 col-sm-offset-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">

                <?php echo form_open('Conductor/editar_Post'); ?>
                <?php 
                    $row = $getOne[0];
                ?>

                    <div class="form-group">
                        <label for="Label4">Tipo De Carnet</label>
                        <select class="form-control" name="txtcodCarnet"  id="txtcodCarnet" value = "<?= $row->codCarnet; ?>">
                            <?php
                                if($row->codCarnet == 'A-Motocicleta'){
                                    echo '<option selected>A-Motocicleta</option>"';
                                }else{
                                    echo '<option>A-Motocicleta</option>"';
                                }
                            ?>
                            <?php
                                if($row->codCarnet == 'B-Automoviles O Camionetas'){
                                    echo '<option selected>B-Automoviles O Camionetas</option>"';
                                }else{
                                    echo '<option>B-Automoviles O Camionetas</option>"';
                                }
                            ?>
                            <?php
                                if($row->codCarnet == 'C-Camiones Sin Acoplados'){
                                    echo '<option selected>C-Camiones Sin Acoplados</option>"';
                                }else{
                                    echo '<option>C-Camiones Sin Acoplados</option>"';
                                }
                            ?>
                            <?php
                                if($row->codCarnet == 'E-Camion Articulado'){
                                    echo '<option selected>E-Camion Articulado</option>"';
                                }else{
                                    echo '<option>E-Camion Articulado</option>"';
                                }
                            ?>
                      </select>
                    </div>

                    <div class="form-group">
                        <label for="Label1">Apellidos</label>
                        <input type="text" class="form-control" name="txtApellidos" id="txtApellidos" value = "<?= $row->Apellidos; ?>" aria-describedby="emailHelp" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <label for="Label1">Nombres</label>
                        <input type="text" class="form-control" name="txtNombres" id="txtNombres" value = "<?= $row->Nombres; ?>" aria-describedby="emailHelp" placeholder="Nombres">
                    </div>

                    <div class="form-group">
                        <label for="Label2">Telefono</label>
                        <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" value = "<?= $row->Telefono; ?>" placeholder="Telefono">
                    </div>
                    <div class="form-group">
                        <label for="Label3">Direccion</label>
                        <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" value = "<?= $row->Direccion; ?>" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                        <label for="Label4">Correo Electronico</label>
                        <input type="email" class="form-control" name="txtEmail" id="txtEmail" value = "<?= $row->Email; ?>" aria-describedby="emailHelp" placeholder="Email">
                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                    </div>

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="txtEstado" id="txtEstado" value="Disponible">
                    </div>

                    <div class="form-group">
                                <label for="Label2">Estado Civil</label>
                                <select class="form-control" name="txtEstadoCivil"  id="txtEstadoCivil" value = "<?= $row->EstadoCivil; ?>">
                                    <?php
                                        if($row->EstadoCivil == 'Casado'){
                                            echo '<option selected>Casado</option>';
                                        }else{
                                            echo '<option>Casado</option>';
                                        }
                                    ?>
                                    <?php
                                        if($row->EstadoCivil == 'Soltero'){
                                            echo '<option selected>Soltero</option>';
                                        }else{
                                            echo '<option>Soltero</option>';
                                        }
                                    ?>
                                    
                                    <?php
                                        if($row->EstadoCivil == 'Divorciado'){
                                            echo '<option selected>Divorciado</option>';
                                        }else{
                                            echo '<option>Divorciado</option>"';
                                        }
                                    ?>
                                    <?php
                                        if($row->EstadoCivil == 'Viudo'){
                                            echo '<option selected>Viudo</option>"';
                                        }else{
                                            echo '<option>Viudo</option>"';
                                        }
                                    ?>
                                    <?php
                                        if($row->EstadoCivil == 'Separado'){
                                            echo '<option selected>Separado</option>"';
                                        }else{
                                            echo '<option>Separado</option>"';
                                        }
                                    ?>
                                    <?php
                                        if($row->EstadoCivil == 'Union de hecho'){
                                            echo '<option selected>Union de hecho</option>"';
                                        }else{
                                            echo '<option>Union de hecho</option>"';
                                        }
                                    ?>
                                 </select>
                            </div>

                            <div class="form-group">
                                <label for="Label1">DNI</label>
                                <input type="text" class="form-control" name="txtDni" id="txtDni" value = "<?= $row->DNI; ?>" aria-describedby="emailHelp" placeholder="DNI">
                            </div>



                    <div class="form-group" align="right">
                        <input type="hidden" class="form-control" name="codConductor" id="codConductor" value="<?php echo $row->codConductor; ?>">
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