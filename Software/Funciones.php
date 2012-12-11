<?php

$host = "localhost";
$user = "software";
$pw = "software";

function verDatos($conexion) {
    $consultacarreras = "SELECT * FROM CARRERA";
    $query = mysql_query($consultacarreras, $conexion);

    while ($carreras = mysql_fetch_array($query)) {
        $consulta = "SELECT a.* FROM ALUMNO a,ALUMNO_CARRERA ac WHERE ac.codigo='$carreras[codigo]' AND ac.rut=a.rut";
        $query1 = mysql_query($consulta, $conexion);

        echo '<label><input type="checkbox" name="CheckboxCarreras[]" value="' . $carreras["codigo"] . '"></label>' . $carreras["nombre"] . '</label><br />';


        echo "<table><tr><th>Rut</th><th>Nombre Completo</th><th>Correo</th><th>Telefono</th><th>Colegio</th><th>Curso</th></tr><th>"; //Nombre Completo</th><th>Comuna</th></tr><th>Telefono</th><th>Curso</th><th>Correo</th></tr>";
//aca se cargan los datos y se ponen los botones de opciones (eliminar/modificar)
        while ($fila = mysql_fetch_array($query1)) {
            echo '<tr><td><input type="text" readonly="yes" name="Rut" value="'.$fila["rut"].'"></td></tr>';
			echo '<tr><td><input type="text" readonly="yes" name="nombre" value="'."$fila[nombre] $fila[apellidop] $fila[apellidom]".'"></td></tr>';
			echo '<tr><td><input type="text" readonly="yes" name="correo" value="'.$fila["correo"].'"></td></tr>';
			echo '<tr><td><input type="text" readonly="yes" name="telefono" value="'.$fila["fono"].'"></td></tr>';
			echo '<tr><td><input type="text" readonly="yes" name="colegio" value="'.$fila["colegio"].'"></td></tr>';
			echo '<tr><td><input type="text" readonly="yes" name="curso" value="'."$fila[curso] Medio".'"></td></tr>';
        }
        echo "</table><br><br>";
    }
}

function mensajedeerror() {
    echo '<script>alert("Usuario y/o Contraseña mal ingresados")</script>';
}

function buscarAlumno($rut, $conexion) {
    $resultado = mysql_query("SELECT * FROM ALUMNO WHERE rut=$rut", $conexion);
    if (mysql_num_rows($resultado) > 0)
        return true;
    else
        return false;
}

function validarrut($rut, $digito) {
    $rut = intval($rut);

    if ($rut != 0 && (intval($digito) > 0 || (intval($digito) == 0 && $digito == "0") || $digito == "k" || $digito == "K")) {

        $multiplicador = 2;
        $verificador = 0;

        do {
            $modulo = $rut % 10;
            if ($multiplicador > 7)
                $multiplicador = 2;
            $verificador += $modulo * $multiplicador;
            $multiplicador++;
            $rut = ($rut - $modulo) / 10;
        } while ($rut != 0);

        $verificador = 11 - ($verificador % 11); //calculo de guion

        switch ($verificador) {
            case 11: $verificador = 0;
                break;
            case 10: $verificador = "k";
                break;
        }

        if ($verificador == intval($digito))
            return true;
        elseif ($verificador == "k" && ($digito == "K" || $digito == "k"))
            return true;
        else
            return false;
    }else
        return false;
}

function formulario($rut) {
    $conexion = mysql_connect($host, $user, $pw);
    mysql_select_db("base1", $conexion);

    $consultadatos = "SELECT * FROM ALUMNO WHERE rut=$rut";
    $consultacarreras = "SELECT * FROM ALUMNO_CARRERA WHERE rut=$rut";

    $alumnos = mysql_query($consultadatos, $conexion);
    $carreras = mysql_query($consultacarreras, $conexion);

    if ($alumno = mysql_fetch_row($alumnos)) {
        
    } else {
        
    }
}
?>
