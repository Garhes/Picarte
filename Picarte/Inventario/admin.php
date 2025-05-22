<?php
session_start();

// Proteger el panel: solo admins pueden entrar
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'inventario_comida');

// Verificar conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Obtener los productos
$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        h1 {
            color: #2c3e50;
        }
        a {
            text-decoration: none;
            padding: 0.5rem 1rem;
            background-color: #2ecc71;
            color: white;
            border-radius: 5px;
            margin-bottom: 1rem;
            display: inline-block;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 0.7rem;
            text-align: center;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        td button {
            padding: 0.4rem 0.8rem;
            margin: 0 0.2rem;
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .editar {
            background-color: #f1c40f;
        }
        .eliminar {
            background-color: #e74c3c;
        }
        .logout {
            background-color: #e67e22;
            float: right;
        }
    </style>
</head>
<body>

<h1>Bienvenido, <?php echo $_SESSION['admin']; ?> 👋</h1>

<a href="agregar_producto.php">➕ Agregar Producto</a>
<a href="logout.php" class="logout">🚪 Cerrar Sesión</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($producto = $resultado->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                <td><?php echo $producto['stock']; ?></td>
                <td>
                    <?php if ($producto['imagen']): ?>
                        <img src="imagenes/<?php echo $producto['imagen']; ?>" width="50">
                    <?php else: ?>
                        No imagen
                    <?php endif; ?>
                </td>
                <td>
                    <a href="editar_producto.php?id=<?php echo $producto['id']; ?>"><button class="editar">✏️ Editar</button></a>
                    <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>"><button class="eliminar">🗑️ Eliminar</button></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>

<?php
$conexion->close();
?>
