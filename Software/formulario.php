<?php
if(!issert($_POST["enviar"] || empty($_POST["rut"])))
{
?>
<form method="POST" action="?">
   Ingresa tu RUT
   <input type="text" name="rut"/>
   <input type="submit" name="enviar" value="Seguir">
</form>
<?php
}  else    
{
    formulario($_POST["rut"]);
}

?>
