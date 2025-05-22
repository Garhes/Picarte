<?php
session_start();

// Proteger acceso
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'inventario_comida');

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Obtener todos los productos
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
        }
        td img {
            max-width: 50px;
            max-height: 50px;
        }
        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 0.5rem;
            border-radius: 5px;
        }
        button:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Panel de Administración 🍔</h2>

<a href="agregar_producto.php">
    <button>Agregar Nuevo Producto</button>
</a>

<table>
    <tr>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>

    <?php
    while ($producto = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$producto['nombre']}</td>
                <td>{$producto['descripcion']}</td>
                <td>\${$producto['precio']}</td>
                <td>{$producto['stock']}</td>
                <td>";
        if ($producto['imagen']) {
            echo "<img src='imagenes/{$producto['imagen']}' alt='Imagen Producto'>";
        } else {
            echo "No hay imagen";
        }
        echo "</td>
                <td>
                    <a href='editar_producto.php?id={$producto['id']}'>
                        <button>Editar</button>
                    </a>
                    <a href='eliminar_producto.php?id={$producto['id']}'>
                        <button onclick='return confirm(\"¿Estás seguro de que quieres eliminar este producto?\");'>Eliminar</button>
                    </a>
                </td>
            </tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conexion->close();
?>
