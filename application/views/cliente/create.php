<h1 align="center">Alta de Cliente</h1>

<div class="jumbotron col-sm-8 col-sm-offset-2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 ">

                <?php echo form_open('Cliente/create_Post'); ?>
                    <div class="form-group">
                        <label for="Label1">Apellidos</label>
                        <input type="text" class="form-control" name="txtApellidos" id="txtApellidos" aria-describedby="emailHelp" placeholder="Apellidos" onkeypress="return validaLetra(event)">
                    </div>
                    <div class="form-group">
                        <label for="Label1">Nombres</label>
                        <input type="text" class="form-control" name="txtNombres" id="txtNombres" aria-describedby="emailHelp" placeholder="Nombres" onkeypress="return validaLetra(event)">
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label1">DNI</label>
                                <input type="text" class="form-control" name="txtDni" id="txtDni" aria-describedby="emailHelp" placeholder="DNI" maxlength="8" onkeypress="return validaNumero(event)">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="Label2">CUIL/CUIT</label>
                                <input type="text" class="form-control" name="txtCuil" id="txtCuil" placeholder="CUIL/CUIT" maxlength="11" onkeypress="return validaNumero(event)">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Label2">Telefono</label>
                        <input type="text" class="form-control" name="txtTelefono" id="txtTelefono" placeholder="Telefono" maxlength="13" onkeypress="return validaNumero(event)">
                    </div>
                    <div class="form-group">
                        <label for="Label2">Direccion</label>
                        <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" placeholder="Direccion">
                    </div>
                    <div class="form-group">
                        <label for="Label4">Correo Electronico</label>
                        <input type="email" class="form-control" name="txtEmail" id="txtEmail" aria-describedby="emailHelp" placeholder="Email">
                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                    </div>
                    <div class="form-group" align="right">
                        <a class="btn btn-default" href="<?php echo base_url('Cliente/')?>" role="button">Cancelar</a>
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
    patron =/[a-z-A-Z ]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>