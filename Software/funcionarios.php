<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Formulario</title>
<LINK href='style.css' type=text/css rel=stylesheet>
<script type="text/javascript" src="validacion.js"></script>
</head>
<body>
<form name="menu">
<ul>
<a target="_self" href="linkeo 3"><span style="color: #ffffff;">Inicio</span></a>
<a class="separador"><span style="color: darkblue">||||||||||||||</span></a>
<a target="_self" href="principal.html"><span style="color: #ffffff;">Postulantes</span></a>
<a class="separador"><span style="color: darkblue;">||||||||||||||</span></a>
<a target="_self" href="funcionarios.php"><span style="color: #ffffff;">Funcionarios</span></a>
<a class="separador"><span style="color: darkblue;">||||||||||||||</span></a>
<a target="_self" href="Login.html"><span style="color: #ffffff;">cerrar sesion</span></a>
</ul>
</form>

<div id="contenido_interior">
<div id="contenido">
<h1>Planilla de Funcionarios</h1>
<p>
<p>&nbsp;</p>

<script type="text/javascript" src="validacion.js"></script>
<?php
 //aqui llamamos la coneccion de la db
$conexion = mysql_connect("localhost","software","software");
 mysql_select_db("base1", $conexion);

//aca dibujamos el encabezado de la grilla
echo "
<table><tr>
<th>Rut</th><th>Nombre Completo</th><th>Correo</th><th>Telefono</th></tr>
";

if(isset($_POST["Agregar"]))
{
	mysql_query("INSERT INTO FUNCIONARIO VALUES($_POST[Rut],'$_POST[Nombre]','$_POST[ApellidoPaterno]','$_POST[ApellidoMaterno]',$_POST[Telefono],'$_POST[Correo]','$_POST[Clave]','$_POST[Clase]')",$conexion);	
}

$consulta=mysql_query("SELECT * FROM FUNCIONARIO ", $conexion );

for($i=0;$i<mysql_num_rows($consulta);$i++)
{
	if(isset($_POST["button$i"]))
	{
		mysql_query("DELETE FROM FUNCIONARIO WHERE rut=".$_POST["rut$i"], $conexion );
	}elseif(isset($_POST["boton$i"]))
	{
		mysql_query("UPDATE FUNCIONARIO SET correo='".$_POST["correo$i"]."', fono=".$_POST["telefono$i"]." WHERE rut=".$_POST["rut$i"], $conexion);
		$consulta=mysql_query("SELECT * FROM FUNCIONARIO ", $conexion );
	}	
}




$contador=0;

while( $fila=mysql_fetch_array($consulta) ){

echo '<tr><form name="form1" method="post" action="index.php">
	  <td><input type="text" name="rut'.$contador.'" readonly="yes"" value="'.$fila["rut"].'" ></td>
	  <td><input type="text" readonly="yes" name="nombrecompleto'.$contador.'" value="'."$fila[nombre] $fila[apellidop] $fila[apellidom]".'"></td>
	  <td><input type="text" name="correo'.$contador.'" value="'.$fila["correo"].'"></td>
	  <td><input type="text" name="telefono'.$contador.'" value="'.$fila["fono"].'"></td>
	  <td><input type="submit" name="button'.$contador.'" value= "Eliminar" >
	  <input type="submit" name="boton'.$contador.'" value= "Modificar" ></td></form></tr></table>';
$contador++;
}


echo '<br>Agregar Nuevo Funcionario:
	  <table><tr><th>Rut</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Correo</th><th>Telefono</th><th>Clave</th><th>Cargo</th></tr>
	  <tr><form name="form1" method="post" action="index.php" onSubmit="javascript:return Rut(document.form1.Rut.value)">
	  <td><input type="text" name="Rut" maxlength="12" onkeypress="return soloNumyk(event)"></td>
	  <td><input type="text" name="Nombre" maxlength="20" onkeypress="return soloLetras(event)"></td>
	  <td><input type="text" name="ApellidoPaterno" maxlength="10" onkeypress="return soloLetras(event)" ></td>
	  <td><input type="text" name="ApellidoMaterno"  maxlength="10" onkeypress="return soloLetras(event)" ></td>
	  <td><input type="text" name="Correo" maxlength="30" ></td>
	  <td><input type="text" name="Telefono"  maxlength="10"  onkeypress="return soloNumyk(event)"></td>
	  <td><input type="password" name="Clave"  maxlength="10" ></td>
	  <td><select name=Clase><option value="J">Jefe</option><option value="E">Expositor</option></select></td> 
	  <td><input type="submit" name="Agregar" value="Guardar" ></td></form></tr>';
echo "</table>"
?> 
</div>
     </div>
  </body>
</html>
