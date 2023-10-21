<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-">
    <title>Mi proyecto - Productos</title>
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
        /* Estilos para el buscador */
        #buscador {
            float: right;
            margin-bottom: 10px;
        }
        #buscador label {
            font-weight: bold;
            margin-right: 10px;
        }
        #buscador input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #buscador button[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        #buscador button[type="submit"]:hover {
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
        <a href="../usuarios/usuarios.php">Usuarios</a>
        <a href="../productos/productos.php">Productos</a>
    </nav>
    <>
        <h2>Lista de Productos</h2>
        <div id="buscador">
            <form method="GET">
                <label for="busqueda">Buscar producto:</label>
                <input type="text" id="busqueda" name="busqueda">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Stock</th>
                <th>PrecioVenta</th>
                <th>Acciones</th>
            </tr>
            <?php
            include('../conexion/conexion.php');

            if (isset($_GET['busqueda'])) {
                $busqueda = $_GET['busqueda'];
                $sql = "SELECT * FROM Producto WHERE Nombre LIKE '%$busqueda%'";
            } else {
                $sql = "SELECT * FROM Producto";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["IdProducto"] . "</td>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["Descripcion"] . "</td>";
                    echo "<td>" . $row["Stock"] . "</td>";
                    echo "<td>" . $row["PrecioVenta"] . "</td>";
                    echo "<td>";
                    echo "<a href='editar_producto.php?IdProducto=" . $row["IdProducto"] . "' class='button'>Editar</a> ";
                    echo "<a href='eliminar_producto.php?IdProducto=" . $row["IdProducto"] . "' class='button'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No se encontraron productos.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <a href="agregar_producto.html" class="button">Agregar nuevo producto</a>
    </main>
    <footer>
        <p>Derechos reservados &copy; 2023</p>
    </footer>
</body>
</html>
