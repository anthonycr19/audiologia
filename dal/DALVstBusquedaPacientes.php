<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALVstBusquedaPacientes.php
	* Fecha : domingo 09 de mayo del 2015 07:23:47 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once('../../conexion/Conexion.php');

	class DALVstBusquedaPacientes {

		/* Atributos */

		public $cn;

		/* Funcion: GetBusquedaPacientes */

		public function GetBusquedaPacientes($idEmpresa, $fechaAudiometriaInicio, $fechaAudiometriaFin, $dni, $nombre, $apellidos){

			$this->cn = new Conexion();

			$sqlDni='';
			if ($dni!='' AND $dni!=NULL) {
				$sqlDni = " AND dni='$dni' ";
			}

			$sqlNombre='';
			if ($nombre!='' AND $nombre!=NULL) {
				$sqlNombre = " AND nombre LIKE '%$nombre%' ";
			}

			$sqlApellidos='';
			if ($apellidos!='' AND $apellidos!=NULL) {
				$sqlApellidos = " AND apellidos LIKE '%$apellidos%' ";
			}
			$sql = "SELECT distinct(id_trabajador), nombre, apellidos, fecha_nacimiento, dni, sexo, id_empresa, razon_social, ruc 
					FROM vst_busqueda_pacientes 
					WHERE estado=1 
					AND id_empresa= $idEmpresa
					AND fecha_audiometria BETWEEN '$fechaAudiometriaInicio' AND '$fechaAudiometriaFin'"
					.$sqlDni
					.$sqlNombre
					.$sqlApellidos;
			
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}

	}

?>