<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEVstBusquedaEmpresa.php
	* Fecha : jueves 14 de mayo del 2015 01:31:05 a.m.
	* Autor : CAPSULE SAC
	**/

	class BEVstBusquedaEmpresa {

		/* Asociaciones */

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idEmpresa;
		public $razonSocial;
		public $ruc;
		public $direccion;
		public $contacto;
		public $idArchivo;
		public $nombreArchivo;
		public $tipo;
		public $cantidadRegistros;
		public $fechaRegistro;


		/* Funcion Constructor*/
		function __construct($idEmpresa=NULL, $razonSocial=NULL, $ruc=NULL, $direccion=NULL, $contacto=NULL, $idArchivo=NULL, $nombreArchivo=NULL, $tipo=NULL, $cantidadRegistros=NULL, $fechaRegistro=NULL){

			$this->idEmpresa = $idEmpresa;
			$this->razonSocial = $razonSocial;
			$this->ruc = $ruc;
			$this->direccion = $direccion;
			$this->contacto = $contacto;
			$this->idArchivo = $idArchivo;
			$this->nombreArchivo = $nombreArchivo;
			$this->tipo = $tipo;
			$this->cantidadRegistros = $cantidadRegistros;
			$this->fechaRegistro = $fechaRegistro;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idEmpresa = NULL;
			$this->razonSocial = NULL;
			$this->ruc = NULL;
			$this->direccion = NULL;
			$this->contacto = NULL;
			$this->idArchivo = NULL;
			$this->nombreArchivo = NULL;
			$this->tipo = NULL;
			$this->cantidadRegistros = NULL;
			$this->fechaRegistro = NULL;
		}
	}
?>