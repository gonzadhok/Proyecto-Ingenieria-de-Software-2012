<?php

$host = "localhost";
$user = "software";
$pw = "software";

function mensajedeerror()
{
?>
    <script languaje="Javascript">
        showDialog('Error','Usuario y/o Contraseña mal ingresados','error',2);
  </script>
<?php
}

function buscarAlumno($rut,$conexion)
{
    $resultado=mysql_query("SELECT * FROM ALUMNO WHERE rut=$rut",$conexion);
    if(mysql_num_rows($resultado)>0)
        return true;
    else 
        return false;
        
}


function validarrut($rut,$digito)
 {
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

?>
