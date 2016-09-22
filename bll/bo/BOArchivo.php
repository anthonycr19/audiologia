<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOArchivo.php
	* Fecha : sábado 16 de mayo del 2015 08:24:05 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEArchivo.php');
	include('../../dal/DALArchivo.php');
    require_once("../../conexion/Conexion.php");
	class BOArchivo {
	
		/* Atributos */
		public $_DALArchivo;
        public $cn;
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALArchivo = new DALArchivo();
			$result = $this->_DALArchivo->GetEntidad();
			
			$arrayArchivo = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayArchivo, new BEArchivo($row['id_archivo'], $row['nombre_archivo'], $row['tipo'], $row['cantidad_registros'], $row['fecha_registro'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_empresa']));
			}
			
			$this->_DALArchivo = NULL;
			
			return $arrayArchivo;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idArchivo) {
				
			$this->_DALArchivo = new DALArchivo();
			$result = $this->_DALArchivo->GetEntidadxId($idArchivo);
			
			$arrayArchivo = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayArchivo, new BEArchivo($row['id_archivo'], $row['nombre_archivo'], $row['tipo'], $row['cantidad_registros'], $row['fecha_registro'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_empresa'])); 
			}
			
			$this->_DALArchivo = NULL;
			
			return $arrayArchivo;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($nombreArchivo, $tipo, $cantidadRegistros, $fechaRegistro, $idEmpresa) {
	
			$this->_DALArchivo = new DALArchivo();
			$result = $this->_DALArchivo->Insertar($nombreArchivo, $tipo, $cantidadRegistros, $fechaRegistro, $idEmpresa);
			$this->_DALArchivo = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idArchivo, $nombreArchivo, $tipo, $cantidadRegistros, $fechaRegistro, $idEmpresa) {
	
			$this->_DALArchivo = new DALArchivo();
			$result = $this->_DALArchivo->Actualizar($idArchivo, $nombreArchivo, $tipo, $cantidadRegistros, $fechaRegistro, $idEmpresa);
			$this->_DALArchivo = NULL;
			
			return $result;			
		}


		/* Funcion : ActualizarxEmpresa */
		public function ActualizarxEmpresa($idArchivo, $idEmpresa) {
	
			$this->_DALArchivo = new DALArchivo();
			$result = $this->_DALArchivo->ActualizarxEmpresa($idArchivo, $idEmpresa);
			$this->_DALArchivo = NULL;
			
			return $result;			
		}

		
		/* Funcion : Eliminar */
		public function Eliminar($idArchivo) {
	
			$this->_DALArchivo = new DALArchivo();
			$result = $this->_DALArchivo->Eliminar($idArchivo);
			$this->_DALArchivo = NULL;
			
			return $result;
		}

		public function Eliminar_Archivo_Fisico($idArchivo){

			$this->_DALArchivo = new DALArchivo();
			$result = $this->_DALArchivo->Eliminar_Archivo_Fisico($idArchivo);
			$this->_DALArchivo = NULL;

			return $result;
		}

		/* Funcion: Eliminar archivo */
		public function Eliminar_Archivo($idArchivo){

			$this->_DALArchivo = new DALArchivo();
			$result = $this->_DALArchivo->Eliminar_Archivo($idArchivo);
			$this->_DALArchivo = NULL;

			return $result;
//		    echo "Holaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
//			$this->cn = new Conexion();
//			//$sql = "DELETE FROM tbl_archivo WHERE id_archivo = $idArchivo";
//			$sql = "DELETE tbl_archivo,
//	                tbl_archivo_trabajador,
//	                tbl_empresa_trabajador,
//	                tbl_informe,
//                    tbl_audio_tonal_od,
//                    tbl_audio_tonal_oi,
//                    tbl_informe,
//                    tbl_experiencia_laboral,
//                    tbl_menoscabo,
//                    tbl_otosocopia,
//                    tbl_recomendacion
//                    FROM tbl_archivo
//                    INNER JOIN tbl_archivo_trabajador
//                    ON tbl_archivo_trabajador.id_archivo = tbl_archivo.id_archivo
//                    INNER JOIN tbl_empresa_trabajador
//                    ON tbl_empresa_trabajador.id_empresa_trabajador = tbl_archivo_trabajador.id_archivo_trabajador
//                    INNER JOIN tbl_informe
//                    ON tbl_informe.id_informe = tbl_archivo_trabajador.id_archivo_trabajador
//                    INNER JOIN tbl_audio_tonal_od
//                    ON tbl_audio_tonal_od.id_audio_tonal_od = tbl_archivo_trabajador.id_archivo_trabajador
//                    INNER JOIN tbl_audio_tonal_oi
//                    ON tbl_audio_tonal_oi.id_audio_tonal_oi = tbl_archivo_trabajador.id_archivo_trabajador
//                    INNER JOIN tbl_diagnostico
//                    ON tbl_diagnostico.id_diagnostico = tbl_archivo_trabajador.id_archivo_trabajador
//                    INNER JOIN tbl_experiencia_laboral
//                    ON tbl_experiencia_laboral.id_experiencia_laboral = tbl_archivo_trabajador.id_archivo_trabajador
//                    INNER JOIN tbl_menoscabo
//                    ON tbl_menoscabo.id_menoscabo = tbl_archivo_trabajador.id_archivo_trabajador
//                    INNER JOIN tbl_otosocopia
//                    ON tbl_otoscopia.id_otoscopia = tbl_archivo_trabajador.id_archivo_trabajador
//                    INNER JOIN tbl_recomendacion
//                    ON tbl_recomendacion.id_recomendacion = tbl_archivo_trabajador.id_archivo_trabajador
//                    WHERE tbl_archivo.id_archivo =$idArchivo";
//			$link = $this->cn->Conectarse();
//			mysql_query($sql, $link);
//			$this->cn->Desconectarse($link);
//			echo "HOLA NUEVO UNIVERSO";
		}
			 
	}
?> 