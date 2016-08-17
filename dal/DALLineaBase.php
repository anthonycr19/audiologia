<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALLineaBase.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALLineaBase {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_linea_base WHERE estado = 1 ORDER BY id_linea_base DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idLineaBase){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_linea_base WHERE id_linea_base = $idLineaBase AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxTrabajador */

		public function GetEntidadxTrabajador($idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_linea_base WHERE id_trabajador = $idTrabajador AND estado = 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idOtoscopia){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_linea_base (estado, created_at, id_trabajador, id_audio_tonal_od, id_audio_tonal_oi, id_otoscopia) VALUES ('1', '$createdAt', $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idOtoscopia)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idLineaBase, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idOtoscopia){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_linea_base SET id_trabajador = $idTrabajador, id_audio_tonal_od = $idAudioTonalOd, id_audio_tonal_oi = $idAudioTonalOi, id_otoscopia = $idOtoscopia WHERE id_linea_base = $idLineaBase";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idLineaBase;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idLineaBase){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_linea_base WHERE id_linea_base = $idLineaBase";
			$sql = "UPDATE tbl_linea_base SET estado = 0 WHERE id_linea_base = $idLineaBase";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idLineaBase;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>