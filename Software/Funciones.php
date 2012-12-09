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

    echo '<script languaje="Javascript">';
    echo "showDialog('Error','Usuario y/o Contraseña mal ingresados','error',2);";
    echo "</script>";
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
    if ($rut != 0 && preg_match("0-9", $digito)) {
        $digito = intvar($digito);

        $multiplicador = 2;
        $verificador = 0;

        do {
            $modulo = $rut % 10;
            if ($multiplicador > 7)
                $multiplicador = 2;
            $aux3 += $modulo * $aux2;
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
?>
<form action="?" name="form" method="post" >
<p>
<table width="479" border="1">
<tr>
<td width="242"><p>
<?php
        echo '<label for="rut">Rut:<br /></label>';
        echo '<input name="rut" type="text" id="rut" value="' . $alumno["rut"] . '"> /></p>';
        echo '<p><label for="nombre">Nombre: <br /></label>';
        echo '<input name="nombre" type="text" value="' . $alumno["nombre"] . '" maxlength="20" onkeypress="return soloLetras(event)"/>';
        echo '</p><p><label for="apellido_paterno">Apellido Paterno: <br /></label>';
        echo '<input name="apellido_paterno" value="' . $alumno["apellidop"] . '" type="text" maxlength="10" onkeypress="return soloLetras(event)"/>';
        echo '</p><p><label for="apellido_materno">Apellido Materno: <br /></label>';
        echo '<input name="apellido_materno" value=' . $alumno["apellidom"] . ' type="text" maxlength="10" onkeypress="return soloLetras(event)"/>
           </p><p><label for="comuna">Comuna :<br /></label>
          <input name="comuna" type="text" value=' . $alumno["comuna"] . ' maxlength="20" onkeypress="return soloLetras(event)"/>
          <br></br></p></td><td width="199"><p><label for="curso">Curso:<br /></label>
          <input name="curso" type="text" value=' . $alumno["curso"] . ' maxlength="1"  onkeypress="return soloNum(event)"/>
          </p><p><label for="colegio">Colegio:<br /></label>
          <input name="colegio" type="text" value=' . $alumno["colegio"] . ' maxlength="30"/></p><p>
          <label for="correo">Correo:<br /> </label>
          <input name="correo" value=' . $alumno["correo"] . ' type="text" maxlength="30"/></p><p>
          <label for="telefono">Telefono:<br /></label> 
          <input name="telefono" type="text" maxlength="10" value=' . $alumno["fono"] . ' onkeypress="return soloNumyk(event)"/>
          </p></td></tr><tr><p></p><td>Carreras de interes </td><td>&nbsp;</td>
          </tr><tr><td><label>';
?>
                                       <input type="checkbox" name="CheckboxCarreras[]" value="21047" id="CheckboxCarreras_0" />
                                        Arquitectura</label><br /><label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21046" id="CheckboxCarreras_1" />
                                            Bachillerato</label><br /><label><input type="checkbox" name="CheckboxCarreras[]" value="21002" id="CheckboxCarreras_2" />
                                            Bibliotecologia</label><br /><label><input type="checkbox" name="CheckboxCarreras[]" value="21004" id="CheckboxCarreras_3" />
                                            Cartografia</label>
                                        <br />
                                        <label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21012" id="CheckboxCarreras_4" />
                                            Contador publico y auditor</label>
                                        <br />
                                        <label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21071" id="CheckboxCarreras_5" />
                                            Dibujante Proyectista</label>
                                        <br />
                                        <label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21024" id="CheckboxCarreras_6" />
                                            Diseño comunicacion visual</label>
                                        <br />
                                        <label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21023" id="CheckboxCarreras_7" />
                                            Diseño industrial</label>
                                        <br />
                                        <label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21041" id="CheckboxCarreras_8" />
                                            ing civil en computacion mencion informatica</label>
                                        <br />
                                        <label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21070" id="CheckboxCarreras_9" />
                                            ing civil industrial</label>
                                        <br />
                                        <label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21074" id="CheckboxCarreras_10" />
                                            ing civil obras civiles</label>
                                        <br />
                                        <label>
                                            <input type="checkbox" name="CheckboxCarreras[]" value="21048" id="CheckboxCarreras_11" />
                                            ing comercial</label></td>
                                <td>
                                    <label>  
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21088" id="CheckboxCarreras_12" />
                                        ing administracion agroindustrial</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21073" id="CheckboxCarreras_13" />
                                        ing biotecnologia</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21081" id="CheckboxCarreras_14" />
                                        ing comercio internacional</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21032" id="CheckboxCarreras_15" />
                                        ing en construccion</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21036" id="CheckboxCarreras_16" />
                                        ing civil en electronica</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21031" id="CheckboxCarreras_17" />
                                        ing en geomensura</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21082" id="CheckboxCarreras_18" />
                                        ing en gestion turistica</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21039" id="CheckboxCarreras_19" />
                                        ing industria alimentaria</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21038" id="CheckboxCarreras_20" />
                                        ing en madera</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21030" id="CheckboxCarreras_21" />
                                        ing en informatica</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21037" id="CheckboxCarreras_22" />
                                        ing en mecanica</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21042" id="CheckboxCarreras_23" />
                                        ing en prev. de riesgos</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21080" id="CheckboxCarreras_24" />
                                        ing en quimica</label>
                                    <br />
                                    <label></td>
                            </tr>
                        </table>
                        <p>
                        <p align="center">
                            <input type="submit"  name="button"  value="Enviar" />
                            <input type="submit"  name="button1"  value="Volver" href="principal.html" />
                        <p>
                        <h3 align="center">&nbsp;</h3>
                        <p align="center">&nbsp;</p>
                        <p>
                    </form>
                    </p>
        
<?php
    }else
    {
        echo "El alumno no se encuentra en la base de datos ingreselo en la opción ingresar ";
        echo '<META HTTP-EQUIV="REFRESH" CONTENT="5;URL=formulario.php">';
     }
}
?>