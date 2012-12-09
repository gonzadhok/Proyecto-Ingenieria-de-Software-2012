<?php
include 'Funciones.php';

$conexion=  mysql_connect($host,$user,$pw);
mysql_select_db("base1",$conexion);

verDatos($conexion);
?>
