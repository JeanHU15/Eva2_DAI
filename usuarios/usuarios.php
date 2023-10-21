<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
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
        /* Estilos para la tabla */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        /* Estilos para los botones */
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <header>
        <h1>Mi proyecto</h1>
    </header>
    <nav>
        <a href="../index.html">Inicio</a>
        <a href="../usuario/usuarios.php">Usuarios</a>
        <a href="../productos/productos.php">Productos</a>
    </nav>
    <main>
        <h2>Lista de usuarios</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Dirección</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            <?php
            include('../conexion/conexion.php');

            $sql = "SELECT * FROM Usuario";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["IdUsuario"] . "</td>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["ApellidoPaterno"] . "</td>";
                    echo "<td>" . $row["ApellidoMaterno"] . "</td>";
                    echo "<td>" . $row["Dirección"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Teléfono"] . "</td>";
                    echo "<td>";
                    echo "<a href='../usuarios/editar_usuario.php?IdUsuario=" . $row["IdUsuario"] . "' class='button'>Editar</a> ";
                    echo "<a href='../usuarios/eliminar_usuario.php?IdUsuario=" . $row["IdUsuario"] . "' class='button'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No hay usuarios registrados.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <a href="agregar_usuario.html" class="button">Agregar nuevo usuario</a>
    </main>
    <footer>
        <p>Derechos reservados &copy; 2023</p>
    </footer>
</body>
</html>
