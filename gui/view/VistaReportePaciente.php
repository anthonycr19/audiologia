<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaReportePaciente.php
    * Fecha : lunes 11 de abril del 2015 07:14:34 p.m.
    * Autor : CAPSULE SAC
    **/

	require_once('../../bll/bo/BOTrabajador.php');
	require_once('../../bll/bo/BOInforme.php');
	require_once('../../bll/bo/BOEmpresaTrabajador.php');
    require_once('../../bll/bo/BOEmpresa.php');
	require_once('../../bll/bo/BOExperienciaLaboral.php');
	require_once('../../bll/bo/BOOtoscopia.php');
	require_once('../../bll/bo/BOAudioTonalOd.php');
	require_once('../../bll/bo/BOAudioTonalOi.php');
	require_once('../../bll/bo/BOMenoscabo.php');
	require_once('../../bll/bo/BODiagnostico.php');
	require_once('../../bll/bo/BORecomendacion.php');
	require_once('../../bll/bo/BOLineaBase.php');
	
	$idTrabajador = $_REQUEST['idTrabajador'];
	$idLbOd = $_REQUEST['idLbOd'];
	$idCtOd = $_REQUEST['idCtOd'];

	if (isset($_REQUEST['idLbOi'])) {
		$idLbOi = $_REQUEST['idLbOi'];
		$idCtOi = $_REQUEST['idCtOi'];
		$idLbOtoscopia = $_REQUEST['idLbOtoscopia'];

		$arrayRetest = explode(',', $_REQUEST['arrayRetest']);
		$arrayFail = explode(',', $_REQUEST['arrayFail']);
		$arrayOd = explode(',', $_REQUEST['arrayOd']);

		$boUpdateAudioTonalOd = new BOAudioTonalOd();
		$boUpdateAudioTonalOi = new BOAudioTonalOi();

		//Actualizamos el AudioTonal OD y OI ---> STS a 0 de LB
		$idUpdateOdLb = $boUpdateAudioTonalOd->ActualizarxSts($idLbOd, 0);
		$idUpdateOiLb = $boUpdateAudioTonalOi->ActualizarxSts($idLbOi, 0);

		//Calculo del STS para el OD y OI
		$updateAudioTonalOdLb = $boUpdateAudioTonalOd->GetEntidadxId($idLbOd);
		$updateAudioTonalOiLb = $boUpdateAudioTonalOi->GetEntidadxId($idLbOi);
		$updateAudioTonalOdCt = $boUpdateAudioTonalOd->GetEntidadxId($idCtOd);
		$updateAudioTonalOiCt = $boUpdateAudioTonalOi->GetEntidadxId($idCtOi);

		$odUpdateSts = ($updateAudioTonalOdCt[0]->od_khz - $updateAudioTonalOdLb[0]->od_khz);
		$oiUpdateSts = ($updateAudioTonalOiCt[0]->oi_khz - $updateAudioTonalOiLb[0]->oi_khz);

		//Actualizamos el AudioTonal OD y OI ---> STS
		$idUpdateOd = $boUpdateAudioTonalOd->ActualizarxSts($idCtOd, $odUpdateSts);
		$idUpdateOi = $boUpdateAudioTonalOi->ActualizarxSts($idCtOi, $oiUpdateSts);

		//Insertar una nueva Linea Base
		$boInsertLineaBase = new BOLineaBase();
		$idNewLineaBase = $boInsertLineaBase->Insertar($idTrabajador, $idLbOd, $idLbOi, $idLbOtoscopia);

		//Recupera el ID del Informe Actual
		$boUpdateInforme = new BOInforme();
		$informeUpdate = $boUpdateInforme->GetEntidadxIdAudioTonalOd($idCtOd);
		$idInforme = $informeUpdate[0]->idInforme;

		//Actualiza el ID de la Linea Base en el Informe Actual
		$idInformeUpdate = $boUpdateInforme->ActualizarxLb($idInforme, $idNewLineaBase);

		//Actualiza los Fail y Retest de cada OD
		$boRetestFailAudioTonalOd = new BOAudioTonalOd();
		for ($i=0; $i < count($arrayOd); $i++) {
			$idRetestOd = $boRetestFailAudioTonalOd->ActualizarxRetestOd($arrayOd[$i], 0);
			$idFailOd = $boRetestFailAudioTonalOd->ActualizarxFailOd($arrayOd[$i], 0);

			for ($j=0; $j < count($arrayRetest); $j++) {
				if ($arrayOd[$i] == $arrayRetest[$j]) {
					$idRetestOd = $boRetestFailAudioTonalOd->ActualizarxRetestOd($arrayOd[$i], 1);
				}
			}

			for ($k=0; $k < count($arrayFail); $k++) { 
				if ($arrayOd[$i] == $arrayFail[$k]) {
					$idFailOd = $boRetestFailAudioTonalOd->ActualizarxFailOd($arrayOd[$i], 1);
				}
			}		
		}
	}


	if (isset($_POST['idRecomendacion'])) {
		$idRecomendacion = $_POST['idRecomendacion'];
		$conclusion = $_POST['conclusion'];
		$rGeneral = $_POST['rGeneral'];
		$rEspecifica = $_POST['rEspecifica'];
		$rComplementarios = $_POST['rComplementarios'];

		$boRecomendacionActualizar = new BORecomendacion();
		$idRecomendacionActualizar = $boRecomendacionActualizar->Actualizar($idRecomendacion, $rGeneral, $rEspecifica, $rComplementarios, $conclusion, $idTrabajador);
	}	    					

	//Recupera la información de un Trabajador por medio de su ID
	$boTrabajador = new BOTrabajador();
	$trabajador = $boTrabajador->GetEntidadxId($idTrabajador);

	$fechaEdad = time() - strtotime($trabajador[0]->fechaNacimiento);
	$edadActual = floor((($fechaEdad/3600)/24)/360);

	//Recupera la información del Informe Actual del Trabajador por medio del ID de id_audio_tonal_od
	$boInformeActual = new BOInforme();
	$informeActual = $boInformeActual->GetEntidadxIdAudioTonalOd($idCtOd);

	//Recupera todos los ID asociados al Informe Actual
	
	$idEmpresaActual = $informeActual[0]->idEmpresa;
	$idExperienciaLaboralActual = $informeActual[0]->idExperienciaLaboral;
	$idOtoscopia = $informeActual[0]->idOtoscopia;
	$idAudioTonalOiActual = $informeActual[0]->idAudioTonalOi;
	$idAudioTonalOdActual = $informeActual[0]->idAudioTonalOd;
	$idDiagnosticoActual = $informeActual[0]->idDiagnostico;
	$idMenoscabo = $informeActual[0]->idMenoscabo;
	$idRecomendacionActual = $informeActual[0]->idRecomendacion;
	
	//Recupera datos de la Empresa Actual por medio de su ID
	$boEmpresaActual = new BOEmpresa();
	$empresaActual = $boEmpresaActual->GetEntidadxId($idEmpresaActual);

	//Recupera datos de la Experiencia Laboral Actual por medio de su ID
	$boExperienciaLaboralActual = new BOExperienciaLaboral();
	$experienciaLaboralActual = $boExperienciaLaboralActual->GetEntidadxId($idExperienciaLaboralActual);

	//Recupera fechas de inicio y fin del Informe Histórico por medio de $idLbOd, $idCtOd y $idTrabajador
	$boOtoscopiaLbyCtOd = new BOOtoscopia();
	$otoscopiaLdOd = $boOtoscopiaLbyCtOd->GetEntidadxIdxIdTrabajador($idLbOd, $idTrabajador);
	$fechaLbOd = $otoscopiaLdOd[0]->fechaAudiometria;

	$otoscopiaCtOd = $boOtoscopiaLbyCtOd->GetEntidadxIdxIdTrabajador($idCtOd, $idTrabajador);
	$fechaCtOd = $otoscopiaCtOd[0]->fechaAudiometria;

	//Recupera todos los ID del Informe Historico por medio del $fechaLbOd, $fechaCtOd y $idTrabajador
	$boInformeHistorico = new BOInforme();
	$informeHistorico = $boInformeHistorico->GetEntidadxFechaLbOdxFechaCtOdxIdTrabajador($fechaLbOd, $fechaCtOd, $idTrabajador);

	//Recupera los valores de Audio Tonal OI Actual
	$boAudioTonalOi = new BOAudioTonalOi();
	$audioTonalOiActual = $boAudioTonalOi->GetEntidadxId($idAudioTonalOiActual);

	//Recupera los valores de Audio Tonal OD Actual
	$boAudioTonalOd = new BOAudioTonalOd();
	$audioTonalOdActual = $boAudioTonalOd->GetEntidadxId($idAudioTonalOdActual);


	//Recupera la información del Informe Base Line del Trabajador por medio del ID de id_audio_tonal_od
	$boInformeBaseLine = new BOInforme();
	$informeBaseLine = $boInformeBaseLine->GetEntidadxIdAudioTonalOd($idLbOd);

	//Recupera todos los ID asociados al Informe Actual
	$idAudioTonalOiBaseLine = $informeBaseLine[0]->idAudioTonalOi;
	$idAudioTonalOdBaseLine = $informeBaseLine[0]->idAudioTonalOd;

	//Recupera los valores de Audio Tonal OI Base Line
	$boAudioTonalOiLb = new BOAudioTonalOi();
	$audioTonalOiBaseLine = $boAudioTonalOiLb->GetEntidadxId($idAudioTonalOiBaseLine);

	//Recupera los valores de Audio Tonal OD Base Line
	$boAudioTonalOdLb = new BOAudioTonalOd();
	$audioTonalOdBaseLine = $boAudioTonalOdLb->GetEntidadxId($idAudioTonalOdBaseLine);
	//echo var_dump($informeHistorico);

	//Recupera Diagnostico Actual
	$boDiagnosticoActual = new BODiagnostico();
	$diagnosticoActual = $boDiagnosticoActual->GetEntidadxId($idDiagnosticoActual);
		
	//Recupera Recomendación Actual
	$boRecomendacionActual = new BORecomendacion();
	$recomendacionActual = $boRecomendacionActual->GetEntidadxId($idRecomendacionActual);
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  	<meta charset="utf-8">
  	<title>Audiología | Laboral</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
 	<meta name="author" content="CAPSULE SAC">

  	<link rel="icon" href="../public/img/favicon.ico" type="image/x-icon">
  	<link rel="stylesheet" type="text/css" href="../public/css/reporte.css">

  	<style type="text/css">
 		@media print {
    		.oculto {display:none}
  		}
	</style>

<!--LIBRERIAS GRÁFICA-->
	<script src="../../grafica/jquery.js"></script>
	<script src="../../grafica/highcharts.js"></script>
	<script src="../../grafica/exporting.js"></script>

	<script>
		function guardarReporte(){
			document.reporteEdit.submit()
		}
	</script>
<script>

		var d1_Lb = <?php echo $audioTonalOdBaseLine[0]->od_250; ?>;
		var d2_Lb = <?php echo $audioTonalOdBaseLine[0]->od_500; ?>;
		var d3_Lb = <?php echo $audioTonalOdBaseLine[0]->od_1000; ?>;
		var d4_Lb = <?php echo $audioTonalOdBaseLine[0]->od_2000; ?>;
		var d5_Lb = <?php echo $audioTonalOdBaseLine[0]->od_3000; ?>;
		var d6_Lb = <?php echo $audioTonalOdBaseLine[0]->od_4000; ?>;
		var d7_Lb = <?php echo $audioTonalOdBaseLine[0]->od_6000; ?>;
		var d8_Lb = <?php echo $audioTonalOdBaseLine[0]->od_8000; ?>;

		var d1_Ct = <?php echo $audioTonalOdActual[0]->od_250; ?>;
		var d2_Ct = <?php echo $audioTonalOdActual[0]->od_500; ?>;
		var d3_Ct = <?php echo $audioTonalOdActual[0]->od_1000; ?>;
		var d4_Ct = <?php echo $audioTonalOdActual[0]->od_2000; ?>;
		var d5_Ct = <?php echo $audioTonalOdActual[0]->od_3000; ?>;
		var d6_Ct = <?php echo $audioTonalOdActual[0]->od_4000; ?>;
		var d7_Ct = <?php echo $audioTonalOdActual[0]->od_6000; ?>;
		var d8_Ct = <?php echo $audioTonalOdActual[0]->od_8000; ?>;
		
		var i1_Lb = <?php echo $audioTonalOiBaseLine[0]->oi_250; ?>;
		var i2_Lb = <?php echo $audioTonalOiBaseLine[0]->oi_500; ?>;
		var i3_Lb = <?php echo $audioTonalOiBaseLine[0]->oi_1000; ?>;
		var i4_Lb = <?php echo $audioTonalOiBaseLine[0]->oi_2000; ?>;
		var i5_Lb = <?php echo $audioTonalOiBaseLine[0]->oi_3000; ?>;
		var i6_Lb = <?php echo $audioTonalOiBaseLine[0]->oi_4000; ?>;
		var i7_Lb = <?php echo $audioTonalOiBaseLine[0]->oi_6000; ?>;
		var i8_Lb = <?php echo $audioTonalOiBaseLine[0]->oi_8000; ?>;

		var i1_Ct = <?php echo $audioTonalOiActual[0]->oi_250; ?>;
		var i2_Ct = <?php echo $audioTonalOiActual[0]->oi_500; ?>;
		var i3_Ct = <?php echo $audioTonalOiActual[0]->oi_1000; ?>;
		var i4_Ct = <?php echo $audioTonalOiActual[0]->oi_2000; ?>;
		var i5_Ct = <?php echo $audioTonalOiActual[0]->oi_3000; ?>;
		var i6_Ct = <?php echo $audioTonalOiActual[0]->oi_4000; ?>;
		var i7_Ct = <?php echo $audioTonalOiActual[0]->oi_6000; ?>;
		var i8_Ct = <?php echo $audioTonalOiActual[0]->oi_8000; ?>;		

		var derBl = new Array(d1_Lb, d2_Lb, d3_Lb, d4_Lb, d5_Lb, d6_Lb, d7_Lb, d8_Lb);
		var derCt = new Array(d1_Ct, d2_Ct, d3_Ct, d4_Ct, d5_Ct, d6_Ct, d7_Ct, d8_Ct);

		var izqBl = new Array(i1_Lb, i2_Lb, i3_Lb, i4_Lb, i5_Lb, i6_Lb, i7_Lb, i8_Lb);
		var izqCt = new Array(i1_Ct, i2_Ct, i3_Ct, i4_Ct, i5_Ct, i6_Ct, i7_Ct, i8_Ct);

		/*
		var izq = new Array(20, 25, 35, 45, 50, 65, 70, 80);
		var der = new Array(10, 15, 20, 25, 35, 50, 85, 90);
		*/

		//url_izq = 'url(http://www.mallki.pusku.com/azul_izquierdo.png)';
		
		url_der = 'url(../public/img/circulo.png)';
		url_izq = 'url(../public/img/aspa.png)';

		izq_bl = 'url(../public/img/aspaNegra.png)';
		der_bl = 'url(../public/img/circuloNegro.png)';

		$(function () {
			$('#container1').highcharts({
		        title: {
		            text: ' ',
		            x: -20 //center
		        },
		        plotOptions: { //opções de plotagem geral
		            series: {
		                marker: {
		                    radius: 4
		                }
		            }
		        },
		        xAxis: {
		            opposite: true, //põe os valores de x no topo do gráfico
		            allowDecimals: true, //permite valores decimais
		            showFirstLabel: true, //esconde primeiro valor do X (valores que aparecem no label)
		            gridLineWidth: 1, //espessura da linha do grid X
		            tickmarkPlacement: 'on', // coloca os valores do categories em cima dos traços
		            title: {
                		enabled: true,
                		text: 'Hz' //título de x
            		},
		            minorTickInterval: 1, //menor intervalo entre os traços
		            categories: ['.25k', '.5k', '1k', '2k', '3k', '4k', '6k', '8k']
		        },
		        yAxis: {
		            min:-10,
		            max:120,
		            tickInterval: 5,
		            reversed: true,
		            title: {
		                enabled: true,
		                text: 'dB(A)'
		            },
		            plotLines: [{
		                value: 25,
		                width: 1,
		                color: '#FF0000'
		            }]
		        },
		        tooltip: {
		            crosshairs: [{ //insere linha preta no x e y ao passar o mouse no ponto
		                width: 1, // espessura
		                color: 'black' //cor
		                }, {
		                width: 1, // espessura
		                color: 'black' // cor
		            }]
		        },
		        legend: {
		            layout: 'horizontal',
		            align: 'center',
		            //verticalAlign: 'middle',
		            horizontalAlign: 'middle',
		            borderWidth: 0,
		            enabled: true
		        },
		        series: [
		        	{
			            name: 'Baseline',
			            color: 'black',
			            data: derBl,
			            marker: {
			                //symbol: 'circle',
			                symbol: der_bl,
			            },
			           	//lineWidth: 0
			        },
		        	{
			            name: 'Current Test',
			            color: 'red',
			            data: derCt,
			            marker: {
			                symbol: url_der,
			            },
			            //lineWidth: 0
		        	}
		    	],
		      	exporting: {
		        	enabled: false
		    	},
		    	credits: {
            		enabled: false // destivado os créditos do site highcharts
        		}
		    });
		});


		$(function () {
			$('#container2').highcharts({
		        title: {
		            text: ' ',
		            x: -20 //center
		        },
		        plotOptions: { //opções de plotagem geral
		            series: {
		                marker: {
		                    radius: 4
		                }
		            }
		        },
		        xAxis: {
		            opposite: true, //põe os valores de x no topo do gráfico
		            allowDecimals: true, //permite valores decimais
		            showFirstLabel: true, //esconde primeiro valor do X (valores que aparecem no label)
		            gridLineWidth: 1, //espessura da linha do grid X
		            tickmarkPlacement: 'on', // coloca os valores do categories em cima dos traços
		            title: {
                		enabled: true,
                		text: 'Hz' //título de x
            		},
		            minorTickInterval: 1, //menor intervalo entre os traços
		            categories: ['.25k', '.5k', '1k', '2k', '3k', '4k', '6k', '8k']
		        },
		        yAxis: {
		            min:-10,
		            max:120,
		            tickInterval: 5,
		            reversed: true,
		            title: {
		                enabled: true,
		                text: 'dB(A)'
		            },
		            plotLines: [{
		                value: 25,
		                width: 1,
		                color: '#FF0000'
		            }]
		        },
		        tooltip: {
		            crosshairs: [{ //insere linha preta no x e y ao passar o mouse no ponto
		                width: 1, // espessura
		                color: 'black' //cor
		                }, {
		                width: 1, // espessura
		                color: 'black' // cor
		            }]
		        },
		        legend: {
		            layout: 'horizontal', //pone los textos en la forma horizontal, los dos textos
		            align: 'center',
		            //verticalAlign: 'middle', //alinea el texto al lado vertical
		            horizontalAlign: 'middle',
		            borderWidth: 0,
		            enabled: true
		        },
		        series: [
		        	{
			            name: 'Baseline',
			            color: 'black',
			            data: izqBl,
			            marker: {
			                //symbol: 'square',
			                symbol: izq_bl,
			            },
			           	//lineWidth: 0
			        },
		        	{
			            name: 'Current Test',
			            color: 'blue',
			            data: izqCt,
			            marker: {
			                symbol: url_izq,
			            },
			            //lineWidth: 0
		        	}
		    	],
		      	exporting: {
		        	enabled: false
		    	},
		    	credits: {
            		enabled: false // destivado os créditos do site highcharts
        		}
		    });
		});
</script>

</head>
<body>
	<form action="VistaReportePaciente.php" enctype="multipart/form-data" method="post" name="reporteEdit" id="reporteEdit">
		<div id="principal">
			<!--LOGO-->
			<div id="logo">
				<img src="../public/img/audiologia.png" alt="logo" width="800px" height="100"><br>
				<img src="../public/img/name.png" alt="name">
			</div>

			<!--TITULO-->
			<div id="titulo">
				<h3><b>INFORME DE AUDIOLOGÍA LABORAL</b></h3>
				<input type="hidden" name="idTrabajador" id="idTrabajador" value="<?php echo $idTrabajador; ?>">
				<input type="hidden" name="idLbOd" id="idLbOd" value="<?php echo $idLbOd; ?>">
				<input type="hidden" name="idCtOd" id="idCtOd" value="<?php echo $idCtOd; ?>">
			</div>

			<!--DATOS PERSONALES-->
			<div id="datospersonal">
				<table width="100%">
	      			<tr>
	      				<td width="50%">
	      					<div><strong>DATOS DE LA EMPRESA :</strong></div>
	      				</p>
	      					<div>
	      						<label><b>Empresa: </b></label>
			                	<span><?php if($empresaActual[0]->razonSocial!=''){echo $empresaActual[0]->razonSocial;}else{echo '--';} ?></span>
	      					</div>
	      					<div>
	      						<label><b>Dirección: </b></label>
						    	<span><?php if($empresaActual[0]->direccion!=''){echo $empresaActual[0]->direccion;}else{echo '--';}?></span>	
	      					</div>
	      					<br>
	      					<div>
	      						<strong>DATOS DEL TRABAJADOR :</strong>
	      					</div>
	      				</p>
	      					<div>
	      						<label><b>Nombres: </b></label>
						        <span><?php if($trabajador[0]->nombre!=''){echo $trabajador[0]->nombre;}else{echo '--';}?></span>
	      					</div>
	      					<div>
		      					<label><b>Apellidos: </b></label>
					            <span><?php if($trabajador[0]->apellidos!=''){echo $trabajador[0]->apellidos;}else{echo '--';}?></span>
	      					</div>
	      					<div>
	      						<label><b>DNI: </b></label>
							    <span><?php if($trabajador[0]->dni!=''){echo $trabajador[0]->dni;}else{echo '--';}?></span>
	      					</div>
			                <div>
			                	<label><b>Fecha de Nacimiento: </b></label>
								<span><?php if($trabajador[0]->fechaNacimiento!=''){echo substr($trabajador[0]->fechaNacimiento,8,2).'-'.substr($trabajador[0]->fechaNacimiento,5,2).'-'.substr($trabajador[0]->fechaNacimiento,0,4);}else{echo '--';}?></span>
			                </div>
			                <div>
			                	<label><b>Edad: </b></label>
								<span><?php if($edadActual!=0){echo $edadActual.' a&ntilde;os';}else{echo '--';}?></span>
			                </div>
			                <div>
			                	<label><b>Sexo: </b></label>
								<span><?php if($trabajador[0]->sexo!=''){echo $trabajador[0]->sexo;}else{echo '--';}?></span>
			                </div>
			            </p>
	      				</td>
	      				<td width="50px">
							<div>
								<strong>DATOS DEL PUESTO DE TRABAJO :</strong>
							</div>
						</p>
							<div>
								<label><b>Área de Trabajo: </b></label>
			                	<span><?php if($experienciaLaboralActual[0]->areaTrabajo!=''){echo $experienciaLaboralActual[0]->areaTrabajo;}else{echo '--';}?></span>
							</div>
							<div>
								<label><b>Puesto de Trabajo: </b></label>
						        <span><?php if($experienciaLaboralActual[0]->puestoTrabajo!=''){echo $experienciaLaboralActual[0]->puestoTrabajo;}else{echo '--';}?></span>
							</div>
							<div>
								<label><b>Tiempo de Servicio: </b></label>
						        <span><?php if($experienciaLaboralActual[0]->tiempoServicio!=0){echo $experienciaLaboralActual[0]->tiempoServicio.' a&ntilde;os';}else{echo '--';}?></span>
							</div>
							<div>
								<label><b>Tipo de EPP: </b></label>
						        <span><?php if($experienciaLaboralActual[0]->tipoEpp!=''){echo $experienciaLaboralActual[0]->tipoEpp;}else{echo '--';}?></span>
							</div>
							<div>
								<label><b>Valor de NRR: </b></label>
						        <span><?php if($experienciaLaboralActual[0]->valorNrr!=0){echo $experienciaLaboralActual[0]->valorNrr.' dBs';}else{echo '--';}?></span>
							</div>
							<div>
								<label><b>Nivel de Ruido: </b></label>
						        <span><?php if($experienciaLaboralActual[0]->nivelRuido!=''){echo $experienciaLaboralActual[0]->nivelRuido.' dBA';}else{echo '--';}?></span>
							</div>
							<br><br>
							<div class="altura">
								<label><b>Fecha de Informe: </b></label>
						        <span><?php $fechaReporte = date('Y-m-d'); echo substr($fechaReporte,8,2).'-'.substr($fechaReporte,5,2).'-'.substr($fechaReporte,0,4);?></span>
							</div>
	      				</td>
	      			</tr>
	      		</table>			
			</div>

			<!--HISTORIA DE EXPOSICIÓN A RUIDO-->
			<div style="font-size: 7px;">&nbsp;</div>
			<div id="historiaexposicion">
				<strong>HISTORIA DE EXPOSICIÓN A RUIDO :</strong><br><br>

	            <table width="100%" rules="cols" border="1">
					<thead>
						<tr>
							<th width="32%"><center>USO DE PROTECTORES PARA RUIDO (EPP)</center></th>
							<!--<th width="2%"><center>&nbsp;</center></th>-->
							<th width="68%"><center>TIEMPO DE EXPOSICIÓN A RUIDO</center></th>
						</tr>
					</thead>
				<table>
				<table width="100%" rules="cols" border="1">
					<thead>
						<tr>
							<th width="9%" height="25px"><center>Fecha</center></th>
							<th width="12%"><center>Tipo de EPP</center></th>
							<th width="11%"><center>Valor de NRR <cite>(dBs)</cite></center></th>
							<!--<th width="2%">&nbsp;</th>-->
							<th width="9%" height="25px"><center>T. Servicio <cite>(años)</cite></center></th>
							<th width="21%"><center>Área</center></th>
							<th width="17%"><center>Nivel de Ruido <cite>(dBA)</cite></center></th>
							<th width="21%"><center>Puesto de Trabajo</center></th>
						</tr>
					<thead>
				</table>
				<table width="100%" rules="cols" border="1">
					<tbody>
						<?php
							$saltoLinea=0;
							for ($i=0; $i < count($informeHistorico); $i++) {
								if (strlen($informeHistorico[$i]->idExperienciaLaboral->areaTrabajo)>23 OR strlen($informeHistorico[$i]->idExperienciaLaboral->puestoTrabajo)>23) {
									$saltoLinea++;
								}
						?>
						<tr>
							<td width="9%"><center><?php if($informeHistorico[$i]->idOtoscopia->fechaAudiometria!=''){echo substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,8,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,5,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,0,4);}else{echo '--';} ?></center></td>
							<td width="12%"><center><?php if($informeHistorico[$i]->idExperienciaLaboral->tipoEpp!=''){echo $informeHistorico[$i]->idExperienciaLaboral->tipoEpp;}else{echo '--';} ?></center></td>
							<td width="11%"><center><?php if($informeHistorico[$i]->idExperienciaLaboral->valorNrr!=0){echo $informeHistorico[$i]->idExperienciaLaboral->valorNrr;}else{echo '--';} ?></center></td>
							<!--<td>&nbsp;</td>-->
							<td width="9%"><center><?php if($informeHistorico[$i]->idExperienciaLaboral->tiempoServicio!=0){echo $informeHistorico[$i]->idExperienciaLaboral->tiempoServicio;}else{echo '--';} ?></center></td>
							<td width="21%"><?php if($informeHistorico[$i]->idExperienciaLaboral->areaTrabajo!=''){echo $informeHistorico[$i]->idExperienciaLaboral->areaTrabajo;}else{echo '--';} ?></td>
							<td width="17%"><center><?php if($informeHistorico[$i]->idExperienciaLaboral->nivelRuido!=''){echo $informeHistorico[$i]->idExperienciaLaboral->nivelRuido;}else{echo '--';} ?></center></td>
							<td width="21%"><?php if($informeHistorico[$i]->idExperienciaLaboral->puestoTrabajo!=''){echo $informeHistorico[$i]->idExperienciaLaboral->puestoTrabajo;}else{echo '--';} ?></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>

			<!--HISTORIA DE EXPOSICIÓN A RUIDO-->
			<div style="font-size: 7px;">&nbsp;</div>
			<div id="resultados">
	            <strong>RESULTADOS DE EXAMENES :</strong>

				<ol>
	            	<li value="1"><label>OTOSCOPIA</label></li>
	            </ol>
				<table width="60%" rules="groups" border="1">
					<thead>
						<tr>
							<th width="20%"><center>Fecha</center></th>
							<th width="40%"><center>OD Descripción</center></th>
							<th width="40%"><center>OI Descripción</center></th>
						</tr>									
					</thead>
					<tbody>
						<?php
							for ($i=0; $i < count($informeHistorico); $i++) {
						?>
						<tr>		
							<td><center><?php if($informeHistorico[$i]->idOtoscopia->fechaAudiometria!=''){echo substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,8,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,5,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,0,4);}else{echo '--';} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idOtoscopia->descripcionOd!=''){echo $informeHistorico[$i]->idOtoscopia->descripcionOd;}else{echo '--';} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idOtoscopia->descripcionOi!=''){echo $informeHistorico[$i]->idOtoscopia->descripcionOi;}else{echo '--';} ?></center></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>

	            <ol>
	            	<li value="2"><label>AUDIOMETRÍA TONAL</label></li>
	            </ol>         
	            <table width="100%" rules="groups" border="1">
					<thead>
						<tr>
							<th width="20%"><center>&nbsp;</center></th>
							<th width="30%"><center>Right</center></th>
							<th width="30%"><center>Left</center></th>
							<th width="15%"><center>Prom. 2,3,4KHz</center></th>
							<th width="5%"><center>&nbsp;</center></th>
						</tr>
					</thead>
				<table>
				<table width="100%" rules="groups" border="1">
					<thead>
						<tr>
							<th width=""><center>Fecha</center></th>
							<th width=""><center>BL</center></th>
							<th width=""><center>CT</center></th>
							<th width=""><center>&nbsp;&nbsp;</center></th>
							<th width=""><center>&nbsp;&nbsp;</center></th>
							<th width=""><center>.5k</center></th>
							<th width=""><center>1k</center></th>
							<th width=""><center>2k</center></th>
							<th width=""><center>3k</center></th>
							<th width=""><center>4k</center></th>
							<th width=""><center>6k</center></th>
							<th width=""><center>8k</center></th>
							<th width=""><center>STS</center></th>
							<th width=""><center>&nbsp;</center></th>							
							<th width=""><center>.5k</center></th>
							<th width=""><center>1k</center></th>
							<th width=""><center>2k</center></th>
							<th width=""><center>3k</center></th>
							<th width=""><center>4k</center></th>
							<th width=""><center>6k</center></th>
							<th width=""><center>8k</center></th>
							<th width=""><center>STS</center></th>
							<th width=""><center>Rt</center></th>
							<th width=""><center>Lt</center></th>
							<th width=""><center>Age</center></th>
						</tr>									
					</thead>
					<tbody>
						<?php
							for ($i=0; $i < count($informeHistorico); $i++) {
						?>
						<tr <?php if($informeHistorico[$i]->idAudioTonalOd->idAudioTonalOd==$idLbOd){echo 'bgcolor="#FFFF00"';}?> >
							<td><center><?php echo substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,8,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,5,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,0,4); ?></center></td>
							<td><center><b><?php if($informeHistorico[$i]->idAudioTonalOd->idAudioTonalOd==$idLbOd){echo "x";}?></b></center></td>
							<td><center><b><?php if($informeHistorico[$i]->idAudioTonalOd->idAudioTonalOd==$idCtOd){echo "x";}?></b></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->retest==1){echo 'R';}?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->fail==1){echo 'F';}?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->od_500>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOd->od_500;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->od_1000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOd->od_1000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->od_2000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOd->od_2000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->od_3000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOd->od_3000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->od_4000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOd->od_4000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->od_6000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOd->od_6000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->od_8000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOd->od_8000;} ?></center></td>
							<!--<td><center><?php echo $informeHistorico[$i]->idAudioTonalOd->od_sts; ?></center></td>-->
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOd->od_sts>=10){echo '<span style="color:#FF0000;">'.$informeHistorico[$i]->idAudioTonalOd->od_sts.'</span>';}else{echo '<span>'.$informeHistorico[$i]->idAudioTonalOd->od_sts.'</span>';} ?></center></td>
							<td><center>&nbsp;</center></td>						
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOi->oi_500>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOi->oi_500;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOi->oi_1000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOi->oi_1000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOi->oi_2000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOi->oi_2000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOi->oi_3000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOi->oi_3000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOi->oi_4000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOi->oi_4000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOi->oi_6000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOi->oi_6000;} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOi->oi_8000>=130){echo 'NR';}else{echo $informeHistorico[$i]->idAudioTonalOi->oi_8000;} ?></center></td>
							<!--<td><center><?php echo $informeHistorico[$i]->idAudioTonalOi->oi_sts; ?></center></td>-->
							<td><center><?php if($informeHistorico[$i]->idAudioTonalOi->oi_sts>=10){echo '<span style="color:#FF0000;">'.$informeHistorico[$i]->idAudioTonalOi->oi_sts.'</span>';}else{echo '<span>'.$informeHistorico[$i]->idAudioTonalOi->oi_sts.'</span>';} ?></center></td>
							<td><center><?php echo $informeHistorico[$i]->idAudioTonalOd->od_khz; ?></center></td>
							<td><center><?php echo $informeHistorico[$i]->idAudioTonalOi->oi_khz; ?></center></td>
							<td><center><?php echo $informeHistorico[$i]->idOtoscopia->edadTrabajador; ?></center></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				<cite><b>BL:</b> Base Line, <b>CT:</b> Current Test, <b>R:</b> Retest, <b>F:</b> Fail</cite>
			</div>

			<!--GRAFICAS-->
			<!--<div style="font-size: 7px;">&nbsp;</div>-->
			<div id="graficas" style="height: 370px;">
				<!--INICIO GRÁFICO-->
	            <div style="width: 720px; margin: 0 auto">
	            	<div id="container1" style="width: 360px; height: 350px; float:left; margin: 0 auto"></div>
	            	<div id="container2" style="width: 360px; height: 350px; float:left; margin: 0 auto"></div>
				</div>
				<div style="width: 720px;">
					<div class="fechaCt" style="width: 360px; float:left; margin-top: -2px"><?php echo substr($fechaCtOd,8,2).'-'.substr($fechaCtOd,5,2).'-'.substr($fechaCtOd,0,4); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
					<div class="fechaCt" style="width: 360px; float:left; margin-top: -2px"><?php echo substr($fechaCtOd,8,2).'-'.substr($fechaCtOd,5,2).'-'.substr($fechaCtOd,0,4); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>		
				</div>
				<!--FIN GRÁFICO-->
			</div>

			<?php
				if (count($informeHistorico)==2 AND $saltoLinea==2) {
					echo '<br><br><br>';
				}elseif (count($informeHistorico)==2 AND $saltoLinea==1) {
					echo '<br><br><br><br>';
				}

				if (count($informeHistorico)==3 AND ($saltoLinea==3 or $saltoLinea==2)) {
					//echo '<br><br>';
				}elseif (count($informeHistorico)==3 AND $saltoLinea==1) {
					echo '<br><br>';
				}elseif (count($informeHistorico)==3 AND $saltoLinea==0) {
					echo '<br><br>';
				}
			?>
			<!--INTERPRETACIÓN AUDIOMÉTRICA-->
			<div style="font-size: 7px;">&nbsp;</div>
			<div id="interpretacion">
	            <strong>INTERPRETACIÓN AUDIOMÉTRICA <cite>(ESCALA CLÍNICA)</cite>:</strong>
	    		</p>
	    		<table style="width:60%;" rules="groups" border="1">
					<thead>
						<tr>
							<th width=""><center>Fecha</center></th>
							<th width=""><center>OD Interpretación</center></th>
							<th width=""><center>OI Interpretación</center></th>
							<th width=""><center>CIE</center></th>
						</tr>									
					</thead>
					<tbody>
						<?php
							for ($i=0; $i < count($informeHistorico); $i++) {
						?>
						<tr>
							<td><center><?php if($informeHistorico[$i]->idOtoscopia->fechaAudiometria!=''){echo substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,8,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,5,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,0,4);}else{echo '--';} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idDiagnostico->interpretacionOd!=''){echo $informeHistorico[$i]->idDiagnostico->interpretacionOd;}else{echo '--';} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idDiagnostico->interpretacionOi!=''){echo $informeHistorico[$i]->idDiagnostico->interpretacionOi;}else{echo '--';} ?></center></td>
							<td><center><?php if($informeHistorico[$i]->idDiagnostico->cie_10!=''){echo $informeHistorico[$i]->idDiagnostico->cie_10;}else{echo '--';} ?></center></td>
						</tr>
						<?php
							}
						?>
					</tbody>
	    		</table>
	    		<br>
	    		<table>
	    			<tr>
	    				<td>
	    					<li><label><b>Interpretación Audiométrica (según Klockhoff) actual: </b></label></li>
	    					<div style="font-size: 7px;">&nbsp;</div>
	    					<span style="margin-left:15px;"><?php echo $diagnosticoActual[0]->interpretacionKlock; ?></span>
	    				</td>
	    			</tr>
	    			<tr><td><div style="font-size: 7px;">&nbsp;</div></td></tr>
	    			<!--<tr>
	    				<td>
	    					<li><label><b>Condición auditiva actual:</b></label></li>
	    					<div style="font-size: 7px;">&nbsp;</div>
	    					<span style="margin-left:15px;"><?php //echo $diagnosticoActual[0]->condicionAuditiva; ?></span>
	    				</td>
	    			</tr>-->
	    		</table>
			</div>

			<!--MENOSCABO AUDITIVO-->
			<div style="font-size: 7px;">&nbsp;</div>
			<div id="menoscabo">
	            <strong>MENOSCABO AUDITIVO :</strong>
	        	</p>
	   			<table style="width:60%;" rules="groups" border="1">
					<thead>
						<tr>
							<th width="24%"><center>Fecha</center></th>
							<th width="19%"><center>% OD</center></th>
							<th width="19%"><center>% OI</center></th>
							<th width="19%"><center>% Binaural</center></th>
							<th width="19%"><center>% Global</center></th>
						</tr>									
					</thead>
					<tbody>
						<?php
							for ($i=0; $i < count($informeHistorico); $i++) {
						?>
						<tr>
							<td><center><?php echo substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,8,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,5,2).'-'.substr($informeHistorico[$i]->idOtoscopia->fechaAudiometria,0,4); ?></center></td>
							<td><center><?php echo $informeHistorico[$i]->idMenoscabo->porcentajeOd; ?></center></td>
							<td><center><?php echo $informeHistorico[$i]->idMenoscabo->porcentajeOi; ?></center></td>
							<td><center><?php echo $informeHistorico[$i]->idMenoscabo->binaural; ?></center></td>
							<td><center><?php echo $informeHistorico[$i]->idMenoscabo->mglobal; ?></center></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>

			<!--CONCLUSIÓN-->
			<div style="font-size: 10px;">&nbsp;</div>
			<div id="conclusiones">
	            <strong>CONCLUSIONES</strong>
	    		<br>
	    		<table>
	    			<tr>
	    				<td>
	    					<input type="text" name="conclusion" id="conclusion" size="125" style="border:none; font-family: verdana; font-size: 10px;" value="<?php echo $recomendacionActual[0]->conclusion; ?>">
	    				</td>
	    			</tr>
	    		</table>
			</div>

			<!--RECOMENDACIÓN GENERAL-->
			<div style="font-size: 10px;">&nbsp;</div>
			<div id="general">
	            <strong>RECOMENDACIÓN GENERAL</strong>
	    		<br>
	    		<table>
	    			<tr>
	    				<td>
	    					<input type="hidden" name="idRecomendacion" id="idRecomendacion" value="<?php echo $recomendacionActual[0]->idRecomendacion; ?>">
	    					<input type="text" name="rGeneral" id="rGeneral" size="125" style="border:none; font-family: verdana; font-size: 10px;" value="<?php echo $recomendacionActual[0]->rGeneral; ?>">
	    				</td>
	    			</tr>
	    		</table>
			</div>

			<!--RECOMENDACIÓN ESPECÍFICA-->
			<div style="font-size: 10px;">&nbsp;</div>
			<div id="especifica">
	            <strong>RECOMENDACIÓN ESPECÍFICA</strong>
	    		<br>
	    		<table>
	    			<tr>
	    				<td>
	    					<input type="text" name="rEspecifica" id="rEspecifica" size="125" border="0px" style="border:none; font-family: verdana; font-size: 10px;" value="<?php echo $recomendacionActual[0]->especifica; ?>">
	    				</td>
	    			</tr>
	    		</table>
			</div>

			<!--EXAMENES AUDIOLOGICOS COMPLEMENTARIOS-->
			<div style="font-size: 10px;">&nbsp;</div>
			<div id="complementarios">
	            <strong>EXAMENES AUDIOLOGICOS COMPLEMENTARIOS</strong>
	    		<br>
	    		<table>
	    			<tr>
	    				<td>
	    					<input type="text" name="rComplementarios" id="rComplementarios" size="125" style="border:none; font-family: verdana; font-size: 10px;" value="<?php echo $recomendacionActual[0]->complementarios; ?>">
	    				</td>
	    			</tr>
	    		</table>
			</div>
			<br><br>
			<!--FIRMA DEL DOCTOR-->
			<div style="font-size: 10px;">&nbsp;</div>
			<div>
	            <strong style="font-size: 12px;"><i>Dr. Rodolfo Badillo Carrillo</i></strong><br>
	            <span style="font-size: 10px;">INSTITUTO DE AUDIOLOGIA LABORAL</span><br>
	            <span style="font-size: 10px;">Otorrinolaringólogo</span><br>
	            <span style="font-size: 10px;">CMP 34132  RNE 15158</span><br>
	            <span style="font-size: 10px;">Audiología Laboral Reg CAOH 471886</span><br>
	            <span style="font-size: 10px;">Medical Supervisor CAOH 481186</span><br>
	            <?php 
	            	$fechaDia = date('d-m-Y');
	            	$dia = substr($fechaDia, 0,2);
	            	$mes = substr($fechaDia, 3,2);
	            	switch ($mes) {
	            		case '01':
	            			$mesLetra = 'Enero';
	            			break;
	            		case '02':
	            			$mesLetra = 'Febrero';
	            			break;
	            		case '03':
	            			$mesLetra = 'Marzo';
	            			break;
	            		case '04':
	            			$mesLetra = 'Abril';
	            			break;
	            		case '05':
	            			$mesLetra = 'Mayo';
	            			break;
	            		case '06':
	            			$mesLetra = 'Junio';
	            			break;
	            		case '07':
	            			$mesLetra = 'Julio';
	            			break;
	            		case '08':
	            			$mesLetra = 'Agosto';
	            			break;
	            		case '09':
	            			$mesLetra = 'Septiembre';
	            			break;
	            		case '10':
	            			$mesLetra = 'Octubre';
	            			break;
	            		case '11':
	            			$mesLetra = 'Noviembre';
	            			break;
	            		case '12':
	            			$mesLetra = 'Diciembre';
	            			break;
	            	}

	            	$anio = substr($fechaDia, 6,4);

	            	$fechaActualDia = $dia.' de '.$mesLetra.' del '.$anio;
	            ?>
	            <span style="font-size: 11px;">Lima, <?php echo $fechaActualDia;?></span><br>
	    		<br>
			</div>

			<br><br>
			<!--BOTONES-->
			<div id="botones">
				<a href="#" class="btn btn-info oculto" onclick="guardarReporte()" title="Guardar Reporte">&nbsp;&nbsp;Guardar&nbsp;&nbsp;</a>
		        <a href="#" class="btn btn-info oculto" onclick="window.print();" title="Imprimir Reporte">&nbsp;&nbsp;Imprimir&nbsp;&nbsp;</a>
		        <a href="javascript:window.close();" class="btn btn-default oculto" title="Cerrar">&nbsp;&nbsp;Cerrar&nbsp;&nbsp;</a>
			</div>

		</div>
	</form>
</body>
</html>