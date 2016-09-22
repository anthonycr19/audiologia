<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEExperienciaLaboral.php
	* Fecha : sábado 21 de marzo del 2015 10:04:04 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEExperienciaLaboral {

		/* Asociaciones */
		public $idTrabajador;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idExperienciaLaboral;
		public $fecha;
		public $areaTrabajo;
		public $subArea;
		public $puestoTrabajo;
		public $tiempoServicio;
		public $nivelRuido;
		public $tipoEpp;
		public $valorNrr;
		public $tiempoUso;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idExperienciaLaboral=NULL, $fecha=NULL, $areaTrabajo=NULL, $subArea=NULL, $puestoTrabajo=NULL, $tiempoServicio=NULL, $nivelRuido=NULL, $tipoEpp=NULL, $valorNrr=NULL, $tiempoUso=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL){

			$this->idExperienciaLaboral = $idExperienciaLaboral;
			$this->fecha = $fecha;
			$this->areaTrabajo = $areaTrabajo;
			$this->subArea = $subArea;
			$this->puestoTrabajo = $puestoTrabajo;
			$this->tiempoServicio = $tiempoServicio;
			$this->nivelRuido = $nivelRuido;
			$this->tipoEpp = $tipoEpp;
			$this->valorNrr = $valorNrr;
			$this->tiempoUso = $tiempoUso;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idExperienciaLaboral = NULL;
			$this->fecha = NULL;
			$this->areaTrabajo = NULL;
			$this->subArea = NULL;
			$this->puestoTrabajo = NULL;
			$this->tiempoServicio = NULL;
			$this->nivelRuido = NULL;
			$this->tipoEpp = NULL;
			$this->valorNrr = NULL;
			$this->tiempoUso = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
		}
	}
?>