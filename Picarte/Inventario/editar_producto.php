<?php
session_start();

// Proteger acceso
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'inventario_comida');

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Obtener ID del producto
if (!isset($_GET['id'])) {
    echo "❌ Producto no especificado.";
    exit();
}

$id = $_GET['id'];

// Traer la información del producto
$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
    echo "❌ Producto no encontrado.";
    exit();
}

$producto = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        form {
            background-color: #f9f9f9;
            padding: 2rem;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, textarea {
            width: 100%;
            margin-bottom: 1rem;
            padding: 0.5rem;
        }
        button {
            padding: 0.7rem;
            background-color: #3498db;
            color: white;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-size: 1rem;
        }
        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Editar Producto ✏️</h2>

<form action="procesar_editar_producto.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
    
    <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
    
    <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
    
    <input type="number" step="0.01" name="precio" value="<?php echo $producto['precio']; ?>" required>
    
    <input type="number" name="stock" value="<?php echo $producto['stock']; ?>" required>
    
    <p>Imagen actual:</p>
    <?php if ($producto['imagen']): ?>
        <img src="imagenes/<?php echo $producto['imagen']; ?>" width="100"><br><br>
    <?php else: ?>
        <p>No hay imagen</p>
    <?php endif; ?>
    
    <input type="file" name="imagen" accept="image/*">
    
    <button type="submit">Guardar Cambios</button>
</form>

</body>
</html>

<?php
$stmt->close();
$conexion->close();
?>
