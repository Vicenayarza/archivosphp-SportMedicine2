<?php

$DB_SERVER="localhost"; #la dirección del servidor
$DB_USER="Xvayarza001"; #el usuario para esa base de datos
$DB_PASS="FB9f9DYKcy"; #la clave para ese usuario
$DB_DATABASE="Xvayarza001_SportMedicine"; #la base de datos a la que hay que conectarse
# Se establece la conexión:
$con = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_DATABASE);

if (mysqli_connect_errno()) {
    echo 'Error de conexion: ' . mysqli_connect_error();
    exit();
}

$parametros = json_decode( file_get_contents( 'php://input' ), true );
$usuario = $parametros["usuario"];
$contrasena = $parametros["contrasena"];
$nombre = $parametros["nombre"];
$apellido = $parametros["apellido"];
$telefono = $parametros["telefono"];

// Preparación de la consulta SQL
$sql = "INSERT INTO usuario (usuario,contraseña,nombre,apellido,telefono) VALUES ('$usuario','$contrasena','$nombre','$apellido','$telefono')";


// Ejecución de la consulta SQL
if ($con->query($sql) === TRUE) {
    echo "true";
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


$con->close();

?>