<?php

    /** 
    * Proyecto : AUDIOLOGIA LABORAL - CLINICA
    * Nombre del Archivo : VistaPacientes.php
    * Fecha : martes 11 de abril del 2015 06:49:05 p.m.
    * Autor : Franklin Jesús Cabezas Rosario
    **/

    //Parametros
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $mysql_password = '';
    $my_database = 'clinica';

    // Conectando, seleccionando la base de datos
    $link = mysql_connect($mysql_host, $mysql_user, $mysql_password)
        or die('No se pudo conectar: ' . mysql_error());

    mysql_select_db($my_database) or die('No se pudo seleccionar la base de datos');

    $sql = "SELECT p_ID, p_dni, p_nombre, p_edad FROM paciente";

    $result = mysql_query($sql);

    $arrayTotal = array();
    
    while ($row = mysql_fetch_array($result)) {
        $arrayPaciente = array($row['p_ID'], $row['p_dni'], $row['p_nombre'], $row['p_edad']);
        array_push($arrayTotal, $arrayPaciente);
    }

?>
<head>
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {
          $('#example').dataTable();
        });
    </script>
</head>
</br>

<fieldset class="scheduler-border">
    <legend class="scheduler-border">&nbsp;&nbsp;BÚSQUEDA PACIENTES </legend>
    <div class="control-group">

    </div>
</fieldset>

<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
    <div class="row">
        <div class="col-sm-12">
            <table id="example" class="table table-striped table-bordered dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 260px;" aria-sort="ascending">Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 396px;">Position</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 195px;">Office</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 154px;">Salary</th>
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 195px;">Office</th>
                    </tr>
                </thead>
                <tbody>

                    <?php

                        for ($i=0; $i < count($arrayTotal); $i++) {
                            $ar = $arrayTotal[$i];
                            if ($i%2==0) {
                                echo '
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">'.$ar[0].'</td>
                                        <td>'.$ar[1].'</td>
                                        <td>'.$ar[2].'</td>
                                        <td>'.$ar[3].'</td>
                                        <td>'.$ar[2].'</td>
                                    </tr>
                                ';
                            }else{
                                echo '
                                    <tr role="row" class="even">
                                        <td class="sorting_1">'.$ar[0].'</td>
                                        <td>'.$ar[1].'</td>
                                        <td>'.$ar[2].'</td>
                                        <td>'.$ar[3].'</td>
                                        <td>'.$ar[2].'</td>
                                    </tr>
                                ';
                            }
                        }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</br>
</br>
</br>
</br>

<script type="text/javascript">
    // For demo to fit into DataTables site builder...
    $('#example')
      .removeClass('display')
      .addClass('table table-striped table-bordered');
</script>


