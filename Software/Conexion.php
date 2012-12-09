<?php
    
include 'Funciones.php';

 

$conexion =mysql_connect($host, $user, $pw);
mysql_select_db("base1", $conexion); 

$opciones = $_POST['CheckboxCarreras'];

if(!buscarAlumno($_POST["rut"],$conexion) && count($opciones)>0)
{
    $datos="$_POST[rut],'$_POST[nombre]','$_POST[apellido_paterno]','$_POST[apellido_materno]',$_POST[curso],'$_POST[colegio]','$_POST[comuna]',$_POST[telefono],'$_POST[correo]',NOW()";
    mysql_query("INSERT INTO ALUMNO VALUES($datos)",$conexion) or die('<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">Datos mal ingresados'); 
    foreach ($opciones as $opcion) {
    $agregar = "INSERT INTO ALUMNO_CARRERA VALUES ($_POST[rut],$opcion)";
    mysql_query($agregar,$conexion);
    }
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">Datos Guardados correctamente';
}elseif(count($opciones)<0)
{
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">Seleccione Carreras que desea cursar';
}  else {
    echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.html">El postulante ya se encuentra en la base de datos';
}




?>