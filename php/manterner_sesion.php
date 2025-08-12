<?php
// Aumenta el tiempo de vida de la sesión a 8 horas (28800 segundos)
ini_set('session.gc_maxlifetime', 28800);
ini_set('session.cookie_lifetime', 28800);
session_start();

?>

