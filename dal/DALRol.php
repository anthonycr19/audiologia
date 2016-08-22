<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALRol.php
	* Fecha : domingo 09 de mayo del 2015 08:10:34 a.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALRol {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			//$sql = "SELECT * FROM tbl_rol WHERE estado = 1 ORDER BY id_rol DESC";
			$sql = "SELECT * FROM tbl_rol WHERE estado = 1 OR estado = 0 ORDER BY nombre ASC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idRol){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_rol WHERE id_rol = $idRol AND (estado = 1 OR estado = 0)";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($nombre, $estado){

			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_rol (nombre, estado) VALUES ('$nombre', '$estado')";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idRol, $nombre, $estado){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_rol SET nombre = '$nombre', estado = '$estado' WHERE id_rol = $idRol";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idRol;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idRol){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_rol WHERE id_rol = $idRol";
			$sql = "UPDATE tbl_rol SET estado = 0 WHERE id_rol = $idRol";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idRol;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>