<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php"); // Redirigir al login si no está autenticado
    exit;
}

// Verificar si el carrito tiene productos
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    header("Location: carrito.php"); // Redirigir si el carrito está vacío
    exit;
}

// Ruta del archivo JSON donde se almacenan las compras
$comprasArchivo = 'compras.json';

// Cargar las compras existentes o inicializar un array si el archivo no existe
$compras = file_exists($comprasArchivo) ? json_decode(file_get_contents($comprasArchivo), true) : [];

// Obtener el usuario, carrito y total de la compra desde la sesión
$usuario = $_SESSION['usuario'];
$carrito = $_SESSION['carrito'];
$total = 0;

// Crear una entrada de compra con el detalle del carrito y la fecha
$compra = [
    'usuario' => $usuario,
    'total' => 0,
    'productos' => [],
    'fecha' => date('Y-m-d H:i:s')
];

foreach ($carrito as $id => $producto) {
    $subtotal = $producto['precio'] * $producto['cantidad'];
    $compra['productos'][] = [
        'nombre' => $producto['nombre'],
        'cantidad' => $producto['cantidad'],
        'precio' => $producto['precio']
    ];
    $compra['total'] += $subtotal; // Calcular el total de la compra
}

// Añadir la nueva compra al historial y guardar en JSON
$compras[] = $compra;
file_put_contents($comprasArchivo, json_encode($compras, JSON_PRETTY_PRINT));

// Guardar la última compra en la sesión para el ticket
$_SESSION['ultima_compra'] = $compra;

// Vaciar el carrito después de finalizar la compra
unset($_SESSION['carrito']);

// Redirigir al cliente a una página de confirmación en lugar de al historial de compras
header("Location: confirmacion_compra.php");
exit;
?>
