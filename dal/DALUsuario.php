<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALUsuario.php
	* Fecha : domingo 09 de mayo del 2015 08:10:34 a.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALUsuario {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_usuario WHERE estado = 1 OR estado = 0 ORDER BY nombre ASC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idUsuario){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_usuario WHERE id_usuario = $idUsuario AND (estado = 1 OR estado = 0) LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($nombre, $usuario, $contrasenia, $estado, $idRol){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_usuario (nombre, usuario, contrasenia, estado, created_at, id_rol) VALUES ('$nombre', '$usuario', '$contrasenia', '$estado', '$createdAt', $idRol)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idUsuario, $nombre, $usuario, $contrasenia, $estado, $idRol){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_usuario SET nombre = '$nombre', usuario = '$usuario', contrasenia = '$contrasenia', estado = '$estado', id_rol = $idRol WHERE id_usuario = $idUsuario";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idUsuario;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idUsuario){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_usuario WHERE id_usuario = $idUsuario";
			$sql = "UPDATE tbl_usuario SET estado = 0 WHERE id_usuario = $idUsuario";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idUsuario;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>