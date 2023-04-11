<?php
// Conexión a la base de datos
$conn = pg_connect("host=localhost dbname=crudphp user=postgres password=123456");

// Consulta SQL para obtener los valores de la tabla
$query = "SELECT id FROM public.clientes ORDER BY id ASC ";
$result = pg_query($conn, $query);
?>


<!doctype html>
<html lang="en">

<head>
  <title>Facturacion</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
	integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
	
</head>
<body>
  <header>
	<h2>Modulo facturacion</h2>
  </header>
  <main>
    <div>
    <label for="">Seleccionar cliente</label>
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
 <div id="container mb-3 mt-3">
    <button type="submit" id="btn-abrir-modal">Buscar productos</button>
    <dialog id="modal"> 
      <h2>Selecciona un producto</h2>
      <input type="text" id="buscador" placeholder="Buscar cliente...">
      <table id="tablapro" class="table table-stripped" >
        <thead>
            <tr>
                <th>Codigo producto</th>
                <th>Nombre</th>
                <th>Precio unidad</th>
                <th>Opciones</th>
            </tr>
        </thead>
            <tbody id="producto">
            <tr>
                <td >Agregar</td>
            </tr>
            </tbody>
        </table>
      <button id="btn-cerrar-modal">Cerrar</button>
  </dialog>
 </div>
 <div>
 <div class="container mb-1">
      <label for="" >Codigo producto</label>
      <input type="text" name="" id="txtCodpro">
  </div>
  <div class="container mb-1">
    <label for="" class="form-label" >Producto</label>
    <input type="text" name="" id="txtName">
  </div>
  <div class="container mb-1">
      <label for="" >cantidad</label>
      <input type="text" name="" id="txtCantidad">
  </div>
    <div class="container mb-1">
      <label for="" >Precio $</label>
      <input type="text" name="" id="txtPrecio">
    </div>

    </div>
  <button id="" class="btn btn-success">Agregar a factura</button>
	<h2>Factura</h2>
	<table id="tabla-facturacion" class="table table-stripped" >
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio unitario</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3">Total:</td>
        <td id="total"></td>
      </tr>
    </tfoot>
  </table>
	<h4>ITBIS</h4>
	<h4>Propina </h4>
  
  </main>


  <footer>
	<!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="../../assets/code-fact.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
	integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
	integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>