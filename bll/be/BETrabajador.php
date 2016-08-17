<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BETrabajador.php
	* Fecha : sábado 21 de marzo del 2015 10:22:52 p.m.
	* Autor : CAPSULE SAC
	**/

	class BETrabajador {

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
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idTrabajador=NULL, $nombre=NULL, $apellidos=NULL, $dni=NULL, $fechaNacimiento=NULL, $sexo=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL){

			$this->idTrabajador = $idTrabajador;
			$this->nombre = $nombre;
			$this->apellidos = $apellidos;
			$this->dni = $dni;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->sexo = $sexo;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idTrabajador = NULL;
			$this->nombre = NULL;
			$this->apellidos = NULL;
			$this->dni = NULL;
			$this->fechaNacimiento = NULL;
			$this->sexo = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
		}
	}
?>