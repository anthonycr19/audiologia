<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOEmpresaTrabajador.php
	* Fecha : domingo 09 de mayo del 2015 08:33:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEEmpresaTrabajador.php');
	include('../../dal/DALEmpresaTrabajador.php');

	class BOEmpresaTrabajador {
	
		/* Atributos */
		public $_DALEmpresaTrabajador;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALEmpresaTrabajador = new DALEmpresaTrabajador();
			$result = $this->_DALEmpresaTrabajador->GetEntidad();
			
			$arrayEmpresaTrabajador = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayEmpresaTrabajador, new BEEmpresaTrabajador($row['id_empresa_trabajador'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_empresa']));
			}
			
			$this->_DALEmpresaTrabajador = NULL;
			
			return $arrayEmpresaTrabajador;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idEmpresaTrabajador) {
				
			$this->_DALEmpresaTrabajador = new DALEmpresaTrabajador();
			$result = $this->_DALEmpresaTrabajador->GetEntidadxId($idEmpresaTrabajador);
			
			$arrayEmpresaTrabajador = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayEmpresaTrabajador, new BEEmpresaTrabajador($row['id_empresa_trabajador'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_empresa'])); 
			}
			
			$this->_DALEmpresaTrabajador = NULL;
			
			return $arrayEmpresaTrabajador;
		}


		/* Funcion : Verificar */
		public function Verificar($idTrabajador, $idEmpresa, $idExperienciaLaboral) {
				
			$this->_DALEmpresaTrabajador = new DALEmpresaTrabajador();
			$result = $this->_DALEmpresaTrabajador->Verificar($idTrabajador, $idEmpresa, $idExperienciaLaboral);
			
			$arrayEmpresaTrabajador = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayEmpresaTrabajador, new BEEmpresaTrabajador($row['id_empresa_trabajador'], $row['created_at'], $row['updated_at'], $row['id_trabajador'], $row['id_empresa'], $row['id_experiencia_laboral']));
			}
			
			$this->_DALEmpresaTrabajador = NULL;
			
			return $arrayEmpresaTrabajador;
		}			
		

		/* Funcion : Insertar */
		public function Insertar($idTrabajador, $idEmpresa, $idExperienciaLaboral) {
	
			$this->_DALEmpresaTrabajador = new DALEmpresaTrabajador();
			$result = $this->_DALEmpresaTrabajador->Insertar($idTrabajador, $idEmpresa, $idExperienciaLaboral);
			$this->_DALEmpresaTrabajador = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idEmpresaTrabajador, $idTrabajador, $idEmpresa, $idExperienciaLaboral) {
	
			$this->_DALEmpresaTrabajador = new DALEmpresaTrabajador();
			$result = $this->_DALEmpresaTrabajador->Actualizar($idEmpresaTrabajador, $idTrabajador, $idEmpresa, $idExperienciaLaboral);
			$this->_DALEmpresaTrabajador = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idEmpresaTrabajador) {
	
			$this->_DALEmpresaTrabajador = new DALEmpresaTrabajador();
			$result = $this->_DALEmpresaTrabajador->Eliminar($idEmpresaTrabajador);
			$this->_DALEmpresaTrabajador = NULL;
			
			return $result;
		}
			 
	}
?> 