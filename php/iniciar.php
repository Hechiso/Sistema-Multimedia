<?php

session_start();
$sessionId = session_id(); // Obtiene el identificador de la sesión


echo "El ID de la sesión es: " . $sessionId;


if (isset($_POST['enviar'])) {

    $usuario = trim($_POST['usuario']); // Eliminar espacios en blanco
    $archivo = "Lista_usuarios.txt";

    // Verificar si el archivo existe antes de leerlo
    if (!file_exists($archivo)) {
	    // header("Location: error_no_archivo.html");
	    echo "el archivo registro.txt no existe.";
        exit;
    }

    $lineasArchivo = file($archivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $loginExitoso = false; // Bandera para verificar autenticación

    foreach ($lineasArchivo as $linea) {
        if (preg_match('/^USUARIO:\s*(.+)$/', $linea, $matches)) {
            $archivoUsuario = trim($matches[1]);
            // Verificar si el usuario coincide
            if ($archivoUsuario === $usuario) {
                $loginExitoso = true;
                break;
            }
        }
    }

    if ($loginExitoso) {
	      $_SESSION['usuario'] = $_POST['usuario'];  // Guardar el usuario en la sesión
	      header("Location: ../paginas/videos_q.php");
        exit;
    } else {
        echo "Usuario no registrado.";
        exit;
    }
    } else {
        echo "Acceso no autorizado.";
    }

?>


