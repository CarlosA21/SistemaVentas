<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $datos = json_decode(file_get_contents('php://input'), true);
  var_dump($datos);
}
?>