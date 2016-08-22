<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaBuscarPaciente.php
    * Fecha : lunes 11 de abril del 2015 07:14:34 p.m.
    * Autor : CAPSULE SAC
    **/

	require_once('../../bll/bo/BOTrabajador.php');
    require_once('../../bll/bo/BOEmpresa.php');
	require_once('../../bll/bo/BOEmpresaTrabajador.php');
	require_once('../../bll/bo/BOExperienciaLaboral.php');
	require_once('../../bll/bo/BOOtoscopia.php');
	require_once('../../bll/bo/BOAudioTonalOd.php');
	require_once('../../bll/bo/BOAudioTonalOi.php');
	require_once('../../bll/bo/BODiagnostico.php');
	require_once('../../bll/bo/BOMenoscabo.php');
	require_once('../../bll/bo/BORecomendacion.php');
	require_once('../../bll/bo/BOLineaBase.php');
	
	$idTrabajador = $_REQUEST['idTrabajador'];

	//Recupera la información de un Trabajador por medio de su ID
	$boTrabajador = new BOTrabajador();
	$trabajador = $boTrabajador->GetEntidadxId($idTrabajador);

	$nombresTrabajador = $trabajador[0]->nombre;
	$apellidosTrabajador = $trabajador[0]->apellidos;
	$dni = $trabajador[0]->dni;
	$fechaNacimiento = $trabajador[0]->fechaNacimiento;

	$fechaEdad = time() - strtotime($fechaNacimiento);
	$edad = floor((($fechaEdad/3600)/24)/360);

	$sexo = $trabajador[0]->sexo;

	//Recupera la información de Experiencia Laboral por medio del ID del Trabajador
	$boExperienciaLaboral = new BOExperienciaLaboral();
	$experienciaLaboral = $boExperienciaLaboral->GetEntidadxTrabajador($idTrabajador);

	//Recupera la información de Otoscopia por medio del ID del Trabajador
	$boOtoscopia = new BOOtoscopia();
	$otoscopia = $boOtoscopia->GetEntidadxTrabajador($idTrabajador);

	//Recupera la información de la LineaBase por medio del ID del Trabajador
	$boLineaBase = new BOLineaBase();
	$lineaBase = $boLineaBase->GetEntidadxTrabajador($idTrabajador);
	$cantLb = count($lineaBase);
	$posUltLb = $cantLb - 1;
	$ultLb = $lineaBase[$posUltLb]->idLineaBase;
	$ultOd = $lineaBase[$posUltLb]->idAudioTonalOd;
	$ultOi = $lineaBase[$posUltLb]->idAudioTonalOi;
	$ultOtoscopia = $lineaBase[$posUltLb]->idOtoscopia;

	//Recupera la información de BOAudioTonalOd por medio del ID del Trabajador
	$boAudioTonalOd = new BOAudioTonalOd();
	$audioTonalOdCalcular = $boAudioTonalOd->GetEntidadxTrabajador($idTrabajador);

	for ($i=0; $i < count($audioTonalOdCalcular); $i++) {
		$od_khz_calculado = ($audioTonalOdCalcular[$i]->od_2000 + $audioTonalOdCalcular[$i]->od_3000 + $audioTonalOdCalcular[$i]->od_4000)/3;
		$od_khz_calculado = round($od_khz_calculado, 2);

		$od_khz_actualizado = $boAudioTonalOd->ActualizarOdKhz($audioTonalOdCalcular[$i]->idAudioTonalOd, $od_khz_calculado);
	}

	$audioTonalOd = $boAudioTonalOd->GetEntidadxTrabajador($idTrabajador);

	//Recupera la información de BOAudioTonalOi por medio del ID del Trabajador
	$boAudioTonalOi = new BOAudioTonalOi();
	$audioTonalOiCalcular = $boAudioTonalOi->GetEntidadxTrabajador($idTrabajador);

	for ($i=0; $i < count($audioTonalOiCalcular); $i++) {
		$oi_khz_calculado = ($audioTonalOiCalcular[$i]->oi_2000 + $audioTonalOiCalcular[$i]->oi_3000 + $audioTonalOiCalcular[$i]->oi_4000)/3;
		$oi_khz_calculado = round($oi_khz_calculado, 2);

		$oi_khz_actualizado = $boAudioTonalOi->ActualizarOiKhz($audioTonalOiCalcular[$i]->idAudioTonalOi, $oi_khz_calculado);
	}

	$audioTonalOi = $boAudioTonalOi->GetEntidadxTrabajador($idTrabajador);

	//Recupera la información de Diagnostico por medio del ID del Trabajador
	$boDiagnostico = new BODiagnostico();
	$diagnostico = $boDiagnostico->GetEntidadxTrabajador($idTrabajador);

	//Recupera la información de Menoscabo por medio del ID del Trabajador
	$boMenoscabo = new BOMenoscabo();
	$menoscaboCalcular = $boMenoscabo->GetEntidadxTrabajador($idTrabajador);

	$tabMenoscabo = array(0,5,10,15,20,25,30,35,40,45,50,55,60,65,70,75,80,85,90,95,100,105,110,115,120,125,130,135,140,145,150,155,160,
 					165,170,175,180,185,190,195,200,205,210,215,220,225,230,235,240,245,250,255,260,265,270,275,280,285,290,295,
 					300,305,310,315,320,325,330,335,340,345,350,355,360,365,370,375,380,385,390,395,400,405,410,415,420,425,430,
 					435,440,445,450,455,460,465,470,475,480,485,490,495,500,505,510,515,520,525,530,535,540,545,550,555,560,565,
 					570,575,580,585,590,600,605,610,615,620,625,630,635,640,645,650,655,660,665);

 	$resMenoscabo = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1.9,3.8,5.6,7.5,9.4,11.2,13.1,15,16.9,18.8,20.6,22.5,24.4,26.2,28.1,
 					30,31.9,33.8,35.6,37.5,39.4,41.2,43.1,45,46.9,48.9,50.6,52.5,54.4,56.2,58.1,60,61.9,63.8,65.6,67.5,69.3,71.2,
 					73.1,75,76.9,78.8,80.6,82.5,84.4,86.2,88.1,90,90.9,93.8,95.6,97.5,99.4,100,100,100,100,100,100,100,100,100,100,
 					100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,
 					100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100,100);

	for ($i=0; $i < count($menoscaboCalcular); $i++) { 

		//MENOSCABO OD
		if ($audioTonalOd[$i]->od_500 < 25) { $od_500_sdu = 25;} else { if ($audioTonalOd[$i]->od_500 > 100) { $od_500_sdu = 100;} else { $od_500_sdu = $audioTonalOd[$i]->od_500; } }
		if ($audioTonalOd[$i]->od_1000 < 25) { $od_1000_sdu = 25;} else { if ($audioTonalOd[$i]->od_1000 > 100) { $od_1000_sdu = 100;} else { $od_1000_sdu = $audioTonalOd[$i]->od_1000; } }
		if ($audioTonalOd[$i]->od_2000 < 25) { $od_2000_sdu = 25;} else { if ($audioTonalOd[$i]->od_2000 > 100) { $od_2000_sdu = 100;} else { $od_2000_sdu = $audioTonalOd[$i]->od_2000; } }
		if ($audioTonalOd[$i]->od_4000 < 25) { $od_4000_sdu = 25;} else { if ($audioTonalOd[$i]->od_4000 > 100) { $od_4000_sdu = 100;} else { $od_4000_sdu = $audioTonalOd[$i]->od_4000; } }

		$sduOd = ($od_500_sdu + $od_1000_sdu + $od_2000_sdu + $od_4000_sdu);
		
		for ($j=0; $j < count($tabMenoscabo); $j++) { 
			if ($sduOd==$tabMenoscabo[$j]) {
				$idResMenoscabo = $j;
			}
		}

		$porcentajeOd_calculado = $resMenoscabo[$idResMenoscabo];

		//MENOSCABO OI
		if ($audioTonalOi[$i]->oi_500 < 25) { $oi_500_sdu = 25;} else { if ($audioTonalOi[$i]->oi_500 > 100) { $oi_500_sdu = 100;} else { $oi_500_sdu = $audioTonalOi[$i]->oi_500; } }
		if ($audioTonalOi[$i]->oi_1000 < 25) { $oi_1000_sdu = 25;} else { if ($audioTonalOi[$i]->oi_1000 > 100) { $oi_1000_sdu = 100;} else { $oi_1000_sdu = $audioTonalOi[$i]->oi_1000; } }
		if ($audioTonalOi[$i]->oi_2000 < 25) { $oi_2000_sdu = 25;} else { if ($audioTonalOi[$i]->oi_2000 > 100) { $oi_2000_sdu = 100;} else { $oi_2000_sdu = $audioTonalOi[$i]->oi_2000; } }
		if ($audioTonalOi[$i]->oi_4000 < 25) { $oi_4000_sdu = 25;} else { if ($audioTonalOi[$i]->oi_4000 > 100) { $oi_4000_sdu = 100;} else { $oi_4000_sdu = $audioTonalOi[$i]->oi_4000; } }

		$sduOi = ($oi_500_sdu + $oi_1000_sdu + $oi_2000_sdu + $oi_4000_sdu);

		for ($j=0; $j < count($tabMenoscabo); $j++) { 
			if ($sduOi==$tabMenoscabo[$j]) {
				$idResMenoscabo = $j;
			}
		}

		$porcentajeOi_calculado = $resMenoscabo[$idResMenoscabo];

		//BINAURAL
		if ($porcentajeOd_calculado == $porcentajeOi_calculado) {
			$binaural_calculado = $porcentajeOd_calculado;
		}else{
			if ($porcentajeOd_calculado < $porcentajeOi_calculado) {
				$binaural_calculado_1 = $porcentajeOd_calculado*5;
			}else{
				$binaural_calculado_1 = $porcentajeOd_calculado;
			}

			if ($porcentajeOd_calculado > $porcentajeOi_calculado) {
				$binaural_calculado_2 = $porcentajeOi_calculado*5;
			}else{
				$binaural_calculado_2 = $porcentajeOi_calculado;
			}

			$binaural_calculado = round((($binaural_calculado_1 + $binaural_calculado_2)/6), 2);
		}

		//GLOBAL
		$mglobal_calculado = round(($binaural_calculado/2), 2);

		$menoscabo_actualizado = $boMenoscabo->Actualizar($menoscaboCalcular[$i]->idMenoscabo, $porcentajeOd_calculado, $porcentajeOi_calculado, $binaural_calculado, $mglobal_calculado, $menoscaboCalcular[$i]->idTrabajador);
	}

	$menoscabo = $boMenoscabo->GetEntidadxTrabajador($idTrabajador);

	function burbujaFechas($array, $n) {
		    for ($i = 1; $i < $n; $i++) {
		      for ($j = 0; $j < $n - $i; $j++) {
		        if ($array[$j] > $array[$j + 1]) {
		          $k = $array[$j + 1]; 
		          $array[$j + 1] = $array[$j]; 
		          $array[$j] = $k;
		        }
		      }
		    }
		 
		return $array;
	}

	for($j=0; $j < count($audioTonalOd); $j++){
		$array2[$j] = strtotime($otoscopia[$j]->fechaAudiometria);
	}
	
	$burbuja = burbujaFechas($array2, count($array2));

?>

<!DOCTYPE html>
<html lang="es">
<head>
  	<meta charset="utf-8">
  	<title>Audiología | Laboral</title>
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
 	<meta name="author" content="CAPSULE SAC">

  	<link rel="icon" href="../public/img/favicon.ico" type="image/x-icon">

  	<link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="../public/datatable/dataTables.bootstrap.css">
  	<link rel="stylesheet" type="text/css" href="../public/css/style_audiologia.css">

  	<script type="text/javascript" language="javascript" src="../public/datatable/jquery-1.10.2.min.js"></script>
  	<script type="text/javascript" language="javascript" src="../public/bootstrap/js/bootstrap.min.js"></script>
  	<script type="text/javascript" language="javascript" src="../public/datatable/jquery.dataTables.min.js"></script>
  	<script type="text/javascript" language="javascript" src="../public/datatable/dataTables.bootstrap.js"></script>
  	<script type="text/javascript" language="javascript" src="../public/js/js_audiologia.js"></script>

  	<script>
  		function generarReportePaciente(idTrabajador){

  			var radioButLb = document.getElementsByName("lbRadio_od");
			idLbOd = -1;
			var arrayOd = [];
			for (var i=0; i<radioButLb.length; i++) {
				if (radioButLb[i].checked == true) {
					idLbOd = document.getElementById("idAudioTonalOd_"+i).value;
					idLbOi = document.getElementById("idAudioTonalOi_"+i).value;
					idLbOtoscopia = document.getElementById("idOtoscopia_"+i).value;
				}

				arrayOd[i] = document.getElementById("idAudioTonalOd_"+i).value;
			}

			var radioButCt = document.getElementsByName("ctRadio_od");
			idCtOd = -1;
			for (var i=0; i<radioButCt.length; i++) {
				if (radioButCt[i].checked == true) {
					idCtOd = document.getElementById("idAudioTonalOd_"+i).value;
					idCtOi = document.getElementById("idAudioTonalOi_"+i).value;
				}
			}

			var arrayRetest = [];
			var checkRetest = document.getElementsByName("retestCheck");
			var k=0;
			for (var i=0; i<checkRetest.length; i++) {
				if (checkRetest[i].checked == true) {
					arrayRetest[k] = document.getElementById("idAudioTonalOd_"+i).value;
					k++;
				}
			}

			var arrayFail = [];
			var j=0;
			var checkFail = document.getElementsByName("failCheck");
			for (var i=0; i<checkFail.length; i++) {
				if (checkFail[i].checked == true) {
					arrayFail[j] = document.getElementById("idAudioTonalOd_"+i).value;
					j++;
				}
			}

			if (idLbOd == -1) {
				alert("Seleccione una Línea Base!");
			}else{
				if (idCtOd == -1) {
					alert("Seleccione una Prueba Actual!");
				}else{
					window.open("VistaReportePaciente.php?idTrabajador="+idTrabajador+"&idLbOd="+idLbOd+"&idLbOi="+idLbOi+"&idLbOtoscopia="+idLbOtoscopia+"&idCtOd="+idCtOd+"&idCtOi="+idCtOi+"&arrayRetest="+arrayRetest+"&arrayFail="+arrayFail+"&arrayOd="+arrayOd, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=850, height=600");
				}
			}
  		}

  		function EventoRadioLb(num){

  			if(document.getElementById("lbRadio_od_"+num).checked==true){

				if(document.getElementById("ctRadio_od_"+num).checked==true){
					alert("Seleccione Linea Base menor a Current Test!");
					document.getElementById("lbRadio_od_"+num).checked=false;
				}else{
	  				var radioButCt = document.getElementsByName("ctRadio_od");
	  				for (var i=0; i<radioButCt.length; i++) {
						if (document.getElementById("ctRadio_od_"+i).checked==true) {
							if (num>i) {
								alert("Seleccione Linea Base menor a Current Test!");
								document.getElementById("lbRadio_od_"+num).checked=false;
							}
						}
					}
		  		}
	  		}
  		}

  		function EventoRadioCt(num){

  			if(document.getElementById("ctRadio_od_"+num).checked==true){

				if(document.getElementById("lbRadio_od_"+num).checked==true){
					alert("Seleccione Current Test mayor a Linea Base!");
					document.getElementById("ctRadio_od_"+num).checked=false;
				}else{
	  				var radioButLb = document.getElementsByName("lbRadio_od");
	  				for (var i=0; i<radioButLb.length; i++) {
						if (document.getElementById("lbRadio_od_"+i).checked==true) {
							if (num<i) {
								alert("Seleccione Current Test mayor a Linea Base!");
								document.getElementById("ctRadio_od_"+num).checked=false;
							}
						}
					}
		  		}
	  		}
  		}

  		

  	</script>

  	<style>
  		th {
			font-size:11px;
  		}
  	</style>
</head>
<body>
  	<header>
    	<nav class="navbar navbar-inverse navbar-static-top" rol="navigation"> <!--estático: navbar-fixed-top-->
      		<div class="container-fluid">
        		<div class="navbar-header col-xs-12 col-sm-6 col-md-3">
          			<img src="../public/img/logo.png" alt="logo" width="220" height="35" style="margin:8px">
        		</div>
        		<div class="col-xs-12 col-sm-6 col-md-9"></div>
      		</div>
    	</nav>
  	</header>

	<div class="container">
    	<div id="principal">
        	<div class="jumbotron">
        		<h3 style="margin-bottom: -20px;"><b>HISTORIAL AUDIOLÓGICO DEL PACIENTE</b></h3>
      		</div>

			<div class="control-group">
			    <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data" role="form" name="verPaciente" id="verPaciente">
			       <!--
			        <fieldset class="scheduler-border">
			            <legend class="scheduler-border">&nbsp;&nbsp;DATOS DE LA EMPRESA :</legend>
			            <div class="form-group">
			            	<label class="col-md-1 control-label" for="empresa">EMPRESA:</label>
			                <div class="col-md-5">
			                    <select class="form-control" name="empresa" id="empresa">
			                        <option value="0">Seleccione Empresa</option>
			                        <?php
			                            for ($i=0; $i < count($empresas); $i++) {
			                        ?>
			                        <option value="<?php echo $empresas[$i]->idEmpresa; ?>" <?php if($empresas[$i]->idEmpresa==$_REQUEST['empresa']){echo 'selected';} ?>><?php echo $empresas[$i]->razonSocial; ?></option>
			                        <?php
			                            }
			                        ?>
			                    </select>
			                </div>
			                <label class="col-md-1 control-label" for="direccion">DIRECCIÓN:</label>
			                <div class="col-md-5">
			                    <input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $_REQUEST['direccion'];?>" placeholder="Ingrese Dirección">
			                </div>
			            </div>
			        </fieldset>-->
			        
			        <fieldset class="scheduler-border">
			            <legend class="scheduler-border">&nbsp;&nbsp;DATOS DEL TRABAJADOR :</legend>
			            <div class="form-group">
			            	<input type="hidden" name="idTrabajador" id="idTrabajador" value="<?php echo $idTrabajador;?>">
			                <label class="col-md-1 control-label" for="nombres">NOMBRES:</label>
			                <div class="col-md-3">
			                    <input class="form-control" type="text" name="nombres" id="nombres" style="border:none;" value="<?php echo $nombresTrabajador;?>" placeholder="Ingrese Nombres" disabled>
			                </div>
			                <label class="col-md-1 control-label" for="apellidos">APELLIDOS:</label>
			                <div class="col-md-4">
			                    <input class="form-control" type="text" name="apellidos" id="apellidos" style="border:none;" value="<?php echo $apellidosTrabajador;?>" placeholder="Ingrese Apellidos" disabled>
			                </div>
			            	<label class="col-md-1 control-label" for="edad">EDAD:</label>
			                <div class="col-md-2">
			                    <input class="form-control" type="text" name="edad" id="edad" style="border:none;" value="<?php echo $edad;?>" placeholder="Ingrese Edad" disabled>
			                </div>
			            </div>
			            <div class="form-group">
			            	<label class="col-md-1 control-label" for="dni">DNI:</label>
			                <div class="col-md-2">
			                    <input class="form-control" type="text" name="dni" id="dni" style="border:none;" value="<?php echo $dni;?>" placeholder="Ingrese DNI" disabled>
			                </div>
			                <label class="col-md-2 control-label" for="fechaNacimiento">FECHA NACIMIENTO:</label>
			                <div class="col-md-3">
			                    <input class="form-control" type="date" name="fechaNacimiento" id="fechaNacimiento" style="border:none;" value="<?php echo $fechaNacimiento;?>" disabled>
			                </div>
			            	<label class="col-md-1 control-label" for="sexo">SEXO:</label>
			                <div class="col-md-3">
			                    <select class="form-control" name="sexo" id="sexo" disabled>
			                        <option value="-1">Seleccione Sexo</option>
			                        <option value="Femenino" <?php if($sexo=='Femenino'){echo 'selected';} ?>>Femenino</option>
			                        <option value="Masculino" <?php if($sexo=='Masculino'){echo 'selected';} ?>>Masculino</option>
			                    </select>
			                </div>
			            </div>
			        </fieldset>
			        
			        <fieldset class="scheduler-border">
			            <legend class="scheduler-border">&nbsp;&nbsp;HISTORIA DE EXPOSICIÓN A RUIDO :</legend>

			            <ol>
			            	<li value="1"><label class="control-label" for="empresa">USO DE PROTECTORES PARA RUIDO (EPP)</label></li>
			            </ol>
			            <ol>
				            <div class="form-group">
								<table class="table table-bordered" style="width:50%;">
									<thead>
										<tr>
											<th width="10%"><center>N°</center></th>
											<th width="20%"><center>FECHA</center></th>
											<th width="35%"><center>TIPO DE EPP</center></th>
											<th width="35%"><center>VALOR DE NRR</center></th>
										</tr>									
									</thead>
									<tbody>
										<?php
										for ($i=0; $i < count($experienciaLaboral); $i++) {
										?>
										<tr>
											<td><center><?php echo $i+1; ?></center></td>
											<!--<td><span><center><?php //echo substr($experienciaLaboral[$i]->fecha,8,2).'-'.substr($experienciaLaboral[$i]->fecha,5,2).'-'.substr($experienciaLaboral[$i]->fecha,0,4); ?></center></span></td>-->
											<td><span><center><?php echo substr($otoscopia[$i]->fechaAudiometria,8,2).'-'.substr($otoscopia[$i]->fechaAudiometria,5,2).'-'.substr($otoscopia[$i]->fechaAudiometria,0,4); ?></center></span></td>
											<td><span><center><?php echo $experienciaLaboral[$i]->tipoEpp; ?></center></span></td>
											<td><span><center><?php echo $experienciaLaboral[$i]->valorNrr; ?></center></span></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
				            </div>
			            </ol>

			            <ol>
			            	<li value="2"><label class="control-label" for="empresa">TIEMPO DE EXPOSICIÓN A RUIDO</label></li>
			            </ol>
			            <ol>
				            <div class="form-group">
								<table class="table table-bordered" style="width:97%;">
									<thead>
										<tr>
											<th width="5%"><center>N°</center></th>
											<th width="10%"><center>FECHA</center></th>
											<th width="13%"><center>TIEMPO DE SERVICIO</center></th>
											<th width="30%"><center>ÁREA</center></th>
											<th width="12%"><center>NIVEL DE RUIDO</center></th>
											<th width="30%"><center>PUESTO DE TRABAJO</center></th>
										</tr>									
									</thead>
									<tbody>
										<?php
										for ($i=0; $i < count($experienciaLaboral); $i++) {
										?>
										<tr>
											<td><center><?php echo $i+1; ?></center></td>
											<!--<td><span><center><?php //echo substr($experienciaLaboral[$i]->fecha,8,2).'-'.substr($experienciaLaboral[$i]->fecha,5,2).'-'.substr($experienciaLaboral[$i]->fecha,0,4); ?></center></span></td>-->
											<td><span><center><?php echo substr($otoscopia[$i]->fechaAudiometria,8,2).'-'.substr($otoscopia[$i]->fechaAudiometria,5,2).'-'.substr($otoscopia[$i]->fechaAudiometria,0,4); ?></center></span></td>
											<td><span><center><?php echo $experienciaLaboral[$i]->tiempoServicio; ?></center></span></td>
											<td><span><?php echo $experienciaLaboral[$i]->areaTrabajo; ?></span></td>
											<td><span><center><?php echo $experienciaLaboral[$i]->nivelRuido; ?></center></span></td>
											<td><span><?php echo $experienciaLaboral[$i]->puestoTrabajo; ?></span></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
				            </div>
				        </ol>
			        </fieldset>

			        <fieldset class="scheduler-border">
			            <legend class="scheduler-border">&nbsp;&nbsp;RESULTADOS DE EXAMENES :</legend>

						<ol>
			            	<li value="1"><label class="control-label" for="empresa">OTOSCOPIA</label></li>
			            </ol>
			            <ol>
				            <div class="form-group">
								<table class="table table-bordered" style="width:60%;">
									<thead>
										<tr>
											<th width="10%"><center>N°</center></th>
											<th width="20%"><center>FECHA</center></th>
											<th width="35%"><center>DESCRIPCIÓN OD</center></th>
											<th width="35%"><center>DESCRIPCIÓN OI</center></th>
										</tr>									
									</thead>
									<tbody>
										<?php
										for ($i=0; $i < count($otoscopia); $i++) {
										?>
										<tr>
											<td><center><?php echo $i+1; ?></center></td>
											<input type="hidden" name="<?php echo 'idOtoscopia_'.$i;?>" id="<?php echo 'idOtoscopia_'.$i;?>" value="<?php echo $otoscopia[$i]->idOtoscopia; ?>">
											<td><span><center><?php echo substr($otoscopia[$i]->fechaAudiometria,8,2).'-'.substr($otoscopia[$i]->fechaAudiometria,5,2).'-'.substr($otoscopia[$i]->fechaAudiometria,0,4); ?></center></span></td>
											<td><span><center><?php echo $otoscopia[$i]->descripcionOd; ?></center></span></td>
											<td><span><center><?php echo $otoscopia[$i]->descripcionOi; ?></center></span></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
				            </div>
						</ol>
			            <ol>
			            	<li value="2"><label class="control-label" for="empresa">AUDIOMETRÍA TONAL</label></li>
			            </ol>
			            <ol>
			            	<div class="form-group">
								<table class="table table-bordered" style="width:97%;">
									<thead>
										<tr>
											<th width=""><center>N°</center></th>
											<th width=""><center>BL</center></th>
											<th width=""><center>CT</center></th>
											<th width=""><center>RE</center></th>
											<th width=""><center>FA</center></th>
											<th width=""><center>FECHA</center></th>
											<th width=""><center>500</center></th>
											<th width=""><center>1000</center></th>
											<th width=""><center>2000</center></th>
											<th width=""><center>3000</center></th>
											<th width=""><center>4000</center></th>
											<th width=""><center>6000</center></th>
											<th width=""><center>8000</center></th>
											<th width=""><center>STS</center></th>
											<th width=""><center>2,3,4 KHz</center></th>

											<th width=""><center>500</center></th>
											<th width=""><center>1000</center></th>
											<th width=""><center>2000</center></th>
											<th width=""><center>3000</center></th>
											<th width=""><center>4000</center></th>
											<th width=""><center>6000</center></th>
											<th width=""><center>8000</center></th>
											<th width=""><center>STS</center></th>
											<th width=""><center>2,3,4 KHz</center></th>
										</tr>									
									</thead>
									<tbody>
										<?php

										
										for ($i = 0; $i < count($burbuja); $i++) {
										     echo $burbuja[$i] ." ";
										
										}
										// for ($i=0; $i < count($burbuja); $i++) {
										// 	if(strtotime($burbuja[$i] == $otoscopia[$i]->fechaAudiometria)){
										for ($j = 0; $j < count($burbuja); $j++) {
		                                    for ($i = 0; $i < count($burbuja); $i++) {
		        								if ( $burbuja[$j] == strtotime($otoscopia[$i]->fechaAudiometria)) {

										?>
													<tr>
														<td height="5px;"><center><?php echo $i+1; ?></center></td>
														<input type="hidden" name="<?php echo 'idAudioTonalOd_'.$i;?>" id="<?php echo 'idAudioTonalOd_'.$i;?>" value="<?php echo $audioTonalOd[$i]->idAudioTonalOd; ?>">
														<input type="hidden" name="<?php echo 'idAudioTonalOi_'.$i;?>" id="<?php echo 'idAudioTonalOi_'.$i;?>" value="<?php echo $audioTonalOi[$i]->idAudioTonalOi; ?>">
														<td><input class="form-control" type="radio" onClick="EventoRadioLb(<?php echo $i;?>)" name="lbRadio_od" id="<?php echo 'lbRadio_od_'.$i;?>" value="" <?php if($ultOd==$audioTonalOd[$i]->idAudioTonalOd){echo 'checked';}?>></td>
														<td><input class="form-control" type="radio" onClick="EventoRadioCt(<?php echo $i;?>)" name="ctRadio_od" id="<?php echo 'ctRadio_od_'.$i;?>" value=""></td>
														<td><input class="form-control" type="checkbox" name="retestCheck" id="<?php echo 'retestCheck_'.$i;?>" value="" <?php if($audioTonalOd[$i]->retest==1){echo 'checked';}?>></td>
														<td><input class="form-control" type="checkbox" name="failCheck" id="<?php echo 'failCheck_'.$i;?>" value="" <?php if($audioTonalOd[$i]->fail==1){echo 'checked';}?>></td>
														<td><span><center><?php echo substr($otoscopia[$i]->fechaAudiometria,8,2).'-'.substr($otoscopia[$i]->fechaAudiometria,5,2).'-'.substr($otoscopia[$i]->fechaAudiometria,0,4); ?></center></span></td>
														<td><span><center><?php echo $audioTonalOd[$i]->od_500; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOd[$i]->od_1000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOd[$i]->od_2000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOd[$i]->od_3000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOd[$i]->od_4000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOd[$i]->od_6000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOd[$i]->od_8000; ?></center></span></td>
														<td><center><?php if($audioTonalOd[$i]->od_sts>=10){echo '<span style="color:#FF0000;">'.$audioTonalOd[$i]->od_sts.'</span>';}else{echo '<span>'.$audioTonalOd[$i]->od_sts.'</span>';} ?></center></td>
														<td><span><center><?php echo $audioTonalOd[$i]->od_khz; ?></center></span></td>

														<td><span><center><?php echo $audioTonalOi[$i]->oi_500; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOi[$i]->oi_1000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOi[$i]->oi_2000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOi[$i]->oi_3000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOi[$i]->oi_4000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOi[$i]->oi_6000; ?></center></span></td>
														<td><span><center><?php echo $audioTonalOi[$i]->oi_8000; ?></center></span></td>
														<td><center><?php if($audioTonalOi[$i]->oi_sts>=10){echo '<span style="color:#FF0000;">'.$audioTonalOi[$i]->oi_sts.'</span>';}else{echo '<span>'.$audioTonalOi[$i]->oi_sts.'</span>';} ?></center></td>
														<td><span><center><?php echo $audioTonalOi[$i]->oi_khz; ?></center></span></td>
													</tr>
										<?php
												}
											}
										}
										?>
									</tbody>
								</table>
								<!--<cite><b>BL:</b> Base Line, <b>CT:</b> Current Test, <b>RE:</b> Retest, <b>FA:</b> Fail</cite>-->
				            </div>
			            </ol>
			        </fieldset>

			        <fieldset class="scheduler-border">
			            <legend class="scheduler-border">&nbsp;&nbsp;INTERPRETACIÓN AUDIOMÉTRICA <cite>(ESCALA CLÍNICA)</cite>:</legend>
						<ol>
				            <div class="form-group">
								<table class="table table-bordered" style="width:60%;">
									<thead>
										<tr>
											<th width="10%"><center>N°</center></th>
											<th width="20%"><center>FECHA</center></th>
											<th width="25%"><center>INTERPRETACIÓN OD</center></th>
											<th width="25%"><center>INTERPRETACIÓN OI</center></th>
											<th width="20%"><center>CIE</center></th>
										</tr>									
									</thead>
									<tbody>
										<?php
										for ($i=0; $i < count($diagnostico); $i++) {
										?>
										<tr>
											<td><center><?php echo $i+1; ?></center></td>
											<td><span><center><?php echo substr($otoscopia[$i]->fechaAudiometria,8,2).'-'.substr($otoscopia[$i]->fechaAudiometria,5,2).'-'.substr($otoscopia[$i]->fechaAudiometria,0,4); ?></center></span></td>
											<td><span><center><?php echo $diagnostico[$i]->interpretacionOd; ?></center></span></td>
											<td><span><center><?php echo $diagnostico[$i]->interpretacionOi; ?></center></span></td>
											<td><span><center><?php echo $diagnostico[$i]->cie_10; ?></center></span></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
				            </div>
				        </ol>
			        </fieldset>

			        <fieldset class="scheduler-border">
			            <legend class="scheduler-border">&nbsp;&nbsp;MENOSCABO AUDITIVO :</legend>
			            <ol>
			           		<div class="form-group">			            	
								<table class="table table-bordered" style="width:60%;">
									<thead>
										<tr>
											<th width="10%"><center>N°</center></th>
											<th width="22%"><center>FECHA</center></th>
											<th width="17%"><center>% OD</center></th>
											<th width="17%"><center>% OI</center></th>
											<th width="17%"><center>% BINAURAL</center></th>
											<th width="17%"><center>% GLOBAL</center></th>
										</tr>									
									</thead>
									<tbody>
										<?php
										for ($i=0; $i < count($menoscabo); $i++) {
										?>
										<tr>
											<td><center><?php echo $i+1; ?></center></td>
											<td><span><center><?php echo substr($otoscopia[$i]->fechaAudiometria,8,2).'-'.substr($otoscopia[$i]->fechaAudiometria,5,2).'-'.substr($otoscopia[$i]->fechaAudiometria,0,4); ?></center></span></td>
											<td><span><center><?php echo $menoscabo[$i]->porcentajeOd; ?></center></span></td>
											<td><span><center><?php echo $menoscabo[$i]->porcentajeOi; ?></center></span></td>
											<td><span><center><?php echo $menoscabo[$i]->binaural; ?></center></span></td>
											<td><span><center><?php echo $menoscabo[$i]->mglobal; ?></center></span></td>
										</tr>
										<?php
										}
										?>
									</tbody>
								</table>
			            	</div>
			            </ol>
			        </fieldset>

			        <div class="form-group">
			            <div class="col-lg-offset-9 col-lg-3">
			                <!--<a href="#" class="btn btn-info" onclick="guardarHistorialPaciente()" title="Guardar"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>-->
			                <a href="#" class="btn btn-info" onclick="generarReportePaciente(<?php echo $idTrabajador;?>)" title="Generar Reporte"><span class="glyphicon glyphicon-list-alt"></span> Generar Reporte</a>
			                <a href="#" class="btn btn-default" onclick="window.close();" title="Cancelar"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
			            </div>
			        </div>
			        <br><br><br>
			    </form>
			</div>
	   	</div>
  	</div>

  	<footer>
    	<div class="container">
      		<div class="copyright">
        		&copy; 2015 Diseño y desarrollo por <a href="https://www.facebook.com/frankjesus.cr" target="_blank">CAPSULE SAC</a>
      		</div>
    	</div>
  	</footer>

</body>
</html>