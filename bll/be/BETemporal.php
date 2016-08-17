<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BETemporal.php
	* Fecha : domingo 09 de mayo del 2015 03:53:05 p.m.
	* Autor : CAPSULE SAC
	**/

	class BETemporal {

		/* Asociaciones */

		/* Agregaciones */

		/* Composiciones */

		/* Atributos */
		public $idTemporal;
		public $razonSocial;
		public $ruc;
		public $direccion;
		public $contacto;	
		public $apellidos;	
		public $nombres;
		public $dni;
		public $fechaNacimiento;
		public $edad;
		public $fecha;
		public $areaTrabajo;
		public $puestoTrabajo;
		public $subArea;
		public $sexo;
		public $tiempoServicio;
		public $fechaAudiometria;
		public $tipoEpp;
		public $valorNrr;
		public $nivelRuido;
		public $descripcionOd;
		public $descripcionOi;
		public $od_250;
		public $od_500;
		public $od_1000;
		public $od_2000;
		public $od_3000;
		public $od_4000;
		public $od_6000;
		public $od_8000;
		public $porcentajeOd;
		public $oi_250;
		public $oi_500;
		public $oi_1000;
		public $oi_2000;
		public $oi_3000;
		public $oi_4000;
		public $oi_6000;
		public $oi_8000;
		public $escalaKlockhoffOd;
		public $escalaKlockhoffOi;
		public $interpretacionKlock;
		public $condicionAuditiva;
		public $porcentajeOi;
		public $binaural;
		public $mglobal;
		public $interpretacionOd;
		public $interpretacionOi;
		public $cie_10;
		public $rGeneral;
		public $especifica;
		public $complementarios;
		public $oi_khz;
		public $od_khz;
		public $od_sts;
		public $oi_sts;


		/* Funcion Constructor*/
		function __construct($idTemporal=NULL, $razonSocial=NULL, $ruc=NULL, $direccion=NULL, $contacto=NULL, $apellidos=NULL, $nombres=NULL, $dni=NULL, $fechaNacimiento=NULL, $edad=NULL, $fecha=NULL, $areaTrabajo=NULL, $puestoTrabajo=NULL, $subArea=NULL, $sexo=NULL, $tiempoServicio=NULL, $fechaAudiometria=NULL, $tipoEpp=NULL, $valorNrr=NULL, $nivelRuido=NULL, $descripcionOd=NULL, $descripcionOi=NULL, $od_250=NULL, $od_500=NULL, $od_1000=NULL, $od_2000=NULL, $od_3000=NULL, $od_4000=NULL, $od_6000=NULL, $od_8000=NULL, $porcentajeOd=NULL, $oi_250=NULL, $oi_500=NULL, $oi_1000=NULL, $oi_2000=NULL, $oi_3000=NULL, $oi_4000=NULL, $oi_6000=NULL, $oi_8000=NULL, $escalaKlockhoffOd=NULL, $escalaKlockhoffOi=NULL, $interpretacionKlock=NULL, $condicionAuditiva=NULL, $porcentajeOi=NULL, $binaural=NULL, $mglobal=NULL, $interpretacionOd=NULL, $interpretacionOi=NULL, $cie_10=NULL, $rGeneral=NULL, $especifica=NULL, $complementarios=NULL, $od_khz=NULL, $oi_khz=NULL, $od_sts=NULL, $oi_sts=NULL){

			$this->idTemporal = $idTemporal;
			$this->razonSocial = $razonSocial;
			$this->ruc = $ruc;
			$this->direccion = $direccion;
			$this->contacto = $contacto;	
			$this->apellidos = $apellidos;	
			$this->nombres = $nombres;
			$this->dni = $dni;
			$this->fechaNacimiento = $fechaNacimiento;
			$this->edad = $edad;
			$this->fecha = $fecha;
			$this->areaTrabajo = $areaTrabajo;
			$this->puestoTrabajo = $puestoTrabajo;
			$this->subArea = $subArea;
			$this->sexo = $sexo;
			$this->tiempoServicio = $tiempoServicio;
			$this->fechaAudiometria = $fechaAudiometria;
			$this->tipoEpp = $tipoEpp;
			$this->valorNrr = $valorNrr;
			$this->nivelRuido = $nivelRuido;
			$this->descripcionOd = $descripcionOd;
			$this->descripcionOi = $descripcionOi;
			$this->od_250 = $od_250;
			$this->od_500 = $od_500;
			$this->od_1000 = $od_1000;
			$this->od_2000 = $od_2000;
			$this->od_3000 = $od_3000;
			$this->od_4000 = $od_4000;
			$this->od_6000 = $od_6000;
			$this->od_8000 = $od_8000;
			$this->porcentajeOd = $porcentajeOd;
			$this->oi_250 = $oi_250;
			$this->oi_500 = $oi_500;
			$this->oi_1000 = $oi_1000;
			$this->oi_2000 = $oi_2000;
			$this->oi_3000 = $oi_3000;
			$this->oi_4000 = $oi_4000;
			$this->oi_6000 = $oi_6000;
			$this->oi_8000 = $oi_8000;
			$this->escalaKlockhoffOd = $escalaKlockhoffOd;
			$this->escalaKlockhoffOi = $escalaKlockhoffOi;
			$this->interpretacionKlock = $interpretacionKlock;
			$this->condicionAuditiva = $condicionAuditiva;
			$this->porcentajeOi = $porcentajeOi;
			$this->binaural = $binaural;
			$this->mglobal = $mglobal;
			$this->interpretacionOd = $interpretacionOd;
			$this->interpretacionOi = $interpretacionOi;
			$this->cie_10 = $cie_10;
			$this->rGeneral = $rGeneral;
			$this->especifica = $especifica;
			$this->complementarios = $complementarios;
			$this->od_khz = $od_khz;
			$this->oi_khz = $oi_khz;
			$this->od_sts = $od_sts;
			$this->oi_sts = $oi_sts;

		}

		/* Funcion Destructor */
		function __destruct(){

			$this->idTemporal = NULL;
			$this->razonSocial = NULL;
			$this->ruc = NULL;
			$this->direccion = NULL;
			$this->contacto = NULL;
			$this->apellidos = NULL;
			$this->nombres = NULL;
			$this->dni = NULL;
			$this->fechaNacimiento = NULL;
			$this->edad = NULL;
			$this->fecha = NULL;
			$this->areaTrabajo = NULL;
			$this->puestoTrabajo = NULL;
			$this->subArea = NULL;
			$this->sexo = NULL;
			$this->tiempoServicio = NULL;
			$this->fechaAudiometria = NULL;
			$this->tipoEpp = NULL;
			$this->valorNrr = NULL;
			$this->nivelRuido = NULL;
			$this->descripcionOd = NULL;
			$this->descripcionOi = NULL;
			$this->od_250 = NULL;
			$this->od_500 = NULL;
			$this->od_1000 = NULL;
			$this->od_2000 = NULL;
			$this->od_3000 = NULL;
			$this->od_4000 = NULL;
			$this->od_6000 = NULL;
			$this->od_8000 = NULL;
			$this->porcentajeOd = NULL;
			$this->oi_250 = NULL;
			$this->oi_500 = NULL;
			$this->oi_1000 = NULL;
			$this->oi_2000 = NULL;
			$this->oi_3000 = NULL;
			$this->oi_4000 = NULL;
			$this->oi_6000 = NULL;
			$this->oi_8000 = NULL;
			$this->escalaKlockhoffOd = NULL;
			$this->escalaKlockhoffOi = NULL;
			$this->interpretacionKlock = NULL;
			$this->condicionAuditiva = NULL;
			$this->porcentajeOi = NULL;
			$this->binaural = NULL;
			$this->mglobal = NULL;
			$this->interpretacionOd = NULL;
			$this->interpretacionOi = NULL;
			$this->cie_10 = NULL;
			$this->rGeneral = NULL;
			$this->especifica = NULL;
			$this->complementarios = NULL;
			$this->oi_khz = NULL;
			$this->od_khz = NULL;
			$this->od_sts = NULL;
			$this->oi_sts = NULL;

		}
	}
?>