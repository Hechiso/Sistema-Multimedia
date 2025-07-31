<?php

if (isset($_POST['enviar'])) {
    $usuario = trim($_POST['usuario']);
    $archivo = "Lista_usuarios.txt"; 
    $usuario_confirm = false;

    if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lineas as $linea) {
            if (strpos($linea, "USUARIO: " . $usuario) !== false) {
                $usuario_confirm = true;
                break;
            }
        }
    }

    if (!$usuario_confirm) {
        // Guardar usuario nuevo
        file_put_contents($archivo, "USUARIO: " . $usuario . PHP_EOL, FILE_APPEND);
        header("Location: POS.php"); // Registrado con éxito
    } else {
        header("Location: error.html"); // Ya existe
    }
    exit;
}

