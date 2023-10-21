<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../conexion/conexion.php');

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precioVenta = $_POST['precioVenta'];

    $sql = "INSERT INTO Producto (Nombre, Descripcion, Stock, PrecioVenta) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssid", $nombre, $descripcion, $stock, $precioVenta);

    if ($stmt->execute()) {
        header("Location: ../productos/productos.php?mensaje=producto_agregado");
    } else {
        header("Location: ../productos/productos.php?mensaje=error");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../productos/productos.php");
}
?>
