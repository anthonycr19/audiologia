<?php 

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : BOVstBusquedaPacientes.php
	* Fecha : domingo 09 de mayo del 2015 08:04:05 p.m.
	* Autor : CAPSULE SAC
	**/

	/**
	* Includes
	*/
	
	require_once('../../bll/be/BEVstBusquedaPacientes.php');
	require_once('../../dal/DALVstBusquedaPacientes.php');
		
	class BOVstBusquedaPacientes {
	
		/* Atributos */
		public $_DALVstBusquedaPacientes;
	  
		/* Funcion : GetEntidad */
		public function GetBusquedaPacientes($idEmpresa, $fechaAudiometriaInicio, $fechaAudiometriaFin, $dni, $nombre, $apellidos) {
				
			$this->_DALVstBusquedaPacientes = new DALVstBusquedaPacientes();
			$result = $this->_DALVstBusquedaPacientes->GetBusquedaPacientes($idEmpresa, $fechaAudiometriaInicio, $fechaAudiometriaFin, $dni, $nombre, $apellidos);
			
			$arrayVstBusquedaPacientes = array(); 
							
			while($row = mysql_fetch_array($result)){
				array_push($arrayVstBusquedaPacientes, new BEVstBusquedaPacientes($row['id_trabajador'], $row['nombre'], $row['apellidos'], $row['dni'], $row['fecha_nacimiento'], $row['sexo'], $row['id_empresa'], $row['razon_social'], $row['ruc'], $row['direccion'], $row['contacto'], $row['id_otoscopia'], $row['fecha_audiometria'], $row['descripcion_od'], $row['descripcion_oi']));
			}
			
			$this->_DALVstBusquedaPacientes = NULL;
			
			return $arrayVstBusquedaPacientes;
		}
			 
	}
?> 