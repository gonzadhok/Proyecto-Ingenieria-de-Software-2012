<?php
$host = "localhost";
$user = "software";
$pw = "software";

function cabecera() {
    echo "<tr><td width=\"25%\"><font face=\"verdana\">Rut</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">Nombre Completo</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">Comuna</font></td></tr>";
    echo "<td width=\"25%\"><font face=\"verdana\">Telefono</font></td></tr>";
    echo "<td width=\"25%\"><font face=\"verdana\">Correo</font></td></tr>";
    echo "<td width=\"25%\"><font face=\"verdana\">Curso</font></td>";
    echo "<td width=\"25%\"><font face=\"verdana\">Colegio</font></td></tr>";
}

function verDatos($conexion) {
    $consultacarreras = "SELECT * FROM CARRERA";
    $query = mysql_query($consultacarreras, $conexion);

    while ($carreras = mysql_fetch_row($query)) {
        $consulta = "SELECT a.* FROM ALUMNO a,ALUMNO_CARRERA ac WHERE ac.codigo=$carreras[codigo] AND ac.rut=a.rut";
        $query1 = mysql_query($consulta, $conexion);

        cabecera();

        echo "Postulantes a carrera $carreras[nombre]";
        while ($alumno = mysql_fetch_row($query1)) {
            echo "<tr><td width=\"25%\"><font face=\"verdana\">$alumno[rut]</font></td>";
            echo "<td width=\"25%\"><font face=\"verdana\">$alumno[nombre] $alumno[apellidop] $alumno[apellidom]</font></td>";
            echo "<td width=\"25%\"><font face=\"verdana\">$alumno[comuna]</font></td></tr>";
            echo "<td width=\"25%\"><font face=\"verdana\">$alumno[fono]</font></td></tr>";
            echo "<td width=\"25%\"><font face=\"verdana\">$alumno[correo]</font></td></tr>";
            echo "<td width=\"25%\"><font face=\"verdana\">$alumno[curso] Medio</font></td>";
            echo "<td width=\"25%\"><font face=\"verdana\">$alumno[colegio]</font></td></tr>";
        }
    }
}

function mensajedeerror() {
    echo '<script>showDialog("Error","Usuario y/o Contraseña mal ingresados","error",2);</script>';
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
    if ($rut != 0 && preg_match("0-9kK", $digito)) {
        if(preg_match("0-9", $digito))
            $digito = intvar($digito);
        

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

        if ($verificador == $digito) {
            return true;
        } else {
            return false;
        }
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

    if ($alumno = mysql_fetch_row($alumnos)) 
    {
        
    }else
    {
        
    }
}
?>
