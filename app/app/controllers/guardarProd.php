<?php
header('Content-Type: application/json; charset=utf-8');

require_once "../models/product.model.php";
 $arrayName = array('nom_pro' => $_POST['nom_pro'] ,
 'des_pro' => $_POST['des_pro'],
 'cant_exi' => $_POST['cant_exi'] ,
 'pre_uni' => $_POST['pre_uni'],
 'ubi_alm' => $_POST['ubi_alm']);

 echo json_encode(Producto::guardarDato($arrayName));