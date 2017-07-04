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
                <a class="navbar-brand" href="<?php echo base_url('')?>">Travel Box</a>
            </div>
            
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="" class="glyphicon glyphicon-map-marker" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
        </nav>
    </header>
    <div class="inner-bg">
        <div class="container">

            <?php
                $this->load->view($contenido)
            ?>

        </div> <!-- /container -->
    </div>
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
