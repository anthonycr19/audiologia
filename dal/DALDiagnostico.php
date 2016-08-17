<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALDiagnostico.php
	* Fecha : domingo 22 de marzo del 2015 10:08:08 p.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALDiagnostico {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_diagnostico WHERE estado = 1 ORDER BY id_diagnostico DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idDiagnostico){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_diagnostico WHERE id_diagnostico = $idDiagnostico AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxTrabajador */

		public function GetEntidadxTrabajador($idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_diagnostico WHERE id_trabajador = $idTrabajador AND estado = 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}

		/* Funcion: Insertar */

		public function Insertar($escalaKlockhoffOd, $interpretacionOd, $escalaKlockhoffOi, $interpretacionOi, $cie_10, $interpretacionKlock, $condicionAuditiva, $idTrabajador){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_diagnostico (escala_klockhoff_od, interpretacion_od, escala_klockhoff_oi, interpretacion_oi, cie_10, interpretacion_klock, condicion_auditiva, estado, created_at, id_trabajador) VALUES ('$escalaKlockhoffOd', '$interpretacionOd', '$escalaKlockhoffOi', '$interpretacionOi', '$cie_10', '$interpretacionKlock', '$condicionAuditiva', '1', '$createdAt', $idTrabajador)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idDiagnostico, $escalaKlockhoffOd, $interpretacionOd, $escalaKlockhoffOi, $interpretacionOi, $cie_10, $interpretacionKlock, $condicionAuditiva, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_diagnostico SET escala_klockhoff_od = '$escalaKlockhoffOd', interpretacion_od = '$interpretacionOd', escala_klockhoff_oi = '$escalaKlockhoffOi', interpretacion_oi = '$interpretacionOi', cie_10 = '$cie_10', interpretacion_klock = '$interpretacionKlock', condicion_auditiva = '$condicionAuditiva', id_trabajador = $idTrabajador WHERE id_diagnostico = $idDiagnostico";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idDiagnostico;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idDiagnostico){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_diagnostico WHERE id_diagnostico = $idDiagnostico";
			$sql = "UPDATE tbl_diagnostico SET estado = 0 WHERE id_diagnostico = $idDiagnostico";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idDiagnostico;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>