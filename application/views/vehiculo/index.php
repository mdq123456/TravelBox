<h1 align="center">Vehiculos Disponibles</h1>
<br>
<div class="jumbotron">
  <div class="container" >
        <!--<label for="kwd_search">Search:</label> <input type="text" id="kwd_search" value=""/>-->
        <div class="row">
            <div class="col-xs-7 col-sm-7 col-md-9">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input id="kwd_search" type="text" class="form-control" name="msg" placeholder="Buscar Vehiculo">
                </div>
                </div>

                <div class="col-xs-5 col-sm-5 col-md-3" align="right">
                <a class="btn btn-default" href="<?php echo base_url('vehiculo/create')?>" role="button">
                    <span class='glyphicon glyphicon-plus-sign'> </span> Vehiculo
                </a>
            

            </div>
        </div>
        
        <br>
        
        <div class="table-responsive" id="cabecera">
            <table id="my-table" border="1" style="border-collapse:collapse" class="table table-fixed-head">
                 <thead>
                    <tr>
                        <th>Patente del Vehiculo</th>
                        <th>Modelo del Vehiculo</th>
                        <th>Marca de Vehiculo</th>
                        <th>Capacidad de Carga</th>
                        <th>Tipo de Vehiculo</th>
                        <th>Modificar Registro</th>
                        <th>Eliminar Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($getAll as $row) {
                    ?>     
                    <tr>
                        <td  >
                            <?= $row->Patente; ?>
                        </td>
                        <td  >
                            <?= $row->Modelo; ?>
                        </td>
                        <td  >
                            <?= $row->Marca; ?>
                        </td>
                        <td  >
                            <?= $row->Capacidad; ?>
                        </td>
                        <td  >
                            <?= $row->TipoVehiculo; ?>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url('vehiculo/editar/')?><?= $row->codVehiculo; ?>">
                                <button class='btn btn-warning btn-xs'>
                                <span class='glyphicon glyphicon-edit'></span>
                                </button>
                            </a>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url('vehiculo/eliminar/')?><?= $row->codVehiculo; ?>">
                                <button class='btn btn-danger btn-xs'>
                                <span class='glyphicon glyphicon-remove'></span>
                                </button>
                            </a>
                        </td>
                    </tr>                    
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>      