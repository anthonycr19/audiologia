<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : iniciarSesion.php
    * Fecha : martes 11 de abril del 2015 06:44:05 p.m.
    * Autor : CAPSULE SAC
    **/

    include 'Conexion.php';
    /*conectar a la base de datos*/

    $user = $_POST["usuario"]; 
    $pass = $_POST["password"];
    
    $conexion = new Conexion();
    $sql = sprintf("SELECT * FROM tbl_usuario WHERE usuario = '%s' AND contrasenia = '%s' AND estado = 1 LIMIT 1",$user, $pass);
    $link = $conexion->Conectarse();
    $result = mysql_query($sql, $link);

    if (mysql_num_rows($result) != 0) {
        session_start();
        while ($row = mysql_fetch_array($result)) {
            $_SESSION["id"] = $row['id_usuario'];
            $_SESSION["usuario"] = $row['usuario'];
            $_SESSION["nombre"] = $row['nombre'];
            $_SESSION["rol"] = $row['id_rol'];
        }
        echo 1;
    }else{
        echo 2;
    }

    $conexion->Desconectarse($link);
    
    /*
    if(($user=='fcabezas' AND $pass=='fcabezas') OR ($user=='acarrillo' AND $pass=='acarrillo')){
        session_start();
        $_SESSION["usuario"]=$user;
        echo 1;
    }else{
        echo 2;
    }
    */
?>
