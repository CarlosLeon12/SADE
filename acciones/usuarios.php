<?php
include('../db_connect.php');

$email = $_GET['email'];
$pass = $_GET['password'];

$sql = "SELECT * FROM tbl_usuarios WHERE correo_electronico='$email' AND contrasena='$pass'";
$resultado = $conn->query($sql);



if($resultado->num_rows > 0){
    header('Location: ../principal/lobi.php');
   
}else{
    header('Location: ../login/index.php?alerta=error');
}

?>