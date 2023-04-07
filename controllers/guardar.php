<?php
require_once "../models/persona.model.php";
 $arrayName = array('nombre' => $_POST['nombre'] ,
 'apellido' => $_POST['apellido'],
 'email' => $_POST['email'] ,
 'num_tel' => $_POST['num_tel'],
 'direccion' => $_POST['direccion']);

 echo json_encode(Persona::guardarDato($arrayName));