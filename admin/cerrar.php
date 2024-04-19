<?php 

session_start();
session_destroy();
header("Location:login.php");

echo "Salir... cerrar sesión"; 

?>
