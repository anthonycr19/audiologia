<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALTemporal.php
	* Fecha : domingo 09 de mayo del 2015 06:21:47 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once('../../conexion/Conexion.php');

	class DALTemporal {

		/* Atributos */

		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_temporal";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idTemporal){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_temporal WHERE id_temporal = $idTemporal";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Insertar */

		public function Insertar($razonSocial, $ruc, $direccion, $contacto, $apellidos, $nombres, $dni, $fechaNacimiento, $edad, $fecha, $areaTrabajo, $puestoTrabajo, $subArea, $sexo, $tiempoServicio, $fechaAudiometria, $tipoEpp, $valorNrr, $nivelRuido, $descripcionOd, $descripcionOi, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $porcentajeOd, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $escalaKlockhoffOd, $escalaKlockhoffOi, $interpretacionKlock, $condicionAuditiva, $porcentajeOi, $binaural, $mglobal, $interpretacionOd, $interpretacionOi, $cie_10, $rGeneral, $especifica, $complementarios, $oi_khz, $od_khz, $od_sts, $oi_sts){

			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_temporal (razon_social, ruc, direccion, contacto, apellidos, nombres, dni, fecha_nacimiento, edad, fecha, area_trabajo, puesto_trabajo, sub_area, sexo, tiempo_servicio, fecha_audiometria, tipo_epp, valor_nrr, nivel_ruido, descripcion_od, descripcion_oi, od_250, od_500, od_1000, od_2000, od_3000, od_4000, od_6000, od_8000, porcentaje_od, oi_250, oi_500, oi_1000, oi_2000, oi_3000, oi_4000, oi_6000, oi_8000, escala_klockhoff_od, escala_klockhoff_oi, interpretacion_klock, condicion_auditiva, porcentaje_oi, binaural, mglobal, interpretacion_od, interpretacion_oi, cie_10, rgeneral, especifica, complementarios, od_khz, oi_khz, od_sts, oi_sts) VALUES ('$razonSocial', '$ruc', '$direccion', '$contacto', '$apellidos', '$nombres', '$dni', '$fechaNacimiento', '$edad', '$fecha', '$areaTrabajo', '$puestoTrabajo', '$subArea', '$sexo', '$tiempoServicio', '$fechaAudiometria', '$tipoEpp', '$valorNrr', '$nivelRuido', '$descripcionOd', '$descripcionOi', '$od_250', '$od_500', '$od_1000', '$od_2000', '$od_3000', '$od_4000', '$od_6000', '$od_8000', '$porcentajeOd', '$oi_250', '$oi_500', '$oi_1000', '$oi_2000', '$oi_3000', '$oi_4000', '$oi_6000', '$oi_8000', '$escalaKlockhoffOd', '$escalaKlockhoffOi', '$interpretacionKlock', '$condicionAuditiva', '$porcentajeOi', '$binaural', '$mglobal', '$interpretacionOd', '$interpretacionOi', '$cie_10', '$rGeneral', '$especifica', '$complementarios', '$od_khz', '$oi_khz', '$od_sts', '$oi_sts')";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}



		/* Funcion: Actualizar */

		public function Actualizar($idTemporal, $razonSocial, $ruc, $direccion, $contacto, $apellidos, $nombres, $dni, $fechaNacimiento, $edad, $fecha, $areaTrabajo, $puestoTrabajo, $subArea, $sexo, $tiempoServicio, $fechaAudiometria, $tipoEpp, $valorNrr, $nivelRuido, $descripcionOd, $descripcionOi, $od_250, $od_500, $od_1000, $od_2000, $od_3000, $od_4000, $od_6000, $od_8000, $porcentajeOd, $oi_250, $oi_500, $oi_1000, $oi_2000, $oi_3000, $oi_4000, $oi_6000, $oi_8000, $escalaKlockhoffOd, $escalaKlockhoffOi, $interpretacionKlock, $condicionAuditiva, $porcentajeOi, $binaural, $mglobal, $interpretacionOd, $interpretacionOi, $cie_10, $rGeneral, $especifica, $complementarios, $oi_khz, $od_khz, $od_sts, $oi_sts){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_temporal SET razon_social = '$razonSocial', ruc = '$ruc', direccion = '$direccion', contacto = '$contacto', apellidos = '$apellidos', nombres = '$nombres', dni = '$dni', fecha_nacimiento = '$fechaNacimiento', edad = '$edad', fecha = '$fecha', area_trabajo = '$areaTrabajo', puesto_trabajo = '$puestoTrabajo', sub_area = '$subArea', sexo = '$sexo', tiempo_servicio = '$tiempoServicio', fecha_audiometria = '$fechaAudiometria', tipo_epp = '$tipoEpp', valor_nrr = '$valorNrr', nivel_ruido = '$nivelRuido', descripcion_od = '$descripcionOd', descripcion_oi = '$descripcionOi', od_250 = '$od_250', od_500 = '$od_500', od_1000 = '$od_1000', od_2000 = '$od_2000', od_3000 = '$od_3000', od_4000 = '$od_4000', od_6000 = '$od_6000', od_8000 = '$od_8000', porcentaje_od = '$porcentajeOd', oi_250 = '$oi_250', oi_500 = '$oi_500', oi_1000 = '$oi_1000', oi_2000 = '$oi_2000', oi_3000 = '$oi_3000', oi_4000 = '$oi_4000', oi_6000 = '$oi_6000', oi_8000 = '$oi_8000', escala_klockhoff_od = '$escalaKlockhoffOd', escala_klockhoff_oi = '$escalaKlockhoffOi', interpretacion_klock = '$interpretacionKlock', condicion_auditiva = '$condicionAuditiva', porcentaje_oi = '$porcentajeOi', binaural = '$binaural', mglobal = '$mglobal', interpretacion_od = '$interpretacionOd', interpretacion_oi = '$interpretacionOi', cie_10 = '$cie_10', rgeneral = '$rGeneral', especifica = '$especifica', complementarios = '$complementarios', od_khz = '$od_khz', oi_khz = '$oi_khz', od_sts = '$od_sts', oi_sts = '$oi_sts' WHERE id_temporal = $idTemporal";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idTemporal;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Eliminar */

		public function Eliminar($idTemporal){

			$this->cn = new Conexion();
			$sql = "DELETE FROM tbl_temporal WHERE id_temporal = $idTemporal";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idTemporal;
			$this->cn->Desconectarse();

			return $result;
		}
	}

?>