<?php
require_once "Classes/PHPExcel.php";
require_once "Classes/PHPExcel/Writer/Excel2007.php";
$info=explode(",", $_GET["info"]);
$conexion = mysql_connect("localhost","software","software");
mysql_select_db("base1", $conexion);
foreach ($info as $check) {
    $consulta = "SELECT a.* FROM ALUMNO a,ALUMNO_CARRERA ac WHERE ac.codigo='$check' AND ac.rut=a.rut";
    $query1 = mysql_query($consulta, $conexion);
    $contador = 3;

    $objPHPExcel = new PHPExcel();


    $objPHPExcel->getProperties()->setCreator("UTEM DIFUSION");
    $objPHPExcel->getProperties()->setLastModifiedBy("UTEM DIFUSION");
    $objPHPExcel->getProperties()->setTitle("Postulantes carrera: $check");
    $objPHPExcel->getProperties()->setSubject("Postulantes carrera: $check");
    $objPHPExcel->getProperties()->setDescription("Datos de Postulantes a $check");


    $objPHPExcel->setActiveSheetIndex(0);



    $objPHPExcel->getActiveSheet()->SetCellValue("B2", "Rut");
    $objPHPExcel->getActiveSheet()->SetCellValue("C2", "Nombre");
    $objPHPExcel->getActiveSheet()->SetCellValue("D2", "Apellido Paterno");
    $objPHPExcel->getActiveSheet()->SetCellValue("E2", "Apellido Materno");
    $objPHPExcel->getActiveSheet()->SetCellValue("F2", "Correo");
    $objPHPExcel->getActiveSheet()->SetCellValue("G2", "Telefono");
    $objPHPExcel->getActiveSheet()->SetCellValue("H2", "Colegio");
    $objPHPExcel->getActiveSheet()->SetCellValue("I2", "Curso");



    while ($row = mysql_fetch_array($query1)) {
        $objPHPExcel->getActiveSheet()->SetCellValue("B$contador", "$row[rut]");
        $objPHPExcel->getActiveSheet()->SetCellValue("C$contador", "$row[nombre]");
        $objPHPExcel->getActiveSheet()->SetCellValue("D$contador", "$row[apellidop]");
        $objPHPExcel->getActiveSheet()->SetCellValue("E$contador", "$row[apellidom]");
        $objPHPExcel->getActiveSheet()->SetCellValue("F$contador", "$row[correo]");
        $objPHPExcel->getActiveSheet()->SetCellValue("G$contador", "$row[fono]");
        $objPHPExcel->getActiveSheet()->SetCellValue("H$contador", "$row[colegio]");
        $objPHPExcel->getActiveSheet()->SetCellValue("I$contador", "$row[curso] Medio");
        $contador++;
    }

    $objPHPExcel->getActiveSheet()->setTitle("Postulantes a");
    $objPHPExcel->getSecurity()->setLockWindows(true);
    $objPHPExcel->getSecurity()->setLockStructure(true);



    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $check . '.xlsx"');
    header('Cache-Control: max-age=0');
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    unset($objPHPExcel);
}
?>