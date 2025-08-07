<?php
session_start();

if (!isset($_GET['id'])) {
    $_SESSION['error'] = "ID de artículo no proporcionado.";
    header("Location: Ventas.php");
    exit;
}

$id = $_GET['id'];

if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $index => $item) {
        if ($item['id'] == $id) {
            unset($_SESSION['carrito'][$index]);
            $_SESSION['carrito'] = array_values($_SESSION['carrito']);
            $_SESSION['mensaje'] = "Producto eliminado del carrito.";
            header("Location: Ventas.php");
            exit;
        }
    }
    $_SESSION['error'] = "Producto no encontrado en el carrito.";
} else {
    $_SESSION['error'] = "El carrito está vacío.";
}

header("Location: Ventas.php");
exit;
?>

