<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALArchivoTrabajador.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALArchivoTrabajador {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */
		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_archivo_trabajador WHERE estado = 1 ORDER BY id_archivo_trabajador DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idArchivoTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_archivo_trabajador WHERE id_archivo_trabajador = $idArchivoTrabajador AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($idArchivo, $idTrabajador){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_archivo_trabajador (estado, created_at, id_archivo, id_trabajador) VALUES ('1', '$createdAt', $idArchivo, $idTrabajador)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idArchivoTrabajador, $idArchivo, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_archivo_trabajador SET id_archivo = $idArchivo, id_trabajador = $idTrabajador WHERE id_archivo_trabajador = $idArchivoTrabajador";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idArchivoTrabajador;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idArchivoTrabajador){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_archivo_trabajador WHERE id_archivo_trabajador = $idArchivoTrabajador";
			$sql = "UPDATE tbl_archivo_trabajador SET estado = 0 WHERE id_archivo_trabajador = $idArchivoTrabajador";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idArchivoTrabajador;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>