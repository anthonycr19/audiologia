<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOEmpresa.php
	* Fecha : domingo 09 de mayo del 2015 08:33:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEEmpresa.php');
	include('../../dal/DALEmpresa.php');
		
	class BOEmpresa {
	
		/* Atributos */
		public $_DALEmpresa;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALEmpresa = new DALEmpresa();
			$result = $this->_DALEmpresa->GetEntidad();
			
			$arrayEmpresa = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayEmpresa, new BEEmpresa($row['id_empresa'], $row['razon_social'], $row['ruc'], $row['direccion'], $row['contacto'], $row['estado'], $row['created_at'], $row['updated_at']));
			}
			
			$this->_DALEmpresa = NULL;
			
			return $arrayEmpresa;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idEmpresa) {
				
			$this->_DALEmpresa = new DALEmpresa();
			$result = $this->_DALEmpresa->GetEntidadxId($idEmpresa);
			
			$arrayEmpresa = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayEmpresa, new BEEmpresa($row['id_empresa'], $row['razon_social'], $row['ruc'], $row['direccion'], $row['contacto'], $row['estado'], $row['created_at'], $row['updated_at'])); 
			}
			
			$this->_DALEmpresa = NULL;
			
			return $arrayEmpresa;
		}


		/* Funcion : GetEntidadxId */
		public function GetEntidadxRuc($ruc) {
				
			$this->_DALEmpresa = new DALEmpresa();
			$result = $this->_DALEmpresa->GetEntidadxRuc($ruc);
			
			$arrayEmpresa = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayEmpresa, new BEEmpresa($row['id_empresa'], $row['razon_social'], $row['ruc'], $row['direccion'], $row['contacto'], $row['estado'], $row['created_at'], $row['updated_at'])); 
			}
			
			$this->_DALEmpresa = NULL;
			
			return $arrayEmpresa;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($razonSocial, $ruc, $direccion, $contacto) {
	
			$this->_DALEmpresa = new DALEmpresa();
			$result = $this->_DALEmpresa->Insertar($razonSocial, $ruc, $direccion, $contacto);
			$this->_DALEmpresa = NULL;
			
			return $result;	
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idEmpresa, $razonSocial, $ruc, $direccion, $contacto) {
	
			$this->_DALEmpresa = new DALEmpresa();
			$result = $this->_DALEmpresa->Actualizar($idEmpresa, $razonSocial, $ruc, $direccion, $contacto);
			$this->_DALEmpresa = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idEmpresa) {
	
			$this->_DALEmpresa = new DALEmpresa();
			$result = $this->_DALEmpresa->Eliminar($idEmpresa);
			$this->_DALEmpresa = NULL;
			
			return $result;
		}

		public function GetEntidadxDireccion($direccion) {

			$this->_DALEmpresa = new DALEmpresa();
			$result = $this->_DALEmpresa->GetEntidadxDireccion($direccion);
			$this->_DALEmpresa = NULL;

			return $result;
		}

		public function GetEntidades() {

			$this->_DALEmpresa = new DALEmpresa();
			$result = $this->_DALEmpresa->GetEntidades();
			$this->_DALEmpresa = NULL;

			return $result;
		}

			 
	}
?> 