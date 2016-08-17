<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALRecomendacion.php
	* Fecha : lunes 23 de marzo del 2015 11:53:34 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALRecomendacion {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_recomendacion WHERE estado = 1 ORDER BY id_recomendacion DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idRecomendacion){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_recomendacion WHERE id_recomendacion = $idRecomendacion AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($rGeneral, $especifica, $complementarios, $conclusion, $idTrabajador){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_recomendacion (rgeneral, especifica, complementarios, conclusion, estado, created_at, id_trabajador) VALUES ('$rGeneral', '$especifica', '$complementarios', '$conclusion', '1', '$createdAt', $idTrabajador)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idRecomendacion, $rGeneral, $especifica, $complementarios, $conclusion, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_recomendacion SET rgeneral = '$rGeneral', especifica = '$especifica', complementarios = '$complementarios', conclusion = '$conclusion', id_trabajador = $idTrabajador WHERE id_recomendacion = $idRecomendacion";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idRecomendacion;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idRecomendacion){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_recomendacion WHERE id_recomendacion = $idRecomendacion";
			$sql = "UPDATE tbl_recomendacion SET estado = 0 WHERE id_recomendacion = $idRecomendacion";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idRecomendacion;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>