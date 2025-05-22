<?php
include("conexion.php");
$sql = "SELECT * FROM id";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Está seguro de eliminar este usuario?');
        }
    </script>
</head>
<body>
    <center>
        <h1> LISTADO DE CLIENTES </h1>
        <hr>
        <h2>Número de clientes:</h2>
        <?php echo $result->num_rows; ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><a href="eliminar.php?id=<?php echo $row['ID']; ?>" onclick="return confirmar()">Eliminar</a></td>
                </tr>
            <?php endwhile; ?>
        </table>
        <a href="../Html/login.html">Insertar Datos</a>
    </center>
</body>
</html>
<?php $conn->close(); ?>