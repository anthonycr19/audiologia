<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BERol.php
	* Fecha : domingo 09 de mayo del 2015 02:11:44 a.m.
	* Autor : CAPSULE SAC
	**/

	class BERol {

		/* Asociaciones */

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idRol;
		public $nombre;
		public $estado;


		/* Funcion Constructor*/
		function __construct($idRol=NULL, $nombre=NULL, $estado=NULL){

			$this->idRol = $idRol;
			$this->nombre = $nombre;
			$this->estado = $estado;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idRol = NULL;
			$this->nombre = NULL;
			$this->estado = NULL;
		}
	}
?>