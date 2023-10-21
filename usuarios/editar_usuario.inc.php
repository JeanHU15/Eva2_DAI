<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('../conexion/conexion.php');

    $IdUsuario = $_POST['IdUsuario'];
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];

    $sql = "UPDATE Usuario SET Nombre = ?, ApellidoPaterno = ?, ApellidoMaterno = ?, Dirección = ?, Email = ?, Teléfono = ?, Password = ? WHERE IdUsuario = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $nombre, $apellidoPaterno, $apellidoMaterno, $direccion, $email, $telefono, $password, $IdUsuario);

    if ($stmt->execute()) {
        header("Location: ../usuarios/usuarios.php?mensaje=usuario_actualizado");
    } else {
        header("Location: ../usuarios/usuarios.php?mensaje=error");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../usuarios/usuarios.php");
}
?>

