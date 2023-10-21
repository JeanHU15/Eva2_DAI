<?php
include('../conexion/conexion.php');

if (isset($_GET["IdProducto"])) {
    $IdProducto = $_GET["IdProducto"];

    $sql = "DELETE FROM Producto WHERE IdProducto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $IdProducto);

    if ($stmt->execute()) {
        header("Location: ../productos/productos.php?mensaje=producto_eliminado");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de producto no especificado.";
}

$conn->close();

?>