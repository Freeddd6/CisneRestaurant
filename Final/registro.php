<?php
session_start();
$mensaje = "";

// Simular base de datos con un archivo JSON
$usuariosArchivo = 'usuarios.json';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encriptar la contraseña

    // Leer usuarios existentes
    $usuarios = json_decode(file_get_contents($usuariosArchivo), true);

    // Verificar si el usuario ya existe
    if (isset($usuarios[$usuario])) {
        $mensaje = "";
        $mensaje = "<p style='color: red;'>El usuario ya está registrado</p>";
    } else {
        // Agregar nuevo usuario
        $usuarios[$usuario] = ['password' => $password];
        file_put_contents($usuariosArchivo, json_encode($usuarios));
        $mensaje = "<p style='color: green;'>Registro exitoso. Ahora puede iniciar sesión</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cisne</title>
    <link rel="icon" href="IMGs/cisne.ico">
    <link rel="stylesheet" href="css/styleLO.css">

    
</head>
<body>

    <div class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="IMGs/fondoL.mp4" type="video/mp4">
        </video>
    </div>
                <div class="fondo">
            <h2>Registrarse</h2>
            <form method="post">
            <?= $mensaje ?></p>
                <div class="input-field">
                    <input type="usuario" name="usuario" placeholder="Nombre de usuario" required>
                    <i class="bx bxs-user"></i>
                </div>

                <div class="input-field">
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>

                <button type="submit" class="btn" name="enter">Registrarse</button><br><br>
                <a href="login.php" class="sign-up">Iniciar Sesion</a>

            </form>
        </div>
</body>
</html>