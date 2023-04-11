//"../../controllers/listadoProd.php"
const app = new (function(){
    this.tbody = document.getElementById("tbody");
    this.cod_pro = document.getElementById("cod_pro");
    this.nom_pro = document.getElementById("nom_pro");
    this.des_pro = document.getElementById("des_pro");
    this.cant_exi = document.getElementById("cant_exi");
    this.pre_uni = document.getElementById("pre_uni");
    this.ubi_alm = document.getElementById("ubi_alm");
    this.listado = () => {
      fetch("../../controllers/listadoProd.php")
        .then((res) => res.json())
        .then((data) => {
          this.tbody.innerHTML = "";
          data.forEach((item) => {
            this.tbody.innerHTML += `
            <tr>
            <td>${item.cod_pro}</td>
            <td>${item.nom_pro}</td>
            <td>${item.des_pro}</td>
            <td>${item.cant_exi}</td>
            <td>${item.pre_uni}</td>
            <td>${item.ubi_alm}</td>
            <td>
              <a href="javascript:;" class="btn btn-warning btn-sm" onclick="app.editar(${item.cod_pro})">Editar</a>
              <a href="javascript:;" class="btn btn-danger btn-sm" onclick="app.eliminar(${item.cod_pro})">Eliminar</a>
            </td>
          </tr>
        `;
          });
        })
        .catch((error) => console.log(error));
  };
    
    this.guardar = () => {
      var form = new FormData();
      form.append("nom_pro", this.nom_pro.value);
      form.append("des_pro", this.des_pro.value);
      form.append("cant_exi", this.cant_exi.value);
      form.append("pre_uni", this.pre_uni.value);
      form.append("ubi_alm", this.ubi_alm.value);
      form.append("cod_pro", this.cod_pro.value);
      if (this.cod_pro.value === "") {
      fetch("../../controllers/guardarProd.php", {
          method: "POST",
          body: form,
      })
          .then((res) => JSON.stringify(res))
          .then((data) => {
              alert("Creado con exito");
              this.listado();
              this.limpiar();
          })
          .catch((error) => console.log(error));
          
       }
       else {
        fetch("../../controllers/actualizarProd.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams(form),
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data.success) {
              alert("Actualizado con éxito");
              this.listado();
              this.limpiar();
            } else {
              alert(data.message);
            }
          })
          .catch((error) => {
            console.log(error);
            alert("Error al actualizar el producto");
          });
      }
      };  
      this.editar = (cod_pro) => {
        var form = new FormData();
        form.append("cod_pro", cod_pro);
        fetch("../../controllers/editarProd.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: new URLSearchParams(form)
        })
        .then((res) => res.json())
        .then((data) => {
              console.log(data);
              this.cod_pro.value = data.cod_pro;
              this.nom_pro.value = data.nom_pro;
              this.des_pro.value = data.des_pro;
              this.cant_exi.value = data.cant_exi;
              this.pre_uni.value = data.pre_uni;
              this.ubi_alm.value = data.ubi_alm;
            })
            .catch((error) => console.log(error));
        };    
    this.eliminar = (cod_pro) => {
      var form = new FormData();
      form.append("cod_pro", cod_pro);
      fetch("../../controllers/eliminarProd.php", {
        method: "POST",
        body: form,
      })
        .then((res) => JSON.stringify(res))
        .then((data) => {
          alert("Eliminado con exito");
          this.listado();
        })
        .catch((error) => console.log(error));
    };  
    this.limpiar = () => {
      this.cod_pro.value = "";
      this.nom_pro.value = "";
      this.des_pro.value = "";
      this.cant_exi.value = "";
      this.pre_uni.value = "";
      this.ubi_alm.value = "";
    }; 
  }

)();
app.listado();
/*

*/