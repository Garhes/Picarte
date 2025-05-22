<?php
session_start();

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'inventario_comida');

// Verificar conexión
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Recibir datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Buscar al admin
$sql = "SELECT * FROM admins WHERE usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param('s', $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $admin = $resultado->fetch_assoc();
    
    // Verificar contraseña (en este ejemplo asumimos que las contraseñas están en texto plano)
    if ($contraseña === $admin['contraseña']) {
        $_SESSION['admin'] = $admin['usuario'];
        header('Location: panel_admin.php'); // Redirige al panel de control
    } else {
        echo "❌ Contraseña incorrecta.";
    }
} else {
    echo "❌ Usuario no encontrado.";
}

$stmt->close();
$conexion->close();
?>
