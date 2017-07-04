
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 text">
            <h2><strong>TravelBox</strong></h2>
            <h5>Gestion de envios puerta a puerta en tiempo real</h5>

            <?php
            if (isset($msj)){
                echo '<p>
                    <strong>'.$msj.'</strong>
                </p>';
            } 
            ?>
            
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3 form-box">
            <div class="form-bottom">
                <form role="form" action="<?php echo base_url('Login/iniciarSesion_Post')?>" method="post" class="login-form">
                    <div class="form-group">
                        <label class="sr-only" for="form-username">Username</label>
                        <input type="text" name="txtLogin" placeholder="Username..." class="form-username form-control" id="form-username">
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="form-password">Password</label>
                        <input type="password" name="txtPassword" placeholder="Password..." class="form-password form-control" id="form-password">
                    </div>
                    <button type="submit" class="btn">Iniciar Sesion</button>
                </form>
            </div>
        </div>
    </div>