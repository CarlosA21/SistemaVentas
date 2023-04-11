const btnAbrirModal = document.querySelector("#btn-abrir-modal");
const btncerrarmodal = document.querySelector("#btn-cerrar-modal");
const modal = document.querySelector("#modal");

btnAbrirModal.addEventListener("click", ()=>{
  modal.showModal();
});

btncerrarmodal.addEventListener("click",()=>{
  modal.close();
})

const app = new function(){
    //productos
    this.tbodyprod = document.getElementById("producto");
    this.cod_pro = document.getElementById("cod_pro");
    this.nom_pro = document.getElementById("nom_pro");
    this.pre_uni = document.getElementById("pre_uni");
    this.listadoProd = () =>{
        fetch("../../controllers/listadoFac.php")
          .then((res) => res.json())
          .then((data) => {
            this.tbodyprod.innerHTML = "";
            data.forEach((item) => {
              this.tbodyprod.innerHTML += `
              <tr>
              <td>${item.cod_pro}</td>
              <td>${item.nom_pro}</td>
              <td>${item.pre_uni}</td>
              <td>
                <a href="javascript:;" class="btn btn-success " onclick="app.agregardatos()">Agregar</a>
              </td>
            </tr>
              `;
            });
          })
          .catch((error) => console.log(error));
    }
  // Función para agregar datos a la tabla de facturación
  this.agregardatos = () => {
    
    const selectRowButtons = document.querySelectorAll('.select-row');

    selectRowButtons.forEach(button => {
    button.addEventListener('click', () => {
    const row = button.parentNode.parentNode;
    const codpro = row.cells[0].textContent;
    const nomPro = row.cells[1].textContent;
    const precio = row.cells[2].textContent;

    document.getElementById('txtCodpro').value = codpro;
    document.getElementById('txtName').value = nomPro;
    document.getElementById('txtPrecio').value = precio;

      });
    });
}
  
}

app.listadoProd();