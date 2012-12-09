<?php

include 'Funciones.php';


function agregarNuevoPostulante($conexion, $informacion) {
    $opciones = $informacion['CheckboxCarreras'];
    if (!buscarAlumno($informacion["rut"], $conexion) && count($opciones) > 0) {
        $datos = "$informacion[rut],'$informacion[nombre]','$informacion[apellido_paterno]','$informacion[apellido_materno]',$informacion[curso],'$informacion[colegio]','$informacion[comuna]',$informacion[telefono],'$informacion[correo]',NOW()";
        mysql_query("INSERT INTO ALUMNO VALUES($datos)", $conexion) or die('<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">Datos mal ingresados');
        foreach ($opciones as $opcion) {
            $agregar = "INSERT INTO ALUMNO_CARRERA VALUES ($informacion[rut],$opcion)";
            mysql_query($agregar, $conexion);
        }
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">Datos Guardados correctamente';
    } elseif (count($opciones) < 0) {
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">Seleccione Carreras que desea cursar';
    } else {
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">El postulante ya se encuentra en la base de datos';
    }
}

$conexion = mysql_connect($host, $user, $pw);
mysql_select_db("base1", $conexion);

switch ($_POST["accion"]) {
    case "1":
        header("Location: vistapostulante.php"); 
        break;
    case "2":
        agregarNuevoPostulante($conexion, $_POST);
        break;
    case "3":
        break;
    default:
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=formulario.html">';
        break;
}
?>