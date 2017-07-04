<!DOCTYPE html>
<html>
<head>
	<title>TravelBox</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link href="<?php echo base_url('Bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('Bootstrap/DateTimePicker/jquery.datetimepicker.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('Bootstrap/GeoPagina/EstiloGeo.css')?>">
    <script src="<?php echo base_url('Bootstrap/js/bootstrap.js')?>"></script>
    <style>body { padding-top: 50px;
        padding-bottom: 50px;
        background-image: url("<?php echo base_url('Bootstrap/res/travelbox.jpg')?>");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: #464646;}
        
    </style>
    <script>
        if ( window.self !== window.top ) {
            window.top.location.href=window.location.href;
        }     
    </script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>

    <![endif]-->
            
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyA-f9Nfs9Vu94eyPtllliLxwpZqUKEP1u4&language=es&libraries=places"></script>

    <script src="<?php echo base_url('Bootstrap/GeoPagina/CargaValores.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/GeoPagina/GeoJS1.js')?>"></script>

    <!--Trae los infowindows-->
    <script src="<?php echo base_url('Bootstrap/GeoPagina/GeoJS2.js')?>"></script>
    <script>
        $( document ).ready(function() {
            $('#fecha').datepicker();
        });
    </script>
</head>
<body onload="initialize();">
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
                    <li class="dropdown">
                        <a href="#" class="glyphicon glyphicon-map-marker" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    </li>
                    <?php
                    if($this->session->userdata('logueado')
                        && $this->session->userdata('rol') != 4){
                    ?>
                    <li><a href="<?php echo base_url('Cliente/')?>">Realizar Envios</a></li>
                    <li><a href="<?php echo base_url('Envio/')?>">Envios del Dia</a></li>
                    <?php
                    }
                    if($this->session->userdata('logueado')
                        && ($this->session->userdata('rol') == 4 || $this->session->userdata('rol') == 1)){
                    ?>
                    <li><a href="<?php echo base_url('Envio/enTransito')?>">Envios en transito</a></li>
                    <?php
                    }
                    if($this->session->userdata('logueado')
                        && $this->session->userdata('rol') == 1){
                    ?>
                    <li><a href="<?php echo base_url('Configuracion/')?>">Configuracion</a></li>
                    <?php
                    }
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if($this->session->userdata('logueado')){
                    ?>
                    <li><a href="<?php echo base_url('Login/')?>">Cerrar Sesion</a></li>
                    <?php
                    }else{
                    ?>
                    <li><a href="<?php echo base_url('Login/')?>">Iniciar Sesion</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </header>
  

        <?php
            $this->load->view($contenido)
        ?>


    
   

    <script src="<?php echo base_url('Bootstrap/assets/js/jquery-1.11.1.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/jquery.backstretch.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/scripts.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/DateTimePicker/jquery.datetimepicker.full.min.js')?>"></script>

    <script>
        $(document).ready(function() {
            $("form").keypress(function(e) {
                //Enter key
                if (e.which == 13) {
                return false;
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#address").keydown(function(e) {
                origFromPlace = 0;
                });
            $("#addressDest").keydown(function(e) {
                destFromPlace = 0;
                });
        });
    </script>

    <script type="text/javascript">
        (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js?onload=onLoadCallback';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
        })();
    </script>
    <script>
        $("#datetimepecker").datetimepicker();
    </script>
</body>
</html>
