<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALAudioTonalOd.php
	* Fecha : domingo 22 de marzo del 2015 08:54:47 a.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALAudioTonalOd {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_audio_tonal_od WHERE estado = 1 ORDER BY id_audio_tonal_od DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idAudioTonalOd){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_audio_tonal_od WHERE id_audio_tonal_od = $idAudioTonalOd AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxTrabajador($idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_audio_tonal_od WHERE id_trabajador = $idTrabajador AND estado = 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $od_sts, $od_khz, $retest, $fail, $idTrabajador){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_audio_tonal_od (od_250, od_500, od_1000, od_2000, od_3000, od_4000, od_6000, od_8000, od_sts, od_khz, retest, fail, estado, created_at, id_trabajador) VALUES ($od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $od_sts, $od_khz, '$retest', '$fail', '1', '$createdAt', $idTrabajador)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idAudioTonalOd, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $od_sts, $od_khz, $retest, $fail, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_audio_tonal_od SET od_250 = $od_250, od_500 = $od_500, od_1000 = $od_1000, od_2000 = $od_2000, od_3000 = $od_3000, od_4000 = $od_4000, od_6000 = $od_6000, od_8000 = $od_8000, od_sts = $od_sts, od_khz = $od_khz, retest = '$retest', fail = '$fail', id_trabajador = $idTrabajador WHERE id_audio_tonal_od = $idAudioTonalOd";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOd;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarOdKhz */

		public function ActualizarOdKhz($idAudioTonalOd, $od_khz){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_audio_tonal_od SET od_khz = $od_khz WHERE id_audio_tonal_od = $idAudioTonalOd";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOd;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarxSts */

		public function ActualizarxSts($idAudioTonalOd, $od_sts){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_audio_tonal_od SET od_sts = $od_sts WHERE id_audio_tonal_od = $idAudioTonalOd";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOd;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarxRetestOd */

		public function ActualizarxRetestOd($idAudioTonalOd, $retest){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_audio_tonal_od SET retest = '$retest' WHERE id_audio_tonal_od = $idAudioTonalOd";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOd;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarxFailOd */

		public function ActualizarxFailOd($idAudioTonalOd, $fail){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_audio_tonal_od SET fail = '$fail' WHERE id_audio_tonal_od = $idAudioTonalOd";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOd;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idAudioTonalOd){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_audio_tonal_od WHERE id_audio_tonal_od = $idAudioTonalOd";
			$sql = "UPDATE tbl_audio_tonal_od SET estado = 0 WHERE id_audio_tonal_od = $idAudioTonalOd";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idAudioTonalOd;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>