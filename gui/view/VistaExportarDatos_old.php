<?php
	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : VistaExportarDatos.php
	* Fecha : domingo 09 de mayo del 2015 06:29:47 p.m.
	* Autor : CAPSULE SAC
	**/
?>

<!DOCTYPE html>
<html lang="es">
	<head>
	  <meta charset="utf-8">
	  <title>Audiología | Laboral</title>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	  <meta name="author" content="CAPSULE SAC">

	  <link rel="icon" href="../public/img/favicon.ico" type="image/x-icon">
	  <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="../public/datatable/dataTables.bootstrap.css">
	  <link rel="stylesheet" type="text/css" href="../public/css/style_audiologia.css">
	  <script type="text/javascript" language="javascript" src="../public/datatable/jquery-1.10.2.min.js"></script>
	  <script type="text/javascript" language="javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>
	  <script type="text/javascript" language="javascript" src="../public/js/js_audiologia.js"></script>
	</head>
	<body>
		</br>
		<div class="container">

<?php

	/* Includes */

	require_once('../../bll/bo/BOTemporal.php');
	require_once('../../bll/bo/BOEmpresa.php');
	require_once('../../bll/bo/BOTrabajador.php');
	require_once('../../bll/bo/BOEmpresaTrabajador.php');
	require_once('../../bll/bo/BOExperienciaLaboral.php');
	require_once('../../bll/bo/BOOtoscopia.php');
	require_once('../../bll/bo/BOAudioTonalOd.php');
	require_once('../../bll/bo/BOAudioTonalOi.php');
	require_once('../../bll/bo/BOMenoscabo.php');
	require_once('../../bll/bo/BODiagnostico.php');
	require_once('../../bll/bo/BORecomendacion.php');
	require_once('../../bll/bo/BOArchivo.php');
	require_once('../../bll/bo/BOArchivoTrabajador.php');
	require_once('../../bll/bo/BOInforme.php');
	require_once('../../bll/bo/BOLineaBase.php');
	require_once("../../conexion/Conexion.php");

	$idArchivo = $_REQUEST['idArchivo'];

	$boTemporal = new BOTemporal();
	$boTrabajador = new BOTrabajador();
	$boEmpresa = new BOEmpresa();
	$boExperienciaLaboral = new BOExperienciaLaboral();
	$boEmpresaTrabajador = new BOEmpresaTrabajador();
	$boOtoscopia = new BOOtoscopia();
	$boAudioTonalOd = new BOAudioTonalOd();
	$boAudioTonalOi = new BOAudioTonalOi();
	$boMenoscabo = new BOMenoscabo();
	$boDiagnostico = new BODiagnostico();
	$boRecomendacion = new BORecomendacion();
	$boArchivo = new BOArchivo();
	$boArchivoTrabajador = new BOArchivoTrabajador();
	$boLineaBase = new BOLineaBase();
	$boInforme = new BOInforme();

	//Llama toda la información de la tabla Temporal
	$audiologiaTotal = $boTemporal->GetEntidad();


echo "<br><br><center><strong>TRABAJADORES EXPORTADOS A LA BASE DE DATOS!</strong></center><br><br>";
	for ($i=0; $i < count($audiologiaTotal); $i++) {
		//Recupera el DNI de un Trabajador
		$dni = $audiologiaTotal[$i]->dni;
		//Recupera la información de un Trabajador por medio de su DNI
		$trabajador = $boTrabajador->GetEntidadxDni($dni);
		$estadoTrabajador = 0;
		//Verifica si Trabajador no existe
		if (count($trabajador) <= 0) {
			//Inserta un nuevo trabajador y recupera el ID del Trabajador
			//$nombres = explode(' ', $audiologiaTotal[$i]->nombres);
			
			/*if (count($nombres)>3) {$nombre = $nombres[2].' '.$nombres[3];}else{$nombre = $nombres[2];}
			$apellidos = $nombres[0].' '.$nombres[1];*/

			$idTrabajador = $boTrabajador->Insertar($audiologiaTotal[$i]->nombres, $audiologiaTotal[$i]->apellidos, $audiologiaTotal[$i]->dni, $audiologiaTotal[$i]->fechaNacimiento, $audiologiaTotal[$i]->sexo);
			$estadoTrabajador = 1;
		}else{
			//Recupera el ID del Trabajador
			$idTrabajador = $trabajador[0]->idTrabajador;
		}
		$resultado = $boOtoscopia->GetEntidadxTrabajador($idTrabajador);
		echo count($resultado);
		if ($idTrabajador!='' OR $idTrabajador!=NULL){
			$num = $i + 1;
			if ($estadoTrabajador == 1) {
				echo "<br>El trabajador ".$num.": ".$audiologiaTotal[$i]->nombres.' '.$audiologiaTotal[$i]->apellidos." con DNI ".$audiologiaTotal[$i]->dni.", se ha registrado SATISFACTORIAMENTE.<br>";
			}else{
				$flag = false;
				$idResultado=0;
				for ($j=0; $j < count($resultado); $j++){
					if( strtotime($resultado[$j]->fechaAudiometria)==strtotime($audiologiaTotal[$i]->fechaAudiometria)){
						$flag=true;
						$idResultado=$j;
						break;
					}
				}
				if($flag==true){
					echo "<br><span style='color:red'>El trabajador ".$num.": ".$audiologiaTotal[$i]->nombres.' '.$audiologiaTotal[$i]->apellidos." con DNI ".$audiologiaTotal[$i]->dni.", YA EXISTE REGISTRO CON ESTA FECHA, no se ha hecho ningun cambio.</span><br>";

				}else{
					echo "<br><span style='color:#0000FF'>El trabajador ".$num.": ".$audiologiaTotal[$i]->nombres.' '.$audiologiaTotal[$i]->apellidos." con DNI ".$audiologiaTotal[$i]->dni.", YA EXISTE; se registró los datos del Informe Audiológico.</span><br>";
					//Guarda los datos de la relación Archivo - Trabajador
					$idArchivoTrabajador = $boArchivoTrabajador->Insertar($idArchivo, $idTrabajador);

					//Recupera el RUC de la Empresa
					$ruc = $audiologiaTotal[$i]->ruc;
					//Recupera la información de la Empresa por medio del RUC
					$empresa = $boEmpresa->GetEntidadxRuc($ruc);

					//Verifica si Empresa existe
					if (count($empresa) <= 0) {
						//Inserta una nueva Empresa y recupera el ID de la Empresa
						$idEmpresa = $boEmpresa->Insertar($audiologiaTotal[$i]->razonSocial, $audiologiaTotal[$i]->ruc, $audiologiaTotal[$i]->direccion, $audiologiaTotal[$i]->contacto);
					}else{
						//Recupera el ID de la Empresa
						$idEmpresa = $empresa[0]->idEmpresa;
					}

					if ($idEmpresa!='' OR $idEmpresa!=NULL) {

						//Inserta una nueva Experiencia Laboral y recupera el ID
						$idExperienciaLaboral = $boExperienciaLaboral->Insertar($audiologiaTotal[$i]->fecha, $audiologiaTotal[$i]->areaTrabajo, $audiologiaTotal[$i]->subArea, $audiologiaTotal[$i]->puestoTrabajo, $audiologiaTotal[$i]->tiempoServicio, $audiologiaTotal[$i]->nivelRuido, $audiologiaTotal[$i]->tipoEpp, $audiologiaTotal[$i]->valorNrr, 0, $idTrabajador);

						//Verificamos si existe una relación entre Trabajador - Empresa
						$empresaTrabajador = $boEmpresaTrabajador->Verificar($idTrabajador, $idEmpresa, $idExperienciaLaboral);

						if (count($empresaTrabajador) <= 0) {
							//Inserta una nueva relación Trabajador - Empresa y recupera el ID
							$idEmpresaTrabajador = $boEmpresaTrabajador->Insertar($idTrabajador, $idEmpresa, $idExperienciaLaboral);
						}else{
							//Recupera ID de EmpresaTrabajador
							$idEmpresaTrabajador = $empresaTrabajador[0]->idEmpresaTrabajador;
						}

						//Inserta una nueva Otoscopia y recupera el ID
						$idOtoscopia = $boOtoscopia->Insertar($audiologiaTotal[$i]->fechaAudiometria, $audiologiaTotal[$i]->descripcionOd, $audiologiaTotal[$i]->descripcionOi, $audiologiaTotal[$i]->edad, $idTrabajador);
						//Inserta una nueva AudioTonalOd y recupera el ID
						$idAudioTonalOd = $boAudioTonalOd->Insertar($audiologiaTotal[$i]->od_250, $audiologiaTotal[$i]->od_500, $audiologiaTotal[$i]->od_1000, $audiologiaTotal[$i]->od_2000, $audiologiaTotal[$i]->od_3000, $audiologiaTotal[$i]->od_4000, $audiologiaTotal[$i]->od_6000, $audiologiaTotal[$i]->od_8000, $audiologiaTotal[$i]->od_sts, $audiologiaTotal[$i]->od_khz, 0, 0, $idTrabajador);
						//Inserta una nueva AudioTonalOi y recupera el ID
						$idAudioTonalOi = $boAudioTonalOi->Insertar($audiologiaTotal[$i]->oi_250, $audiologiaTotal[$i]->oi_500, $audiologiaTotal[$i]->oi_1000, $audiologiaTotal[$i]->oi_2000, $audiologiaTotal[$i]->oi_3000, $audiologiaTotal[$i]->oi_4000, $audiologiaTotal[$i]->oi_6000, $audiologiaTotal[$i]->oi_8000, $audiologiaTotal[$i]->oi_sts, $audiologiaTotal[$i]->oi_khz, $idTrabajador);
						//Inserta un nuevo Menoscabo y recupera el ID
						$idMenoscabo = $boMenoscabo->Insertar($audiologiaTotal[$i]->porcentajeOd, $audiologiaTotal[$i]->porcentajeOi, $audiologiaTotal[$i]->binaural, $audiologiaTotal[$i]->mglobal, $idTrabajador);
						//Inserta un nuevo Diagnostico y recupera el ID
						$idDiagnostico = $boDiagnostico->Insertar($audiologiaTotal[$i]->escalaKlockhoffOd, $audiologiaTotal[$i]->interpretacionOd, $audiologiaTotal[$i]->escalaKlockhoffOi, $audiologiaTotal[$i]->interpretacionOi, $audiologiaTotal[$i]->cie_10, $audiologiaTotal[$i]->interpretacionKlock, $audiologiaTotal[$i]->condicionAuditiva, $idTrabajador);
						//Inserta un nueva Recomendacion y recupera el ID
						$idRecomendacion = $boRecomendacion->Insertar($audiologiaTotal[$i]->rGeneral, $audiologiaTotal[$i]->especifica, $audiologiaTotal[$i]->complementarios, '', $idTrabajador);

						//Inserta una nueva Línea Base y recupera el ID
						if ($estadoTrabajador == 1) {
							$idLineaBase = $boLineaBase->Insertar($idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idOtoscopia);
						}else{
							$idLineaBase = 0;
						}
						$fechaInforme = '2050-12-31 00:00:00';
						//Inserta un nuevo Informe y recupera el ID
						$idInforme = $boInforme->Insertar($fechaInforme, $idTrabajador, $idAudioTonalOd, $idAudioTonalOi, $idDiagnostico, $idOtoscopia, $idRecomendacion, $idExperienciaLaboral, $idLineaBase, $idEmpresa, $idMenoscabo);
				}
			}

			}
		}


	}

	if ($idEmpresa!='' OR $idEmpresa!=NULL) {
		//Actualiza el idEmpresa de la tabla Archivo
		$idArchivoActualizado = $boArchivo->ActualizarxEmpresa($idArchivo, $idEmpresa);
	}
	echo "<br><br><br>";

	//Eliminar los datos de la tabla temporal
	$cn = new Conexion();
	$link = $cn->Conectarse();
	$sqlTruncate = "TRUNCATE tbl_temporal";
	$result = mysql_query($sqlTruncate, $link);
	$cn->Desconectarse($link);

?>

		</div>
	</body>
</html>