const input = document.querySelector('#buscador');
input.addEventListener('keyup', actualizarTabla);

function actualizarTabla() {
  const valorBusqueda = this.value.toLowerCase().trim();

  const filas = document.querySelectorAll('#tabla tbody tr');

  filas.forEach(fila => {
    const nombre = fila.querySelector('td:nth-child(2)').textContent.toLowerCase();
    const apellido = fila.querySelector('td:nth-child(3)').textContent.toLowerCase();
    const email = fila.querySelector('td:nth-child(4)').textContent.toLowerCase();
    const telefono = fila.querySelector('td:nth-child(5)').textContent.toLowerCase();
    const direccion = fila.querySelector('td:nth-child(6)').textContent.toLowerCase();

    const coincide = nombre.includes(valorBusqueda) || apellido.includes(valorBusqueda) || email.includes(valorBusqueda) || telefono.includes(valorBusqueda) || direccion.includes(valorBusqueda);

    fila.style.display = coincide ? 'table-row' : 'none';
  });
}
document.addEventListener('DOMContentLoaded', () => {
  actualizarTabla();
});