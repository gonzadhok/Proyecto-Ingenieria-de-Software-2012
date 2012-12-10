

<?php
include 'Funciones.php';

function modificarPostulante($conexion, $informacion) {
    $opciones = $informacion['CheckboxCarreras'];
     $datos="UPDATE ALUMNO SET nombre='$informacion[nombre]',apellidop='$informacion[apellido_paterno]'"
            ."',apellidom='$informacion[apellido_materno]',curso=$informacion[curso]".
            ",colegio='$informacion[colegio]',comuna='$informacion[comuna]'"
            .",fono=$informacion[telefono],correo='$informacion[correo]'".
                " WHERE rut=$informacion[rut]";
        
        mysql_query($datos,$conexion);
        
        mysql_query("DELETE FROM ALUMNO_CARRERA WHERE rut=$informacion[rut]",$conexion);
        
        foreach ($opciones as $opcion) {
            $agregar = "INSERT INTO ALUMNO_CARRERA VALUES ($informacion[rut],$opcion)";
            mysql_query($agregar, $conexion);
        }
        echo '<script>alert("Datos Agregados Correctamente")</script>';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=formulario.html">';
        
    
    
}

$conexion=  mysql_connect($host,$user,$pw);
mysql_select_db("base1",$conexion);
modificarPostulante($conexion, $_POST);
mysql_close($conexion);
?>
