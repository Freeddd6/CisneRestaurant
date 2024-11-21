<?php
session_start();

// Verificar si el usuario está autenticado

// Simular la carga de compras desde el archivo JSON
$comprasArchivo = 'compras.json';

if (file_exists($comprasArchivo)) {
    $compras = json_decode(file_get_contents($comprasArchivo), true);
} else {
    $compras = [];
}

// Obtener el contenido del carrito actual del usuario desde la sesión
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Historial de Compras</title>
    <link rel="icon" href="IMGs/cisne.ico">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <?php if (!empty($carrito)): ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalCarrito = 0;
                foreach ($carrito as $producto): 
                    $subtotal = $producto['precio'] * $producto['cantidad'];
                    $totalCarrito += $subtotal;
                ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td>$<?= htmlspecialchars(number_format($producto['precio'], 2)) ?></td>
                        <td><?= htmlspecialchars($producto['cantidad']) ?></td>
                        <td>$<?= htmlspecialchars(number_format($subtotal, 2)) ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" style="text-align: right;"><strong>Total del Carrito</strong></td>
                    <td><strong>$<?= htmlspecialchars(number_format($totalCarrito, 2)) ?></strong></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        
    <?php endif; ?>

    <h1>Historial de Compras</h1>

    <?php if (!empty($compras)): ?>
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Total</th>
                    <th>Productos</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($compras as $compra): ?>
                    <tr>
                        <td><?= htmlspecialchars($compra['usuario']) ?></td>
                        <td>$<?= htmlspecialchars($compra['total']) ?></td>
                        <td>
                            <ul>
                                <?php foreach ($compra['productos'] as $producto): ?>
                                    <li><?= htmlspecialchars($producto['nombre']) ?> - Cantidad: <?= htmlspecialchars($producto['cantidad']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                        <td><?= htmlspecialchars($compra['fecha']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No hay compras registradas.</p>
    <?php endif; ?>

    <p><a href="index.php">Volver a la página principal</a></p>
</body>
</html>
