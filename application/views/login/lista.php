<h1 align="center">Listado de usuarios del sistema</h1>
<br>
<div class="jumbotron">
  <div class="container">
        <!--<label for="kwd_search">Search:</label> <input type="text" id="kwd_search" value=""/>-->
        <div class="row">
            <div class="col-xs-7 col-sm-7 col-md-9">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input id="kwd_search" type="text" class="form-control" name="msg" placeholder="Buscar Usuario">
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-3" align="right">
                <a class="btn btn-default" href="<?php echo base_url('Login/Create')?>" role="button">
                    <span class='glyphicon glyphicon-plus-sign'> </span> Usuario
                </a>
            </div>
        </div>
        
        <br>
        <div class="table-responsive">
            <table id="my-table" border="1" style="border-collapse:collapse" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th>Nombre de usuario</th>
                        <th>Rol</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Editar</th>
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
                            <?= $row->Rol; ?>
                        </td>
                        <td>
                            <?= $row->Email; ?>
                        </td>
                        <td>
                            <?= $row->Estado; ?>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url('Login/editar/')?><?= $row->codLogin; ?>">
                                <button class='btn btn-warning btn-xs'>
                                <span class='glyphicon glyphicon-edit'></span>
                                </button>
                            </a>
                        </td>
                        <td align="center">
                            <a href="<?php echo base_url('Login/eliminar/')?><?= $row->codLogin; ?>">
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