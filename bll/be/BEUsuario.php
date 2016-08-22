<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEUsuario.php
	* Fecha : domingo 09 de mayo del 2015 02:11:44 a.m.
	* Autor : CAPSULE SAC
	**/

	class BEUsuario {

		/* Asociaciones */
		public $idRol;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idUsuario;
		public $nombre;
		public $usuario;
		public $contrasenia;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idUsuario=NULL, $nombre=NULL, $usuario=NULL, $contrasenia=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idRol=NULL){

			$this->idUsuario = $idUsuario;
			$this->nombre = $nombre;
			$this->usuario = $usuario;
			$this->contrasenia = $contrasenia;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idRol = $idRol;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idUsuario = NULL;
			$this->nombre = NULL;
			$this->usuario = NULL;
			$this->contrasenia = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idRol = NULL;
		}
	}
?>