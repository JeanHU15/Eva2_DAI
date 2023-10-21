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
        <h2>Editar producto</h2>
        <div class="container">
            <?php
            include('../conexion/conexion.php');
    
            $id = $_GET["id"];
    
            $sql = "SELECT * FROM Producto WHERE id = $id";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
            } else {
                echo "No se encontró el producto.";
                exit();
            }
    
            $conn->close();
            ?>
            <form action="../productos/editar_producto.inc.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
    
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row["Nombre"]; ?>" required>
    
                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $row["Descripcion"]; ?>">
    
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" value="<?php echo $row["Stock"]; ?>" min="0" required>
    
                <label for="precioVenta">Precio de venta:</label>
                <input type="number" id="precioVenta" name="precioVenta" value="<?php echo $row["PrecioVenta"]; ?>" min="0" step="0.01" required>
    
                <input type="submit" value="Guardar cambios">
            </form>
        </div>
    </main>    
    <footer>
        <p>Derechos reservados &copy; 2023</p>
    </footer>
</body>
</html>
