<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar entrada para evitar SQL Injection
    $email = mysqli_real_escape_string($conn, $_POST['L_CorreoElectronico']);
    $password = $_POST['L_Password']; // No escapar contraseñas

    // Consultar usuario por email
    $sql = "SELECT * FROM id WHERE Email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar contraseña encriptada
        if (password_verify($password, $row['Contraseña'])) {
            echo "Login exitoso";
            header("Location: ../Html/index.html"); // Redirigir a la página principal
            exit(); // Evita que el código siga ejecutándose
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}

$conn->close();
?>
