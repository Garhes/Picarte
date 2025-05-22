<?php
session_start();

// Proteger el acceso
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}

// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'inventario_comida');

if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Recibir datos
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

// Subir la imagen
$nombreImagen = '';

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
    $directorio = 'imagenes/'; // Asegúrate que exista esta carpeta
    $nombreImagen = basename($_FILES['imagen']['name']);
    $rutaDestino = $directorio . $nombreImagen;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);
}

// Insertar en la base de datos
$sql = "INSERT INTO productos (nombre, descripcion, precio, stock, imagen)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param('ssdss', $nombre, $descripcion, $precio, $stock, $nombreImagen);

if ($stmt->execute()) {
    header('Location: panel_admin.php');
} else {
    echo "❌ Error al agregar el producto.";
}

$stmt->close();
$conexion->close();
?>
