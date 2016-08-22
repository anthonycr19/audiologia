<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEInforme.php
	* Fecha : sábado 21 de marzo del 2015 10:06:40 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEInforme {

		/* Asociaciones */
		public $idTrabajador;
		public $idAudioTonalOd;
		public $idAudioTonalOi;
		public $idDiagnostico;
		public $idOtoscopia;
		public $idRecomendacion;
		public $idExperienciaLaboral;
		public $idLineaBase;
		public $idEmpresa;
		public $idMenoscabo;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idInforme;
		public $fechaInforme;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idInforme=NULL, $fechaInforme=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL, $idAudioTonalOd=NULL, $idAudioTonalOi=NULL, $idDiagnostico=NULL, $idOtoscopia=NULL, $idRecomendacion=NULL, $idExperienciaLaboral=NULL, $idLineaBase=NULL, $idEmpresa=NULL, $idMenoscabo=NULL){

			$this->idInforme = $idInforme;
			$this->fechaInforme = $fechaInforme;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
			$this->idAudioTonalOd = $idAudioTonalOd;
			$this->idAudioTonalOi = $idAudioTonalOi;
			$this->idDiagnostico = $idDiagnostico;
			$this->idOtoscopia = $idOtoscopia;
			$this->idRecomendacion = $idRecomendacion;
			$this->idExperienciaLaboral = $idExperienciaLaboral;
			$this->idLineaBase = $idLineaBase;
			$this->idEmpresa = $idEmpresa;
			$this->idMenoscabo = $idMenoscabo;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idInforme = NULL;
			$this->fechaInforme = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
			$this->idAudioTonalOd = NULL;
			$this->idAudioTonalOi = NULL;
			$this->idDiagnostico = NULL;
			$this->idOtoscopia = NULL;
			$this->idRecomendacion = NULL;
			$this->idExperienciaLaboral = NULL;
			$this->idLineaBase = NULL;
			$this->idEmpresa = NULL;
			$this->idMenoscabo = NULL;
		}
	}
?>