<?php
include 'conexion.php';
$status_usuario=$_GET['status_usuario'];

$consulta_status= "SELECT * FROM `lista_usuario` where status_usuario=1";
$resultado= $conexion -> query($consulta_status);

$lista_usuario = array(); // Inicializar el array de usuarios

while($fila=$resultado->fetch_array()){
    $usuario = array(
        "id_usuario" => $fila['id_usuario'],
        "nombre_completo" => $fila['nombre_completo'],
        "status_usuario" => $fila['status_usuario'],
    );
    $lista_usuario[] = $usuario;
}

// Convertir el array de usuarios a formato JSON con saltos de línea
$json_response = json_encode($lista_usuario, JSON_PRETTY_PRINT);

// Imprimir la respuesta JSON con saltos de línea
echo $json_response;

$resultado -> close();
?>
