<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOOtoscopia.php
	* Fecha : domingo 09 de mayo del 2015 08:33:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEOtoscopia.php');
	include('../../dal/DALOtoscopia.php');
		
	class BOOtoscopia {
	
		/* Atributos */
		public $_DALOtoscopia;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALOtoscopia = new DALOtoscopia();
			$result = $this->_DALOtoscopia->GetEntidad();
			
			$arrayOtoscopia = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayOtoscopia, new BEOtoscopia($row['id_otoscopia'], $row['fecha_audiometria'], $row['descripcion_od'], $row['descripcion_oi'], $row['edad_trabajador'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador']));
			}
			
			$this->_DALOtoscopia = NULL;
			
			return $arrayOtoscopia;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idOtoscopia) {
				
			$this->_DALOtoscopia = new DALOtoscopia();
			$result = $this->_DALOtoscopia->GetEntidadxId($idOtoscopia);
			
			$arrayOtoscopia = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayOtoscopia, new BEOtoscopia($row['id_otoscopia'], $row['fecha_audiometria'], $row['descripcion_od'], $row['descripcion_oi'], $row['edad_trabajador'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALOtoscopia = NULL;
			
			return $arrayOtoscopia;
		}


		/* Funcion : GetEntidadxIdxIdTrabajador */
		public function GetEntidadxIdxIdTrabajador($idOtoscopia, $idTrabajador) {
				
			$this->_DALOtoscopia = new DALOtoscopia();
			$result = $this->_DALOtoscopia->GetEntidadxIdxIdTrabajador($idOtoscopia, $idTrabajador);
			
			$arrayOtoscopia = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayOtoscopia, new BEOtoscopia($row['id_otoscopia'], $row['fecha_audiometria'], $row['descripcion_od'], $row['descripcion_oi'], $row['edad_trabajador'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALOtoscopia = NULL;
			
			return $arrayOtoscopia;
		}


		/* Funcion : GetEntidadxTrabajador */
		public function GetEntidadxTrabajador($idTrabajador) {
				
			$this->_DALOtoscopia = new DALOtoscopia();
			$result = $this->_DALOtoscopia->GetEntidadxTrabajador($idTrabajador);
			
			$arrayOtoscopia = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayOtoscopia, new BEOtoscopia($row['id_otoscopia'], $row['fecha_audiometria'], $row['descripcion_od'], $row['descripcion_oi'], $row['edad_trabajador'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALOtoscopia = NULL;
			
			return $arrayOtoscopia;
		}

		
		/* Funcion : Insertar */
		public function Insertar($fechaAudiometria, $descripcionOd, $descripcionOi, $edadTrabajador, $idTrabajador) {
	
			$this->_DALOtoscopia = new DALOtoscopia();
			$result = $this->_DALOtoscopia->Insertar($fechaAudiometria, $descripcionOd, $descripcionOi, $edadTrabajador, $idTrabajador);
			$this->_DALOtoscopia = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idOtoscopia, $fechaAudiometria, $descripcionOd, $descripcionOi, $edadTrabajador, $idTrabajador) {
	
			$this->_DALOtoscopia = new DALOtoscopia();
			$result = $this->_DALOtoscopia->Actualizar($idOtoscopia, $fechaAudiometria, $descripcionOd, $descripcionOi, $edadTrabajador, $idTrabajador);
			$this->_DALOtoscopia = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idOtoscopia) {
	
			$this->_DALOtoscopia = new DALOtoscopia();
			$result = $this->_DALOtoscopia->Eliminar($idOtoscopia);
			$this->_DALOtoscopia = NULL;
			
			return $result;
		}
			 
	}
?>