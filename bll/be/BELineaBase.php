<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BELineaBase.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : CAPSULE SAC
	**/

	class BELineaBase {

		/* Asociaciones */
		public $idTrabajador;
		public $idAudioTonalOd;
		public $idAudioTonalOi;
		public $idOtoscopia;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idLineaBase;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idLineaBase = NULL, $estado = NULL, $createdAt = NULL, $updatedAt = NULL, $idTrabajador = NULL, $idAudioTonalOd = NULL, $idAudioTonalOi = NULL, $idOtoscopia = NULL){

			$this->idLineaBase = $idLineaBase;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
			$this->idAudioTonalOd = $idAudioTonalOd;
			$this->idAudioTonalOi = $idAudioTonalOi;
			$this->idOtoscopia = $idOtoscopia;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idLineaBase = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
			$this->idAudioTonalOd = NULL;
			$this->idAudioTonalOi = NULL;
			$this->idOtoscopia = NULL;
		}
	}
?>