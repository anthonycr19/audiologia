<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : inicio.php
    * Fecha : martes 11 de abril del 2015 06:45:05 p.m.
    * Autor : CAPSULE SAC
    **/

  header('Content-Type: text/html;charset=utf-8');
  
  session_start();

  if (!isset($_SESSION['usuario'])) {
        header("Location: index.php");
  }else{
    $user = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Audiología | Laboral</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="author" content="CAPSULE SAC">

  <link rel="icon" href="gui/public/img/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="gui/public/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="gui/public/datatable/dataTables.bootstrap.css">
  <link rel="stylesheet" type="text/css" href="gui/public/css/style_audiologia.css">

  <!--<script src="gui/public/jquery/js/jquery.js"></script>-->
  <script type="text/javascript" language="javascript" src="gui/public/datatable/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" language="javascript" src="gui/public/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" language="javascript" src="gui/public/datatable/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="gui/public/datatable/dataTables.bootstrap.js"></script>
  <script type="text/javascript" language="javascript" src="gui/public/js/js_audiologia.js"></script>

</head>
<body>

  <header>
    <nav class="navbar navbar-inverse navbar-static-top" rol="navigation"> <!--estático: navbar-fixed-top-->
      <div class="container-fluid">
        <!-- El logotipo y el icono que despliega el menú se agrupan para mostrarlos mejor en los dispositivos móviles -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Desplegar navegación</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <img src="gui/public/img/logo.png" alt="logo" width="220" height="35" style="margin:-8px 30px 0px 0px">
          </a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">

            <li class="active"><a href="#" onclick="inicio()"><span class="glyphicon glyphicon-home"></span> Inicio</a></li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Pacientes<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#" onclick="buscarPaciente()"><span class="glyphicon glyphicon-search"></span> Buscar Paciente</a></li>
                <!--<li><a href="#"><span class="glyphicon glyphicon-ok"></span> Salvar Paciente</a></li>-->
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-briefcase"></span> Empresas<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#" onclick="buscarEmpresa()"><span class="glyphicon glyphicon-search"></span> Buscar Empresa</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-upload"></span> Excel<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="gui/view/VistaCargarExcel.php" target="_blank"><span class="glyphicon glyphicon-upload"></span> Cargar Excel</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-eye-open"></span> Gestor<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="gui/view/VistaCargarExcel.php" target="_blank"><span class="glyphicon glyphicon-file"></span> Gestionar archivos</a></li>
              </ul>
            </li>
          
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-wrench"></span> Ajustes<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#" onclick="nuevoUsuario()"><span class="glyphicon glyphicon-user"></span> Nuevo Usuario</a></li>
                <li><a href="#" onclick="nuevoRol()"><span class="glyphicon glyphicon-cog"></span> Nuevo Rol</a></li>
                <!--<li><a href="#" onclick="gestionarPermisos()"><span class="glyphicon glyphicon-globe"></span> Gestionar Permisos</a></li>-->
              </ul>
            </li>
            
          </ul>
          
          <form class="navbar-form navbar-left" role="search">
          </form>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Usuario: <span style="color:#71B138"><?php echo $user;?></span></a></li>
            <li><a href="#" onclick="location.href='conexion/cerrarSesion.php'"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesión</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <div class="container">
    <div id="principal">
      
      <div class="jumbotron">
        <h1 id="titulo">Instituto de Audiología Laboral</h1>
        <h3 style="margin-top:10px">DR. RODOLFO BADILLO</h3>
        <p>Investigación y Consultoría</p>
        <figure><img src="gui/public/img/rodolfo.jpg" alt="Dr. Rodolfo Badillo C." class="img-thumbnail" id="logo"></figure>
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
<?php } ?>