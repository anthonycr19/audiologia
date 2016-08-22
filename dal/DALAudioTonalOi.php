<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALAudioTonalOi.php
	* Fecha : domingo 22 de marzo del 2015 08:19:58 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALAudioTonalOi {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_audio_tonal_oi WHERE estado = 1 ORDER BY id_audio_tonal_oi DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idAudioTonalOi){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_audio_tonal_oi WHERE id_audio_tonal_oi = $idAudioTonalOi AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxTrabajador */

		public function GetEntidadxTrabajador($idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_audio_tonal_oi WHERE id_trabajador = $idTrabajador AND estado = 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $oi_sts, $oi_khz, $idTrabajador){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_audio_tonal_oi (oi_250, oi_500, oi_1000, oi_2000, oi_3000, oi_4000, oi_6000, oi_8000, oi_sts, oi_khz, estado, created_at, id_trabajador) VALUES ($oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $oi_sts, $oi_khz, '1', '$createdAt', $idTrabajador)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idAudioTonalOi, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $oi_sts, $oi_khz, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_audio_tonal_oi SET oi_250 = $oi_250, oi_500 = $oi_500, oi_1000 = $oi_1000, oi_2000 = $oi_2000, oi_3000 = $oi_3000, oi_4000 = $oi_4000, oi_6000 = $oi_6000, oi_8000 = $oi_8000, oi_sts = $oi_sts, oi_khz = $oi_khz, id_trabajador = $idTrabajador WHERE id_audio_tonal_oi = $idAudioTonalOi";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOi;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarOiKhz */

		public function ActualizarOiKhz($idAudioTonalOi, $oi_khz){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_audio_tonal_oi SET oi_khz = $oi_khz WHERE id_audio_tonal_oi = $idAudioTonalOi";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOi;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarxSts */

		public function ActualizarxSts($idAudioTonalOi, $oi_sts){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_audio_tonal_oi SET oi_sts = $oi_sts WHERE id_audio_tonal_oi = $idAudioTonalOi";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOi;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idAudioTonalOi){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_audio_tonal_oi WHERE id_audio_tonal_oi = $idAudioTonalOi";
			$sql = "UPDATE tbl_audio_tonal_oi SET estado = 0 WHERE id_audio_tonal_oi = $idAudioTonalOi";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOi;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>