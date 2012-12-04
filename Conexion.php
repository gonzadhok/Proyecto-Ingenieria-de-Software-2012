<?php
    
    $host="localhost";
    $user="root";
    $pw="map001358";
    
    //funcion 1
    
    $b=true;
        
    $campos=array(1=>"Nombre","Rut","Comuna","Colegio","Curso","mail","telefono");
    
    for($i=1;$i<=7;$i++)
    {
        if(empty($_POST['textfield'.$i])  )    
        {
            echo 'Falta llenar campo '.$campos[$i]."  $i<br>";
            $b=false;
        }
    }
    
    
   
    if($b)
    {
        $con=  mysql_connect($host, $user,$pw) or die ("Error al conectar a Host");
        mysql_select_db("base1",$con) or die ("Error al conectar con base de datos");
        
        $consulta="INSERT INTO ALUMNO VALUES($_POST[textfield2],'$_POST[textfield1]','$_POST[textfield8]','$_POST[textfield16]',$_POST[textfield5],'$_POST[textfield4]',"
            ."'$_POST[textfield3]',$_POST[textfield7],'$_POST[textfield6]',NOW())";
        mysql_query($consulta, $con) or die ("El postulante ya esta ingresado en los registros");
        
        $array=$_POST['CheckboxCarreras'];
    
        foreach($array as $selected)
        {
            $consulta="INSERT INTO ALUMNO_CARRERA VALUES ($_POST[textfield2],$selected)";
            mysql_query($consulta, $con);
         }
        
         echo "Datos Guardados correctamente";
     }
    
?>