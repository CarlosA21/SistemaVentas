<?php
// Conexión a la base de datos
$conn = pg_connect("host=localhost dbname=crudphp user=postgres password=123456");

// Consulta SQL para obtener los valores de la tabla
$query = "SELECT id FROM public.clientes";
$result = pg_query($conn, $query);

// Generar HTML para el ComboBox
echo "<select name='colores'>";
while ($row = pg_fetch_assoc($result)) {
  echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
}
echo "</select>";
?>