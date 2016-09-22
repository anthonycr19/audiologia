<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOAudioTonalOi.php
	* Fecha : lunes 06 de abril del 2015 11:38:15 p.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEAudioTonalOi.php');
	include('../../dal/DALAudioTonalOi.php');
		
	class BOAudioTonalOi {
	
		/* Atributos */
		public $_DALAudioTonalOi;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALAudioTonalOi = new DALAudioTonalOi();
			$result = $this->_DALAudioTonalOi->GetEntidad();
			
			$arrayAudioTonalOi = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayAudioTonalOi, new BEAudioTonalOi($row['id_audio_tonal_oi'], $row['oi_250'], $row['oi_500'], $row['oi_1000'], $row['oi_2000'], $row['oi_3000'], $row['oi_4000'], $row['oi_6000'], $row['oi_8000'], $row['oi_sts'], $row['oi_khz'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador']));
			}
			
			$this->_DALAudioTonalOi = NULL;
			
			return $arrayAudioTonalOi;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idAudioTonalOi) {
				
			$this->_DALAudioTonalOi = new DALAudioTonalOi();
			$result = $this->_DALAudioTonalOi->GetEntidadxId($idAudioTonalOi);
			
			$arrayAudioTonalOi = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayAudioTonalOi, new BEAudioTonalOi($row['id_audio_tonal_oi'], $row['oi_250'], $row['oi_500'], $row['oi_1000'], $row['oi_2000'], $row['oi_3000'], $row['oi_4000'], $row['oi_6000'], $row['oi_8000'], $row['oi_sts'], $row['oi_khz'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALAudioTonalOi = NULL;
			
			return $arrayAudioTonalOi;
		}


		/* Funcion : GetEntidadxTrabajador */
		public function GetEntidadxTrabajador($idTrabajador) {
				
			$this->_DALAudioTonalOi = new DALAudioTonalOi();
			$result = $this->_DALAudioTonalOi->GetEntidadxTrabajador($idTrabajador);
			
			$arrayAudioTonalOi = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayAudioTonalOi, new BEAudioTonalOi($row['id_audio_tonal_oi'], $row['oi_250'], $row['oi_500'], $row['oi_1000'], $row['oi_2000'], $row['oi_3000'], $row['oi_4000'], $row['oi_6000'], $row['oi_8000'], $row['oi_sts'], $row['oi_khz'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALAudioTonalOi = NULL;
			
			return $arrayAudioTonalOi;
		}

		
		/* Funcion : Insertar */
		public function Insertar($oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $oi_sts, $oi_khz, $idTrabajador) {
	
			$this->_DALAudioTonalOi = new DALAudioTonalOi();
			$result = $this->_DALAudioTonalOi->Insertar($oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $oi_sts, $oi_khz, $idTrabajador);
			$this->_DALAudioTonalOi = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idAudioTonalOi, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $oi_sts, $oi_khz, $idTrabajador) {
	
			$this->_DALAudioTonalOi = new DALAudioTonalOi();
			$result = $this->_DALAudioTonalOi->Actualizar($idAudioTonalOi, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $oi_sts, $oi_khz, $idTrabajador);
			$this->_DALAudioTonalOi = NULL;
			
			return $result;			
		}


		/* Funcion : ActualizarOiKhz */
		public function ActualizarOiKhz($idAudioTonalOi, $oi_khz) {
	
			$this->_DALAudioTonalOi = new DALAudioTonalOi();
			$result = $this->_DALAudioTonalOi->ActualizarOiKhz($idAudioTonalOi, $oi_khz);
			$this->_DALAudioTonalOi = NULL;
			
			return $result;			
		}	


		/* Funcion : ActualizarxSts */
		public function ActualizarxSts($idAudioTonalOi, $oi_sts) {
	
			$this->_DALAudioTonalOi = new DALAudioTonalOi();
			$result = $this->_DALAudioTonalOi->ActualizarxSts($idAudioTonalOi, $oi_sts);
			$this->_DALAudioTonalOi = NULL;
			
			return $result;
		}

		
		/* Funcion : Eliminar */
		public function Eliminar($idAudioTonalOi) {
	
			$this->_DALAudioTonalOi = new DALAudioTonalOi();
			$result = $this->_DALAudioTonalOi->Eliminar($idAudioTonalOi);
			$this->_DALAudioTonalOi = NULL;
			
			return $result;
		}
			 
	}
?> 