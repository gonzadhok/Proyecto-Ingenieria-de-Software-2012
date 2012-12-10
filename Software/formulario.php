<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Formulario</title>
        <LINK href='style.css' type=text/css rel=stylesheet>
        <script type="text/javascript" src="validacion.js"></script>
    </head>
    <body>
        <?php
        include "Funciones.php";
        if (!isset($_GET["rut"])) {
            ?>
            <script>
                var temp=window.prompt("Ingrese Rut de Postulante","");
                document.location.href = "index.php?rut="+temp.substring(0, temp.length-2)+"&verificador="+temp.substring(temp.length-1);
            </script>
            <?php
        } else {
            if (!validarrut($_GET["rut"], $_GET["verificador"]))
                echo "<script>alert('Rut mal ingresado');</script>";
            else {
                $conexion = mysql_connect($host, $user, $pw);
                mysql_select_db("base1", $conexion);

                $query = "SELECT * FROM ALUMNO WHERE rut=$_GET[rut]";

                $carrera = "SELECT * FROM CARRERA";
                $carreras = mysql_query($carrera, $conexion);
                $consultaalumno = mysql_query($query, $conexion);

                if (mysql_num_rows($consultaalumno) == 1) {
                    $row = mysql_fetch_array($consultaalumno);
                    ?>
                    <form name="menu">
                        <ul>
                            <a target="_self" href="linkeo 3"><span style="color: #ffffff;">Inicio</span></a>
                            <a class="separador"><span style="color: darkblue">||||||||||||||</span></a>
                            <a target="_self" href="prinicpal"><span style="color: #ffffff;">Postulantes</span></a>
                            <a class="separador"><span style="color: darkblue;">||||||||||||||</span></a>
                            <a class="separador"><span style="color: darkblue;">||||||||||||||</span></a> 
                            <a target="_self" href="Login.html"><span style="color: #ffffff;">cerrar sesion</span></a>
                        </ul>
                    </form>

                    <div id="contenido_interior">
                        <div id="contenido">
                            <h1>Inscríbete para recibir informacion de tu carrera</h1>
                            <p>
                                <p>&nbsp;</p>
                                <form action="Conexion.php" name="form" method="post" >
                                    <p>
                                        <table width="479" border="1">
                                            <tr>
                                                <td width="242"><p>
                                                        <label for="rut">Rut:<br />
                                                        </label>
                                                        <?php echo '<input name="rut" type="text" maxlength="9" onkeypress="return soloNumyk(event)" value="' . $_GET["rut"] . '"/>'; ?>
                                                    </p>
                                                    <p>
                                                        <label for="nombre">Nombre: <br />
                                                        </label>
                                                        <?php echo '<input name="nombre" type="text" maxlength="20" onkeypress="return soloLetras(event)" value="' . $row["nombre"] . '"/>'; ?>
                                                    </p>
                                                    <p>
                                                        <label for="apellido_paterno">Apellido Paterno: <br />
                                                        </label>
                                                        <input name="apellido_paterno" type="text" maxlength="10" onkeypress="return soloLetras(event)" value="<?php echo "$row[apellidop]"; ?>"  />
                                                    </p>
                                                    <p>
                                                        <label for="apellido_materno">Apellido Materno: <br />
                                                        </label>
                                                        <input name="apellido_materno" type="text" maxlength="10" onkeypress="return soloLetras(event)" value="<?php echo "$row[apellidom]"; ?>" />
                                                    </p>
                                                    <p>
                                                        <label for="comuna">Comuna :<br />
                                                        </label>
                                                        <input name="comuna" type="text" maxlength="20" onkeypress="return soloLetras(event)" value="<?php echo "$row[comuna]"; ?>"/>
                                                        <br>
                                                        </br>
                                                    </p></td>
                                                <td width="199">
                                                    <p>
                                                        <label for="curso">Curso:<br />
                                                        </label>
                                                        <input name="curso" type="text" maxlength="1"  onkeypress="return soloNum(event)" value="<?php echo "$row[curso]"; ?>"/>
                                                    </p>
                                                    <p>
                                                        <label for="colegio">Colegio:<br />
                                                        </label>
                                                        <input name="colegio" type="text" maxlength="30" value="<?php echo "$row[colegio]"; ?>"/>
                                                    </p>
                                                    <p>
                                                        <label for="correo">Correo:<br /> </label>
                                                        <input name="correo" type="text" maxlength="30" value="<?php echo "$row[correo]"; ?>" />
                                                    </p>
                                                    <p>
                                                        <label for="telefono">Telefono:<br /></label> 
                                                        <input name="telefono" type="text" maxlength="10" value="<?php echo "$row[fono]"; ?>" onkeypress="return soloNumyk(event)"/>
                                                    </p></td>
                                            </tr>

                                            <tr>
                                                <p>    
                                                </p>
                                                <td>Carreras de interes </td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <?php
                                                echo "<td>";
                                                $contador = 0;
                                                while ($seleccionadas = mysql_fetch_array($carreras)) {
                                                    if ($contador == 13)
                                                        echo "</td><td>";

                                                    $querycarrera = "SELECT * FROM ALUMNO_CARRERA WHERE rut=" . $_GET["rut"] . " AND codigo=" . $seleccionadas["codigo"];
                                                    $consultacarrera = mysql_query($querycarrera, $conexion);

                                                    if (mysql_num_rows($consultacarrera) > 0)
                                                        echo '<label><input type="checkbox" name="CheckboxCarreras[]" value="' . $seleccionadas["codigo"] . '" id="CheckboxCarreras_' . $contador . '</label>" checked="yes" />' . $seleccionadas["nombre"] . '</label><br />';
                                                    else
                                                        echo '<label><input type="checkbox" name="CheckboxCarreras[]" value="' . $seleccionadas["codigo"] . '" id="CheckboxCarreras_' . $contador . '</label>"/>' . $seleccionadas["nombre"] . '</label><br />';
                                                    $contador++;
                                                }
                                                echo "</td>";
                                                ?>


                                            </tr>
                                        </table>
                                        <p>
                                            <p align="center">
                                                <input type="submit"  name="button"  value="Modificar" />
                                                <input type="submit"  name="button1"  value="Volver" href="principal.html" />
                                                <p>
                                                    <h3 align="center">&nbsp;</h3>
                                                    <p align="center">&nbsp;</p>
                                                    <p>
                                                        </form>
                                                    </p>

                                                    </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                        </body>
                                        </html>