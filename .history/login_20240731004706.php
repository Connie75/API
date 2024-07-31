<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        echo "Autenticación satisfactoria";
    } else {
        echo "Error en la autenticación. Verifique su usuario y contraseña.";
        echo "<br><a href='index.html'>Volver</a>";
    }
}
?>
