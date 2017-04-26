<!DOCTYPE html>
<html lang="en">

<head>
	<title>TravelBox</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('Bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('Bootstrap/js/bootstrap.js')?>"></script>
    <style>body { padding-top: 30px;padding-bottom: 50px }</style>
    
</head>

    <body>
        <div class="container">	
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 ">
                    <h1 align="center">Alta de Usuario Login</h2>
                    
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
                        <a class="btn btn-default" href="<?php echo base_url('')?>" role="button">Regresar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      <?php echo form_close(); ?>  
                    <!--</form>-->
                    
                </div>
            </div>
        </div>
        
        <?php
            if (isset($msj)){
                echo '<script>alert("'.$msj.'");</script>';
            }

        ?>
        
        <script src="<?php echo base_url('Bootstrap/assets/js/jquery-1.11.1.min.js')?>"></script>
        <script src="<?php echo base_url('Bootstrap/assets/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('Bootstrap/assets/js/jquery.backstretch.min.js')?>"></script>
        <script src="<?php echo base_url('Bootstrap/assets/js/scripts.js')?>"></script>
    </body>
        
</html>