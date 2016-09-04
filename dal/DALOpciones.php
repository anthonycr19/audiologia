<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALOpciones.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALOpciones {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_opciones WHERE estado = 1 ORDER BY id_opciones ASC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idOpciones){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_opciones WHERE id_opciones = $idOpciones AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($descripcion){

			//$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_opciones (descripcion, estado) VALUES ('$descripcion', '1')";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idOpciones, $descripcion){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_opciones SET descripcion = '$descripcion' WHERE id_opciones = $idOpciones";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idOpciones;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idOpciones){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_opciones WHERE id_opciones = $idOpciones";
			$sql = "UPDATE tbl_opciones SET estado = 0 WHERE id_opciones = $idOpciones";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idOpciones;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>