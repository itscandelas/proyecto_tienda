document.getElementById("formProducto").addEventListener("submit", e => {
    e.preventDefault();

    let formData = new FormData();

    formData.append("nombre", nombre.value);
    formData.append("descripcion", descripcion.value);
    formData.append("precio", precio.value);
    formData.append("stock", stock.value);
    formData.append("imagen", imagen.files[0]);

    fetch("php/agregar_producto.php", {
        method: "POST",
        body: formData
    })
    .then(() => {
        Swal.fire("Producto agregado");
        formProducto.reset();
        cargarProductos();
    });
});

function cargarProductos(){
    fetch("php/productos.php")
    .then(res => res.json())
    .then(data => {

        let tabla = document.getElementById("tablaProductos");
        tabla.innerHTML = "";

        data.forEach(p => {
            tabla.innerHTML += `
            <tr>
                <td>${p.nombre}</td>
                <td>$${p.precio}</td>
                <td>${p.stock}</td>
                <td>
                    <button class="btn btn-danger"
                    onclick="eliminar(${p.id_producto})">Eliminar</button>
                </td>
            </tr>
            `;
        });
    });
}

function eliminar(id){
    Swal.fire({
        title: "¿Eliminar producto?",
        icon: "warning",
        showCancelButton: true
    }).then(res => {
        if(res.isConfirmed){
            fetch("php/eliminar_producto.php?id="+id)
            .then(() => {
                Swal.fire("Eliminado");
                cargarProductos();
            });
        }
    });
}

function cargarCompras(){
    fetch("php/compras.php")
    .then(res => res.json())
    .then(data => {

        let tabla = document.getElementById("tablaCompras");
        tabla.innerHTML = "";

        data.forEach(c => {
            tabla.innerHTML += `
            <tr>
                <td>${c.id_compra}</td>
                <td>${c.nombre}</td>
                <td>${c.fecha}</td>
            </tr>
            `;
        });
    });
}

cargarProductos();
cargarCompras();