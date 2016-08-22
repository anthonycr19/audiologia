<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEEmpresaTrabajador.php
	* Fecha : sábado 21 de marzo del 2015 09:54:44 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEEmpresaTrabajador {

		/* Asociaciones */
		public $idTrabajador;
		public $idEmpresa;
		public $idExperienciaLaboral;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idEmpresaTrabajador;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idEmpresaTrabajador=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL, $idEmpresa=NULL, $idExperienciaLaboral=NULL){

			$this->idEmpresaTrabajador = $idEmpresaTrabajador;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
			$this->idEmpresa = $idEmpresa;
			$this->idExperienciaLaboral = $idExperienciaLaboral;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idEmpresaTrabajador = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
			$this->idEmpresa = NULL;
			$this->idExperienciaLaboral = NULL;
		}
	}
?>