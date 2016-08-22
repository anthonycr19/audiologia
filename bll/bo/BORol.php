<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BORol.php
	* Fecha : domingo 09 de mayo del 2015 11:55:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BERol.php');
	include('../../dal/DALRol.php');
		
	class BORol {
	
		/* Atributos */
		public $_DALRol;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALRol = new DALRol();
			$result = $this->_DALRol->GetEntidad();
			
			$arrayRol = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayRol, new BERol($row['id_rol'], $row['nombre'], $row['estado']));
			}
			
			$this->_DALRol = NULL;
			
			return $arrayRol;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idRol) {
				
			$this->_DALRol = new DALRol();
			$result = $this->_DALRol->GetEntidadxId($idRol);
			
			$arrayRol = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayRol, new BERol($row['id_rol'], $row['nombre'], $row['estado'])); 
			}
			
			$this->_DALRol = NULL;
			
			return $arrayRol;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($nombre, $estado) {
	
			$this->_DALRol = new DALRol();
			$result = $this->_DALRol->Insertar($nombre, $estado);
			$this->_DALRol = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idRol, $nombre, $estado) {
	
			$this->_DALRol = new DALRol();
			$result = $this->_DALRol->Actualizar($idRol, $nombre, $estado);
			$this->_DALRol = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idRol) {
	
			$this->_DALRol = new DALRol();
			$result = $this->_DALRol->Eliminar($idRol);
			$this->_DALRol = NULL;
			
			return $result;
		}
			 
	}
?> 