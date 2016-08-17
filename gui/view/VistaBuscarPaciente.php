<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaBuscarPaciente.php
    * Fecha : martes 25 de abril del 2015 12:16:34 a.m.
    * Autor : Franklin Jesús Cabezas Rosario
    **/

    require_once('../../bll/bo/BOEmpresa.php');
    require_once('../../bll/bo/BOVstBusquedaPacientes.php');
    require_once('../../bll/bo/BOTrabajador.php');

    //Recuperamos el nombre de las Empresas
    $boEmpresa = new BOEmpresa();           
    $empresas = $boEmpresa->GetEntidad();

    if (isset($_POST['idPacienteEliminar'])) {     
        $idPacienteEliminar = $_POST['idPacienteEliminar'];
        $boTrabajador = new BOTrabajador();
        $idTrabajador = $boTrabajador->Eliminar($idPacienteEliminar);
    }

    if (isset($_POST['confirma'])) {
        $empresa = $_POST['empresa'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $dni = $_POST['dni'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];

        $boVstBusquedaPacientes = new BOVstBusquedaPacientes();
        $busquedaPacientes = $boVstBusquedaPacientes->GetBusquedaPacientes($empresa, $fechaInicio, $fechaFin, $dni, $nombres, $apellidos);

        //echo var_dump($busquedaPacientes);
    }

?>
<head>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
          $('#example').dataTable();
        });

        function verTrabajador(idTrabajador){
            window.open("gui/view/VistaVerPaciente.php?idTrabajador="+idTrabajador, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=850, height=600");
        }
    </script>
</head>
</br>

<div class="control-group">
    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form" name="buscarPaciente" id="buscarPaciente">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">&nbsp;&nbsp;BÚSQUEDA PACIENTES </legend>
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
                <label class="col-md-2 control-label" for="fechaInicio">Fec. Inicio <small>(Audiometría)</small>:</label>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="fechaInicio" id="fechaInicio" value="<?php if(isset($_REQUEST['fechaInicio'])){echo $_REQUEST['fechaInicio'];}?>">    
                </div>
                <label class="col-md-2 control-label" for="fechaFin">Fecha Fin <small>(Audiometría)</small>:</label>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="fechaFin" id="fechaFin" value="<?php if(isset($_REQUEST['fechaFin'])){echo $_REQUEST['fechaFin'];}?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label" for="dni">DNI:</label>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="dni" id="dni" value="<?php if(isset($_REQUEST['dni'])){echo $_REQUEST['dni'];}?>" placeholder="Ingrese DNI">
                </div>
                <label class="col-md-1 control-label" for="nombres">Nombres:</label>
                <div class="col-md-3">
                    <input class="form-control" type="text" name="nombres" id="nombres" value="<?php if(isset($_REQUEST['nombres'])){echo $_REQUEST['nombres'];}?>" placeholder="Ingrese Nombres">
                </div>
                <label class="col-md-1 control-label" for="apellidos">Apellidos:</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="apellidos" id="apellidos" value="<?php if(isset($_REQUEST['apellidos'])){echo $_REQUEST['apellidos'];}?>" placeholder="Ingrese Apellidos">
                    <input type="hidden" name="confirma" id="confirma" value="1">
                </div>                
            </div>
        </fieldset>
            <div class="form-group">
                <div class="col-lg-offset-10 col-lg-2">
                    <a href="#" class="btn btn-info" onclick="buscarPacientesFiltro()">&nbsp;Buscar&nbsp;</a>
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
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nro: activate to sort column descending" style="width: 5%;" aria-sort="ascending"><center>Nro</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="DNI: activate to sort column ascending" style="width: 6%;"><center>DNI</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nombres: activate to sort column ascending" style="width: 22%;"><center>Nombres</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Apellidos: activate to sort column ascending" style="width: 22%;"><center>Apellidos</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Sexo: activate to sort column ascending" style="width: 10%;"><center>Sexo</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Empresa: activate to sort column ascending" style="width: 25%;"><center>Empresa</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 10%;"><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        for ($i=0; $i < count($busquedaPacientes); $i++) {
                            $nro = $i + 1;
                            if ($i%2==0) {
                                echo '
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><center>'.$nro.'</center></td>
                                        <td>'.$busquedaPacientes[$i]->dni.'</td>
                                        <td>'.$busquedaPacientes[$i]->nombre.'</td>
                                        <td>'.$busquedaPacientes[$i]->apellidos.'</td>
                                        <td><center>'.$busquedaPacientes[$i]->sexo.'</center></td>
                                        <td>'.$busquedaPacientes[$i]->razonSocial.'</td>
                                        <td>
                                            <center>
                                                <a href="#" onclick="verTrabajador('.$busquedaPacientes[$i]->idTrabajador.')" class="btn btn-default" title="Ver Trabajador"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                <a href="#" onclick="eliminarPaciente('.$busquedaPacientes[$i]->idTrabajador.')" class="btn btn-default" title="Eliminar Trabajador"><span class="glyphicon glyphicon-trash"></span></a>
                                            </center>
                                        </td>
                                    </tr>
                                ';
                            }else{
                                echo '
                                    <tr role="row" class="even">
                                        <td class="sorting_1"><center>'.$nro.'</center></td>
                                        <td>'.$busquedaPacientes[$i]->dni.'</td>
                                        <td>'.$busquedaPacientes[$i]->nombre.'</td>
                                        <td>'.$busquedaPacientes[$i]->apellidos.'</td>
                                        <td><center>'.$busquedaPacientes[$i]->sexo.'</center></td>
                                        <td>'.$busquedaPacientes[$i]->razonSocial.'</td>
                                        <td>
                                            <center>
                                                <a href="#" onclick="verTrabajador('.$busquedaPacientes[$i]->idTrabajador.')" class="btn btn-default" title="Ver Trabajador"><span class="glyphicon glyphicon-eye-open"></span></a>
                                                <a href="#" onclick="eliminarPaciente('.$busquedaPacientes[$i]->idTrabajador.')" class="btn btn-default" title="Eliminar Trabajador"><span class="glyphicon glyphicon-trash"></span></a>
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


