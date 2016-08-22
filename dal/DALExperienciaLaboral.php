<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALExperienciaLaboral.php
	* Fecha : lunes 23 de marzo del 2015 10:59:13 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALExperienciaLaboral {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_experiencia_laboral WHERE estado = 1 ORDER BY id_experiencia_laboral DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idExperienciaLaboral){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_experiencia_laboral WHERE id_experiencia_laboral = $idExperienciaLaboral AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxTrabajador */

		public function GetEntidadxTrabajador($idTrabajador){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_experiencia_laboral WHERE id_trabajador = $idTrabajador AND estado = 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($fecha, $areaTrabajo, $subArea, $puestoTrabajo, $tiempoServicio, $nivelRuido, $tipoEpp, $valorNrr, $tiempoUso, $idTrabajador){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_experiencia_laboral (fecha, area_trabajo, sub_area, puesto_trabajo, tiempo_servicio, nivel_ruido, tipo_epp, valor_nrr, tiempo_uso, estado, created_at, id_trabajador) VALUES ('$fecha', '$areaTrabajo', '$subArea', '$puestoTrabajo', $tiempoServicio, '$nivelRuido', '$tipoEpp', $valorNrr, $tiempoUso, '1', '$createdAt', $idTrabajador)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idExperienciaLaboral, $fecha, $areaTrabajo, $subArea, $puestoTrabajo, $tiempoServicio, $nivelRuido, $tipoEpp, $valorNrr, $tiempoUso, $idTrabajador){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_experiencia_laboral SET fecha = '$fecha', area_trabajo = '$areaTrabajo', sub_area = '$subArea', puesto_trabajo = '$puestoTrabajo', tiempo_servicio = $tiempoServicio, nivel_ruido = '$nivelRuido', tipo_epp = '$tipoEpp', valor_nrr = $valorNrr, tiempo_uso = $tiempoUso, id_trabajador = $idTrabajador WHERE id_experiencia_laboral = $idExperienciaLaboral";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idExperienciaLaboral;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idExperienciaLaboral){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_experiencia_laboral WHERE id_experiencia_laboral = $idExperienciaLaboral";
			$sql = "UPDATE tbl_experiencia_laboral SET estado = 0 WHERE id_experiencia_laboral = $idExperienciaLaboral";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idExperienciaLaboral;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>