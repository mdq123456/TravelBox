<h1 align="center">Alta de Usuario</h1>

<div class="jumbotron col-sm-8 col-sm-offset-2">
    <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 ">
                    
                    <?php echo form_open('Login/create_Post'); ?>
                        <div class="form-group">
                            <label for="Label1">Nombre de Usuario</label>
                            <input type="text" class="form-control" name="txtLogin" id="txtLogin" aria-describedby="emailHelp" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <label for="Label2">Contraseña</label>
                            <input type="password" class="form-control" name="txtPass" id="txtPass" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="Label3">Seleccione un Rol</label>
                            <select class="form-control" name="txtRol"  id="txtRol">
                            <?php
                                foreach ($getRoles as $row) {
                                    echo '<option>';
                                    foreach ($row as $col) {
                                        echo $col;
                                    }
                                    echo'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Label4">Correo Electronico</label>
                            <input type="email" class="form-control" name="txtEmail" id="txtEmail" aria-describedby="emailHelp" placeholder="Email">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <a class="btn btn-default" href="<?php echo base_url('Configuracion/')?>" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
        