<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOVstBusquedaEmpresa.php
	* Fecha : jueves 14 de mayo del 2015 01:02:05 a.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/
	
	require_once('../../bll/be/BEVstBusquedaEmpresa.php');
	require_once('../../dal/DALVstBusquedaEmpresa.php');
		
	class BOVstBusquedaEmpresa {
	
		/* Atributos */
		public $_DALVstBusquedaEmpresa;
	  
		/* Funcion : GetEntidad */
		public function GetBusquedaEmpresa($idEmpresa, $fechaRegistroInicio, $fechaRegistroFin) {
				
			$this->_DALVstBusquedaEmpresa = new DALVstBusquedaEmpresa();
			$result = $this->_DALVstBusquedaEmpresa->GetBusquedaEmpresa($idEmpresa, $fechaRegistroInicio, $fechaRegistroFin);
			
			$arrayVstBusquedaEmpresa = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayVstBusquedaEmpresa, new BEVstBusquedaEmpresa($row['id_empresa'], $row['razon_social'], $row['ruc'], $row['direccion'], $row['contacto'], $row['id_archivo'], $row['nombre_archivo'], $row['tipo'], $row['cantidad_registros'], $row['fecha_registro']));
			}
			
			$this->_DALVstBusquedaEmpresa = NULL;
			
			return $arrayVstBusquedaEmpresa;
		}
			 
	}
?> 