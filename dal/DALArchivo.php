<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : DALArchivo.php
	* Fecha : miércoles 13 de mayo del 2015 10:55:05 p.m.
	* Autor : CAPSULE SAC
	**/


	/* Includes */
	require_once("../../conexion/Conexion.php");
    require_once("../../conexion/Conexion.php");

	class DALArchivo {

		/* Atributos */



		public $cn;

		/* Funcion: GetEntidad */

		public function GetEntidad(){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_archivo WHERE estado = 1 ORDER BY id_archivo DESC";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: GetEntidadxId */

		public function GetEntidadxId($idArchivo){

			$this->cn = new Conexion();
			$sql = "SELECT * FROM tbl_archivo WHERE id_archivo = $idArchivo AND estado = 1 LIMIT 1";
			$link = $this->cn->Conectarse();
			$result = mysql_query($sql, $link);
			$this->cn->Desconectarse($link);

			return $result;
		}



		/* Funcion: Insertar */

		public function Insertar($nombreArchivo, $tipo, $cantidadRegistros, $fechaRegistro, $idEmpresa){

			$createdAt = date("Y-m-d H:i:s");
			$this->cn = new Conexion();
			$sql = "INSERT INTO tbl_archivo (nombre_archivo, tipo, cantidad_registros, fecha_registro, estado, created_at, id_empresa) VALUES ('$nombreArchivo', '$tipo', $cantidadRegistros, '$fechaRegistro', '1', '$createdAt', $idEmpresa)";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = mysql_insert_id();
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: Actualizar */

		public function Actualizar($idArchivo, $nombreArchivo, $tipo, $cantidadRegistros, $fechaRegistro, $idEmpresa){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_archivo SET nombre_archivo = '$nombreArchivo', tipo = '$tipo', cantidad_registros = $cantidadRegistros, fecha_registro = '$fechaRegistro', id_empresa = $idEmpresa WHERE id_archivo = $idArchivo";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idArchivo;
			$this->cn->Desconectarse($link);

			return $result;
		}


		/* Funcion: ActualizarxEmpresa */

		public function ActualizarxEmpresa($idArchivo, $idEmpresa){

			$this->cn = new Conexion();
			$sql = "UPDATE tbl_archivo SET id_empresa = $idEmpresa WHERE id_archivo = $idArchivo";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idArchivo;
			$this->cn->Desconectarse($link);

			return $result;
		}

		/* Funcion: Eliminar */

		public function Eliminar($idArchivo){

			$this->cn = new Conexion();
			//$sql = "DELETE FROM tbl_archivo WHERE id_archivo = $idArchivo";
			$sql = "UPDATE tbl_archivo SET estado = 0 WHERE id_archivo = $idArchivo";
			$link = $this->cn->Conectarse();
			mysql_query($sql, $link);
			$result = $idArchivo;
			$this->cn->Desconectarse();

			return $result;
		}

		public function Eliminar_Archivo_Fisico($idArchivo){
            //unlink("../../nombredelarchvio.xls");
            echo $idArchivo;
            echo $idArchivo;
            echo $idArchivo;
            echo $idArchivo;
            echo $idArchivo;
            echo $idArchivo;

            $this->cn = new Conexion();

            $sql = "SELECT nombre_archivo FROM tbl_archivo WHERE tbl_archivo.id_Archivo = $idArchivo";

            $link = $this->cn->Conectarse();

            $result = mysql_query($sql, $link);
            $this->cn->Desconectarse();

            while ($fila = mysql_fetch_assoc($result)) {
                $nombre = $fila['nombre_archivo'];
            }
//            echo $nombre;

            $rutaInicio = "../../archivos/".$nombre;
            if (file_exists($rutaInicio)){
                unlink("../../archivos/".$nombre);
            }
        }

        public function Eliminar_Archivo($idArchivo){


            $this->cn = new Conexion();
            //$sql = "DELETE FROM tbl_archivo WHERE id_archivo = $idArchivo";
            $sql = "DELETE tbl_archivo, tbl_archivo_trabajador,tbl_audio_tonal_od,tbl_audio_tonal_oi,tbl_diagnostico,tbl_empresa_trabajador,tbl_experiencia_laboral,tbl_informe,
                           tbl_linea_base,tbl_menoscabo,tbl_otoscopia,tbl_recomendacion
                    FROM tbl_archivo
                    INNER JOIN tbl_archivo_trabajador ON tbl_archivo_trabajador.id_archivo = tbl_archivo.id_archivo
                    INNER JOIN tbl_audio_tonal_od ON tbl_audio_tonal_od.id_audio_tonal_od = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_audio_tonal_oi ON tbl_audio_tonal_oi.id_audio_tonal_oi = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_diagnostico ON tbl_diagnostico.id_diagnostico = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_empresa_trabajador ON tbl_empresa_trabajador.id_empresa_trabajador = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_experiencia_laboral ON tbl_experiencia_laboral.id_experiencia_laboral = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_informe ON tbl_informe.id_informe = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_linea_base ON tbl_linea_base.id_linea_base = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_menoscabo ON tbl_menoscabo.id_menoscabo = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_otoscopia ON tbl_otoscopia.id_otoscopia = tbl_archivo_trabajador.id_archivo_trabajador
                    INNER JOIN tbl_recomendacion ON tbl_recomendacion.id_recomendacion = tbl_archivo_trabajador.id_archivo_trabajador
                    WHERE tbl_archivo_trabajador.id_archivo = $idArchivo";

            $link = $this->cn->Conectarse();

            $result = mysql_query($sql,$link);
            $this->cn->Desconectarse();

            return $result;
        }

	}

?>