<?php
    
    include "Funciones.php";
    
    if(!empty($_POST['rut']) && validarrut($_POST["rut"],$_POST["digitoverificador"]))
    {
        //conexion con base de datos
        $conexion = mysql_connect($host, $user, $pw);
        mysql_select_db("base1", $conexion);
        //sentencias para evitar SQLINJECTION
        $usuario=$_POST["rut"];
        $password=$_POST["contraseña"];
        $usuario=stripslashes($usuario);
        $password=stripslashes($password);
                
        $usuario=mysql_real_escape_string($usuario);
        $password=mysql_real_escape_string($password);
        
        
        //consulta a base de datos
        $querry="SELECT * FROM FUNCIONARIO WHERE rut=$usuario AND clave='$password'";
        $resultado=mysql_query($querry,$conexion);
        echo  mysql_num_rows($resultado);
        if(mysql_num_rows($resultado)==1)
        {
            header("Location: principal.html");

        }
        else
       {
            mensajedeerror();
            header("Location: Login.html");
            
       }
    }else
    {
        mensajedeerror();
        header("Location: Login.html");
        
    }

?>
