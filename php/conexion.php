<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "banco";

$con = new mysqli($servername, $username, $password, $db);

if ($con -> connect_error){
    die ("Error conexion: ".$con->connect_error);

}


// else{
//     echo ("Enlace exitoso a la base de datos. ");

// }

?>