<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALMenoscabo.php
	* Fecha : lunes 23 de marzo del 2015 11:23:35 p.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALMenoscabo {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_menoscabo WHERE estado = 1 ORDER BY id_menoscabo DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idMenoscabo){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_menoscabo WHERE id_menoscabo = $idMenoscabo AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxTrabajador */

		public function GetEntidadxTrabajador($idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_menoscabo WHERE id_trabajador = $idTrabajador AND estado = 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($porcentajeOd, $porcentajeOi, $binaural, $mglobal, $idTrabajador){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_menoscabo (porcentaje_od, porcentaje_oi, binaural, mglobal, estado, created_at, id_trabajador) VALUES ($porcentajeOd, $porcentajeOi, $binaural, $mglobal, '1', '$createdAt', $idTrabajador)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idMenoscabo, $porcentajeOd, $porcentajeOi, $binaural, $mglobal, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_menoscabo SET porcentaje_od = $porcentajeOd, porcentaje_oi = $porcentajeOi, binaural = $binaural, mglobal = $mglobal, id_trabajador = $idTrabajador WHERE id_menoscabo = $idMenoscabo";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idMenoscabo;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idMenoscabo){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_menoscabo WHERE id_menoscabo = $idMenoscabo";
			$sql = "UPDATE tbl_menoscabo SET estado = 0 WHERE id_menoscabo = $idMenoscabo";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idMenoscabo;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>