<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login Form Template</title>

        <!-- CSS -->
        
        <link rel="stylesheet" href="<?php echo base_url('Bootstrap/assets/bootstrap/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('Bootstrap/assets/font-awesome/css/font-awesome.min.css')?>">
		<link rel="stylesheet" href="<?php echo base_url('Bootstrap/assets/css/form-elements.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('Bootstrap/assets/css/style.css')?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url('Bootstrap/assets/ico/favicon.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url('Bootstrap/assets/ico/apple-touch-icon-144-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url('Bootstrap/assets/ico/apple-touch-icon-114-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url('Bootstrap/assets/ico/apple-touch-icon-72-precomposed.png')?>">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url('Bootstrap/assets/ico/apple-touch-icon-57-precomposed.png')?>">

    </head>

    <body>

        <!-- Top content -->
        <!--<div class="top-content">-->
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h2><strong>TravelBox</strong></h2>
                            <h5>Gestion de envios puerta a puerta en tiempo real</h5>

                            <?php
                            if ($strConfig[0]->value == "1"){
                                echo '<p>
	                            	<a href="'.base_url('Login/Create').'"><strong>Crear Login</strong></a>, Bienvenido Administrador!
                            	</p>';
                            }
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
                    
                </div>
            </div>
            
        <!--</div>-->


        <!-- Javascript -->
        <script src="<?php echo base_url('Bootstrap/assets/js/jquery-1.11.1.min.js')?>"></script>
        <script src="<?php echo base_url('Bootstrap/assets/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('Bootstrap/assets/js/jquery.backstretch.min.js')?>"></script>
        <script src="<?php echo base_url('Bootstrap/assets/js/scripts.js')?>"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>