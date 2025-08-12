<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $usuarioIngresado = trim($_POST['usuario']);
    $contrasenaIngresada = trim($_POST['contra']);

    if (empty($usuarioIngresado) || empty($contrasenaIngresada)) {
        echo "❌ Usuario o contraseña vacíos.";
        exit;
    }

    $db = new SQLite3('base.db');

    // Buscar usuario en la base de datos
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt->bindValue(':usuario', $usuarioIngresado, SQLITE3_TEXT);
    $resultado = $stmt->execute();

    $usuario = $resultado->fetchArray(SQLITE3_ASSOC);

    if ($usuario) {
        $hashGuardado = $usuario['contra'];

        if (password_verify($contrasenaIngresada, $hashGuardado)) {
            // Inicio de sesión exitoso
            $_SESSION['usuario'] = $usuarioIngresado;
            echo "✅ Bienvenido, $usuarioIngresado";


            // Redirige al POS
            header("Location: POS_WEB.php");
            exit;
        } else {
            echo "❌ Contraseña incorrecta.";
        }
    } else {
        echo "❌ Usuario no encontrado.";
    }
} else {
    echo "Acceso no autorizado.";
}

?>

