<?php
    
    include "Funciones.php";
    
    if(!empty($_POST['rut']) && !validarrut($_POST["rut"],$_POST["digitoverificador"]))
    {
        
        $con=conectar();
        $usuario=$_POST["rut"];
        $password=$_POST["contraseña"];
        
        //sentencias para evitar SQLINJECTION
        $usuario=stripslashes($usuario);
        $password=stripslashes($password);
        
        $usuario=mysql_real_escape_string($usuario);
        $password=mysql_real_escape_string($password);
        
        $querry=  mysql_query("SELECT * FROM FUNCIONARIO WHERE rut=$usuario AND"," clave='$password'",$con) or die ("El usuario no existe");
        
        if(mysql_num_rows($querry)==1)
        {
            session_register("rut");
            session_register("contraseña");
            header("Location: Formulario.html ");
        }
        else
            echo "Contraseña Erronea";
    }

?>
