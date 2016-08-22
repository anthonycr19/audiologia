<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOInforme.php
	* Fecha : domingo 09 de mayo del 2015 08:33:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEInforme.php');
	include('../../dal/DALInforme.php');

	require_once('../../bll/bo/BOAudioTonalOd.php');
	require_once('../../bll/bo/BOAudioTonalOi.php');
	require_once('../../bll/bo/BODiagnostico.php');
	require_once('../../bll/bo/BOOtoscopia.php');
	require_once('../../bll/bo/BORecomendacion.php');
	require_once('../../bll/bo/BOExperienciaLaboral.php');
	require_once('../../bll/bo/BOLineaBase.php');
    require_once('../../bll/bo/BOEmpresa.php');
	require_once('../../bll/bo/BOMenoscabo.php');

		
	class BOInforme {
	
		/* Atributos */
		public $_DALInforme;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALInforme = new DALInforme();
			$result = $this->_DALInforme->GetEntidad();
			
			$arrayInforme = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayInforme, new BEInforme($row['id_informe'], $row['fecha_informe'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_audio_tonal_od'], $row['id_audio_tonal_oi'], $row['id_diagnostico'], $row['id_otoscopia'], $row['id_recomendacion'], $row['id_experiencia_laboral'], $row['id_linea_base'], $row['id_empresa'], $row['id_menoscabo']));
			}
			
			$this->_DALInforme = NULL;
			
			return $arrayInforme;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idInforme) {
				
			$this->_DALInforme = new DALInforme();
			$result = $this->_DALInforme->GetEntidadxId($idInforme);
			
			$arrayInforme = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayInforme, new BEInforme($row['id_informe'], $row['fecha_informe'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_audio_tonal_od'], $row['id_audio_tonal_oi'], $row['id_diagnostico'], $row['id_otoscopia'], $row['id_recomendacion'], $row['id_experiencia_laboral'], $row['id_linea_base'], $row['id_empresa'], $row['id_menoscabo'])); 
			}
			
			$this->_DALInforme = NULL;
			
			return $arrayInforme;
		}


		/* Funcion : GetEntidadxIdAudioTonalOd */
		public function GetEntidadxIdAudioTonalOd($idAudioTonalOd) {
				
			$this->_DALInforme = new DALInforme();
			$result = $this->_DALInforme->GetEntidadxIdAudioTonalOd($idAudioTonalOd);
			
			$arrayInforme = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayInforme, new BEInforme($row['id_informe'], $row['fecha_informe'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_audio_tonal_od'], $row['id_audio_tonal_oi'], $row['id_diagnostico'], $row['id_otoscopia'], $row['id_recomendacion'], $row['id_experiencia_laboral'], $row['id_linea_base'], $row['id_empresa'], $row['id_menoscabo'])); 
			}
			
			$this->_DALInforme = NULL;
			
			return $arrayInforme;
		}


		/* Funcion : GetEntidadxFechaLbOdxFechaCtOdxIdTrabajador */
		public function GetEntidadxFechaLbOdxFechaCtOdxIdTrabajador($fechaLbOd, $fechaCtOd, $idTrabajador) {
				
			$this->_DALInforme = new DALInforme();
			$result = $this->_DALInforme->GetEntidadxFechaLbOdxFechaCtOdxIdTrabajador($fechaLbOd, $fechaCtOd, $idTrabajador);
			
			$arrayInforme = array(); 
							
			while($row = mysql_fetch_array($result)){
				$boAudioTonalOd = new BOAudioTonalOd();
				$audioTonalOd = $boAudioTonalOd->GetEntidadxId($row['id_audio_tonal_od']);
				$audioTonalOdHistorico = $audioTonalOd[0];

				$boAudioTonalOi = new BOAudioTonalOi();
				$audioTonalOi = $boAudioTonalOi->GetEntidadxId($row['id_audio_tonal_oi']);
				$audioTonalOiHistorico = $audioTonalOi[0];

				$boDiagnostico = new BODiagnostico();
				$diagnostico = $boDiagnostico->GetEntidadxId($row['id_diagnostico']);
				$diagnosticoHistorico = $diagnostico[0];

				$boOtoscopia = new BOOtoscopia();
				$otoscopia = $boOtoscopia->GetEntidadxId($row['id_otoscopia']);
				$otoscopiaHistorico = $otoscopia[0];

				$boRecomendacion = new BORecomendacion();
				$recomendacion = $boRecomendacion->GetEntidadxId($row['id_recomendacion']);
				$recomendacionHistorico = $recomendacion[0];

				$boExperienciaLaboral = new BOExperienciaLaboral();
				$experienciaLaboral = $boExperienciaLaboral->GetEntidadxId($row['id_experiencia_laboral']);
				$experienciaLaboralHistorico = $experienciaLaboral[0];

				$boLineaBase = new BOLineaBase();
				$lineaBase = $boLineaBase->GetEntidadxId($row['id_linea_base']);
				$lineaBaseHistorico = $lineaBase[0];

				$boEmpresa = new BOEmpresa();
				$empresa = $boEmpresa->GetEntidadxId($row['id_empresa']);
				$empresaHistorico = $empresa[0];

				$boMenoscabo = new BOMenoscabo();
				$menoscabo = $boMenoscabo->GetEntidadxId($row['id_menoscabo']);
				$menoscaboHistorico = $menoscabo[0];

				//array_push($arrayInforme, new BEInforme($row['id_informe'], $row['fecha_informe'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_audio_tonal_od'], $row['id_audio_tonal_oi'], $row['id_diagnostico'], $row['id_otoscopia'], $row['id_recomendacion'], $row['id_experiencia_laboral'], $row['id_linea_base'], $row['id_empresa'], $row['id_menoscabo']));
				array_push($arrayInforme, new BEInforme($row['id_informe'], $row['fecha_informe'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $audioTonalOdHistorico, $audioTonalOiHistorico, $diagnosticoHistorico, $otoscopiaHistorico, $recomendacionHistorico, $experienciaLaboralHistorico, $lineaBaseHistorico, $empresaHistorico, $menoscaboHistorico));
			}
			
			$this->_DALInforme = NULL;
			
			return $arrayInforme;
		}

		
		/* Funcion : Insertar */
		public function Insertar($fechaInforme, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idDiagnostico, $idOtoscopia, $idRecomendacion, $idExperienciaLaboral, $idLineaBase, $idEmpresa, $idMenoscabo) {
	
			$this->_DALInforme = new DALInforme();
			$result = $this->_DALInforme->Insertar($fechaInforme, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idDiagnostico, $idOtoscopia, $idRecomendacion, $idExperienciaLaboral, $idLineaBase, $idEmpresa, $idMenoscabo);
			$this->_DALInforme = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idInforme, $fechaInforme, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idDiagnostico, $idOtoscopia, $idRecomendacion, $idExperienciaLaboral, $idLineaBase, $idEmpresa, $idMenoscabo) {
	
			$this->_DALInforme = new DALInforme();
			$result = $this->_DALInforme->Actualizar($idInforme, $fechaInforme, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idDiagnostico, $idOtoscopia, $idRecomendacion, $idExperienciaLaboral, $idLineaBase, $idEmpresa, $idMenoscabo);
			$this->_DALInforme = NULL;
			
			return $result;			
		}


		/* Funcion : ActualizarxLb */
		public function ActualizarxLb($idInforme, $idLineaBase) {
	
			$this->_DALInforme = new DALInforme();
			$result = $this->_DALInforme->ActualizarxLb($idInforme, $idLineaBase);
			$this->_DALInforme = NULL;
			
			return $result;			
		}

		
		/* Funcion : Eliminar */
		public function Eliminar($idInforme) {
	
			$this->_DALInforme = new DALInforme();
			$result = $this->_DALInforme->Eliminar($idInforme);
			$this->_DALInforme = NULL;
			
			return $result;
		}
			 
	}
?>