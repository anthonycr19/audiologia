<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BEDiagnostico.php
	* Fecha : sábado 21 de marzo del 2015 09:46:33 p.m.
	* Autor : CAPSULE SAC
	**/

	class BEDiagnostico {

		/* Asociaciones */
		public $idTrabajador;

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idDiagnostico;
		public $escalaKlockhoffOd;
		public $interpretacionOd;
		public $escalaKlockhoffOi;
		public $interpretacionOi;
		public $cie_10;
		public $interpretacionKlock;
		public $condicionAuditiva;
		public $estado;
		public $createdAt;
		public $updatedAt;


		/* Funcion Constructor*/
		function __construct($idDiagnostico=NULL, $escalaKlockhoffOd=NULL, $interpretacionOd=NULL, $escalaKlockhoffOi=NULL, $interpretacionOi=NULL, $cie_10=NULL, $interpretacionKlock=NULL, $condicionAuditiva=NULL, $estado=NULL, $createdAt=NULL, $updatedAt=NULL, $idTrabajador=NULL){

			$this->idDiagnostico = $idDiagnostico;
			$this->escalaKlockhoffOd = $escalaKlockhoffOd;
			$this->interpretacionOd = $interpretacionOd;
			$this->escalaKlockhoffOi = $escalaKlockhoffOi;
			$this->interpretacionOi = $interpretacionOi;
			$this->cie_10 = $cie_10;
			$this->interpretacionKlock = $interpretacionKlock;
			$this->condicionAuditiva = $condicionAuditiva;
			$this->estado = $estado;
			$this->createdAt = $createdAt;
			$this->updatedAt = $updatedAt;
			$this->idTrabajador = $idTrabajador;
		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idDiagnostico = NULL;
			$this->escalaKlockhoffOd = NULL;
			$this->interpretacionOd = NULL;
			$this->escalaKlockhoffOi = NULL;
			$this->interpretacionOi = NULL;
			$this->cie_10 = NULL;
			$this->interpretacionKlock = NULL;
			$this->condicionAuditiva = NULL;
			$this->estado = NULL;
			$this->createdAt = NULL;
			$this->updatedAt = NULL;
			$this->idTrabajador = NULL;
		}
	}
?>