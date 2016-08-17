<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEArchivo.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEArchivo {

		/* Asociaciones */
		public $idEmpresa;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idArchivo;
		public $nombreArchivo;
		public $tipo;
		public $cantidadRegistros;
		public $fechaRegistro;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idArchivo=NULL, $nombreArchivo=NULL, $tipo=NULL, $cantidadRegistros=NULL, $fechaRegistro=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idEmpresa=NULL){

			$this->idArchivo = $idArchivo;
			$this->nombreArchivo = $nombreArchivo;
			$this->tipo = $tipo;
			$this->cantidadRegistros = $cantidadRegistros;
			$this->fechaRegistro = $fechaRegistro;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idEmpresa = $idEmpresa;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idArchivo = NULL;
			$this->nombreArchivo = NULL;
			$this->tipo = NULL;
			$this->cantidadRegistros = NULL;
			$this->fechaRegistro = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idEmpresa = NULL;
		}
	}
?>