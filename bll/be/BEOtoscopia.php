<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEOtoscopia.php
	* Fecha : sábado 21 de marzo del 2015 10:15:07 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEOtoscopia {

		/* Asociaciones */
		public $idTrabajador;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idOtoscopia;
		public $fechaAudiometria;
		public $descripcionOd;
		public $descripcionOi;
		public $edadTrabajador;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idOtoscopia=NULL, $fechaAudiometria=NULL, $descripcionOd=NULL, $descripcionOi=NULL, $edadTrabajador=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL){

			$this->idOtoscopia = $idOtoscopia;
			$this->fechaAudiometria = $fechaAudiometria;
			$this->descripcionOd = $descripcionOd;
			$this->descripcionOi = $descripcionOi;
			$this->edadTrabajador = $edadTrabajador;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idOtoscopia = NULL;
			$this->fechaAudiometria = NULL;
			$this->descripcionOd = NULL;
			$this->descripcionOi = NULL;			
			$this->edadTrabajador = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
		}
	}
?>