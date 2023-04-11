const botonEnviar = document.getElementById('enviar-datos');
botonEnviar.addEventListener('click', () => {
  const tabla = document.getElementById('tabla-dialogo');
  const filas = tabla.getElementsByTagName('tr');
  const datos = [];

  for (let i = 0; i < filas.length; i++) {
    const celdas = filas[i].getElementsByTagName('td');
    const fila = [];
    for (let j = 0; j < celdas.length; j++) {
      fila.push(celdas[j].textContent);
    }
    datos.push(fila);
  }

  const url = 'pb.php';
  const opciones = {
    method: 'POST',
    body: JSON.stringify(datos)
  };

  fetch(url, opciones)
    .then(response => {
      if (!response.ok) {
        throw new Error('Ocurrió un error al enviar los datos');
      }
      return response.text();
    })
    .then(texto => {
      console.log(texto);
    })
    .catch(error => {
      console.error(error);
    });
});
var nombre = respuestaPhp.nombre; // aquí asumimos que la respuesta del archivo PHP está almacenada en la variable 'respuestaPhp'
document.getElementById('lbl-nombre').innerHTML = nombre;
