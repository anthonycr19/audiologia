<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOUsuario.php
	* Fecha : domingo 09 de mayo del 2015 12:07:15 p.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BEUsuario.php');
	include('../../dal/DALUsuario.php');
		
	class BOUsuario {
	
		/* Atributos */
		public $_DALUsuario;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALUsuario = new DALUsuario();
			$result = $this->_DALUsuario->GetEntidad();
			
			$arrayUsuario = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayUsuario, new BEUsuario($row['id_usuario'], $row['nombre'], $row['usuario'], $row['contrasenia'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_rol']));
			}
			
			$this->_DALUsuario = NULL;
			
			return $arrayUsuario;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idUsuario) {
				
			$this->_DALUsuario = new DALUsuario();
			$result = $this->_DALUsuario->GetEntidadxId($idUsuario);
			
			$arrayUsuario = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayUsuario, new BEUsuario($row['id_usuario'], $row['nombre'], $row['usuario'], $row['contrasenia'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_rol'])); 
			}
			
			$this->_DALUsuario = NULL;
			
			return $arrayUsuario;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($nombre, $usuario, $contrasenia, $estado, $idRol) {
	
			$this->_DALUsuario = new DALUsuario();
			$result = $this->_DALUsuario->Insertar($nombre, $usuario, $contrasenia, $estado, $idRol);
			$this->_DALUsuario = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idUsuario, $nombre, $usuario, $contrasenia, $estado, $idRol) {
	
			$this->_DALUsuario = new DALUsuario();
			$result = $this->_DALUsuario->Actualizar($idUsuario, $nombre, $usuario, $contrasenia, $estado, $idRol);
			$this->_DALUsuario = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idUsuario) {
	
			$this->_DALUsuario = new DALUsuario();
			$result = $this->_DALUsuario->Eliminar($idUsuario);
			$this->_DALUsuario = NULL;
			
			return $result;
		}
			 
	}
?> 