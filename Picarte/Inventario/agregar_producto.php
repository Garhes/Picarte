<?php
session_start();

// Proteger el acceso solo para admins
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
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
            background-color: #27ae60;
            color: white;
            border: none;
            width: 100%;
            border-radius: 5px;
            font-size: 1rem;
        }
        button:hover {
            background-color: #219150;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Agregar Nuevo Producto 🍔</h2>

<form action="procesar_agregar_producto.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre del producto" required>
    <textarea name="descripcion" placeholder="Descripción del producto" required></textarea>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required>
    <input type="number" name="stock" placeholder="Cantidad en stock" required>
    <input type="file" name="imagen" accept="image/*" required>
    <button type="submit">Agregar Producto</button>
</form>

</body>
</html>
