<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALEmpresa.php
	* Fecha : domingo 22 de marzo del 2015 10:29:58 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALEmpresa {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_empresa WHERE estado = 1 ORDER BY id_empresa DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idEmpresa){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_empresa WHERE id_empresa = $idEmpresa AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxRuc */

		public function GetEntidadxRuc($ruc){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_empresa WHERE ruc = $ruc AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}

        /* Funcion: GetEntidadxDireccion */

        public function GetEntidadxDireccion($direccion){

            $this->cn = new Conexion();
            $sql = "SELECT * FROM tbl_empresa WHERE direccion = '$direccion' AND estado = 1 LIMIT 1";
            $link = $this->cn->Conectarse();
            $result = mysql_query($sql, $link);
            $this->cn->Desconectarse($link);

            return $result;
        }

        /* Funcion: GetEntidadxDireccion */

        public function GetEntidades(){

            $this->cn = new Conexion();
            $sql = "SELECT count(DISTINCT direccion) FROM tbl_empresa";
            $link = $this->cn->Conectarse();
            $result = mysql_query($sql, $link);
            $this->cn->Desconectarse($link);

            return $result;
        }

        /* Funcion: Insertar */

		public function Insertar($razonSocial, $ruc, $direccion, $contacto){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_empresa (razon_social, ruc, direccion, contacto, estado, created_at) VALUES ('$razonSocial', '$ruc', '$direccion', '$contacto', '1', '$createdAt')";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idEmpresa, $razonSocial, $ruc, $direccion, $contacto){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_empresa SET razon_social = '$razonSocial', ruc = '$ruc', direccion = '$direccion', contacto = '$contacto' WHERE id_empresa = $idEmpresa";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idEmpresa;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idEmpresa){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_empresa WHERE id_empresa = $idEmpresa";
			$sql = "UPDATE tbl_empresa SET estado = 0 WHERE id_empresa = $idEmpresa";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idEmpresa;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>