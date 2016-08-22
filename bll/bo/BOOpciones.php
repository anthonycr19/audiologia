<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOOpciones.php
	* Fecha : sábado 16 de mayo del 2015 08:24:05 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEOpciones.php');
	include('../../dal/DALOpciones.php');
		
	class BOOpciones {
	
		/* Atributos */
		public $_DALOpciones;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALOpciones = new DALOpciones();
			$result = $this->_DALOpciones->GetEntidad();
			
			$arrayOpciones = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayOpciones, new BEOpciones($row['id_opciones'], $row['descripcion'], $row['estado']));
			}
			
			$this->_DALOpciones = NULL;
			
			return $arrayOpciones;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idOpciones) {
				
			$this->_DALOpciones = new DALOpciones();
			$result = $this->_DALOpciones->GetEntidadxId($idOpciones);
			
			$arrayOpciones = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayOpciones, new BEOpciones($row['id_opciones'], $row['descripcion'], $row['estado'])); 
			}
			
			$this->_DALOpciones = NULL;
			
			return $arrayOpciones;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($descripcion) {
	
			$this->_DALOpciones = new DALOpciones();
			$result = $this->_DALOpciones->Insertar($descripcion);
			$this->_DALOpciones = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idOpciones, $descripcion) {
	
			$this->_DALOpciones = new DALOpciones();
			$result = $this->_DALOpciones->Actualizar($idOpciones, $descripcion);
			$this->_DALOpciones = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idOpciones) {
	
			$this->_DALOpciones = new DALOpciones();
			$result = $this->_DALOpciones->Eliminar($idOpciones);
			$this->_DALOpciones = NULL;
			
			return $result;
		}
			 
	}
?> 