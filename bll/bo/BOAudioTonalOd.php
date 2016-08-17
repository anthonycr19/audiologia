<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOAudioTonalOd.php
	* Fecha : lunes 06 de abril del 2015 10:51:05 p.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEAudioTonalOd.php');
	include('../../dal/DALAudioTonalOd.php');
		
	class BOAudioTonalOd {
	
		/* Atributos */
		public $_DALAudioTonalOd;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->GetEntidad();
			
			$arrayAudioTonalOd = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayAudioTonalOd, new BEAudioTonalOd($row['id_audio_tonal_od'], $row['od_250'], $row['od_500'], $row['od_1000'], $row['od_2000'], $row['od_3000'], $row['od_4000'], $row['od_6000'], $row['od_8000'], $row['od_sts'], $row['od_khz'], $row['retest'], $row['fail'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador']));
			}
			
			$this->_DALAudioTonalOd = NULL;
			
			return $arrayAudioTonalOd;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idAudioTonalOd) {
				
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->GetEntidadxId($idAudioTonalOd);
			
			$arrayAudioTonalOd = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayAudioTonalOd, new BEAudioTonalOd($row['id_audio_tonal_od'], $row['od_250'], $row['od_500'], $row['od_1000'], $row['od_2000'], $row['od_3000'], $row['od_4000'], $row['od_6000'], $row['od_8000'], $row['od_sts'], $row['od_khz'], $row['retest'], $row['fail'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALAudioTonalOd = NULL;
			
			return $arrayAudioTonalOd;
		}


		/* Funcion : GetEntidadxTrabajador */
		public function GetEntidadxTrabajador($idTrabajador) {
				
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->GetEntidadxTrabajador($idTrabajador);
			
			$arrayAudioTonalOd = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayAudioTonalOd, new BEAudioTonalOd($row['id_audio_tonal_od'], $row['od_250'], $row['od_500'], $row['od_1000'], $row['od_2000'], $row['od_3000'], $row['od_4000'], $row['od_6000'], $row['od_8000'], $row['od_sts'], $row['od_khz'], $row['retest'], $row['fail'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALAudioTonalOd = NULL;
			
			return $arrayAudioTonalOd;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $od_sts, $od_khz, $retest, $fail, $idTrabajador) {
	
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->Insertar($od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $od_sts, $od_khz, $retest, $fail, $idTrabajador);
			$this->_DALAudioTonalOd = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idAudioTonalOd, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $od_sts, $od_khz, $retest, $fail, $idTrabajador) {
	
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->Actualizar($idAudioTonalOd, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $od_sts, $od_khz, $retest, $fail, $idTrabajador);
			$this->_DALAudioTonalOd = NULL;
			
			return $result;			
		}


		/* Funcion : ActualizarOdKhz */
		public function ActualizarOdKhz($idAudioTonalOd, $od_khz) {
	
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->ActualizarOdKhz($idAudioTonalOd, $od_khz);
			$this->_DALAudioTonalOd = NULL;
			
			return $result;			
		}	


		/* Funcion : ActualizarxSts */
		public function ActualizarxSts($idAudioTonalOd, $od_sts) {
	
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->ActualizarxSts($idAudioTonalOd, $od_sts);
			$this->_DALAudioTonalOd = NULL;
			
			return $result;			
		}


		/* Funcion : ActualizarxRetestOd */
		public function ActualizarxRetestOd($idAudioTonalOd, $retest) {
	
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->ActualizarxRetestOd($idAudioTonalOd, $retest);
			$this->_DALAudioTonalOd = NULL;
			
			return $result;			
		}


		/* Funcion : ActualizarxFailOd */
		public function ActualizarxFailOd($idAudioTonalOd, $fail) {
	
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->ActualizarxFailOd($idAudioTonalOd, $fail);
			$this->_DALAudioTonalOd = NULL;
			
			return $result;			
		}


		/* Funcion : Eliminar */
		public function Eliminar($idAudioTonalOd) {
	
			$this->_DALAudioTonalOd = new DALAudioTonalOd();
			$result = $this->_DALAudioTonalOd->Eliminar($idAudioTonalOd);
			$this->_DALAudioTonalOd = NULL;
			
			return $result;
		}
			 
	}
?> 