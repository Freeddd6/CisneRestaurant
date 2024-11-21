<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_POST['idProducto'])) {
    $idProducto = $_POST['idProducto'];
    
    // Aquí deberías consultar tu base de datos para obtener los detalles del producto
    $productos = [
        1 => ['nombre' => 'PAQUETE CISNE 1', 'precio' => 80],
                    2 => ['nombre' => 'PAQUETE CISNE 2', 'precio' => 80],
                    3 => ['nombre' => 'PAQUETE KID', 'precio' => 80],
                    4 => ['nombre' => 'CHILAQUILES VERDES Ó ROJOS', 'precio' => 70],
                    5 => ['nombre' => 'ENCHILADAS VERDES Ó ROJAS', 'precio' => 70],
                    6 => ['nombre' => 'ENCHILADAS SUIZAS', 'precio' => 80],
                    7 => ['nombre' => 'ENMOLADAS', 'precio' => 80],
                    8 => ['nombre' => 'WAFFLES 1PX', 'precio' => 45],
                    9 => ['nombre' => 'HOTCAKES CON TOCINO', 'precio' => 60],
                    10 => ['nombre' => 'HOTCAKES POR PIEZA', 'precio' => 15],
                    11 => ['nombre' => 'PAN DULCE PZ', 'precio' => 17],
                    12 => ['nombre' => 'OTROS', 'precio' => 0],
                    13 => ['nombre' => 'MOLLETES', 'precio' => 20],
                    14 => ['nombre' => 'TORTA DE CHILAQUILES', 'precio' => 65],
                    15 => ['nombre' => 'CLUB SANDWITCH', 'precio' => 80],
                    16 => ['nombre' => 'SINCRONIZADA HAWAIANA', 'precio' => 65],
                    17 => ['nombre' => 'ENSALADA', 'precio' => 70],
                    18 => ['nombre' => 'HUEVOS AL GUSTO', 'precio' => 70],
                    19 => ['nombre' => 'PLATO DE FRUTA', 'precio' => 30],
                    20 => ['nombre' => 'LIICUADOS', 'precio' => 30],
                    21 => ['nombre' => 'REFRESCO 355ML', 'precio' => 25],
                    22 => ['nombre' => 'AGUA DEL DIA', 'precio' => 75],
                    23 => ['nombre' => 'VASO O BOTELLA DE AGUA', 'precio' => 10],
                    24 => ['nombre' => 'CAFÉ REFILL', 'precio' => 15],
                    25 => ['nombre' => 'TE DE REFILL', 'precio' => 15],
                    26 => ['nombre' => 'TAZA DE LECHE', 'precio' => 10],
    ];

    $producto = $productos[$idProducto];

    // Verificar si ya está en el carrito
    $encontrado = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['id'] == $idProducto) {
            $item['cantidad']++;
            $encontrado = true;
            break;
        }
    }

    // Si no está en el carrito, lo agregamos
    if (!$encontrado) {
        $_SESSION['carrito'][] = [
            'id' => $idProducto,
            'nombre' => $producto['nombre'],
            'precio' => $producto['precio'],
            'cantidad' => 1
        ];
    }

    echo "Producto añadido al carrito";
}
?>