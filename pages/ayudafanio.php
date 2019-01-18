<?php
$path = "/ayuda/fanio.pdf";
header("Content-type: application/octet-stream");
header('Content-Disposition: attachment; filename="' . basename($path) . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($path));
readfile($path);
?>