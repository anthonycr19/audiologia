<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaGestionarPermisos.php
    * Fecha : sábado 16 de mayo del 2015 08:15:34 a.m.
    * Autor : Franklin Jesús Cabezas Rosario
    **/

    require_once('../../bll/bo/BORol.php');
    require_once('../../bll/bo/BOOpciones.php');

    $boRol = new BORol();
    $boOpciones = new BOOpciones();

    //Recuperamos los Roles de los usuarios
    $roles = $boRol->GetEntidad();

    //Recuperamos las Opciones de los roles
    $opciones = $boOpciones->GetEntidad();
?>

</br>
<div class="control-group">
    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form" name="gestionarUsuario" id="gestionarUsuario">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">&nbsp;&nbsp;GESTIONAR PERMISOS </legend>
            <div class="form-group">
                <label class="col-md-2 control-label" for="rol">Roles :</label>
                <div class="col-md-10">
                    <select class="form-control" name="rol" id="rol">
                        <option value="0">Seleccione Rol</option>
                        <?php
                            for ($i=0; $i < count($roles); $i++) {
                        ?>
                        <option value="<?php echo $roles[$i]->idRol; ?>" <?php if($roles[$i]->idRol==$_POST['rol']){echo 'selected';} ?>><?php echo $roles[$i]->nombre; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
        </fieldset>

        <fieldset class="scheduler-border">
            <legend class="scheduler-border">&nbsp;&nbsp;OPCIONES </legend>
            <div class="form-group">
                <div class="col-md-1">
                    <input class="form-control" type="checkbox" onClick="" name="inicio" id="inicio" value="">
                </div>
                <label class="col-md-11 control-label" for="inicio"><?php echo $opciones[0]->descripcion; ?></label>
            </div>
            <div class="form-group">
                <div class="col-md-1">
                    <input class="form-control" type="hidden" onClick="" name="id_inicio" id="id_inicio" value="<?php echo $opciones[0]->idOpciones; ?>">
                    <input class="form-control" type="checkbox" onClick="" name="pacientes" id="pacientes" value="">
                </div>
                <label class="col-md-11 control-label" for="pacientes">Pacientes</label>
            </div>
            <div class="form-group">
                <ul>
                    <li><input class="form-control" type="checkbox" onClick="" name="buscarPaciente" id="buscarPaciente" value=""><?php echo $opciones[1]->descripcion; ?></li>
                    <input class="form-control" type="hidden" onClick="" name="id_buscarPaciente" id="id_buscarPaciente" value="<?php echo $opciones[0]->idOpciones; ?>">
                </ul>
            </div>
        </fieldset>

            <div class="form-group">
                <div class="col-lg-offset-10 col-lg-2">
                    <a href="#" class="btn btn-info" onclick="guardarPermisos()">Guardar</a>
                    <button type="reset" class="btn btn-default">Limpiar</button>
                </div>
            </div>
    </form>
</div>
</br>
</br>
</br>
</br>