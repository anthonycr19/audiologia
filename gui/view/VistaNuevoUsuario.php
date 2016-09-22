<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaNuevoUsuario.php
    * Fecha : jueves 14 de mayo del 2015 02:47:34 a.m.
    * Autor : CAPSULE SAC
    **/

    require_once('../../bll/bo/BOUsuario.php');
    require_once('../../bll/bo/BORol.php');

    $boUsuario = new BOUsuario();
    $boRol = new BORol();
    $estadoSelect = -1;

    if (isset($_POST['idUsuarioEliminar'])) {
        $idUsuarioEliminar = $_POST['idUsuarioEliminar'];
        $idUsuario = $boUsuario->Eliminar($idUsuarioEliminar);
    }

    if (isset($_POST['idUsuarioEditar'])) {
        $idUsuarioEditar = $_POST['idUsuarioEditar'];
        $usuarioEditar = $boUsuario->GetEntidadxId($idUsuarioEditar);
        $estadoSelect = $usuarioEditar[0]->estado;
    }else{
        if (isset($_POST['id'])) {
            if ($_POST['id'] >= 1) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $usuario = $_POST['usuario'];
                $contrasenia = $_POST['contrasenia'];
                $estado = $_POST['estado'];
                $idRol = $_POST['rol'];
                
                $idUsuario = $boUsuario->Actualizar($id, $nombre, $usuario, $contrasenia, $estado, $idRol);
            }else{
                if (isset($_POST['nombre'])) {$nombre = $_POST['nombre'];}
                if (isset($_POST['usuario'])) {$usuario = $_POST['usuario'];}
                if (isset($_POST['contrasenia'])) {$contrasenia = $_POST['contrasenia'];}
                if (isset($_POST['estado'])) {$estado = $_POST['estado'];}
                if (isset($_POST['rol'])) {$idRol = $_POST['rol'];}
                
                if (isset($nombre)) {
                    $idUsuario = $boUsuario->Insertar($nombre, $usuario, $contrasenia, $estado, $idRol);
                }
            }
        }
    }

    //Recuperamos el nombre de los Usuarios
    $usuarios = $boUsuario->GetEntidad();

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
    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form" name="gestionarUsuario" id="gestionarUsuario">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">&nbsp;&nbsp;NUEVO USUARIO </legend>
            <div class="form-group">
                <label class="col-md-2 control-label" for="nombre">Nombres y Apellidos :</label>
                <div class="col-md-10">
                    <input type="hidden" name="id" id="id" value="<?php if(isset($usuarioEditar[0]->idUsuario)){echo $usuarioEditar[0]->idUsuario;}?>">
                    <input class="form-control" type="text" name="nombre" id="nombre" value="<?php if(isset($usuarioEditar[0]->nombre)){echo $usuarioEditar[0]->nombre;}?>" placeholder="Ingrese Nombres y Apellidos">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="usuario">Usuario :</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="usuario" id="usuario" value="<?php if(isset($usuarioEditar[0]->usuario)){echo $usuarioEditar[0]->usuario;}?>" placeholder="Ingrese Usuario">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="contrasenia">Contraseña :</label>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="contrasenia" id="contrasenia" value="<?php if(isset($usuarioEditar[0]->contrasenia)){echo $usuarioEditar[0]->contrasenia;}?>" placeholder="Ingrese Contraseña">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="rol">Rol :</label>
                <div class="col-md-10">
                    <select class="form-control" name="rol" id="rol">
                        <option value="0">Seleccione Rol</option>
                        <?php
                            for ($i=0; $i < count($roles); $i++) {
                        ?>
                        <option value="<?php echo $roles[$i]->idRol; ?>" <?php if($roles[$i]->idRol==$usuarioEditar[0]->idRol){echo 'selected';} ?>><?php if(isset($roles[$i]->nombre)){echo $roles[$i]->nombre;} ?></option>
                        <?php
                            }
                        ?>
                    </select>
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
                    <a href="#" class="btn btn-info" onclick="agregarUsuario()"><?php if(isset($_POST['idUsuarioEditar'])){echo 'Guardar';}else{echo 'Agregar';}?></a>
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
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Nombre y Apellidos: activate to sort column ascending" style="width: 30%;"><center>Nombre y Apellidos</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Usuario: activate to sort column ascending" style="width: 15%;"><center>Usuario</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Rol: activate to sort column ascending" style="width: 15%;"><center>Rol</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Estado: activate to sort column ascending" style="width: 15%;"><center>Estado</center></th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Acciones: activate to sort column ascending" style="width: 20%;"><center>Acciones</center></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        for ($i=0; $i < count($usuarios); $i++) {
                            $nro = $i + 1;

                            for ($j=0; $j < count($roles); $j++) {
                                if ($roles[$j]->idRol == $usuarios[$i]->idRol) {
                                    $descripcionRol = $roles[$j]->nombre;
                                }
                            }

                            if ($usuarios[$i]->estado==1) {
                                $estado = 'Activo';
                            }else{
                                $estado = 'Inactivo';
                            }

                            if ($i%2==0) {
                                echo '
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><center>'.$nro.'</center></td>
                                        <td>'.$usuarios[$i]->nombre.'</td>
                                        <td>'.$usuarios[$i]->usuario.'</td>
                                        <td>'.$descripcionRol.'</td>
                                        <td><center>'.$estado.'</center></td>
                                        <td>
                                            <center>
                                                <a href="#" onclick="editarUsuario('.$usuarios[$i]->idUsuario.')" class="btn btn-primary" title="Editar Trabajador">Editar <span class="glyphicon glyphicon-edit"></span></a>
                                                <a href="#" onclick="eliminarUsuario('.$usuarios[$i]->idUsuario.')" class="btn btn-default" title="Deshabilitar Trabajador">Deshabilitar <span class="glyphicon glyphicon-trash"></span></a>
                                            </center>
                                        </td>
                                    </tr>
                                ';
                            }else{
                                echo '
                                    <tr role="row" class="even">
                                        <td class="sorting_1"><center>'.$nro.'</center></td>
                                        <td>'.$usuarios[$i]->nombre.'</td>
                                        <td>'.$usuarios[$i]->usuario.'</td>
                                        <td>'.$descripcionRol.'</td>
                                        <td><center>'.$estado.'</center></td>
                                        <td>
                                            <center>
                                                <a href="#" onclick="editarUsuario('.$usuarios[$i]->idUsuario.')" class="btn btn-primary" title="Editar Trabajador">Editar<span class="glyphicon glyphicon-edit"></span></a>
                                                <a href="#" onclick="eliminarUsuario('.$usuarios[$i]->idUsuario.')" class="btn btn-default" title="Deshabilitar Trabajador">Deshabilitar <span class="glyphicon glyphicon-trash"></span></a>
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