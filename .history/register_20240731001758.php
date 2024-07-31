<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$username, $hashed_password]);
        echo "Usuario registrado exitosamente";
    } catch (PDOException $e) {
        echo "Error en el registro: " . $e->getMessage();
    }
}
?>
