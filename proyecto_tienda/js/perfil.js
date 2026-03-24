// CARGAR DATOS DEL USUARIO
fetch("php/usuario.php")
.then(res => res.json())
.then(data => {

    document.getElementById("datosUsuario").innerHTML = `
        <div class="alert alert-info">
            <strong>Nombre:</strong> ${data.nombre} <br>
            <strong>Correo:</strong> ${data.correo}
        </div>
    `;
});


// CARGAR COMPRAS
fetch("php/mis_compras.php")
.then(res => res.json())
.then(data => {

    let tabla = document.getElementById("tablaCompras");

    data.forEach(c => {

        tabla.innerHTML += `
        <tr>
            <td>${c.id_compra}</td>
            <td>${c.producto}</td>
            <td>${c.cantidad}</td>
            <td>$${c.subtotal}</td>
            <td>${c.fecha}</td>
        </tr>
        `;
    });
});