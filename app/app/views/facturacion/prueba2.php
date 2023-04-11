<?php
// Conexión a la base de datos
$conn = pg_connect("host=localhost dbname=crudphp user=postgres password=123456");

// Consulta SQL para obtener los valores de la tabla
$query = "SELECT id FROM public.clientes";
$result = pg_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <h3>seleccionar cliente</h3>
    <select name="id_cliente">
    <?php while ($row = pg_fetch_assoc($result)): ?>
      <option value="<?php echo $row['id']; ?>">
        <?php echo $row['id']; ?>
      </option>
    <?php endwhile; ?>
    </select>

  <?php
    // Cerrar la conexión a la base de datos
    pg_close($conn);
    ?>
    </div>
 <div id="productos">
    <label for="buscarProd">buscarProd</label>
    <button type="submit" id="btnAceptar" onclick="app.showDialog()">Buscar productos</button>
 </div>


</body>
</html>