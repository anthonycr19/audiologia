<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOMenoscabo.php
	* Fecha : domingo 09 de mayo del 2015 11:08:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEMenoscabo.php');
	include('../../dal/DALMenoscabo.php');
		
	class BOMenoscabo {
	
		/* Atributos */
		public $_DALMenoscabo;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALMenoscabo = new DALMenoscabo();
			$result = $this->_DALMenoscabo->GetEntidad();
			
			$arrayMenoscabo = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayMenoscabo, new BEMenoscabo($row['id_menoscabo'], $row['porcentaje_od'], $row['porcentaje_oi'], $row['binaural'], $row['mglobal'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador']));
			}
			
			$this->_DALMenoscabo = NULL;
			
			return $arrayMenoscabo;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idMenoscabo) {
				
			$this->_DALMenoscabo = new DALMenoscabo();
			$result = $this->_DALMenoscabo->GetEntidadxId($idMenoscabo);
			
			$arrayMenoscabo = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayMenoscabo, new BEMenoscabo($row['id_menoscabo'], $row['porcentaje_od'], $row['porcentaje_oi'], $row['binaural'], $row['mglobal'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALMenoscabo = NULL;
			
			return $arrayMenoscabo;
		}
			
		
		/* Funcion : GetEntidadxTrabajador */
		public function GetEntidadxTrabajador($idTrabajador) {
				
			$this->_DALMenoscabo = new DALMenoscabo();
			$result = $this->_DALMenoscabo->GetEntidadxTrabajador($idTrabajador);
			
			$arrayMenoscabo = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayMenoscabo, new BEMenoscabo($row['id_menoscabo'], $row['porcentaje_od'], $row['porcentaje_oi'], $row['binaural'], $row['mglobal'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALMenoscabo = NULL;
			
			return $arrayMenoscabo;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($porcentajeOd, $porcentajeOi, $binaural, $mglobal, $idTrabajador) {
	
			$this->_DALMenoscabo = new DALMenoscabo();
			$result = $this->_DALMenoscabo->Insertar($porcentajeOd, $porcentajeOi, $binaural, $mglobal, $idTrabajador);
			$this->_DALMenoscabo = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idMenoscabo, $porcentajeOd, $porcentajeOi, $binaural, $mglobal, $idTrabajador) {
	
			$this->_DALMenoscabo = new DALMenoscabo();
			$result = $this->_DALMenoscabo->Actualizar($idMenoscabo, $porcentajeOd, $porcentajeOi, $binaural, $mglobal, $idTrabajador);
			$this->_DALMenoscabo = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idMenoscabo) {
	
			$this->_DALMenoscabo = new DALMenoscabo();
			$result = $this->_DALMenoscabo->Eliminar($idMenoscabo);
			$this->_DALMenoscabo = NULL;
			
			return $result;
		}
			 
	}
?> 