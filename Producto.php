<?php
class Producto {
    private $id;
    private $nombre;
    private $cantidad;
    private $precio;
    private $ruta_producto;

    public function __construct($id, $nombre, $cantidad, $precio, $ruta_producto) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->ruta_producto = $ruta_producto;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getRuta_producto() {
        return $this->ruta_producto;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setRuta_producto($ruta_producto) {
        $this->ruta_producto = $ruta_producto;
    }

    public function mostrarProducto() {
        return "Producto: $this->id, $this->nombre, Precio: $this->precio, Cantidad: $this->cantidad";
    }
}
?>
