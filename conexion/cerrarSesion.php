<?php
    
    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : cerrarSesion.php
    * Fecha : martes 11 de abril del 2015 06:44:45 p.m.
    * Autor : Franklin Jesús Cabezas Rosario
    **/

	session_start();
	session_destroy();
	header("Location: ../index.php");
?>