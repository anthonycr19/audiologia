<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaTruncateTableTemporal.php
    * Fecha : domingo 14 de junio del 2015 11:27:15 p.m.
    * Autor : CAPSULE SAC
    **/

	//Eliminar los datos de la tabla temporal
	require_once("../../conexion/Conexion.php");
	require_once('../../bll/bo/BOArchivo.php');

	$boArchivo = new BOArchivo();

	$archivo = $_REQUEST['archivo'];
	$idArchivo = $_REQUEST['idArchivo'];

	$idArchivoDelete = $boArchivo->Eliminar($idArchivo);
		
	$cn = new Conexion();
	$link = $cn->Conectarse();
	$sqlTruncate = "TRUNCATE tbl_temporal";
	$result = mysql_query($sqlTruncate, $link);
	$cn->Desconectarse($link);

	$ruta = "../../archivos/".$archivo;
	if (file_exists($ruta)) {
		unlink($ruta);
	}
	
	header('Location: VistaCargarExcel.php');
?>