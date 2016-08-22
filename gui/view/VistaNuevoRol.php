<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaNuevoRol.php
    * Fecha : viernes 15 de mayo del 2015 09:21:34 p.m.
    * Autor : CAPSULE SAC
    **/

    require_once('../../bll/bo/BORol.php');

    $boRol = new BORol();
    $estadoSelect = -1;

    if (isset($_POST['idRolEliminar'])) {
        $idRolEliminar = $_POST['idRolEliminar'];
        $idRol = $boRol->Eliminar($idRolEliminar);
    }

    if (isset($_POST['idRolEditar'])) {
        $idRolEditar = $_POST['idRolEditar'];
        $rolEditar = $boRol->GetEntidadxId($idRolEditar);
        $estadoSelect = $rolEditar[0]->estado;
    }else{
        if (isset($_POST['id'])) {
            if ($_POST['id']>=1) {
                $id = $_POST['id'];
                $nombreRol = $_POST['nombreRol'];
                $estado = $_POST['estado'];

                $idRol = $boRol->Actualizar($id, $nombreRol, $estado);
            }else{
                $nombreRol = $_POST['nombreRol'];
                $estado = $_POST['estado'];

                if (isset($nombreRol)) {
                    $idRol = $boRol->Insertar($nombreRol, $estado);
                }
            }
        }
    }

    //Recuperamos los Roles de los usuarios
    $roles = $boRol->GetEntidad(); 

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
    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form" name="gestionarRol" id="gestionarRol">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">&nbsp;&nbsp;NUEVO ROL </legend>
            <div class="form-group">
                <label class="col-md-2 control-label" for="nombreRol">Nombre Rol :</label>
                <div class="col-md-10">
                    <input type="hidden" name="id" id="id" value="<?php if(isset($rolEditar[0]->idRol)){echo $rolEditar[0]->idRol;}?>">
                    <input class="form-control" type="text" name="nombreRol" id="nombreRol" value="<?php if(isset($rolEditar[0]->nombre)){echo $rolEditar[0]->nombre;}?>" placeholder="Ingrese Nombre Rol">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="estado">Estado :</label>
                <div class="col-md-10">
                    <select class="form-control" name="estado" id="estado">
                        <option value="-1">Seleccione Estado</option>
                        <option value="1" <?php if($estadoSelect==1){echo 'selected';} ?>>Activo</option>
                        <option value="0" <?php if($estadoSelect==0){echo 'selected';} ?>>Inactivo</option>
                    </select>
                </div>
            </div>
        </fieldset>
            <div class="form-group">
                <div class="col-lg-offset-10 col-lg-2">
                    <a href="#" class="btn btn-info" onclick="agregarRol()"><?php if(isset($_POST['idRolEditar'])){echo 'Guardar';}else{echo 'Agregar';}?></a>
                    <button type="reset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
    </form>
</div>

</br></br>
<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
    <div class="row">
        <div class="col-sm-12">
            <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nro: activate to sort column descending" style="width: 5%;" aria-sort="ascending"><center>Nro</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nombre Rol: activate to sort column ascending" style="width: 30%;"><center>Nombre Rol</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 15%;"><center>Estado</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 20%;"><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        for ($i=0; $i < count($roles); $i++) {
                            $nro = $i + 1;

                            if ($roles[$i]->estado==1) {
                                $estado = 'Activo';
                            }else{
                                $estado = 'Inactivo';
                            }

                            if ($i%2==0) {
                                echo '
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><center>'.$nro.'</center></td>
                                        <td>'.$roles[$i]->nombre.'</td>
                                        <td><center>'.$estado.'</center></td>
                                        <td>
                                            <center>
                                                <a href="#" onclick="editarRol('.$roles[$i]->idRol.')" class="btn btn-primary" title="Editar Rol">Editar <span class="glyphicon glyphicon-edit"></span></a>
                                                <a href="#" onclick="eliminarRol('.$roles[$i]->idRol.')" class="btn btn-default" title="Deshabilitar Rol">Deshabilitar <span class="glyphicon glyphicon-trash"></span></a>
                                            </center>
                                        </td>
                                    </tr>
                                ';
                            }else{
                                echo '
                                    <tr role="row" class="even">
                                        <td class="sorting_1"><center>'.$nro.'</center></td>
                                        <td>'.$roles[$i]->nombre.'</td>
                                        <td><center>'.$estado.'</center></td>
                                        <td>
                                            <center>
                                                <a href="#" onclick="editarRol('.$roles[$i]->idRol.')" class="btn btn-primary" title="Editar Rol">Editar <span class="glyphicon glyphicon-edit"></span></a>
                                                <a href="#" onclick="eliminarRol('.$roles[$i]->idRol.')" class="btn btn-default" title="Deshabilitar Rol">Deshabilitar <span class="glyphicon glyphicon-trash"></span></a>
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

<script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example')
      .removeClass('display')
      .addClass('table table-striped table-bordered');
</script>