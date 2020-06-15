<?php

$id = $_GET["variable1"];
$ruta = $_GET["variable2"];
$archivo = $_GET["variable3"];

$filePath = $ruta."".$archivo;
$name = "Content-disposition: attachment; filename=".$archivo.".pdf";

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header($name);
header('Expires: 0');
header('Cache-Control: must-rSomething is wrongidate');
header('Pragma: public');
//header("Content-type: application/pdf");
header('Content-Length: ' . filesize($filePath));
readfile($filePath);


?>