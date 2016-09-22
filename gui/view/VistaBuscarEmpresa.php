<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaBuscarEmpresa.php
    * Fecha : jueves 14 de mayo del 2015 01:31:05 a.m.
    * Autor : CAPSULE SAC
    **/

    require_once('../../bll/bo/BOEmpresa.php');
    require_once('../../bll/bo/BOVstBusquedaEmpresa.php');
    require_once('../../bll/bo/BOArchivo.php');
    //Recuperamos el nombre de las Empresas
    $boEmpresa = new BOEmpresa();
    $boArchivo = new BOArchivo();
    $empresas = $boEmpresa->GetEntidad();

//    $direccion = $audiologiaTotal[$i]->direccion;
//    $direc_empresa = $boEmpresa->GetEntidadxDireccion($direccion);
    //$boArchivo = new BOArchivo();
    //$eliminarArchivo = $boArchivo->Eliminar_Archivo($empresa);


    if (isset($_POST['idArchivo'])) {

        $idArchivoEliminar = $_POST['idArchivo'];


        $idArchivo2 = $boArchivo->Eliminar_Archivo($idArchivoEliminar);
        //return $idArchivo2;
        //$idArchivo = $boArchivo->Eliminar_Archivo_Fisico($idArchivoEliminar);

//        if (isset($_POST['idArchivo'])){
//            echo $_POST['idArchivo2'];
//            echo $_POST['idArchivo2'];
        $idArchivo = $boArchivo->Eliminar_Archivo_Fisico($idArchivoEliminar);
//        }
    }

    if (isset($_POST['confirma'])) {
        $empresa = $_POST['empresa'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];

        $boVstBusquedaEmpresa = new BOVstBusquedaEmpresa();

        $busquedaEmpresa = $boVstBusquedaEmpresa->GetBusquedaEmpresa($empresa, $fechaInicio, $fechaFin);
    }

    $archivos = $boArchivo->GetEntidad();
?>
<head>
    <script type="text/javascript" language="javascript" src="gui/public/js/js_audiologia.js"></script>


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
            <div class="form-group" style="margin-left: 930px;">
                <div class="col-md-5">
                    <a href="#" class="btn btn-info" onclick="buscarEmpresaFiltro()"><span class="glyphicon glyphicon-search"></span> Buscar</a>
                </div>
                <div class="col-md-5">
                    <button type="reset" class="btn btn-default"> Limpiar</button>
                </div>
            </div>
    </form>
</div>

<?php
    if (isset($_POST['confirma'])) {
?>
</br>
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
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 15%;"><center>Descargar</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 15%;"><center>Eliminar</center></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        for ($i=0; $i <count($busquedaEmpresa); $i++){
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
                                                <a href="archivos/'.utf8_encode($busquedaEmpresa[$i]->nombreArchivo).'" class="btn btn-default" title="Descargar Excel Original"> <span class="glyphicon glyphicon-download-alt"></span></a>
                                            </center>
                                        </td>
                                         <td>
                                            <center>
                                                <a href="#" id="'.$busquedaEmpresa[$i]->idArchivo.'" class="btn btn-default generarmodal" title="Eliminar Archivo">Eliminar <span class="glyphicon glyphicon-trash"></span></a>
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
                                                <a href="archivos/'.utf8_encode($busquedaEmpresa[$i]->nombreArchivo).'" class="btn btn-default" title="Descargar Excel Original"><span class="glyphicon glyphicon-download-alt"></span></a>
                                            </center>
                                        </td>
                                        <td>
                                            <center>
                                              <a href="#" id="'.$busquedaEmpresa[$i]->idArchivo.'" class="btn btn-default generarmodal" title="Eliminar Archivo">Eliminar <span class="glyphicon glyphicon-trash"></span></a>
                                           </center>
                                         </td>
                                    </tr>
                                ';
                            }
                        }
                    ?>

                    <div class="modal fade" id="modales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Eliminar Datos de Empresa</h4>
                                </div>
                                <div class="modal-body">
                                    ¿Está seguro que desea eliminar este archivo?
                                </div>
                                <div class="modal-footer">
                                    <center>

<!--                                        <button type="button" class="btn btn-default" data-dismiss="modal"> Aceptar</button>-->
                                        <a href="#" onclick="eliminar(this)" class="btn btn-default eliminar" title="Eliminar Archivo">Aceptar <span class="glyphicon glyphicon-trash"></span></a>

                                        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span> Cancelar</button>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>

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


