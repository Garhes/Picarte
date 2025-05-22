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

// Verificar que el ID esté presente
if (!isset($_GET['id'])) {
    echo "❌ Producto no especificado.";
    exit();
}

$id = $_GET['id'];

// Obtener la información del producto antes de eliminarlo (para saber si tiene imagen)
$sql = "SELECT imagen FROM productos WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 0) {
    echo "❌ Producto no encontrado.";
    exit();
}

$producto = $resultado->fetch_assoc();

// Eliminar la imagen del producto si existe
if ($producto['imagen']) {
    $imagenRuta = 'imagenes/' . $producto['imagen'];
    if (file_exists($imagenRuta)) {
        unlink($imagenRuta);  // Elimina el archivo de la carpeta "imagenes/"
    }
}

// Eliminar el producto de la base de datos
$sqlEliminar = "DELETE FROM productos WHERE id = ?";
$stmtEliminar = $conexion->prepare($sqlEliminar);
$stmtEliminar->bind_param('i', $id);

if ($stmtEliminar->execute()) {
    header('Location: panel_admin.php');
} else {
    echo "❌ Error al eliminar el producto.";
}

$stmt->close();
$conexion->close();
?>
