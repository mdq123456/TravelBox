<!DOCTYPE html>
<html>
<head>
	<title>Crud</title>
    <link href="<?php echo base_url('Bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <script src="<?php echo base_url('Bootstrap/js/bootstrap.js')?>"></script>
</head>
<body>
    <header>
        
    </header>
    
    <div id="container">
    
        <?php
        $this->load->view($contenido)
        ?>
        
    </div>
    
    <footer>
        
    </footer>

    <script src="<?php echo base_url('Bootstrap/assets/js/jquery-1.11.1.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/jquery.backstretch.min.js')?>"></script>
    <script src="<?php echo base_url('Bootstrap/assets/js/scripts.js')?>"></script>

</body>
</html>
