<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALVstBusquedaEmpresa.php
	* Fecha : jueves 14 de mayo del 2015 01:02:05 a.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once('../../conexion/Conexion.php');

	class DALVstBusquedaEmpresa {

		/* Atributos */

		public $cn;

		/* Funcion: GetBusquedaPacientes */

		public function GetBusquedaEmpresa($idEmpresa, $fechaRegistroInicio, $fechaRegistroFin){

			$this->cn = new Conexion();

			$sql = "SELECT id_empresa, razon_social, ruc, direccion, contacto, id_archivo, nombre_archivo, tipo, cantidad_registros, fecha_registro FROM vst_busqueda_empresa WHERE id_empresa=".$idEmpresa." AND (fecha_registro BETWEEN '".$fechaRegistroInicio."' AND '".$fechaRegistroFin."')";
			
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}

	}

?>