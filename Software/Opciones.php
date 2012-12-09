<?php
    switch($_POST["accion"])
    {
        case "1":
            header("Location: MostrarPostulante.php");
            break;
        case "2":
            header("Location: formulario.html");
            break;
        case "3":
            header("Location: formulario.php");
            break;
    }
?>
