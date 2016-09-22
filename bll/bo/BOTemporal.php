<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOTemporal.php
	* Fecha : domingo 09 de mayo del 2015 05:03:05 p.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/
	
	require_once('../../bll/be/BETemporal.php');
	require_once('../../dal/DALTemporal.php');
		
	class BOTemporal {
	
		/* Atributos */
		public $_DALTemporal;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALTemporal = new DALTemporal();
			$result = $this->_DALTemporal->GetEntidad();
			
			$arrayTemporal = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayTemporal, new BETemporal($row['id_temporal'], $row['razon_social'], $row['ruc'], $row['direccion'], $row['contacto'], $row['apellidos'], $row['nombres'], $row['dni'], $row['fecha_nacimiento'], $row['edad'], $row['fecha'], $row['area_trabajo'], $row['puesto_trabajo'], $row['sub_area'], $row['sexo'], $row['tiempo_servicio'], $row['fecha_audiometria'], $row['tipo_epp'], $row['valor_nrr'], $row['nivel_ruido'], $row['descripcion_od'], $row['descripcion_oi'], $row['od_250'], $row['od_500'], $row['od_1000'], $row['od_2000'], $row['od_3000'], $row['od_4000'], $row['od_6000'], $row['od_8000'], $row['porcentaje_od'], $row['oi_250'], $row['oi_500'], $row['oi_1000'], $row['oi_2000'], $row['oi_3000'], $row['oi_4000'], $row['oi_6000'], $row['oi_8000'], $row['escala_klockhoff_od'], $row['escala_klockhoff_oi'], $row['interpretacion_klock'], $row['condicion_auditiva'], $row['porcentaje_oi'], $row['binaural'], $row['mglobal'], $row['interpretacion_od'], $row['interpretacion_oi'], $row['cie_10'], $row['rgeneral'], $row['especifica'], $row['complementarios'], $row['od_khz'], $row['oi_khz'], $row['od_sts'], $row['oi_sts']));
			}
			
			$this->_DALTemporal = NULL;
			
			return $arrayTemporal;
		}

		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idTemporal) {
				
			$this->_DALTemporal = new DALTemporal();
			$result = $this->_DALTemporal->GetEntidadxId($idTemporal);
			
			$arrayTemporal = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayTemporal, new BETemporal($row['id_temporal'], $row['razon_social'], $row['ruc'], $row['direccion'], $row['contacto'], $row['apellidos'], $row['nombres'], $row['dni'], $row['fecha_nacimiento'], $row['edad'], $row['fecha'], $row['area_trabajo'], $row['puesto_trabajo'], $row['sub_area'], $row['sexo'], $row['tiempo_servicio'], $row['fecha_audiometria'], $row['tipo_epp'], $row['valor_nrr'], $row['nivel_ruido'], $row['descripcion_od'], $row['descripcion_oi'], $row['od_250'], $row['od_500'], $row['od_1000'], $row['od_2000'], $row['od_3000'], $row['od_4000'], $row['od_6000'], $row['od_8000'], $row['porcentaje_od'], $row['oi_250'], $row['oi_500'], $row['oi_1000'], $row['oi_2000'], $row['oi_3000'], $row['oi_4000'], $row['oi_6000'], $row['oi_8000'], $row['escala_klockhoff_od'], $row['escala_klockhoff_oi'], $row['interpretacion_klock'], $row['condicion_auditiva'], $row['porcentaje_oi'], $row['binaural'], $row['mglobal'], $row['interpretacion_od'], $row['interpretacion_oi'], $row['cie_10'], $row['rgeneral'], $row['especifica'], $row['complementarios'], $row['od_khz'], $row['oi_khz'], $row['od_sts'], $row['oi_sts'])); 
			}
			
			$this->_DALTemporal = NULL;
			
			return $arrayTemporal;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($razonSocial, $ruc, $direccion, $contacto, $apellidos, $nombres, $dni, $fechaNacimiento, $edad, $fecha, $areaTrabajo, $puestoTrabajo, $subArea, $sexo, $tiempoServicio, $fechaAudiometria, $tipoEpp, $valorNrr, $nivelRuido, $descripcionOd, $descripcionOi, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $porcentajeOd, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $escalaKlockhoffOd, $escalaKlockhoffOi, $interpretacionKlock, $condicionAuditiva, $porcentajeOi, $binaural, $mglobal, $interpretacionOd, $interpretacionOi, $cie_10, $rGeneral, $especifica, $complementarios, $od_khz, $oi_khz, $od_sts, $oi_sts) {
	
			$this->_DALTemporal = new DALTemporal();
			$result = $this->_DALTemporal->Insertar($razonSocial, $ruc, $direccion, $contacto, $apellidos, $nombres, $dni, $fechaNacimiento, $edad, $fecha, $areaTrabajo, $puestoTrabajo, $subArea, $sexo, $tiempoServicio, $fechaAudiometria, $tipoEpp, $valorNrr, $nivelRuido, $descripcionOd, $descripcionOi, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $porcentajeOd, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $escalaKlockhoffOd, $escalaKlockhoffOi, $interpretacionKlock, $condicionAuditiva, $porcentajeOi, $binaural, $mglobal, $interpretacionOd, $interpretacionOi, $cie_10, $rGeneral, $especifica, $complementarios, $od_khz, $oi_khz, $od_sts, $oi_sts);
			$this->_DALTemporal = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idTemporal, $razonSocial, $ruc, $direccion, $contacto, $apellidos, $nombres, $dni, $fechaNacimiento, $edad, $fecha, $areaTrabajo, $puestoTrabajo, $subArea, $sexo, $tiempoServicio, $fechaAudiometria, $tipoEpp, $valorNrr, $nivelRuido, $descripcionOd, $descripcionOi, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $porcentajeOd, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $escalaKlockhoffOd, $escalaKlockhoffOi, $interpretacionKlock, $condicionAuditiva, $porcentajeOi, $binaural, $mglobal, $interpretacionOd, $interpretacionOi, $cie_10, $rGeneral, $especifica, $complementarios, $od_khz, $oi_khz, $od_sts, $oi_sts) {
	
			$this->_DALTemporal = new DALTemporal();
			$result = $this->_DALTemporal->Actualizar($idTemporal, $razonSocial, $ruc, $direccion, $contacto, $apellidos, $nombres, $dni, $fechaNacimiento, $edad, $fecha, $areaTrabajo, $puestoTrabajo, $subArea, $sexo, $tiempoServicio, $fechaAudiometria, $tipoEpp, $valorNrr, $nivelRuido, $descripcionOd, $descripcionOi, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $porcentajeOd, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $escalaKlockhoffOd, $escalaKlockhoffOi, $interpretacionKlock, $condicionAuditiva, $porcentajeOi, $binaural, $mglobal, $interpretacionOd, $interpretacionOi, $cie_10, $rGeneral, $especifica, $complementarios, $od_khz, $oi_khz, $od_sts, $oi_sts);
			$this->_DALTemporal = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idTemporal) {
	
			$this->_DALTemporal = new DALTemporal();
			$result = $this->_DALTemporal->Eliminar($idTemporal);
			$this->_DALTemporal = NULL;
			
			return $result;
		}
			 
	}
?> 