<?php
require_once "../models/product.model.php";
 $arrayName = array('nom_pro' => $_POST['nombre'] ,
 'des_pro' => $_POST['des_pro'],
 'cant_exi' => $_POST['cant_exi'] ,
 'pre_uni' => $_POST['pre_uni'],
 'ubi_alm' => $_POST['ubi_alm']);

 echo json_encode(Producto::guardarDato($arrayName));