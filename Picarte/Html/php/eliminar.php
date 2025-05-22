<?php
include("conexion.php");

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']); // Convertir a entero para evitar inyecciones SQL
    $sql = "DELETE FROM id WHERE ID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado correctamente";
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
} else {
    echo "ID no especificado";
}
$conn->close();
?>