<?php

$servidor="localhost";
$baseDatos="restaurante";   
$usuario="root";
$contrasenia="";
 
try{

    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos",$usuario,$contrasenia);
    //echo "Conectado";
}catch(Exception $error){
    echo $error->getMessage();
}


?>