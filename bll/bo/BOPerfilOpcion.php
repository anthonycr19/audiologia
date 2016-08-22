<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOPerfilOpcion.php
	* Fecha : sábado 16 de mayo del 2015 08:24:05 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEPerfilOpcion.php');
	include('../../dal/DALPerfilOpcion.php');
		
	class BOPerfilOpcion {
	
		/* Atributos */
		public $_DALOpciones;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALPerfilOpcion = new DALPerfilOpcion();
			$result = $this->_DALPerfilOpcion->GetEntidad();
			
			$arrayPerfilOpcion = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayPerfilOpcion, new BEPerfilOpcion($row['id_perfil_opcion'], $row['estado'], $row['id_rol'], $row['id_opciones']));
			}
			
			$this->_DALPerfilOpcion = NULL;
			
			return $arrayPerfilOpcion;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idPerfilOpcion) {
				
			$this->_DALPerfilOpcion = new DALPerfilOpcion();
			$result = $this->_DALPerfilOpcion->GetEntidadxId($idPerfilOpcion);
			
			$arrayPerfilOpcion = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayPerfilOpcion, new BEPerfilOpcion($row['id_perfil_opcion'], $row['estado'], $row['id_rol'], $row['id_opciones'])); 
			}
			
			$this->_DALPerfilOpcion = NULL;
			
			return $arrayPerfilOpcion;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($idRol, $idOpciones) {
	
			$this->_DALPerfilOpcion = new DALPerfilOpcion();
			$result = $this->_DALPerfilOpcion->Insertar($idRol, $idOpciones);
			$this->_DALPerfilOpcion = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idPerfilOpcion, $idRol, $idOpciones) {
	
			$this->_DALPerfilOpcion = new DALPerfilOpcion();
			$result = $this->_DALPerfilOpcion->Actualizar($idPerfilOpcion, $idRol, $idOpciones);
			$this->_DALPerfilOpcion = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idPerfilOpcion) {
	
			$this->_DALPerfilOpcion = new DALPerfilOpcion();
			$result = $this->_DALPerfilOpcion->Eliminar($idPerfilOpcion);
			$this->_DALPerfilOpcion = NULL;
			
			return $result;
		}
			 
	}
?> 