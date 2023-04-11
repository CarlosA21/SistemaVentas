// Obtener los elementos del DOM
var buscador = document.getElementById("buscador");
var lista = document.getElementById("lista");
var resultados = document.getElementById("resultados");

// Crear un arreglo de objetos con los datos a buscar
var datos = [
    { nombre: "Juan", apellido: "Pérez", email: "juan.perez@example.com", telefono: "555-1234", direccion: "Calle 123, Ciudad" },
    { nombre: "María", apellido: "González", email: "maria.gonzalez@example.com", telefono: "555-5678", direccion: "Avenida 456, Ciudad" },
    { nombre: "Pedro", apellido: "López", email: "pedro.lopez@example.com", telefono: "555-9012", direccion: "Calle 789, Ciudad" },
    { nombre: "Ana", apellido: "Ramírez", email: "ana.ramirez@example.com", telefono: "555-3456", direccion: "Avenida 012, Ciudad" },
    { nombre: "Jorge", apellido: "Hernández", email: "jorge.hernandez@example.com", telefono: "555-7890", direccion: "Calle 345, Ciudad" },
    { nombre: "Carla", apellido: "Martínez", email: "carla.martinez@example.com", telefono: "555-2345", direccion: "Avenida 678, Ciudad" },
    { nombre: "Miguel", apellido: "Sánchez", email: "miguel.sanchez@example.com", telefono: "555-6789", direccion: "Calle 901, Ciudad" },
    { nombre: "Lucía", apellido: "Fernández", email: "lucia.fernandez@example.com", telefono: "555-1234", direccion: "Avenida 234, Ciudad" },
    { nombre: "Pablo", apellido: "García", email: "pablo.garcia@example.com", telefono: "555-5678", direccion: "Calle 567, Ciudad" },
    { nombre: "Elena", apellido: "Martín", email: "elena.martin@example.com", telefono: "555-9012", direccion: "Avenida 890, Ciudad" }
  ];

// Crear una función para buscar los datos
function buscarDatos(texto) {
  // Limpiar la lista de resultados
  lista.innerHTML = "";

  // Filtrar los datos que coinciden con el texto buscado
  var coincidencias = datos.filter(function(dato) {
    return dato.nombre.toLowerCase().indexOf(texto.toLowerCase()) !== -1;
  });

  // Crear un elemento de lista para cada coincidencia
  coincidencias.forEach(function(coincidencia) {
    var itemLista = document.createElement("div");
    itemLista.innerHTML = coincidencia.nombre + " " + coincidencia.apellido;
    itemLista.addEventListener("click", function() {
      // Al hacer clic en una coincidencia, completar los campos de la tabla
      var nuevaFila = resultados.insertRow();
      nuevaFila.insertCell().innerHTML = coincidencia.nombre;
      nuevaFila.insertCell().innerHTML = coincidencia.apellido;
      nuevaFila.insertCell().innerHTML = coincidencia.email;
      nuevaFila.insertCell().innerHTML = coincidencia.telefono;
      nuevaFila.insertCell().innerHTML = coincidencia.direccion;

      // Limpiar el buscador y la lista de resultados
      buscador.value = "";
      lista.innerHTML = "";
    });
    lista.appendChild(itemLista);
  });
}

// Agregar un controlador de eventos para el input de búsqueda
buscador.addEventListener("input", function() {
  // Si el texto tiene menos de tres caracteres, no buscar
  if (buscador.value.length < 3) {
    lista.innerHTML = "";
    return;
  }

 // Buscar los datos
  buscarDatos(buscador.value);
  function agregarFilaTabla(nombre, apellido, email, telefono, direccion) {
  var tabla = document.getElementById("tabla-resultados");
  var fila = tabla.insertRow();
  var celdaNombre = fila.insertCell(0);
  var celdaApellido = fila.insertCell(1);
  var celdaEmail = fila.insertCell(2);
  var celdaTelefono = fila.insertCell(3);
  var celdaDireccion = fila.insertCell(4);

  celdaNombre.innerHTML = nombre;
  celdaApellido.innerHTML = apellido;
  celdaEmail.innerHTML = email;
  celdaTelefono.innerHTML = telefono;
  celdaDireccion.innerHTML = direccion;
}});

function seleccionarItem(item) {
  // Llenar los campos con los datos del item seleccionado
  document.getElementById("nombre").value = item.nombre;
  document.getElementById("apellido").value = item.apellido;
  document.getElementById("email").value = item.email;
  document.getElementById("telefono").value = item.telefono;
  document.getElementById("direccion").value = item.direccion;

  // Agregar una fila a la tabla con los datos del item seleccionado
  agregarFilaTabla(item.nombre, item.apellido, item.email, item.telefono, item.direccion);
}