<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Producto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center p-5">
        <div class="col-sm-6">
          <h5>Agregar productos</h5>
          <hr />
          <form action="javascript:void(0);" onsubmit="app.guardar()">
            <input type="hidden" id="id" />
            <label for="nombre_producto">Nombre Producto</label>
            <input
              type="text"
              class="form-control"
              id="nom_pro"
              placeholder="Nombre del producto"
              autofocus
              required
            />
            <label for="descripcion_producto">descripcion producto</label>
            <input
              type="text"
              class="form-control"
              id="des_pro"
              placeholder="Descripcion del producto"
              autofocus
              required
            />
            <label for="Cantidad_existente">Cantidad existente</label>
            <input
              type="numero"
              class="form-control"
              id="cant_exi"
              placeholder="1"
              min="1"
              required
            />
            <label for="precio_unidad">Precio unidad</label>
            <input
              type="numero"
              class="form-control"
              id="pre_uni"
              placeholder="18"
              min="18"
              max="99"
              required
            />
            <label for="Ubicacion_almacen">Ubicacion almacen</label>
            <input
              type="text"
              class="form-control"
              id="ubi_alm"
              placeholder="Ubicacion almacen"
              autofocus
              required
            />
            <br />
            <div>
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
          </form>
          <br />
          <h5>Listado</h5>
          <hr />
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre producto</th>
                <th>Descripcion del producto</th>
                <th>Cantidad existente</th>
                <th>Precio unidad</th>
                <th>Ubicacion almacen</th>
                <th>Opciones</th>
              </tr>
            </thead>
            <tbody id="tbody"></tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../../assets/code-product.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>