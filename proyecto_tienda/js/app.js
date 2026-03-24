// API (DOLAR)
fetch("https://api.exchangerate-api.com/v4/latest/USD")
.then(res => res.json())
.then(data => {
    document.getElementById("api").innerText =
    "USD a MXN: " + data.rates.MXN;
});


// PRODUCTOS
fetch("php/productos.php")
.then(res => res.json())
.then(data => {

    let contenedor = document.getElementById("contenedor");

    data.forEach(p => {
        contenedor.innerHTML += `
        <div class="col-md-4">
            <div class="card mb-4 shadow">
                <img src="img/${p.imagen}" style="height:250px; object-fit:cover;">
                <div class="card-body text-center">
                    <h5>${p.nombre}</h5>
                    <p>${p.descripcion}</p>
                    <p class="text-success">$${p.precio}</p>

                    <button class="btn btn-primary"
                    onclick="agregarCarrito(${p.id_producto}, '${p.nombre}', ${p.precio})">
                    Agregar
                    </button>
                </div>
            </div>
        </div>
        `;
    });

});


// CARRITO
function agregarCarrito(id, nombre, precio){

    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    let existe = carrito.find(p => p.id == id);

    if(existe){
        existe.cantidad++;
    } else {
        carrito.push({id, nombre, precio, cantidad:1});
    }

    localStorage.setItem("carrito", JSON.stringify(carrito));

    Swal.fire("Producto agregado 🛒");
}