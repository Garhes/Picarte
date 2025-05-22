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

// Recibir datos
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];

// Actualizar imagen solo si el admin sube una nueva
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
    $directorio = 'imagenes/';
    $nombreImagen = basename($_FILES['imagen']['name']);
    $rutaDestino = $directorio . $nombreImagen;
    
    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaDestino);

    // Con imagen nueva
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=?, imagen=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ssdssi', $nombre, $descripcion, $precio, $stock, $nombreImagen, $id);
} else {
    // Sin cambiar la imagen
    $sql = "UPDATE productos SET nombre=?, descripcion=?, precio=?, stock=? WHERE id=?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ssdsi', $nombre, $descripcion, $precio, $stock, $id);
}

if ($stmt->execute()) {
    header('Location: panel_admin.php');
} else {
    echo "❌ Error al editar el producto.";
}

$stmt->close();
$conexion->close();
?>
