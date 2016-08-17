<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALEmpresaTrabajador.php
	* Fecha : martes 24 de marzo del 2015 00:10:47 a.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALEmpresaTrabajador {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_empresa_trabajador WHERE estado = 1 ORDER BY id_empresa_trabajador DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idEmpresaTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_empresa_trabajador WHERE id_empresa_trabajador = $idEmpresaTrabajador AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Verificar */

		public function Verificar($idTrabajador, $idEmpresa, $idExperienciaLaboral){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_empresa_trabajador WHERE id_trabajador = $idTrabajador AND id_empresa = $idEmpresa AND id_experiencia_laboral = $idExperienciaLaboral";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($idTrabajador, $idEmpresa, $idExperienciaLaboral){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_empresa_trabajador (created_at, id_trabajador, id_empresa, id_experiencia_laboral) VALUES ('$createdAt', $idTrabajador, $idEmpresa, $idExperienciaLaboral)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($id_empresa_trabajador, $idTrabajador, $idEmpresa, $idExperienciaLaboral){

			$updatedAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "UPDATE tbl_empresa_trabajador SET id_trabajador = $idTrabajador, id_empresa = $idEmpresa, id_experiencia_laboral = $idExperienciaLaboral WHERE id_empresa_trabajador = $idEmpresaTrabajador";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idEmpresaTrabajador;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idEmpresaTrabajador){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_empresa_trabajador WHERE id_empresa_trabajador = $idEmpresaTrabajador";
			$sql = "UPDATE tbl_empresa_trabajador SET estado = 0 WHERE id_empresa_trabajador = $idEmpresaTrabajador";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idEmpresaTrabajador;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>