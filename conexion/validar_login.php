<?php
// Verificar si se enviaron datos de inicio de sesión
if(isset($_POST['Nombre']) && isset($_POST['Password'])) {
    $Nombre = $_POST['Nombre'];
    $Password = $_POST['Password'];
    
    // Incluir el archivo de conexión a la base de datos
    include('../conexion/conexion.php');
    
    // Consultar la base de datos para verificar los datos de inicio de sesión
    $sql = "SELECT * FROM Usuario WHERE Nombre = '$Nombre' AND Password = '$Password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        // Datos de inicio de sesión válidos, redirigir al usuario a la tabla de mantenimiento de productos
        header('Location: ../productos/productos.php');
        exit();
    }
}

// Si los datos de inicio de sesión son incorrectos o no se enviaron, redirigir de nuevo a la página de inicio de sesión
header('Location: index.html');
exit();
?>

