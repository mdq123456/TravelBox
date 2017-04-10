<!DOCTYPE html>
<html>
<head>
	<title>TravelBox</title>
    <link href="<?php echo base_url('Bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('Bootstrap/js/bootstrap.js')?>"></script>
    <style>body { padding-top: 70px; }</style>
    
</head>
<body>
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url('PaginaPrincipal/')?>">Travel Box</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo base_url('PaginaPrincipal/')?>">Inicio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-chevron-down" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu">
                        <li><a href="#enviosIndex">Listado de Envios</a></li>
                        <li><a href="#">Another action</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Nav header</li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
                <li><a href="#createEnvio">Realizar Envio</a></li>
                <li><a href="#contact">Clientes</a></li>
                <li><a href="#contact">Personal</a></li>
                <li><a href="#contact">Vehiculos</a></li>
                <li><a href="#contact">Usuarios</a></li>
                <li><a href="#contact">Configuracion</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#cerrarSesion">Cerrar Sesion</a></li>
            </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>

        <div class="container">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Navbar example</h1>
            <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
            <p>To see the difference between static and fixed top navbars, just scroll.</p>
            <p>
            <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
            </p>
        </div>

        <?php
            $this->load->view($contenido)
        ?>

        </div> <!-- /container -->
    </header>
    
    <footer>
        
    </footer>

    <script src="<?php echo base_url('Bootstrap/assets/js/jquery-1.11.1.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/jquery.backstretch.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/scripts.js')?>"></script>

</body>
</html>
