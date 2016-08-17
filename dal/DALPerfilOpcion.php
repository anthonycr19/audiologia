<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALPerfilOpcion.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALPerfilOpcion {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_perfil_opcion WHERE estado = 1 ORDER BY id_perfil_opcion DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idPerfilOpcion){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_perfil_opcion WHERE id_perfil_opcion = $idPerfilOpcion AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($idRol, $idOpciones){

			//$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_perfil_opcion (estado, id_rol, id_opciones) VALUES ('1', $idRol, $idOpciones)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idPerfilOpcion, $idRol, $idOpciones){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_perfil_opcion SET id_rol = $idRol, id_opciones = $idOpciones WHERE id_perfil_opcion = $idPerfilOpcion";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idPerfilOpcion;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idPerfilOpcion){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_perfil_opcion WHERE id_perfil_opcion = $idPerfilOpcion";
			$sql = "UPDATE tbl_perfil_opcion SET estado = 0 WHERE id_perfil_opcion = $idPerfilOpcion";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idPerfilOpcion;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>