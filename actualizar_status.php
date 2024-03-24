<?php
header('Content-Type: application/json');
include 'conexion.php';

// Obtener los datos del usuario y el nuevo estado del status desde la solicitud POST
$id_usuario = intval($_POST['id_usuario']);
$status_usuario = intval($_POST['status_usuario']);

//prueba de actualizacion de datos
//$id_usuario=97250015;
//$status_usuario=0;

// Preparar la consulta MYSQL para realizar la actualizacion
$sentencia = $conexion->prepare("UPDATE lista_usuario SET status_usuario = ? WHERE id_usuario = ?");
$sentencia->bind_param('ii', $status_usuario, $id_usuario);

// Ejecutar la consulta
$sentencia->execute();

// Verificar si la consulta fue exitosa
if ($sentencia->affected_rows > 0) {
    $response = array('success' => true, 'message' => 'El status del usuario se actualizo correctamente.');
} else {
    // La actualización falló
    $response = array('success' => false, 'message' => 'No se pudo actualizar el status del usuario.');
}

// Cerrar la sentencia y la conexión a la base de datos
$sentencia->close();
$conexion->close();

// Enviar la respuesta en formato JSON
echo json_encode($response);
?>
