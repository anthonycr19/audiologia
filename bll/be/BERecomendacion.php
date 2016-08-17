<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BERecomendacion.php
	* Fecha : sábado 21 de marzo del 2015 10:17:44 p.m.
	* Autor : CAPSULE SAC
	**/

	class BERecomendacion {

		/* Asociaciones */
		public $idTrabajador;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idRecomendacion;
		public $rGeneral;
		public $especifica;
		public $complementarios;
		public $conclusion;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idRecomendacion=NULL, $rGeneral=NULL, $especifica=NULL, $complementarios=NULL, $conclusion=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL){

			$this->idRecomendacion = $idRecomendacion;
			$this->rGeneral = $rGeneral;
			$this->especifica = $especifica;
			$this->complementarios = $complementarios;
			$this->conclusion = $conclusion;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idRecomendacion = NULL;
			$this->rGeneral = NULL;
			$this->especifica = NULL;
			$this->complementarios = NULL;
			$this->conclusion = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
		}
	}
?>