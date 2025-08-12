<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica si la petición es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario
    $usuario = trim($_POST['usuario']);
    $contra = trim($_POST['contra']);

    // Valida si están vacíos (extra seguridad)
    if (empty($usuario) || empty($contra)) {
        echo "❌ Error: usuario o contraseña vacíos.";
        exit();
    }

    // Conectar a la base de datos
   $db = new SQLite3('base.db');

$query = "CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario TEXT NOT NULL,
    contra TEXT NOT NULL
)";

if ($db->exec($query)) {
    echo "✅ Tabla 'usuarios' creada o ya existente.";
} else {
    echo "❌ Error al crear la tabla: " . $db->lastErrorMsg();
    exit();
}


    // Verificar si ya existe el usuario
    $stmt_check = $db->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
    $stmt_check->bindValue(':usuario', $usuario, SQLITE3_TEXT);
    $result = $stmt_check->execute();

    if ($result->fetchArray()) {
        echo "⚠️ El usuario ya está registrado.";
        exit();
    }
$hash = password_hash($contra, PASSWORD_DEFAULT); // Hashea la contraseña


    // Insertar nuevo usuario
$hash = password_hash($contra, PASSWORD_DEFAULT);

$db->exec("INSERT INTO usuarios (usuario, contra) VALUES ('$usuario', '$hash')");

$stmt->bindValue(':usuario', $usuario, SQLITE3_TEXT);
    $stmt->bindValue(':contra', $contra, SQLITE3_TEXT);

    try {
        $stmt->execute();
        echo "✅ Usuario registrado con éxito.";
        // Redirige al POS si todo salió bien
        // header("Location: POS.php");
        // exit();
    } catch (Exception $e) {
        echo "❌ Error al registrar usuario: " . $e->getMessage();
    }
}
?>

