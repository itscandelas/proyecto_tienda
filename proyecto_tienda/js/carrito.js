let carrito = JSON.parse(localStorage.getItem("carrito")) || [];

function mostrarCarrito(){

    let tabla = document.getElementById("tabla");
    tabla.innerHTML = "";

    let total = 0;

    carrito.forEach((p, i) => {

        let sub = p.precio * p.cantidad;
        total += sub;

        tabla.innerHTML += `
        <tr>
            <td>${p.nombre}</td>
            <td>$${p.precio}</td>
            <td>
                <button onclick="cambiar(${i}, -1)">-</button>
                ${p.cantidad}
                <button onclick="cambiar(${i}, 1)">+</button>
            </td>
            <td>$${sub}</td>
            <td>
                <button class="btn btn-danger" onclick="eliminar(${i})">X</button>
            </td>
        </tr>
        `;
    });

    document.getElementById("total").innerText = "Total: $" + total;
}

function cambiar(i, c){
    carrito[i].cantidad += c;

    if(carrito[i].cantidad <= 0){
        carrito.splice(i,1);
    }

    localStorage.setItem("carrito", JSON.stringify(carrito));
    mostrarCarrito();
}

function eliminar(i){
    Swal.fire({
        title: "¿Eliminar?",
        icon: "warning",
        showCancelButton: true
    }).then(res => {
        if(res.isConfirmed){
            carrito.splice(i,1);
            localStorage.setItem("carrito", JSON.stringify(carrito));
            mostrarCarrito();
        }
    });
}

function comprar(){

    if(carrito.length == 0){
        Swal.fire("Carrito vacío");
        return;
    }

    fetch("php/compra.php", {
        method: "POST",
        body: JSON.stringify(carrito)
    })
    .then(() => {
        Swal.fire("Compra realizada 🎉");
        localStorage.removeItem("carrito");
        location.reload();
    });
}

mostrarCarrito();