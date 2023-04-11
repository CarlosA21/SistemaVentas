<?php

require_once "../models/product.model.php";

$arrayName = array(
    'nom_pro' => $_POST['nom_pro'] ,
    'des_pro' => $_POST['des_pro'],
    'cant_exi' => $_POST['cant_exi'] ,
    'pre_uni' => $_POST['pre_uni'],
    'ubi_alm' => $_POST['ubi_alm'],
    'cod_pro' => $_POST['cod_pro']
);
$resultado = Producto::actualizarDato($arrayName);

if ($resultado['success']) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false, "message" => $resultado['message']));
}