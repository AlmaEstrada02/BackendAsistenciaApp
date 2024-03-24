<?php
$hostname='localhost';
$database='asistencia_app';
$username='root';
$password='172902';

$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "lo sentimos, no se pudo realizar la conexión";
}
?>
