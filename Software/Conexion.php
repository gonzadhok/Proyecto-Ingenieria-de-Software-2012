<?php
    
include 'Funciones.php';

/*campovacio($_POST);
$con = conectar(); 


$consulta = "INSERT INTO ALUMNO VALUES($_POST[textfield2],'$_POST[textfield1]','$_POST[textfield8]','$_POST[textfield16]',$_POST[textfield5],'$_POST[textfield4]',"
        . "'$_POST[textfield3]',$_POST[textfield7],'$_POST[textfield6]',NOW())";
mysql_query($consulta, $con) or die("El postulante ya esta ingresado en los registros");

$array = $_POST['CheckboxCarreras'];

foreach ($array as $selected) {
    $consulta = "INSERT INTO ALUMNO_CARRERA VALUES ($_POST[rut],$selected)";
    mysql_query($consulta, $con);
}

echo "Datos Guardados correctamente";
 * 
 */
header('Location: Login.html');
echo "$_SERVER[HTTP_HOST]:$_SERVER[SERVER_PORT]$_SERVER[REQUEST_URI]";
?>