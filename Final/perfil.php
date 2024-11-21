<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: bienvenida.php"); // Redirigir a la página de bienvenida si no hay sesión
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

//Funcion para generar numero de pedido aleatorio
$numgenerado = [];

function NumeroUnico($min, $max) {
    global $numgenerado;
    
    do {
        $na = rand($min, $max);
    } while (in_array($na, $numgenerado));
    
    // Guardar el número generado para no repetirlo
    $numgenerado[] = $na;
    
    return $na;
}
?>


<!DOCTYPE html>
<head>
<title> Cisne</title>
<link rel="icon" href="IMGs/cisne.ico">
    <link rel="stylesheet" href="css/hisComp.css">
    <style>
        body {
            background: url(IMGs/fondoP.jpg) no-repeat;
    background-position: center;
    background-size: cover;
    width: 100%;
    height: 100%;
        }
    </style>
</head>
<body>
    <div class="perfil">
    <div class="perfil-header">
        <div class="perfil-img">
            <img src="https://via.placeholder.com/150" alt="Foto de perfil">
        </div>
        <div class="perfil-info">
            <h1><?= htmlspecialchars($usuario) ?></h1>
            <p>@<?= htmlspecialchars($usuario) ?></p>
            <p class="bio">Recuerda que la comida siempre es buena mientras sepas elegir nuestro restaurante:)
            </p>
        </div>
    </div>

    <div class="perfil-footer">
        <p><a href="menu.php"><button class="btn">Volver al menu</button></a></p>
        <form action="logout.php" method="post">
            <a href="index.php"><button type="submit" class="btn logout">Cerrar sesión</button></a>
        </form>
    </div>

    <div class="historial">
    <h2>Historial de Compras</h2>
    
    <?php if (empty($comprasUsuario)): ?>
        <p class="center">No has realizado compras aún.</p>
    <?php else: ?>
        <div class="compras-lista">
            <?php foreach ($comprasUsuario as $compra): ?>
                <div class="compra-card">
                    <div class="compra-header">
                        <h3>Compra #<?= $list = NumeroUnico(1,1000); ?></h3>
                    </div>
                    <div class="compra-detalles">
                        <p><strong>Total:</strong> $<?= htmlspecialchars($compra['total']) ?></p>
                        <p><strong>Fecha:</strong> <?= htmlspecialchars($compra['fecha']) ?></p>
                        <div class="productos">
                            <strong>Productos:</strong>
                            <ul>
                                <?php foreach ($compra['productos'] as $producto): ?>
                                    <li><?= htmlspecialchars($producto['nombre']) ?> - Cantidad: <?= htmlspecialchars($producto['cantidad']) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
</div>


</body>
</html>




