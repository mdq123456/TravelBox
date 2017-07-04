<h1 align="center">Modificar Usuario</h1>

<div class="jumbotron col-sm-8 col-sm-offset-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">

                <?php echo form_open('Login/editar_Post'); ?>
                <?php 
                    $row = $getOne[0];
                ?>
                        <div class="form-group">
                            <label for="Label1">Nombre de Usuario</label>
                            <input type="text" class="form-control" name="txtLogin" id="txtLogin" aria-describedby="emailHelp" placeholder="Login" value = "<?= $row->Login; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Label2">Contraseña</label>
                            <input type="password" class="form-control" name="txtPass" id="txtPass" placeholder="Password" value = "<?= $row->Password; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Label4">Correo Electronico</label>
                            <input type="email" class="form-control" name="txtEmail" id="txtEmail" aria-describedby="emailHelp" placeholder="Email" value = "<?= $row->Email; ?>">
                            <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                        </div>
                        <div class="form-group">
                            <label for="Label3">Estado del usuario</label>
                            <select class="form-control" name="txtEstado"  id="txtEstado">
                                <option>A</option>
                                <option>I</option>
                            </select>
                        </div>

                        <a class="btn btn-default" href="<?php echo base_url('Configuracion/')?>" role="button">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      <?php echo form_close(); ?>    
                <!--</form>-->
                
            </div>
        </div>
    </div>
</div>
<script>
function validaNumero(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
<script>
function validaLetra(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[a-z]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
<?php
    if (isset($msj)){
        echo '<script>alert("'.$msj.'");</script>';
    }
?>