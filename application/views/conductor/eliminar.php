<html>
    <head>

    </head>
    <body>


                   <?php echo form_open('Conductor/delete_Post'); ?>


                    <?php echo form_close(); ?>  
                <!--</form>-->

        <?php
            echo '<script>alert("CONDUCTOR ELIMINADO CORRECTAMENTE!!")</script> ';

            echo "<script>location.href='../index.php'</script>";
        ?>

        <!--<script type="text/javascript">
            function redireccionar(){
                window.locationf="http://www.cristalab.com";
                }
            setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos
        </script>-->
    </body>
</html>

