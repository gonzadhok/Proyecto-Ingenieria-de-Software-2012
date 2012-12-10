<?php

$host = "localhost";
$user = "software";
$pw = "software";


function crearExcel($post, $conexion) {
    require_once "Classes/PHPExcel.php";
    require_once "Classes/PHPExcel/Writer/Excel2007.php";
    foreach ($post["CheckboxCarreras"] as $check) {

        $archivoExcel = new PHPExcel();

        $archivoExcel->getProperties()->setCreator("UTEM DIFUSION");
        $archivoExcel->getProperties()->setLastModifiedBy("UTEM DIFUSION");
        $archivoExcel->getProperties()->setTitle("Postulantes carrera:$check");
        $archivoExcel->getProperties()->setSubject("Postulantes carrera:$check");
        $archivoExcel->getProperties()->setDescription("Datos de Postulantes a $check");

        $archivoExcel->setActiveSheetIndex(0);

        $archivoExcel->getActiveSheet()->SetCellValue("B2", "Rut");
        $archivoExcel->getActiveSheet()->SetCellValue("C2", "Nombre");
        $archivoExcel->getActiveSheet()->SetCellValue("D2", "Apellido Paterno");
        $archivoExcel->getActiveSheet()->SetCellValue("E2", "Apellido Materno");
        $archivoExcel->getActiveSheet()->SetCellValue("F2", "Correo");
        $archivoExcel->getActiveSheet()->SetCellValue("G2", "Telefono");
        $archivoExcel->getActiveSheet()->SetCellValue("H2", "Colegio");
        $archivoExcel->getActiveSheet()->SetCellValue("I2", "Curso");

        $consulta = "SELECT a.* FROM ALUMNO a,ALUMNO_CARRERA ac WHERE ac.codigo=$check AND ac.rut=a.rut";
        $query1 = mysql_query($consulta, $conexion);

        $contador = 3;

        while ($row = mysql_fetch_array($query1)) {
            $archivoExcel->getActiveSheet()->SetCellValue("B$contador", "$row[rut]");
            $archivoExcel->getActiveSheet()->SetCellValue("C$contador", "$row[nombre]");
            $archivoExcel->getActiveSheet()->SetCellValue("D$contador", "$row[apellidop]");
            $archivoExcel->getActiveSheet()->SetCellValue("E$contador", "$row[apellidom]");
            $archivoExcel->getActiveSheet()->SetCellValue("F$contador", "$row[correo]");
            $archivoExcel->getActiveSheet()->SetCellValue("G$contador", "$row[fono]");
            $archivoExcel->getActiveSheet()->SetCellValue("H$contador", "$row[colegio]");
            $archivoExcel->getActiveSheet()->SetCellValue("I$contador", "$row[curso] Medio");
            $contador++;
        }

        $archivoExcel->getActiveSheet()->setTitle("Postulantes a $check");
        $archivoExcel->getSecurity()->setLockWindows(true);
        $archivoExcel->getSecurity()->setLockStructure(true);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $check . '.xlsx"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($archivoExcel, 'Excel2007');
        $objWriter->save('php://output');
    }
}

function verDatos($conexion) {
    $consultacarreras = "SELECT * FROM CARRERA";
    $query = mysql_query($consultacarreras, $conexion);

    while ($carreras = mysql_fetch_array($query)) {
        $consulta = "SELECT a.* FROM ALUMNO a,ALUMNO_CARRERA ac WHERE ac.codigo='$carreras[codigo]' AND ac.rut=a.rut";
        $query1 = mysql_query($consulta, $conexion);

        echo '<label><input type="checkbox" name="CheckboxCarreras[]" value="' . $carreras["codigo"] . '"</label>' . $carreras["nombre"] . '</label><br />';


        echo "<table><tr><th>Rut</th><th>"; //Nombre Completo</th><th>Comuna</th></tr><th>Telefono</th><th>Curso</th><th>Correo</th></tr>";
//aca se cargan los datos y se ponen los botones de opciones (eliminar/modificar)
        while ($fila = mysql_fetch_array($query1)) {
            echo '<tr><td><input type="text" readonly="yes" name="Rut" value="'.$fila["rut"].'"></td></tr>';
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
