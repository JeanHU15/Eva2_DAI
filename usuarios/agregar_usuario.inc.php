<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../conexion/conexion.php');

    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Usuario (Nombre, ApellidoPaterno, ApellidoMaterno, Dirección, Email, Teléfono, Password) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nombre, $apellidoPaterno, $apellidoMaterno, $direccion, $email, $telefono, $password);

    if ($stmt->execute()) {
        header("Location: ../usuarios/usuarios.php?mensaje=usuario_agregado");
    } else {
        header("Location: ../usuarios/usuarios.php?mensaje=error");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../usuarios/usuarios.php");
}
?>
