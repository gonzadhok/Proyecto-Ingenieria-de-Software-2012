<?php
    
$host = "localhost";
$user = "root";
$pw = "map001358";

function campovacio($campos) {

    $nombrecampos = array(1 => "rut", "nombre", "apellido_paterno", "apellido_materno",
        "comuna", "colegio", "curso", "correo", "telefono");

    for ($i = 1; $i < count($nombrecampos); $i++) {
        if (empty($campos[$nombrecampos[$i]])) {
            echo "<br>";
        }
    }
}

function conectar()
{
    $con = mysql_connect($host, $user, $pw) or die("Error al conectar a Host");
    mysql_select_db("base1", $con) or die("Error al conectar con base de datos");
    return $con;
}

campovacio($_POST);
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
?>