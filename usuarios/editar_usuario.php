<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mi biblioteca virtual</title>
    <style>
        /* Estilos para el encabezado */
        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }
        /* Estilos para el menú de navegación */
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        /* Estilos para el contenido principal */
        main {
            margin: 20px;
        }
        /* Estilos para el pie de página */
        footer {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Mi proyecto</h1>
    </header>
    <nav>
        <a href="#">Inicio</a>
        <a href="./usuarios/usuarios.php">Usuarios</a>
        <a href="./productos/productos.php">Productos</a>
    </nav>
    <main>
        <h2>Editar usuario</h2>
        <div class="container">
            <?php
            include('../conexion/conexion.php');

            $id = $_GET["id"];

            $sql = "SELECT * FROM Usuario WHERE IdUsuario = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "No se encontró el usuario.";
                exit();
            }

            $conn->close();
            ?>
            <form action="../usuarios/editar_usuario.inc.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row["IdUsuario"]; ?>">

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row["Nombre"]; ?>" required>

                <label for="apellidoPaterno">Apellido paterno:</label>
                <input type="text" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo $row["ApellidoPaterno"]; ?>" required>

                <label for="apellidoMaterno">Apellido materno:</label>
                <input type="text" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo $row["ApellidoMaterno"]; ?>" required>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $row["Dirección"]; ?>">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row["Email"]; ?>" required>

                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" value="<?php echo $row["Teléfono"]; ?>">

                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Guardar cambios">
            </form>
        </div>
    </main>
    <footer>
        <p>Derechos reservados &copy; 2023</p>
    </footer>
</body>
</html>
