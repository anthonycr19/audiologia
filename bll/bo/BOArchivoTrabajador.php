<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOArchivoTrabajador.php
	* Fecha : sábado 16 de mayo del 2015 08:24:05 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEArchivoTrabajador.php');
	include('../../dal/DALArchivoTrabajador.php');
		
	class BOArchivoTrabajador {
	
		/* Atributos */
		public $_DALArchivoTrabajador;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALArchivoTrabajador = new DALArchivoTrabajador();
			$result = $this->_DALArchivoTrabajador->GetEntidad();
			
			$arrayArchivoTrabajador = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayArchivoTrabajador, new BEArchivoTrabajador($row['id_archivo_trabajador'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_archivo'], $row['id_trabajador']));
			}
			
			$this->_DALArchivoTrabajador = NULL;
			
			return $arrayArchivoTrabajador;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idArchivoTrabajador) {
				
			$this->_DALArchivoTrabajador = new DALArchivoTrabajador();
			$result = $this->_DALArchivoTrabajador->GetEntidadxId($idArchivoTrabajador);
			
			$arrayArchivoTrabajador = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayArchivoTrabajador, new BEArchivoTrabajador($row['id_archivo_trabajador'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_archivo'], $row['id_trabajador'])); 
			}
			
			$this->_DALArchivoTrabajador = NULL;
			
			return $arrayArchivoTrabajador;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($idArchivo, $idTrabajador) {
	
			$this->_DALArchivoTrabajador = new DALArchivoTrabajador();
			$result = $this->_DALArchivoTrabajador->Insertar($idArchivo, $idTrabajador);
			$this->_DALArchivoTrabajador = NULL;
			
			return $result;			
		}

		/* Funcion : Actualizar */
		public function Actualizar($idArchivoTrabajador, $idArchivo, $idTrabajador) {
	
			$this->_DALArchivoTrabajador = new DALArchivoTrabajador();
			$result = $this->_DALArchivoTrabajador->Actualizar($idArchivoTrabajador, $idArchivo, $idTrabajador);
			$this->_DALArchivoTrabajador = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idArchivoTrabajador) {
	
			$this->_DALArchivoTrabajador = new DALArchivoTrabajador();
			$result = $this->_DALArchivoTrabajador->Eliminar($idArchivoTrabajador);
			$this->_DALArchivoTrabajador = NULL;
			
			return $result;
		}
			 
	}
?> 