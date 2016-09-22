<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaCargarExcel.php
    * Fecha : martes 11 de abril del 2015 06:48:05 p.m.
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

	  <script>
	  	function cancelarCarga(idArchivo){
	  		if(confirm('Desea Cancelar la Carga de Datos?')){
	  			var archivo = document.getElementById('nombreArchivo').value;
				location.href='VistaTruncateTableTemporal.php?archivo='+archivo+'&idArchivo='+idArchivo;
			}
	  	}
	  </script>
	</head>
	<body>
		</br>
		<div class="container">
		    <div id="principal">
				<div class="control-group">
					<form class="form-horizontal" action="VistaCargarExcel.php" method="post" enctype="multipart/form-data" role="form" name="importa" id="importa">
						<fieldset class="scheduler-border">
				    		<legend class="scheduler-border">&nbsp;&nbsp;CARGAR EXCEL </legend>
							<div class="form-group">
					    		<label class="col-xs-12 col-sm-6 col-md-4 control-label" for="label_excel">Subir Excel :</label>
					    		<div class="col-xs-12 col-sm-6 col-md-4">
					      			<input type="file" class="form-control" id="excel" name="excel">
					    		</div>
					    		<div class="col-xs-12 col-sm-6 col-md-4">
					    			<button class="btn btn-success" type="submit" name="enviar">&nbsp;Cargar Excel  <span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;</button>
					    		</div>
					    		<input type="hidden" value="upload" name="action" />
					    		<input type="hidden" name="nombreArchivo" id="nombreArchivo" value="<?php if(isset($_FILES['excel']['name'])){echo $_FILES['excel']['name'];} ?>">
					  		</div>
						</fieldset>
					</form>
				</div>
			</div>

	<!-- CARGA LA MISMA PAGINA MANDANDO LA VARIABLE upload -->
	<?php
		extract($_POST);
		
		if ($action == "upload"){
			//cargamos el archivo al servidor con el mismo nombre
			//solo le agregue el sufijo bak_
			$archivo = $_FILES['excel']['name'];
			$tipo = $_FILES['excel']['type'];
			$destino = "bak_".$archivo;

			if (copy($_FILES['excel']['tmp_name'],$destino)){
				echo "<strong>DATOS CARGADOS CON ÉXITO!</strong><br><br>";
			} else {
				echo "<strong>ERROR AL CARGAR LOS DATOS!</strong>";
			} 

			if (file_exists ("bak_".$archivo)){

				$rutaInicio = "../../archivos/".$archivo;
				if (file_exists($rutaInicio)){
					echo "<br><br><span>".$_FILES['excel']['name'] . "</span><strong>, este archivo existe, porfavor cargue otro archivo...</strong>";
				}else{
					/** Clases necesarias */
					require_once('../../libreria/PHPExcel/Classes/PHPExcel.php');
					require_once('../../libreria/PHPExcel/Classes/PHPExcel/Reader/Excel2007.php');
					require_once('../../bll/bo/BOTemporal.php');
					require_once('../../bll/bo/BOArchivo.php');

					//Datos del Archivo
					$boArchivo = new BOArchivo();

					$cantidadRegistro = 0;
					$idEmpresa = 0;
					$fechaRegistro = date('Y-m-d');

					// Cargando la hoja de cálculo

					$objReader = new PHPExcel_Reader_Excel2007();
					$objPHPExcel = $objReader->load("bak_".$archivo);
					$objFecha = new PHPExcel_Shared_Date();

					// Asignar hoja de excel activa
					$objPHPExcel->setActiveSheetIndex(0);

					// Llenamos el arreglo con los datos  del archivo xlsx

					$boTemporal = new BOTemporal();
					$i=2;
					$errores=0;
					$campos=0;
					while ($objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue()!='') {
						$idTemporal = $boTemporal->Insertar($objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue(),
						date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue())),
						$objPHPExcel->getActiveSheet()->getCell('J'.$i)->getCalculatedValue(),
						date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('K'.$i)->getCalculatedValue())),
						$objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('O'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue(),
						date("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($objPHPExcel->getActiveSheet()->getCell('Q'.$i)->getCalculatedValue())),
						$objPHPExcel->getActiveSheet()->getCell('R'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('S'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('T'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('U'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('V'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('W'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('X'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('Y'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AA'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AB'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AC'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AD'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AE'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AF'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AG'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AH'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AI'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AJ'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AK'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AL'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AM'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AN'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AO'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AP'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AQ'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AR'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AS'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AT'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AU'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AV'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AW'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AX'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AY'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('AZ'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('BA'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('BB'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('BC'.$i)->getCalculatedValue(),
						$objPHPExcel->getActiveSheet()->getCell('BD'.$i)->getCalculatedValue());

						if ($idTemporal!='' or $idTemporal!=0) {
							$campos+=1;
							echo '<span>Trabajador '.$idTemporal.' --> '.$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue().' '.$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue().' con DNI '.$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue().' ha sido insertado Satisfactoriamente...</span><br>';
						}else{
							$errores+=1;
							echo '<span style="color:#FF0000;">Trabajador '.$idTemporal.' --> '.$objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue().' '.$objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue().' con DNI '.$objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue().' NO ha sido insertado, presenta errores...</span><br>';
						}					
						$i++;
					}

					$cantidadRegistro = $i-1;
					
					//Guardamos los datos del Archivo
					$idArchivo = $boArchivo->Insertar($archivo, $tipo, $cantidadRegistro, $fechaRegistro, $idEmpresa);

					echo "<br><br><strong><center>ARCHIVO IMPORTADO CON EXITO, EN TOTAL $campos REGISTROS Y $errores ERRORES</center></strong>";

					$ruta = "../../archivos/" . $_FILES['excel']['name'];
					//comprovamos si este archivo existe para no volverlo a copiar.
					//pero si quieren pueden obviar esto si no es necesario.
					//o pueden darle otro nombre para que no sobreescriba el actual.
					if (!file_exists($ruta)){
						//aqui movemos el archivo desde la ruta temporal a nuestra ruta
						//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
						//almacenara true o false
						$resultado = @move_uploaded_file($_FILES["excel"]["tmp_name"], $ruta);
						if ($resultado){
							echo "<br><br><strong>El archivo ha sido movido exitosamente!</strong>";
						} else {
							echo "<br><br><strong>Ocurrio un error al mover el archivo!</strong>";
						}
					} else {
						echo "<br><br><strong>".$_FILES['excel']['name'] . ", este archivo existe...</strong>";
					}
					echo "<br><br><br>";
					echo "<center><a href='VistaExportarDatos.php?idArchivo=".$idArchivo."' class='btn btn-success'>Subir Datos <span class='glyphicon glyphicon-circle-arrow-up'></span></a>";
					echo "&nbsp;&nbsp;<a class='btn btn-default' onclick='cancelarCarga(".$idArchivo.")'>Cancelar <span class='glyphicon glyphicon-remove'></span></a></center>";
					echo "<br><br><br>";
				}

			} else {
				echo "<br><br><strong>Necesitas primero importar el archivo...</strong>";
			} //si por algo no cargo el archivo bak_

			//una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
			unlink($destino);
		}
	?>
		</div>
	</body>
</html>