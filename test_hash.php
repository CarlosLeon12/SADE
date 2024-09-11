<?php
// La contraseña que quieres cifrar
$pass = 'mi_contraseña_secreta';

// Crear un hash de la contraseña
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);
echo 'Hash generado: ' . $hashed_password . '<br>';

// Simular una entrada de contraseña del usuario
$input_pass = 'mi_contraseña_secreta'; // Cambia este valor para probar
if (password_verify($input_pass, $hashed_password)) {
    echo 'Contraseña correcta';
} else {
    echo 'Contraseña incorrecta';
}
?>
