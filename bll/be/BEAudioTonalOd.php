<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEAudioTonalOd.php
	* Fecha : sábado 21 de marzo del 2015 09:35:05 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEAudioTonalOd {

		/* Asociaciones */
		public $idTrabajador;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idAudioTonalOd;
		public $od_250;
		public $od_500;
		public $od_1000;
		public $od_2000;
		public $od_3000;
		public $od_4000;
		public $od_6000;
		public $od_8000;
		public $od_sts;
		public $od_khz;
		public $retest;
		public $fail;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idAudioTonalOd=NULL, $od_250=NULL, $od_500=NULL, $od_1000=NULL, $od_2000=NULL, $od_3000=NULL, $od_4000=NULL, $od_6000=NULL, $od_8000=NULL, $od_sts=NULL, $od_khz=NULL, $retest=NULL, $fail=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL){

			$this->idAudioTonalOd = $idAudioTonalOd;
			$this->od_250 = $od_250;
			$this->od_500 = $od_500;
			$this->od_1000 = $od_1000;
			$this->od_2000 = $od_2000;
			$this->od_3000 = $od_3000;
			$this->od_4000 = $od_4000;
			$this->od_6000 = $od_6000;
			$this->od_8000 = $od_8000;
			$this->od_sts = $od_sts;
			$this->od_khz = $od_khz;
			$this->retest = $retest;
			$this->fail = $fail;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idAudioTonalOd = NULL;
			$this->od_250 = NULL;
			$this->od_500 = NULL;
			$this->od_1000 = NULL;
			$this->od_2000 = NULL;
			$this->od_3000 = NULL;
			$this->od_4000 = NULL;
			$this->od_6000 = NULL;
			$this->od_8000 = NULL;
			$this->od_sts = NULL;
			$this->od_khz = NULL;
			$this->retest = NULL;
			$this->fail = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
		}
	}
?>