<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEVstBusquedaPacientes.php
	* Fecha : domingo 09 de mayo del 2015 07:23:05 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEVstBusquedaPacientes {

		/* Asociaciones */

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idTrabajador;
		public $nombre;
		public $apellidos;
		public $dni;
		public $fechaNacimiento;
		public $sexo;
		public $idEmpresa;
		public $razonSocial;
		public $ruc;
		public $direccion;
		public $contacto;
		public $idOtoscopia;
		public $fechaAudiometria;
		public $descripcionOd;
		public $descripcionOi;


		/* Funcion Constructor*/
		function __construct($idTrabajador=NULL, $nombre=NULL, $apellidos=NULL, $dni=NULL, $fechaNacimiento=NULL, $sexo=NULL, $idEmpresa=NULL, $razonSocial=NULL, $ruc=NULL, $direccion=NULL, $contacto=NULL, $idOtoscopia=NULL, $fechaAudiometria=NULL, $descripcionOd=NULL, $descripcionOi=NULL){

			$this->idTrabajador = $idTrabajador;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->dni = $dni;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->sexo = $sexo;
			$this->idEmpresa = $idEmpresa;
			$this->razonSocial = $razonSocial;
			$this->ruc = $ruc;
			$this->direccion = $direccion;
			$this->contacto = $contacto;
			$this->idOtoscopia = $idOtoscopia;
			$this->fechaAudiometria = $fechaAudiometria;
			$this->descripcionOd = $descripcionOd;
			$this->descripcionOi = $descripcionOi;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idTrabajador = NULL;
			$this->nombre = NULL;
			$this->apellidos = NULL;
			$this->dni = NULL;
			$this->fechaNacimiento = NULL;
			$this->sexo = NULL;
			$this->idEmpresa = NULL;
			$this->razonSocial = NULL;
			$this->ruc = NULL;
			$this->direccion = NULL;
			$this->contacto = NULL;
			$this->idOtoscopia = NULL;
			$this->fechaAudiometria = NULL;
			$this->descripcionOd = NULL;
			$this->descripcionOi = NULL;
		}
	}
?>