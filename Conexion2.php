<?php
    $host="localhost";
    $user="root";
    $pw="map001358";
    
    if(!empty($_POST['rut']) )
    {
        
        $con=  mysql_connect($host, $user, $pw) or die ("Error al conectar a Host");
        mysql_select_db("base1",$con) or die ("Error al conectar con base de datos");
        
        $querry=  mysql_query("SELECT * FROM FUNCIONARIO WHERE rut=$_POST[rut] AND clave='$_POST[pass]'",$con) or die ("El usuario no existe");
        
        if($row=mysql_fetch_array($querry))
     
                echo "Bienvenido $row[nombre] $row[apellidop]";
        else
                echo "Contraseña Erronea";
    }

?>
