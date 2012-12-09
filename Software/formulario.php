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
    
    include 'Funciones.php';
    
    if(!isset($_GET["rut"]))
    {
?>
<script src="validacion.js">
    var temp=window.prompt("Ingrese Rut de Postulante","");
    if(validadorRut(temp))
    {
        document.location.href = "formulario.php?rut="+temp.substring(0, temp.length-2)+"&verificador="+temp.substring(temp.length);   
    }else
     {
         document.location.href = "formulario.php?rut=false";
     }
</script>
   <?php
    }else
    {
        if($_GET["rut"]=="false")
            echo "<script>alert('Rut mal ingresado');</script>";
        else
        {
            $conexion=  mysql_connect($host, $user,$pw);
            mysql_select_db("base1", $conexion);
            
            $query="SELECT * FROM ALUMNO WHERE $rut=$_GET[rut]";
            $querycarrera="SELECT * FROM ALUMNO_CARRERA WHERE $rut=$_GET[rut]";
            $carrera="SELECT * FROM CARRERA";
            $carreras=mysql_query($carrera,$conexion);
            $consultaalumno=  mysql_query($query);
            $consultacarrera= mysql_query($querycarrera);
            
            if($row=  mysql_fetch_row($consultaalumno))
            {
            
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
                                        <input name="rut" type="text" id="rut" maxlength="9" value="<?php echo "$row[rut]-$row[verificador]"; ?>" onkeypress="return soloNumyk(event)" />
                                    </p>
                                    <p>
                                        <label for="nombre">Nombre: <br />
                                        </label>
                                        <input name="nombre" type="text" maxlength="20" onkeypress="return soloLetras(event)" value="<?php echo "$row[nombre]"; ?>" />
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
                                foreach($carreras as $seleccionaras)
                                {
                                    
                                }
                                ?>
                                <td><label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21047" id="CheckboxCarreras_0" checked="<?php if($consultacarrera["21047"][]) ?>" />
                                        Arquitectura</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21046" id="CheckboxCarreras_1" />
                                        Bachillerato en Ciencia de la Ingeniería</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21002" id="CheckboxCarreras_2" />
                                        Bibliotecología y Documentación</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21004" id="CheckboxCarreras_3" />
                                        Cartografía</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21012" id="CheckboxCarreras_4" />
                                        Contador Publico y Auditor</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21071" id="CheckboxCarreras_5" />
                                        Dibujante Proyectista</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21024" id="CheckboxCarreras_6" />
                                        Diseño Comunicacion Visual</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21023" id="CheckboxCarreras_7" />
                                        Diseño Industrial</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21041" id="CheckboxCarreras_8" />
                                        Ing. Civil en Computacion Mencion Informática</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21076" id="CheckboxCarreras_9" />
                                        Ing. Civil Industrial</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21074" id="CheckboxCarreras_10" />
                                        Ing Civil en Obras Civiles</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21048" id="CheckboxCarreras_11" />
                                        Ing. Comercial</label></td>
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21083" id="CheckboxCarreras_11" />
                                        Química Industrial</label></td>   
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21043" id="CheckboxCarreras_11" />
                                        Trabajo Social</label></td>
                                <td>
                                    <label>  
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21015" id="CheckboxCarreras_12" />
                                        Ing. Administracion Agroindustrial</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21073" id="CheckboxCarreras_13" />
                                        Ing. en Biotecnologia</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21081" id="CheckboxCarreras_14" />
                                        Ing. en Comercio Internacional</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21032" id="CheckboxCarreras_15" />
                                        Ing. en Construccion</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21075" id="CheckboxCarreras_16" />
                                        Ing. Civil en Electrónica</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21031" id="CheckboxCarreras_17" />
                                        Ing. en Geomensura</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21082" id="CheckboxCarreras_18" />
                                        Ing. en Gestion Turística</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21039" id="CheckboxCarreras_19" />
                                        ing industria alimentaria</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21038" id="CheckboxCarreras_20" />
                                        Ing. en Madera</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21030" id="CheckboxCarreras_21" />
                                        Ing. en Informática</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21037" id="CheckboxCarreras_22" />
                                        Ing. en Mecánica</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21042" id="CheckboxCarreras_23" />
                                        Ing. en Prevención de Riesgos y Medio Ambiente</label>
                                    <br />
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21080" id="CheckboxCarreras_24" />
                                        Ing. en Química</label>
                                    <br />                       
                                    <label>
                                        <input type="checkbox" name="CheckboxCarreras[]" value="21025" id="CheckboxCarreras_24" />
                                        Ing. en Transporte y Transito</label>
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

          </div>
     </div>
    <?php } } }?>
  </body>
</html>