
<?php
session_start();

// Lógica para reiniciar el carrito
if (isset($_POST['reiniciar'])) {
    unset($_SESSION['carrito']); // Eliminar el carrito de la sesión
    header("Location: carrito.php"); // Redirigir a la misma página
    exit;
}
if (!isset($_SESSION['usuario'])) {
    header("Location: bienvenida.php"); // Redirigir a la página de bienvenida si no hay sesión
    exit;
}

// Lógica para quitar 1 producto o eliminar todos
if (isset($_POST['accion'])) {
    $idProducto = $_POST['idProducto'];
    
    if ($_POST['accion'] === 'quitar') {
        // Quitar 1 producto
        if (isset($_SESSION['carrito'][$idProducto]) && $_SESSION['carrito'][$idProducto]['cantidad'] > 1) {
            $_SESSION['carrito'][$idProducto]['cantidad'] -= 1; // Restar 1
        } elseif (isset($_SESSION['carrito'][$idProducto]) && $_SESSION['carrito'][$idProducto]['cantidad'] === 1) {
            unset($_SESSION['carrito'][$idProducto]); // Quitar producto si es el último
        }
    } elseif ($_POST['accion'] === 'eliminar') {
        // Eliminar todos los productos de ese tipo
        unset($_SESSION['carrito'][$idProducto]);
    }

    header("Location: carrito.php"); // Redirigir a la misma página
    exit;
}


// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: menu.php"); // Redirigir a la página de bienvenida si no hay sesión
    exit;
}

$usuario = $_SESSION['usuario'];

// Leer el archivo de compras
$comprasArchivo = 'compras.json';
if (file_exists($comprasArchivo)) {
    $compras = json_decode(file_get_contents($comprasArchivo), true);
} else {
    $compras = [];
}

// Filtrar las compras del usuario actual
$comprasUsuario = array_filter($compras, function($compra) use ($usuario) {
    return $compra['usuario'] === $usuario;
});
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title> Cisne</title>
    <link rel="icon" href="IMGs/cisne.ico">
    <link rel="stylesheet" href="css/car.css">
    <style>body {
            background: url(IMGs/fondoP.jpg) no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100%;
        }

        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, html {
    height: 100%;
    font-family: Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #000;
}

.video-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

#background-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    z-index: -1; /* Hace que el video quede atrás del formulario */
}

        </style>
    
      
</head>
<body>
    
<div class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="IMGs/fondoL.mp4" type="video/mp4">
        </video>
    </div>
              



    <div class="perfil">
       <h2>Tu Carrito</h2>

        <div class="compras-lista">
                <div class="compra-card">
                    <div class="compra-detalles">
                        <div class="productos">
                            <strong>Productos:</strong>
                            <ul>
                            <?php
    $totalPrecio = 0; // Inicializar el total
    
    // Mostrar productos en el carrito
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $id => $producto) {
            $subtotal = $producto['precio'] * $producto['cantidad']; // Calcular subtotal para el producto
            $totalPrecio += $subtotal; // Sumar al total general
            echo "<p>{$producto['nombre']} - Cantidad: {$producto['cantidad']} - Precio: \$$subtotal</p>";
            echo '<form method="POST" style="display:inline;">
                    <input type="hidden" name="idProducto" value="' . $id . '">
                    <button type="submit" name="accion" value="quitar" class="reset">Eliminar producto</button>
                  </form>';
            echo "<hr>"; // Línea separadora
        }
        
        // Mostrar el total y el botón de finalizar compra
       // Mostrar el total y el botón de finalizar compra
echo '<div class="total-container">';
echo "<h3>Total a Pagar: \$$totalPrecio</h3>";
echo '<form method="POST" action="finalizar_compra.php">
        <input type="hidden" name="total" value="' . $totalPrecio . '">
        <input type="hidden" name="usuario" value="' . $_SESSION['usuario'] . '">
        <button class="btn" type="submit">Finalizar Compra</button>
      </form>';
echo '</div>'; // Cierre de la div total-container
    } else {
        echo "<p>No hay productos en el carrito.</p>";
    }
    ?>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        <div class="perfil-footer">
        <a href="menu.php"><button class="btn">Volver al menu</button></a>
        <form method="POST" style="margin-top: 20px;">
        <button type="submit" name="reiniciar" class="reset">Reiniciar Carrito</button>
    </form>
    </div>
        
    </div>
    

</body>
</html>

