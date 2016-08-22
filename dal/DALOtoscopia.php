<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALOtoscopia.php
	* Fecha : lunes 23 de marzo del 2015 11:35:53 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALOtoscopia {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_otoscopia WHERE estado = 1 ORDER BY id_otoscopia DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idOtoscopia){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_otoscopia WHERE id_otoscopia = $idOtoscopia AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxIdxIdTrabajador */

		public function GetEntidadxIdxIdTrabajador($idOtoscopia, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT o.id_otoscopia, o.fecha_audiometria, o.descripcion_od, o.descripcion_oi, o.edad_trabajador, o.estado, o.created_at, o.updated_at, o.id_trabajador FROM tbl_otoscopia o JOIN tbl_informe i ON (i.id_otoscopia = o.id_otoscopia) WHERE o.id_trabajador = ".$idTrabajador." AND i.id_audio_tonal_od = ".$idOtoscopia." LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxTrabajador */

		public function GetEntidadxTrabajador($idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_otoscopia WHERE id_trabajador = $idTrabajador AND estado = 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($fechaAudiometria, $descripcionOd, $descripcionOi, $edadTrabajador, $idTrabajador){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_otoscopia (fecha_audiometria, descripcion_od, descripcion_oi, edad_trabajador, estado, created_at, id_trabajador) VALUES ('$fechaAudiometria', '$descripcionOd', '$descripcionOi', '$edadTrabajador', '1', '$createdAt', $idTrabajador)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idOtoscopia, $fechaAudiometria, $descripcionOd, $descripcionOi, $edadTrabajador, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_otoscopia SET fecha_audiometria = '$fechaAudiometria', descripcion_od = '$descripcionOd', descripcion_oi = '$descripcionOi', edad_trabajador = '$edadTrabajador', id_trabajador = $idTrabajador WHERE id_otoscopia = $idOtoscopia";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idOtoscopia;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idOtoscopia){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_otoscopia WHERE id_otoscopia = $idOtoscopia";
			$sql = "UPDATE tbl_otoscopia SET estado = 0 WHERE id_otoscopia = $idOtoscopia";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idOtoscopia;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>