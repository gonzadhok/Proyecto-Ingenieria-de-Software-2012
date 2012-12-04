<?php

$host = "localhost";
$user = "software";
$pw = "software";

function mensajedeerror()
{
?>
    <script>
        showDialog('Error','Usuario y/o Contraseña mal ingresados','error',2);
  </script>
<?php
}


function campovacio($campos,$nombrecampos,$url) {
    for ($i = 1; $i < count($nombrecampos); $i++) {
        if (empty($campos[$nombrecampos[$i]])) {
            header($url);
        }
    }
}

function conectar()
{
    $con = mysql_connect($host, $user, $pw) or die("Error al conectar a Host");
    mysql_select_db("base1", $con) or die("Error al conectar con base de datos");
    return $con;
}

function desconectar($con)
{
    mysql_close($con);
}

function validarrut($rut,$digito)
{
    return true;
}

?>
