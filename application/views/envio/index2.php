<h1 align="center">Listado de Envios del dia</h1>
<br>
<div class="jumbotron">
  <div class="container" >
        <!--<label for="kwd_search">Search:</label> <input type="text" id="kwd_search" value=""/>-->
        <div class="row">
            <div class="col-xs-7 col-sm-7 col-md-9">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                    <input id="kwd_search" type="text" class="form-control" name="msg" placeholder="Buscar Cliente">
                </div>
            </div>
        </div>
        
        <br>
        
        <div class="table-responsive" id="cabecera">
            <table id="my-table" border="1" style="border-collapse:collapse" class="table table-fixed-head">
                 <thead>
                    <tr>
                        <th>Envio Nro</th>
                        <th>Nombre Cliente</th>
                        <th>Precio Total</th>
                        <th>Destino</th>
                        <th>Fecha de Partida</th>
                        <th>Cantidad de Paquetes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($getAll as $row) {
                    ?>     
                    <tr>
                        <td  >
                            <?= $row->codEnvio; ?>
                        </td>
                        <td  >
                            <?= $row->Nombre; ?>
                        </td>
                        <td  >
                            <?= $row->PrecioTotal; ?>
                        </td>
                        <td  >
                            <?= $row->DireccionDestino; ?>
                        </td>
                        <td  >
                            <?= $row->FechaPartida; ?>
                        </td>
                        <td  >
                            <?= $row->CantidadPaquetes; ?>
                        </td>
                    </tr>
                    <?php        
                        }
                    ?>

                    <tr>
                        <td  >
                            Hola
                        </td>
                        <td  >
                            Como
                        </td>
                        <td  >
                            Estas
                        </td>
                        <td  >
                            Toga
                        </td>
                        <td  >
                            AAAA
                        </td>
                        <td  >
                            Minga
                        </td>
                     </tr> 
                     <tr>
                        <td  >
                            Hola
                        </td>
                        <td  >
                            Como
                        </td>
                        <td  >
                            Estas
                        </td>
                        <td  >
                            Toga
                        </td>
                        <td  >
                            AAAA
                        </td>
                        <td  >
                            Minga
                        </td>
                     </tr>  
                     <tr>
                        <td  >
                            Hola
                        </td>
                        <td  >
                            Como
                        </td>
                        <td  >
                            Estas
                        </td>
                        <td  >
                            Toga
                        </td>
                        <td  >
                            AAAA
                        </td>
                        <td  >
                            Minga
                        </td>
                     </tr>  
                     <tr>
                        <td  >
                            Hola
                        </td>
                        <td  >
                            Como
                        </td>
                        <td  >
                            Estas
                        </td>
                        <td  >
                            Toga
                        </td>
                        <td  >
                            AAAA
                        </td>
                        <td  >
                            Minga
                        </td>
                     </tr>  
                     <tr>
                        <td  >
                            Hola
                        </td>
                        <td  >
                            Como
                        </td>
                        <td  >
                            Estas
                        </td>
                        <td  >
                            Toga
                        </td>
                        <td  >
                            AAAA
                        </td>
                        <td  >
                            Minga
                        </td>
                     </tr>  
                     <tr>
                        <td  >
                            Hola
                        </td>
                        <td  >
                            Como
                        </td>
                        <td  >
                            Estas
                        </td>
                        <td  >
                            Toga
                        </td>
                        <td  >
                            AAAA
                        </td>
                        <td  >
                            Minga
                        </td>
                     </tr>  
                     <tr>
                        <td  >
                            Hola
                        </td>
                        <td  >
                            Como
                        </td>
                        <td  >
                            Estas
                        </td>
                        <td  >
                            Toga
                        </td>
                        <td  >
                            AAAA
                        </td>
                        <td  >
                            Minga
                        </td>
                     </tr>    

                </tbody>
            </table>
        </div>
    </div>
</div>