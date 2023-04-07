const app = new (function(){
    this.tbody = document.getElementById("tbody");
    this.id = document.getElementById("id");
    this.nombre = document.getElementById("nombre");
    this.apellido = document.getElementById("apellido");
    this.email = document.getElementById("email");
    this.num_tel = document.getElementById("num_tel");
    this.direccion = document.getElementById("direccion");
    this.listado = () => {
        fetch("../../controllers/listado.php")
          .then((res) => res.json())
          .then((data) => {
            this.tbody.innerHTML = "";
            data.forEach((item) => {
              this.tbody.innerHTML += `
                <tr>
                  <td>${item.id}</td>
                  <td>${item.nombre}</td>
                  <td>${item.apellido}</td>
                  <td>${item.email}</td>
                  <td>${item.num_tel}</td>
                  <td>${item.direccion}</td>
                  <td>
                    <a href="javascript:;" class="btn btn-warning btn-sm" onclick="app.editar(${item.id})">Editar</a>
                    <a href="javascript:;" class="btn btn-danger btn-sm" onclick="app.eliminar(${item.id})">Eliminar</a>
                  </td>
                </tr>
              `;
            });
          })
          .catch((error) => console.log(error));
    };
    this.guardar = () => {
      var form = new FormData();
      form.append("nombre", this.nombre.value);
      form.append("apellido", this.apellido.value);
      form.append("email", this.email.value);
      form.append("num_tel", this.num_tel.value);
      form.append("direccion", this.direccion.value);
      form.append("id", this.id.value);
      fetch("../../controllers/guardar.php", {
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
        this.editar = (id) => {
          var form = new FormData();
          form.append("id", id);
          fetch("../../controllers/editar.php", {
            method: "POST",
            body: form,
          })
            .then((res) => JSON.stringify(res))
            .then((data) => {
              this.id.value = data.id;
              this.nombre.value = data.nombre;
              this.apellido.value = data.apellido;
              this.num_tel.value = data.num_tel;
              this.direccion.value = data.direccion;
            })
            .catch((error) => console.log(error));
        };    
    this.eliminar = (id) => {
      var form = new FormData();
      form.append("id", id);
      fetch("../../controllers/eliminar.php", {
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
      this.id.value = "";
      this.nombre.value = "";
      this.apellido.value = "";
      this.email.value = "";
      this.num_tel.value = "";
      this.direccion.value = "";
    }; 
    }

)();
app.listado();