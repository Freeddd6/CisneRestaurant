<?php
session_start();
$mensaje = "";

// Simular base de datos con un archivo JSON
$usuariosArchivo = 'usuarios.json';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Leer usuarios existentes
    $usuarios = json_decode(file_get_contents($usuariosArchivo), true);

    // Verificar si el usuario existe y la contraseña es correcta
    if (isset($usuarios[$usuario]) && password_verify($password, $usuarios[$usuario]['password'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: menu.php"); // Redirigir al menú del sistema
        exit;
    } else {
        $mensaje = "Usuario o contraseña incorrectos.";
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
            <h2>Iniciar Sesion</h2>
            <form method="post">

                <div class="input-field">
                    <input type="usuario" name="usuario" placeholder="Nombre de usuario" required>
                    <i class="bx bxs-user"></i>
                </div>

                <div class="input-field">
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <i class="bx bxs-lock-alt"></i>
                </div>

                <a href="inicio.php"><button type="submit" class="login" name="enter">Iniciar sesion</button><br><br></a>
                <b>No estas registrado? </b><a href="registro.php" class="sign-up">Registrate</a>

            </form>
        </div>

</body>
</html>