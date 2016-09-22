<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEAudioTonalOi.php
	* Fecha : sábado 21 de marzo del 2015 09:38:29 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEAudioTonalOi {

		/* Asociaciones */
		public $idTrabajador;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idAudioTonalOi;
		public $oi_250;
		public $oi_500;
		public $oi_1000;
		public $oi_2000;
		public $oi_3000;
		public $oi_4000;
		public $oi_6000;
		public $oi_8000;
		public $oi_sts;
		public $oi_khz;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idAudioTonalOi=NULL, $oi_250=NULL, $oi_500=NULL, $oi_1000=NULL, $oi_2000=NULL, $oi_3000=NULL, $oi_4000=NULL, $oi_6000=NULL, $oi_8000=NULL, $oi_sts=NULL, $oi_khz=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL){

			$this->idAudioTonalOi = $idAudioTonalOi;
			$this->oi_250 = $oi_250;
			$this->oi_500 = $oi_500;
			$this->oi_1000 = $oi_1000;
			$this->oi_2000 = $oi_2000;
			$this->oi_3000 = $oi_3000;
			$this->oi_4000 = $oi_4000;
			$this->oi_6000 = $oi_6000;
			$this->oi_8000 = $oi_8000;
			$this->oi_sts = $oi_sts;
			$this->oi_khz = $oi_khz;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idAudioTonalOi = NULL;
			$this->oi_250 = NULL;
			$this->oi_500 = NULL;
			$this->oi_1000 = NULL;
			$this->oi_2000 = NULL;
			$this->oi_3000 = NULL;
			$this->oi_4000 = NULL;
			$this->oi_6000 = NULL;
			$this->oi_8000 = NULL;
			$this->oi_sts = NULL;
			$this->oi_khz = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
		}
	}
?>