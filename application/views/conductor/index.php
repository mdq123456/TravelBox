<h1 align="center">Tabla Conductor</h1>
<br>
<div class="jumbotron">
  <div class="container">
        <!--<label for="kwd_search">Search:</label> <input type="text" id="kwd_search" value=""/>-->
        <div class="row">
            <div class="col-xs-7 col-sm-7 col-md-9">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input id="kwd_search" type="text" class="form-control" name="msg" placeholder="Buscar Conductor">
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-3" align="right">
                <a class="btn btn-default" href="<?php echo base_url('Conductor/Create')?>" role="button">
                    <span class='glyphicon glyphicon-plus-sign'> </span> Conductor
                </a>
            </div>
        </div>
        
        <br>
        <div class="table-responsive">
            <table id="my-table" border="1" style="border-collapse:collapse" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>DNI</th>
                        <th>Codigo de Carnet</th>
                        <th>Estado Civil</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($getAll as $row) {
                    ?>     
                    <tr>
                        <td>
                              <?= $row->Nombre; ?>
                            
                        </td>
                         <td>
                              <?= $row->DNI; ?>
                            
                        </td>
                        <td>
                               <?= $row->codCarnet; ?>
                        </td>
                        <td>
                               <?= $row->EstadoCivil; ?>
                        </td>
                        <td>
                               <?= $row->Direccion; ?>
                        </td>
                        <td>
                               <?= $row->Telefono; ?>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url('Conductor/editar/')?><?= $row->codConductor; ?>">
                                <button class='btn btn-warning btn-xs'>
                                <span class='glyphicon glyphicon-edit'></span>
                                </button>
                            </a>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url('Conductor/eliminar/')?><?= $row->codConductor; ?>">
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