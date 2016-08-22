<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOLineaBase.php
	* Fecha : sábado 16 de mayo del 2015 08:24:05 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BELineaBase.php');
	include('../../dal/DALLineaBase.php');
		
	class BOLineaBase {
	
		/* Atributos */
		public $_DALLineaBase;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALLineaBase = new DALLineaBase();
			$result = $this->_DALLineaBase->GetEntidad();
			
			$arrayLineaBase = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayLineaBase, new BELineaBase($row['id_linea_base'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_audio_tonal_od'], $row['id_audio_tonal_oi'], $row['id_otoscopia']));
			}
			
			$this->_DALLineaBase = NULL;
			
			return $arrayLineaBase;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idLineaBase) {
				
			$this->_DALLineaBase = new DALLineaBase();
			$result = $this->_DALLineaBase->GetEntidadxId($idLineaBase);
			
			$arrayLineaBase = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayLineaBase, new BELineaBase($row['id_linea_base'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_audio_tonal_od'], $row['id_audio_tonal_oi'], $row['id_otoscopia'])); 
			}
			
			$this->_DALLineaBase = NULL;
			
			return $arrayLineaBase;
		}


		/* Funcion : GetEntidadxTrabajador */
		public function GetEntidadxTrabajador($idTrabajador) {
				
			$this->_DALLineaBase = new DALLineaBase();
			$result = $this->_DALLineaBase->GetEntidadxTrabajador($idTrabajador);
			
			$arrayLineaBase = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayLineaBase, new BELineaBase($row['id_linea_base'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_audio_tonal_od'], $row['id_audio_tonal_oi'], $row['id_otoscopia'])); 
			}
			
			$this->_DALLineaBase = NULL;
			
			return $arrayLineaBase;
		}

		
		/* Funcion : Insertar */
		public function Insertar($idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idOtoscopia) {
	
			$this->_DALLineaBase = new DALLineaBase();
			$result = $this->_DALLineaBase->Insertar($idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idOtoscopia);
			$this->_DALLineaBase = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idLineaBase, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idOtoscopia) {
	
			$this->_DALLineaBase = new DALLineaBase();
			$result = $this->_DALLineaBase->Actualizar($idLineaBase, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idOtoscopia);
			$this->_DALLineaBase = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idLineaBase) {
	
			$this->_DALLineaBase = new DALLineaBase();
			$result = $this->_DALLineaBase->Eliminar($idLineaBase);
			$this->_DALLineaBase = NULL;
			
			return $result;
		}
			 
	}
?> 