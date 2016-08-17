<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BORecomendacion.php
	* Fecha : domingo 09 de mayo del 2015 11:35:15 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/ 
	
	include('../../bll/be/BERecomendacion.php');
	include('../../dal/DALRecomendacion.php');
		
	class BORecomendacion {
	
		/* Atributos */
		public $_DALRecomendacion;
	  
		/* Funcion : GetEntidad */
		public function GetEntidad() {
				
			$this->_DALRecomendacion = new DALRecomendacion();
			$result = $this->_DALRecomendacion->GetEntidad();
			
			$arrayRecomendacion = array();
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayRecomendacion, new BERecomendacion($row['id_recomendacion'], $row['rgeneral'], $row['especifica'], $row['complementarios'], $row['conclusion'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador']));
			}
			
			$this->_DALRecomendacion = NULL;
			
			return $arrayRecomendacion;
		}
			
		
		/* Funcion : GetEntidadxId */
		public function GetEntidadxId($idRecomendacion) {
				
			$this->_DALRecomendacion = new DALRecomendacion();
			$result = $this->_DALRecomendacion->GetEntidadxId($idRecomendacion);
			
			$arrayRecomendacion = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayRecomendacion, new BERecomendacion($row['id_recomendacion'], $row['rgeneral'], $row['especifica'], $row['complementarios'], $row['conclusion'], $row['estado'], $row['created_at'], $row['updated_at'], $row['id_trabajador'])); 
			}
			
			$this->_DALRecomendacion = NULL;
			
			return $arrayRecomendacion;
		}
			
		
		/* Funcion : Insertar */
		public function Insertar($rGeneral, $especifica, $complementarios, $conclusion, $idTrabajador) {
	
			$this->_DALRecomendacion = new DALRecomendacion();
			$result = $this->_DALRecomendacion->Insertar($rGeneral, $especifica, $complementarios, $conclusion, $idTrabajador);
			$this->_DALRecomendacion = NULL;
			
			return $result;			
		}
		

		/* Funcion : Actualizar */
		public function Actualizar($idRecomendacion, $rGeneral, $especifica, $complementarios, $conclusion, $idTrabajador) {
	
			$this->_DALRecomendacion = new DALRecomendacion();
			$result = $this->_DALRecomendacion->Actualizar($idRecomendacion, $rGeneral, $especifica, $complementarios, $conclusion, $idTrabajador);
			$this->_DALRecomendacion = NULL;
			
			return $result;			
		}
			
		
		/* Funcion : Eliminar */
		public function Eliminar($idRecomendacion) {
	
			$this->_DALRecomendacion = new DALRecomendacion();
			$result = $this->_DALRecomendacion->Eliminar($idRecomendacion);
			$this->_DALRecomendacion = NULL;
			
			return $result;
		}
			 
	}
?> 