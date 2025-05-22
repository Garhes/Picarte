<?php
$pedidoRealizado = false;
if (isset($_GET['status']) && $_GET['status'] === 'success') {
    $pedidoRealizado = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido a Domicilio</title>
    <link rel="stylesheet" type="text/css" href="../Css/domicilios.css">
</head>
<body>

    <div class="form-container">
        <h2>Pedido a Domicilio</h2>
        <!-- Aquí agregamos el action para enviar el formulario a 'procesar_pedido.php' -->
        <form id="pedidoForm" action="../Inventario/procesar_pedido.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required pattern="[0-9]{10}" placeholder="Ej: 3001234567">

            <label for="producto">Selecciona tu pedido:</label>
            <select id="producto" name="producto" required>
                <option value="">-- Selecciona un producto --</option>
                <option value="Arepa">Arepa</option>
                <option value="Empanada">Empanada</option>
                <option value="Buñuelo">Buñuelo</option>
                <option value="Tamales">Tamales</option>
                <option value="Bebida">Bebida</option>
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" min="1" required>

            <label for="pago">Método de Pago:</label>
            <select id="pago" name="pago" required>
                <option value="">-- Selecciona un método --</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Tarjeta">Tarjeta</option>
                <option value="Nequi">Nequi</option>
                <option value="PSE">PSE</option>
                <option value="PayPal">PayPal</option>
                <option value="Daviplata">Daviplata</option>
            </select>

            <label for="comentarios">Comentarios (Opcional):</label>
            <textarea id="comentarios" name="comentarios" rows="3" placeholder="Ej: Sin cebolla, entrega rápida..."></textarea>

            <button type="submit">Realizar Pedido</button>
        </form>
    </div>

    <!-- Modal de Confirmación -->
    <div id="modal" class="modal" style="display: <?= $pedidoRealizado ? 'block' : 'none'; ?>;">
        <div class="modal-content">
            <h2>¡Pedido Realizado!</h2>
            <p>Su pedido ha sido recibido y será entregado pronto.</p>
            <button id="btnCerrar" onclick="cerrarModal()">Aceptar</button>
        </div>
    </div>

    <script>
        function cerrarModal() {
            document.getElementById('modal').style.display = 'none';
            // Redirigir a la página principal o a otra página
            window.location.href = '../Html/index.html'; 
        }
    </script>
    
</body>
</html>
