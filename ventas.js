var carro = [];
var spTotal = document.getElementById("total");
var listaCarro = document.getElementById("carrito");

document.addEventListener("DOMContentLoaded", function() {
    // Aquí puedes hacer cualquier inicialización si es necesario
});

function agregarCarro(id, nombre, precio, cantidad) {
    var productoEncontrado = carro.find(p => p.id === id);
    
    if (productoEncontrado) {
        productoEncontrado.cantidad += cantidad;
    } else {
        var objProducto = {
            id: id,
            nombre: nombre,
            precio: precio,
            cantidad: cantidad
        };
        carro.push(objProducto);
    }
    
    calcularTotal();
    mostrarEnCarro();
}

function calcularTotal() {
    var elTotal = 0;
    for (var p of carro) {
        elTotal += p.precio * p.cantidad;
    }
    spTotal.textContent = elTotal.toFixed(2); // Mostrar el total con 2 decimales
}

function mostrarEnCarro() {
    listaCarro.innerHTML = "";
    for (var objP of carro) {
        var nodoProductoEnCarro = document.createElement("li");
        nodoProductoEnCarro.classList.add("list-group-item", "text-right", "mx-2");
        nodoProductoEnCarro.textContent = objP.nombre + " - $" + objP.precio.toFixed(2) + " x " + objP.cantidad;
        
        // Crear botón de eliminar
        var elBoton = document.createElement('button');
        elBoton.classList.add('btn', 'btn-danger', 'mx-2');
        elBoton.textContent = 'Eliminar';
        elBoton.setAttribute('data-id', objP.id);
        elBoton.addEventListener('click', borrarProductoEnCarro);
        nodoProductoEnCarro.appendChild(elBoton);
        
        listaCarro.appendChild(nodoProductoEnCarro);
    }
}

function borrarProductoEnCarro() {
    var idProducto = parseInt(this.getAttribute('data-id'));
    carro = carro.filter(p => p.id !== idProducto); // Eliminar producto del carrito
    calcularTotal();
    mostrarEnCarro();
}