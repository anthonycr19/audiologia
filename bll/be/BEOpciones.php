<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEOpciones.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEOpciones {

		/* Asociaciones */

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idOpciones;
		public $descripcion;
		public $estado;


		/* Funcion Constructor*/
		function __construct($idOpciones=NULL, $descripcion=NULL, $estado=NULL){

			$this->idOpciones = $idOpciones;
			$this->descripcion = $descripcion;
			$this->estado = $estado;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idOpciones = NULL;
			$this->descripcion = NULL;
			$this->estado = NULL;
		}
	}
?>