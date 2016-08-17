<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOArchivo.php
	* Fecha : sábado 16 de mayo del 2015 08:24:05 a.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEArchivo.php');
	include('../../dal/DALArchivo.php');
		
	class BOArchivo {
	
		/* Atributos */
		public $_DALArchivo;
	  
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
			 
	}
?> 