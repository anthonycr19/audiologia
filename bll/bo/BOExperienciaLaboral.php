<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOExperienciaLaboral.php
	* Fecha : domingo 09 de mayo del 2015 08:33:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEExperienciaLaboral.php');
	include('../../dal/DALExperienciaLaboral.php');
		
	class BOExperienciaLaboral {
	
		/* Atributos */
		public $_DALExperienciaLaboral;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALExperienciaLaboral = new DALExperienciaLaboral();
			$result = $this->_DALExperienciaLaboral->GetEntidad();
			
			$arrayExperienciaLaboral = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayExperienciaLaboral, new BEExperienciaLaboral($row['id_experiencia_laboral'], $row['fecha'], $row['area_trabajo'], $row['sub_area'], $row['puesto_trabajo'], $row['tiempo_servicio'], $row['nivel_ruido'], $row['tipo_epp'], $row['valor_nrr'], $row['tiempo_uso'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador']));
			}
			
			$this->_DALExperienciaLaboral = NULL;
			
			return $arrayExperienciaLaboral;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idExperienciaLaboral) {
				
			$this->_DALExperienciaLaboral = new DALExperienciaLaboral();
			$result = $this->_DALExperienciaLaboral->GetEntidadxId($idExperienciaLaboral);
			
			$arrayExperienciaLaboral = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayExperienciaLaboral, new BEExperienciaLaboral($row['id_experiencia_laboral'], $row['fecha'], $row['area_trabajo'], $row['sub_area'], $row['puesto_trabajo'], $row['tiempo_servicio'], $row['nivel_ruido'], $row['tipo_epp'], $row['valor_nrr'], $row['tiempo_uso'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALExperienciaLaboral = NULL;
			
			return $arrayExperienciaLaboral;
		}


		/* Funcion : GetEntidadxTrabajador */
		public function GetEntidadxTrabajador($idTrabajador) {
				
			$this->_DALExperienciaLaboral = new DALExperienciaLaboral();
			$result = $this->_DALExperienciaLaboral->GetEntidadxTrabajador($idTrabajador);
			
			$arrayExperienciaLaboral = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayExperienciaLaboral, new BEExperienciaLaboral($row['id_experiencia_laboral'], $row['fecha'], $row['area_trabajo'], $row['sub_area'], $row['puesto_trabajo'], $row['tiempo_servicio'], $row['nivel_ruido'], $row['tipo_epp'], $row['valor_nrr'], $row['tiempo_uso'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALExperienciaLaboral = NULL;
			
			return $arrayExperienciaLaboral;
		}

		
		/* Funcion : Insertar */
		public function Insertar($fecha, $areaTrabajo, $subArea, $puestoTrabajo, $tiempoServicio, $nivelRuido, $tipoEpp, $valorNrr, $tiempoUso, $idTrabajador) {
	
			$this->_DALExperienciaLaboral = new DALExperienciaLaboral();
			$result = $this->_DALExperienciaLaboral->Insertar($fecha, $areaTrabajo, $subArea, $puestoTrabajo, $tiempoServicio, $nivelRuido, $tipoEpp, $valorNrr, $tiempoUso, $idTrabajador);
			$this->_DALExperienciaLaboral = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idExperienciaLaboral, $fecha, $areaTrabajo, $subArea, $puestoTrabajo, $tiempoServicio, $nivelRuido, $tipoEpp, $valorNrr, $tiempoUso, $idTrabajador) {
	
			$this->_DALExperienciaLaboral = new DALExperienciaLaboral();
			$result = $this->_DALExperienciaLaboral->Actualizar($idExperienciaLaboral, $fecha, $areaTrabajo, $subArea, $puestoTrabajo, $tiempoServicio, $nivelRuido, $tipoEpp, $valorNrr, $tiempoUso, $idTrabajador);
			$this->_DALExperienciaLaboral = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idExperienciaLaboral) {
	
			$this->_DALExperienciaLaboral = new DALExperienciaLaboral();
			$result = $this->_DALExperienciaLaboral->Eliminar($idExperienciaLaboral);
			$this->_DALExperienciaLaboral = NULL;
			
			return $result;
		}
			 
	}
?> 