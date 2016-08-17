<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaBuscarEmpresa.php
    * Fecha : jueves 14 de mayo del 2015 01:31:05 a.m.
    * Autor : Franklin Jesús Cabezas Rosario
    **/

    require_once('../../bll/bo/BOEmpresa.php');
    require_once('../../bll/bo/BOVstBusquedaEmpresa.php');

    //Recuperamos el nombre de las Empresas
    $boEmpresa = new BOEmpresa();           
    $empresas = $boEmpresa->GetEntidad();

    if (isset($_POST['confirma'])) {
        $empresa = $_POST['empresa'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];

        $boVstBusquedaEmpresa = new BOVstBusquedaEmpresa();
        $busquedaEmpresa = $boVstBusquedaEmpresa->GetBusquedaEmpresa($empresa, $fechaInicio, $fechaFin);
    }
    
?>
<head>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
          $('#example').dataTable();
        });
    </script>
</head>
</br>

<div class="control-group">
    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form" name="buscarEmpresa" id="buscarEmpresa">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">&nbsp;&nbsp;BÚSQUEDA EMPRESA </legend>
            <div class="form-group">
                <label class="col-md-1 control-label" for="empresa">Empresa:</label>
                <div class="col-md-3">
                    <select class="form-control" name="empresa" id="empresa">
                        <option value="0">Seleccione Empresa</option>
                        <?php
                            for ($i=0; $i < count($empresas); $i++) {
                        ?>
                        <option value="<?php echo $empresas[$i]->idEmpresa; ?>" <?php if($empresas[$i]->idEmpresa==$_REQUEST['empresa']){echo 'selected';} ?>><?php if(isset($empresas[$i]->razonSocial)){echo $empresas[$i]->razonSocial;} ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <label class="col-md-2 control-label" for="fechaInicio">Fecha Inicio <small>(Registro)</small>:</label>
                <div class="col-md-2">
                    <input class="form-control" type="date" naeme="fechaInicio" id="fechaInicio" value="<?php if(isset($_REQUEST['fechaInicio'])){echo $_REQUEST['fechaInicio'];}?>">    
                </div>
                <label class="col-md-2 control-label" for="fechaFin">Fecha Fin <small>(Registro)</small>:</label>
                <div class="col-md-2">
                    <input class="form-control" type="date" naeme="fechaFin" id="fechaFin" value="<?php if(isset($_REQUEST['fechaFin'])){echo $_REQUEST['fechaFin'];}?>">
                    <input type="hidden" name="confirma" id="confirma" value="1">
                </div>
            </div>
        </fieldset>
            <div class="form-group">
                <div class="col-lg-offset-10 col-lg-2">
                    <a href="#" class="btn btn-info" onclick="buscarEmpresaFiltro()">&nbsp;Buscar&nbsp;</a>
                    <button type="reset" class="btn btn-default">&nbsp;Limpiar&nbsp;</button>
                </div>
            </div>
    </form>
</div>

<?php
    if (isset($_POST['confirma'])) {
?>
</br></br>
<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
    <div class="row">
        <div class="col-sm-12">
            <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nro: activate to sort column descending" style="width: 8%;" aria-sort="ascending"><center>Nro</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nombre del Archivo: activate to sort column ascending" style="width: 35%;"><center>Nombre del Archivo</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Fecha Registro: activate to sort column ascending" style="width: 17%;"><center>Fecha Registro</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Empresa: activate to sort column ascending" style="width: 25%;"><center>Empresa</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 15%;"><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        for ($i=0; $i < count($busquedaEmpresa); $i++) {
                            $nro = $i + 1;
                            if ($i%2==0) {
                                echo '
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><center>'.$nro.'</center></td>
                                        <td>'.$busquedaEmpresa[$i]->nombreArchivo.'</td>
                                        <td><center>'.substr($busquedaEmpresa[$i]->fechaRegistro, 8,2).'-'.substr($busquedaEmpresa[$i]->fechaRegistro, 5,2).'-'.substr($busquedaEmpresa[$i]->fechaRegistro, 0,4).'</center></td>
                                        <td>'.$busquedaEmpresa[$i]->razonSocial.'</td>
                                        <td>
                                            <center>
                                                <a href="archivos/'.utf8_encode($busquedaEmpresa[$i]->nombreArchivo).'" class="btn btn-default" title="Descargar Excel Original">Excel Original <span class="glyphicon glyphicon-download-alt"></span></a>
                                            </center>
                                        </td>
                                    </tr>
                                ';
                            }else{
                                echo '
                                    <tr role="row" class="even">
                                        <td class="sorting_1"><center>'.$nro.'</center></td>
                                        <td>'.$busquedaEmpresa[$i]->nombreArchivo.'</td>
                                        <td><center>'.substr($busquedaEmpresa[$i]->fechaRegistro, 8,2).'-'.substr($busquedaEmpresa[$i]->fechaRegistro, 5,2).'-'.substr($busquedaEmpresa[$i]->fechaRegistro, 0,4).'</center></td>
                                        <td>'.$busquedaEmpresa[$i]->razonSocial.'</td>
                                        <td>
                                            <center>
                                                <a href="archivos/'.utf8_encode($busquedaEmpresa[$i]->nombreArchivo).'" class="btn btn-default" title="Descargar Excel Original">Excel Original <span class="glyphicon glyphicon-download-alt"></span></a>
                                            </center>
                                        </td>
                                    </tr>
                                ';
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</br>
</br>
</br>
</br>

<?php
    }
?>
<script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example')
      .removeClass('display')
      .addClass('table table-striped table-bordered');
</script>


