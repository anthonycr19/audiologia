<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALInforme.php
	* Fecha : lunes 23 de marzo del 2015 11:21:52 p.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");

	class DALInforme {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_informe WHERE estado = 1 ORDER BY id_informe DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idInforme){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_informe WHERE id_informe = $idInforme AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxIdAudioTonalOd */

		public function GetEntidadxIdAudioTonalOd($idAudioTonalOd){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_informe WHERE id_audio_tonal_od = $idAudioTonalOd AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxFechaLbOdxFechaCtOdxIdTrabajador */

		public function GetEntidadxFechaLbOdxFechaCtOdxIdTrabajador($fechaLbOd, $fechaCtOd, $idTrabajador){

			$this->cn = new Conexion();
/*			$sql = "SELECT i.id_informe, i.fecha_informe, i.estado, i.created_at, i.updated_at, i.id_trabajador, i.id_audio_tonal_od, i.id_audio_tonal_oi, i.id_diagnostico, i.id_otoscopia, i.id_recomendacion, i.id_experiencia_laboral, i.id_linea_base, i.id_empresa, i.id_menoscabo 
					FROM tbl_informe i JOIN tbl_otoscopia o ON (o.id_otoscopia = i.id_otoscopia) 
					WHERE i.id_trabajador = ".$idTrabajador." AND o.fecha_audiometria BETWEEN '".$fechaLbOd."' AND '".$fechaCtOd."'";*/
			$sql = "SELECT i.id_informe, i.fecha_informe, i.estado, i.created_at, i.updated_at, i.id_trabajador, i.id_audio_tonal_od, i.id_audio_tonal_oi, i.id_diagnostico, i.id_otoscopia, i.id_recomendacion, i.id_experiencia_laboral, i.id_linea_base, i.id_empresa, i.id_menoscabo 
					FROM tbl_informe i JOIN tbl_otoscopia o ON (o.id_otoscopia = i.id_otoscopia) 
					WHERE i.id_trabajador = ".$idTrabajador;
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($fechaInforme, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idDiagnostico, $idOtoscopia, $idRecomendacion, $idExperienciaLaboral, $idLineaBase, $idEmpresa, $idMenoscabo){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_informe (fecha_informe, estado, created_at, id_trabajador, id_audio_tonal_od, id_audio_tonal_oi, id_diagnostico, id_otoscopia, id_recomendacion, id_experiencia_laboral, id_linea_base, id_empresa, id_menoscabo) VALUES ('$fechaInforme', '1', '$createdAt', '$idTrabajador', '$idAudioTonalOd', '$idAudioTonalOi', '$idDiagnostico', '$idOtoscopia', '$idRecomendacion', '$idExperienciaLaboral', '$idLineaBase', '$idEmpresa', '$idMenoscabo')";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idInforme, $fechaInforme, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idDiagnostico, $idOtoscopia, $idRecomendacion, $idExperienciaLaboral, $idLineaBase, $idEmpresa, $idMenoscabo){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_informe SET fecha_informe = '$fechaInforme', id_trabajador = '$idTrabajador', id_audio_tonal_od = '$idAudioTonalOd', id_audio_tonal_oi = '$idAudioTonalOi', id_diagnostico = '$idDiagnostico', id_otoscopia = '$idOtoscopia', id_recomendacion = '$idRecomendacion', id_experiencia_laboral = '$idExperienciaLaboral', id_linea_base = '$idLineaBase', id_empresa = '$idEmpresa', id_menoscabo = '$idMenoscabo' WHERE id_informe = $idInforme";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idInforme;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarxLb */

		public function ActualizarxLb($idInforme, $idLineaBase){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_informe SET id_linea_base = '$idLineaBase' WHERE id_informe = $idInforme";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idInforme;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idInforme){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_informe WHERE id_informe = $idInforme";
			$sql = "UPDATE tbl_informe SET estado = 0 WHERE id_informe = $idInforme";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idInforme;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>