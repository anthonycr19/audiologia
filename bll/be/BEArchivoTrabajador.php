<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEArchivoTrabajador.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEArchivoTrabajador {

		/* Asociaciones */
		public $idArchivo;
		public $idTrabajador;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idArchivoTrabajador;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idArchivoTrabajador=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idArchivo=NULL, $idTrabajador=NULL){

			$this->idArchivoTrabajador = $idArchivoTrabajador;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idArchivo = $idArchivo;
			$this->idTrabajador = $idTrabajador;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idArchivoTrabajador = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idArchivo = NULL;
			$this->idTrabajador = NULL;
		}
	}
?>