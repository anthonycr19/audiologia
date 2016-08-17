<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEPerfilOpcion.php
	* Fecha : sábado de 16 de mayo del 2015 09:25:05 a.m.
	* Autor : CAPSULE SAC
	**/

	class BEPerfilOpcion {

		/* Asociaciones */
		public $idRol;
		public $idOpciones;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idPerfilOpcion;
		public $estado;


		/* Funcion Constructor*/
		function __construct($idPerfilOpcion=NULL, $estado=NULL, $idRol=NULL, $idOpciones=NULL){

			$this->idPerfilOpcion = $idPerfilOpcion;
			$this->estado = $estado;
			$this->idRol = $idRol;
			$this->idOpciones = $idOpciones;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idPerfilOpcion = NULL;
			$this->estado = NULL;
			$this->idRol = NULL;
			$this->idOpciones = NULL;
		}
	}
?>