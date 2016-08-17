<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALTrabajador.php
	* Fecha : martes 24 de marzo del 2015 00:01:34 a.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALTrabajador {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_trabajador WHERE estado = 1 ORDER BY id_trabajador DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_trabajador WHERE id_trabajador = $idTrabajador AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxDni */

		public function GetEntidadxDni($dni){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_trabajador WHERE dni = $dni AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($nombre, $apellidos, $dni, $fechaNacimiento, $sexo){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_trabajador (nombre, apellidos, dni, fecha_nacimiento, sexo, estado, created_at) VALUES ('$nombre', '$apellidos', '$dni', '$fechaNacimiento', '$sexo', '1', '$createdAt')";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idTrabajador, $nombre, $apellidos, $dni, $fechaNacimiento, $sexo){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_trabajador SET nombre = '$nombre', apellidos = '$apellidos', dni = '$dni', fecha_nacimiento = '$fechaNacimiento', sexo = '$sexo' WHERE id_trabajador = $idTrabajador";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idTrabajador;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idTrabajador){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_trabajador WHERE id_trabajador = $idTrabajador";
			$sql = "UPDATE tbl_trabajador SET estado = 0 WHERE id_trabajador = $idTrabajador";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idTrabajador;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>