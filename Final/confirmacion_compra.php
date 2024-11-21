<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario']) || !isset($_SESSION['ultima_compra'])) {
    header("Location: confirmacion_compra.php"); // Redirigir a la página principal si no hay datos de compra
    exit;
}

$compra = $_SESSION['ultima_compra']; // Recuperar los datos de la última compra
unset($_SESSION['ultima_compra']); // Eliminar los datos para evitar duplicados al refrescar
?>
<link rel = "stylesheet" href = "css/a3.css">
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Cisne</title>
    <link rel="icon" href="IMGs/cisne.ico">
    <link rel="stylesheet" href="css/com.css">
    <style>
        body {
            background: url(IMGs/fondoP.jpg) no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100%;
        }
        .ticket {
            padding: 20px;
            width: 60%;
            margin: 0 auto;
            text-align: left;
        }
        .ticket h2, .ticket h3 {
            text-align: center;
        }
        .ticket table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .ticket th, .ticket td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            color: white;
        }
        .ticket th {
            background-color: #efb810;
            color: white;
        }
        .total {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>

        <div class="perfil">    

    <div class="ticket">
        <h2>¡Gracias por tu compra!</h2>
        <h3>Ticket de Compra</h3>
        <p><strong>Usuario:</strong> <?= htmlspecialchars($compra['usuario']) ?></p>
        <p><strong>Fecha:</strong> <?= htmlspecialchars($compra['fecha']) ?></p>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compra['productos'] as $producto): ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td>$<?= htmlspecialchars(number_format($producto['precio'], 2)) ?></td>
                        <td><?= htmlspecialchars($producto['cantidad']) ?></td>
                        <td>$<?= htmlspecialchars(number_format($producto['precio'] * $producto['cantidad'], 2)) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="total">Total:</td>
                    <td>$<?= htmlspecialchars(number_format($compra['total'], 2)) ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <p><a href="menu.php"><button class="btm">Volver al menu</button></a></p>
    </div>
</body>
</html>