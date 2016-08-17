<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEMenoscabo.php
	* Fecha : sábado 21 de marzo del 2015 10:11:56 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEMenoscabo {

		/* Asociaciones */
		public $idTrabajador;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idMenoscabo;
		public $porcentajeOd;
		public $porcentajeOi;
		public $binaural;
		public $mglobal;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idMenoscabo=NULL, $porcentajeOd=NULL, $porcentajeOi=NULL, $binaural=NULL, $mglobal=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL){

			$this->idMenoscabo = $idMenoscabo;
			$this->porcentajeOd = $porcentajeOd;
			$this->porcentajeOi = $porcentajeOi;
			$this->binaural = $binaural;
			$this->mglobal = $mglobal;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idMenoscabo = NULL;
			$this->porcentajeOd = NULL;
			$this->porcentajeOi = NULL;
			$this->binaural = NULL;
			$this->mglobal = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
		}
	}
?>