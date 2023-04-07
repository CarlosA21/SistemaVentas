<?php
require_once "../models/clientmodel/persona.model.php";
echo json_encode(Persona::eliminarDato($_POST['id']));