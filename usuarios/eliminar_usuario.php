<?php
include('../conexion/conexion.php');

if (isset($_GET["IdUsuario"])) {
    $IdUsuario = $_GET["IdUsuario"];

    $sql = "DELETE FROM Usuario WHERE IdUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $IdUsuario);

    if ($stmt->execute()) {
        header("Location: ../usuarios/usuarios.php?mensaje=usuario_eliminado");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID de usuario no especificado.";
}

$conn->close();

?>
