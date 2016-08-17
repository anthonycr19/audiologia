<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALArchivo.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALArchivo {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_archivo WHERE estado = 1 ORDER BY id_archivo DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idArchivo){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_archivo WHERE id_archivo = $idArchivo AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($nombreArchivo, $tipo, $cantidadRegistros, $fechaRegistro, $idEmpresa){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_archivo (nombre_archivo, tipo, cantidad_registros, fecha_registro, estado, created_at, id_empresa) VALUES ('$nombreArchivo', '$tipo', $cantidadRegistros, '$fechaRegistro', '1', '$createdAt', $idEmpresa)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idArchivo, $nombreArchivo, $tipo, $cantidadRegistros, $fechaRegistro, $idEmpresa){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_archivo SET nombre_archivo = '$nombreArchivo', tipo = '$tipo', cantidad_registros = $cantidadRegistros, fecha_registro = '$fechaRegistro', id_empresa = $idEmpresa WHERE id_archivo = $idArchivo";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idArchivo;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarxEmpresa */

		public function ActualizarxEmpresa($idArchivo, $idEmpresa){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_archivo SET id_empresa = $idEmpresa WHERE id_archivo = $idArchivo";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idArchivo;
			$this->cn->Desconectarse($link);

			return $result;
		}

		/* Funcion: Eliminar */

		public function Eliminar($idArchivo){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_archivo WHERE id_archivo = $idArchivo";
			$sql = "UPDATE tbl_archivo SET estado = 0 WHERE id_archivo = $idArchivo";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idArchivo;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>