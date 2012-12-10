<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Formulario</title>
        <LINK href='style.css' type=text/css rel=stylesheet>
</head>
<body>
    <form name="menu">
        <ul>
            <a target="_self" href="linkeo 3"><span style="color: #ffffff;">Inicio</span></a>
            <a class="separador"><span style="color: darkblue">||||||||||||||</span></a>
            <a target="_self" href="principal.html"><span style="color: #ffffff;">Postulantes</span></a>
            <a class="separador"><span style="color: darkblue;">||||||||||||||</span></a>
            <a class="separador"><span style="color: darkblue;">||||||||||||||</span></a> 
            <a target="_self" href="Login.html"><span style="color: #ffffff;">cerrar sesion</span></a>
        </ul>
    </form>


    <div id="contenido_interior">
        <div id="contenido">
            <h1>Postulantes Inscritos</h1>
            <p>
                <p>&nbsp;</p>
                <form action="?" name="form" method="POST" >
                    <p>
                        <?php
                        include 'Funciones.php';
                        $conexion = mysql_connect($host, $user, $pw);
                        mysql_select_db("base1", $conexion);

                        verDatos($conexion);

                        if (isset($_POST["button"]) && count($_POST["CheckboxCarreras"]) > 0) {
                            crearExcel($_POST, $conexion);
                        }
                        ?>
                        <p>
                            <input type="submit" name="button" id="button" value="Exportar .xls"/>
                            <input type="submit" name="volver" id="button" value="Volver" href="principal.html"/>
                        </p>
                    </p>
                </form>
            </p>
        </div>
    </div>
</body>
</html>
