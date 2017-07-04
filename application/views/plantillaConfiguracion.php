<!DOCTYPE html>
<html>
<head>
	<title>TravelBox</title>
    <link href="<?php echo base_url('Bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('Bootstrap/js/bootstrap.js')?>"></script>
    <style>
    body { padding-top: 50px;
        padding-bottom: 50px;
        background-image: url("<?php echo base_url('Bootstrap/res/travelbox.jpg')?>");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: #464646;}
   

    
    </style>

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
                    <li class="dropdown">
                        <a href="" class="glyphicon glyphicon-map-marker" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    </li>
                    <li><a href="<?php echo base_url('Login/lista')?>">Sesiones</a></li>
                    <li><a href="<?php echo base_url('Vehiculo/')?>">Vehiculos</a></li>
                    <li><a href="<?php echo base_url('Conductor/')?>">Conductores</a></li>
                    <li><a href="<?php echo base_url('Paquete/')?>">Paquetes</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo base_url('Login/')?>">Cerrar Sesion</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </header>
    
    <div class="container">

        <?php
            $this->load->view($contenido)
        ?>

    </div> <!-- /container -->
    
    <footer>
        
    </footer>

    <script src="<?php echo base_url('Bootstrap/assets/js/jquery-1.11.1.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/jquery.backstretch.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/scripts.js')?>"></script>

    <script>
        // When document is ready: this gets fired before body onload 
        $(document).ready(function(){
            // Write on keyup event of keyword input element
            $("#kwd_search").keyup(function(){
                // When value of the input is not blank
                if( $(this).val() != "")
                {
                    // Show only matching TR, hide rest of them
                    $("#my-table tbody>tr").hide();
                    $("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
                }
                else
                {
                    // When there is no input or clean again, show everything back
                    $("#my-table tbody>tr").show();
                }
            });
        });
        // jQuery expression for case-insensitive filter
        $.extend($.expr[":"], 
        {
            "contains-ci": function(elem, i, match, array) 
            {
                return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });
    </script>
    


</body>
</html>
