<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BODiagnostico.php
	* Fecha : domingo 09 de mayo del 2015 08:33:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEDiagnostico.php');
	include('../../dal/DALDiagnostico.php');
		
	class BODiagnostico {
	
		/* Atributos */
		public $_DALDiagnostico;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALDiagnostico = new DALDiagnostico();
			$result = $this->_DALDiagnostico->GetEntidad();
			
			$arrayDiagnostico = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayDiagnostico, new BEDiagnostico($row['id_diagnostico'], $row['escala_klockhoff_od'], $row['interpretacion_od'], $row['escala_klockhoff_oi'], $row['interpretacion_oi'], $row['cie_10'], $row['interpretacion_klock'], $row['condicion_auditiva'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador']));
			}
			
			$this->_DALDiagnostico = NULL;
			
			return $arrayDiagnostico;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idDiagnostico) {
				
			$this->_DALDiagnostico = new DALDiagnostico();
			$result = $this->_DALDiagnostico->GetEntidadxId($idDiagnostico);
			
			$arrayDiagnostico = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayDiagnostico, new BEDiagnostico($row['id_diagnostico'], $row['escala_klockhoff_od'], $row['interpretacion_od'], $row['escala_klockhoff_oi'], $row['interpretacion_oi'], $row['cie_10'], $row['interpretacion_klock'], $row['condicion_auditiva'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALDiagnostico = NULL;
			
			return $arrayDiagnostico;
		}


		/* Funcion : GetEntidadxTrabajador */
		public function GetEntidadxTrabajador($idTrabajador) {
				
			$this->_DALDiagnostico = new DALDiagnostico();
			$result = $this->_DALDiagnostico->GetEntidadxTrabajador($idTrabajador);
			
			$arrayDiagnostico = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayDiagnostico, new BEDiagnostico($row['id_diagnostico'], $row['escala_klockhoff_od'], $row['interpretacion_od'], $row['escala_klockhoff_oi'], $row['interpretacion_oi'], $row['cie_10'], $row['interpretacion_klock'], $row['condicion_auditiva'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALDiagnostico = NULL;
			
			return $arrayDiagnostico;
		}

		
		/* Funcion : Insertar */
		public function Insertar($escalaKlockhoffOd, $interpretacionOd, $escalaKlockhoffOi, $interpretacionOi, $cie_10, $interpretacionKlock, $condicionAuditiva, $idTrabajador) {
	
			$this->_DALDiagnostico = new DALDiagnostico();
			$result = $this->_DALDiagnostico->Insertar($escalaKlockhoffOd, $interpretacionOd, $escalaKlockhoffOi, $interpretacionOi, $cie_10, $interpretacionKlock, $condicionAuditiva, $idTrabajador);
			$this->_DALDiagnostico = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idDiagnostico, $escalaKlockhoffOd, $interpretacionOd, $escalaKlockhoffOi, $interpretacionOi, $cie_10, $interpretacionKlock, $condicionAuditiva, $idTrabajador) {
	
			$this->_DALDiagnostico = new DALDiagnostico();
			$result = $this->_DALDiagnostico->Actualizar($idDiagnostico, $escalaKlockhoffOd, $interpretacionOd, $escalaKlockhoffOi, $interpretacionOi, $cie_10, $interpretacionKlock, $condicionAuditiva, $idTrabajador);
			$this->_DALDiagnostico = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idDiagnostico) {
	
			$this->_DALDiagnostico = new DALDiagnostico();
			$result = $this->_DALDiagnostico->Eliminar($idDiagnostico);
			$this->_DALDiagnostico = NULL;
			
			return $result;
		}
			 
	}
?> 