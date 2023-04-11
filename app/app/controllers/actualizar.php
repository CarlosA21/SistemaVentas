<?php
require_once "../models/persona.model.php";

$arrayName = array(
    'id' => $_POST['id'],
    'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'email' => $_POST['email'],
    'num_tel' => $_POST['num_tel'],
    'direccion' => $_POST['direccion']
);

$resultado = Persona::actualizarDato($arrayName);

if ($resultado) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => "No se pudo actualizar el dato"));
}
?>