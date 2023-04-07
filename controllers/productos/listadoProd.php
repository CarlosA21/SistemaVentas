<?php
require_once "../models/product.model.php";
echo json_encode(Producto::mostrarDatos());