<?php

include 'Funciones.php';

function agregarNuevoPostulante($conexion, $informacion) {
    $opciones = $informacion["CheckboxCarreras"];
    if (!buscarAlumno($informacion["rut"], $conexion) && count($opciones) > 0) {
        $datos = "$informacion[rut],'$informacion[nombre]','$informacion[apellido_paterno]','$informacion[apellido_materno]',$informacion[curso],'$informacion[colegio]','$informacion[comuna]',$informacion[telefono],'$informacion[correo]',NOW()";
        mysql_query("INSERT INTO ALUMNO VALUES($datos)", $conexion) or die('<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">Datos mal ingresados');
        foreach ($opciones as $opcion) {
            $agregar = "INSERT INTO ALUMNO_CARRERA VALUES ($informacion[rut],$opcion)";
            echo $agregar;
            mysql_query($agregar, $conexion);
        }
        echo '<script>alert("Formulario Guardado exitosamente")</script>';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=formulario.html">';
    } elseif (count($opciones) < 0) {
        echo '<script>alert("No se han agregado preferencias al postulante")</script>';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=formulario.html">';
    } else {
        echo '<script>alert("El Postulante ya se encuentra en inscrito")</script>';
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=formulario.html">';
    }
}

$conexion = mysql_connect($host, $user, $pw);
mysql_select_db("base1", $conexion);

agregarNuevoPostulante($conexion, $_POST);

?>