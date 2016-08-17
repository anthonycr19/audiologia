<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : index.php
    * Fecha : domingo 19 de abril del 2015 03:51:30 a.m.
    * Autor : Franklin Jesús Cabezas Rosario
    **/

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Audiología | Laboral</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="author" content="Franklin Jesús Cabezas Rosario">
    
    <link rel="icon" href="gui/public/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="gui/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="gui/public/css/login.css">
    <script type="text/javascript" language="javascript"  src="gui/public/datatable/jquery-1.10.2.min.js"></script>

    <script type="text/javascript" language="javascript" >
      $("document").ready(function() {

          $("#label_error").hide();
          /*
          $("#div_login").modal({keyboard:false, backdrop:false}); 
            $("#div_login").modal("show");
            */

          $("#btn_login").click(function() {
              var usuario=$("#inputUser").val();
              var password=$("#inputPass").val();

              $.ajax({
                  url:'conexion/iniciarSesion.php',
                  type:'post',
                  data:{
                    usuario:usuario, 
                    password:password
                  }
              }).done(function(msg){
                  console.log(msg);
                  if(msg=="1"){
                      location.href="inicio.php";
                  }else{                 
                      $("#label_error").show();
                      //$("#div_login").effect("shake", { times:3 }, 500);
                  }  
              });               
          });
      });
    </script> 
</head>
<body>

  <div class="container">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
            <div>
                <center><img src="gui/public/img/logo.png" alt=""></center>
              </div>
              </br>
              <div class="panel panel-default"> <!--id="div_login"-->
                  <div class="panel-heading">
                      <span class="glyphicon glyphicon-lock"></span> Iniciar Sesión</div>
                  <div class="panel-body">
                      <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputUser" class="col-sm-3 control-label">Usuario</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputUser" placeholder="Usuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPass" class="col-sm-3 control-label">Contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPass" placeholder="Contraseña" required>
                            </div>
                        </div><!--
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"/>Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <a href="#" id="btn_login" class="btn btn-sm btn-primary">&nbsp;&nbsp;Ingresar&nbsp;&nbsp;</a>
                                <button type="reset" class="btn btn-default btn-sm">&nbsp;&nbsp;Limpiar&nbsp;&nbsp;</button>
                            </div>
                        </div>
                        <div id="label_error" class="alert alert-danger last form-group" role="alert">
                          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                          <span class="sr-only">Error:</span>
                          Error en usuario o contraseña!
                        </div>
                      </form>
                  </div>
                  <div class="panel-footer">No Registrado? <a href="#">Regístrese aquí</a></div>
              </div>
          </div>
      </div>
  </div>

  <script type="text/javascript" language="javascript" src="gui/public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>