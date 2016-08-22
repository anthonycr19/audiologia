<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOTrabajador.php
	* Fecha : domingo 09 de mayo del 2015 08:33:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BETrabajador.php');
	include('../../dal/DALTrabajador.php');
		
	class BOTrabajador {
	
		/* Atributos */
		public $_DALTrabajador;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALTrabajador = new DALTrabajador();
			$result = $this->_DALTrabajador->GetEntidad();
			
			$arrayTrabajador = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayTrabajador, new BETrabajador($row['id_trabajador'], $row['nombre'], $row['apellidos'], $row['dni'], $row['fecha_nacimiento'], $row['sexo'], $row['estado'], $row['created_at'], $row['updated_at']));
			}
			
			$this->_DALTrabajador = NULL;
			
			return $arrayTrabajador;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idTrabajador) {
				
			$this->_DALTrabajador = new DALTrabajador();
			$result = $this->_DALTrabajador->GetEntidadxId($idTrabajador);
			
			$arrayTrabajador = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayTrabajador, new BETrabajador($row['id_trabajador'], $row['nombre'], $row['apellidos'], $row['dni'], $row['fecha_nacimiento'], $row['sexo'], $row['estado'], $row['created_at'], $row['updated_at'])); 
			}
			
			$this->_DALTrabajador = NULL;
			
			return $arrayTrabajador;
		}
		

		/* Funcion : GetEntidadxDni */
		public function GetEntidadxDni($dni) {
				
			$this->_DALTrabajador = new DALTrabajador();
			$result = $this->_DALTrabajador->GetEntidadxDni($dni);
			
			$arrayTrabajador = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayTrabajador, new BETrabajador($row['id_trabajador'], $row['nombre'], $row['apellidos'], $row['dni'], $row['fecha_nacimiento'], $row['sexo'], $row['estado'], $row['created_at'], $row['updated_at'])); 
			}
			
			$this->_DALTrabajador = NULL;
			
			return $arrayTrabajador;
		}

		
		/* Funcion : Insertar */
		public function Insertar($nombre, $apellidos, $dni, $fechaNacimiento, $sexo) {
	
			$this->_DALTrabajador = new DALTrabajador();
			$result = $this->_DALTrabajador->Insertar($nombre, $apellidos, $dni, $fechaNacimiento, $sexo);
			$this->_DALTrabajador = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idTrabajador, $nombre, $apellidos, $dni, $fechaNacimiento, $sexo) {
	
			$this->_DALTrabajador = new DALTrabajador();
			$result = $this->_DALTrabajador->Actualizar($idTrabajador, $nombre, $apellidos, $dni, $fechaNacimiento, $sexo);
			$this->_DALTrabajador = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idTrabajador) {
	
			$this->_DALTrabajador = new DALTrabajador();
			$result = $this->_DALTrabajador->Eliminar($idTrabajador);
			$this->_DALTrabajador = NULL;
			
			return $result;
		}
			 
	}
?> 