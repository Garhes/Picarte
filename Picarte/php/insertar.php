<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['R_Usuario'];
    $email = $_POST['R_CorreoElectronico'];
    $password = password_hash($_POST['R_Password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO id (Nombre, Email, Contraseña) VALUES ('$nombre', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../Html/index.html"); // Redirige a la página principal después del registro
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
