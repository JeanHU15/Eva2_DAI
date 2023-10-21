<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../conexion/conexion.php');

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precioVenta = $_POST['precioVenta'];

    $sql = "UPDATE Producto SET Nombre = ?, Descripcion = ?, Stock = ?, PrecioVenta = ? WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssidi", $nombre, $descripcion, $stock, $precioVenta, $id);

    if ($stmt->execute()) {
        header("Location: ../productos/productos.php?mensaje=producto_actualizado");
    } else {
        header("Location: ../productos/productos.php?mensaje=error");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../productos/productos.php");
}
?>
