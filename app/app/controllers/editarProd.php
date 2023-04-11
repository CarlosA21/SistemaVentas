<?php
require_once "../models/product.model.php";
echo json_encode(Producto::obtenerDatoId($_POST['cod_pro']));