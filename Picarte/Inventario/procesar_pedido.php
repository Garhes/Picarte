<?php
// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'inventario_comida');

// Verificar si hay error en la conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Verificar si se enviaron los datos del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    $pago = $_POST['pago'];
    $comentarios = isset($_POST['comentarios']) ? $_POST['comentarios'] : ''; // Comentarios opcionales

    // Preparar la consulta para insertar los datos en la base de datos
    $sql = "INSERT INTO pedidos (nombre, direccion, telefono, producto, cantidad, pago, comentarios) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ssssiss', $nombre, $direccion, $telefono, $producto, $cantidad, $pago, $comentarios);
    // verificar si la consulta se preparó correctamente
    if ($stmt->execute()) {
    header("Location: ../Html/domicilios.php?status=success");
    exit();
    }
    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "✅ Pedido realizado con éxito.";
    } else {
        echo "❌ Error al realizar el pedido: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}
?>
