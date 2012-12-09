<?php
include 'Funciones.php';

function modificarPostulante($conexion, $informacion) {
    $opciones = $informacion['CheckboxCarreras'];
    if (buscarAlumno($informacion["rut"], $conexion))
    {
        $datos="UPDATE ALUMNO SET nombre='$informacion[nombre]',apellidop='$informacion[apellido_paterno]'"
            ."',apellidom='$informacion[apellido_materno]',curso=$informacion[curso]".
            ",colegio='$informacion[colegio]',comuna='$informacion[comuna]'"
            .",fono=$informacion[telefono],correo='$informacion[correo]'".
                " WHERE rut=$informacion[rut]";
        
        mysql_query($datos,$conexion);
        
        foreach ($opciones as $opcion) {
            $agregar = "INSERT INTO ALUMNO_CARRERA VALUES ($informacion[rut],$opcion)";
            mysql_query($agregar, $conexion);
        }
        
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">Datos Guardados correctamente';
    }else {
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">El postulante no se encuentra en la base de datos';
    }
    
    
}

$conexion=  mysql_connect($host,$user,$pw);
mysql_select_db("base1",$conexion);
modificarPostulante($conexion, $_POST);

?>
