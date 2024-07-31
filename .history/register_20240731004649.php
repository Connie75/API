<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Validar la contraseña (mínimo 8 caracteres, al menos una letra mayúscula, una minúscula y un número)
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
        echo "Error: La contraseña debe tener al menos 8 caracteres, incluyendo una letra mayúscula, una letra minúscula y un número.";
        echo "<br><a href='index.html'>Volver</a>";
        exit;
    }

    // Hashear la contraseña
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insertar el usuario en la base de datos
    $sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    try {
        $stmt->execute([$username, $hashed_password, $role]);
        echo "Usuario registrado exitosamente";
    } catch (PDOException $e) {
        echo "Error en el registro: " . $e->getMessage();
    }
}
?>
