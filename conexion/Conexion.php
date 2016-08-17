<?php

	/** 
	* Proyecto : AUDIOLOGIA LABORAL - CLINICA
	* Nombre del Archivo : Conexion.php
	* Fecha : domingo 22 de marzo del 2015 08:45:22 a.m.
	* Autor : Franklin Jesús Cabezas Rosario
	**/

	class Conexion {

		function Conectarse(){

			if(!($link=mysql_connect("localhost", "root", ""))){
				echo "Error: Conectando el servidor.";
				exit();
			}
			if (!(mysql_select_db("audiologia_laboral", $link))) {
				echo "Error: Seleccionando la Base de Datos";
				exit();
			}

			return $link;
		}

		function Desconectarse($connect){
			
			return mysql_close($connect);
		}


		function ConectarseTemporal(){

			if(!($link=mysql_connect("localhost", "root", ""))){
				echo "Error: Conectando el servidor.";
				exit();
			}
			if (!(mysql_select_db("temporal", $link))) {
				echo "Error: Seleccionando la Base de Datos";
				exit();
			}

			return $link;
		}

		function DesconectarseTemporal($connect){

			return mysql_close($connect);
		}

	}

?>