<?php
header('Content-Type: application/json; charset=utf-8');

require_once "../models/product.model.php";
echo json_encode(Producto::eliminarDato($_POST['cod_pro']));