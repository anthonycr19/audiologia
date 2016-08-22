<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEEmpresa.php
	* Fecha : sábado 21 de marzo del 2015 09:51:27 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEEmpresa {

		/* Asociaciones */

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idEmpresa;
		public $razonSocial;
		public $ruc;
		public $direccion;
		public $contacto;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idEmpresa=NULL, $razonSocial=NULL, $ruc=NULL, $direccion=NULL, $contacto=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL){

			$this->idEmpresa = $idEmpresa;
			$this->razonSocial = $razonSocial;
			$this->ruc = $ruc;
			$this->direccion = $direccion;
			$this->contacto = $contacto;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idEmpresa = NULL;
			$this->razonSocial = NULL;
			$this->ruc = NULL;
			$this->direccion = NULL;
			$this->contacto = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
		}
	}
?>