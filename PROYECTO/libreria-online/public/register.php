<?php

session_start();


if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}


require_once __DIR__ . '/../config/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';


    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = 'Todos los campos son obligatorios.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'El formato del correo electrónico no es válido.';
    } elseif ($password !== $confirm_password) {
        $error = 'Las contraseñas no coinciden.';
    } elseif (strlen($password) < 6) {
        $error = 'La contraseña debe tener al menos 6 caracteres.';
    } else {
        try {
            
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
            $stmt->execute([$username, $email]);
            
            if ($stmt->fetch()) {
                $error = 'El nombre de usuario o correo electrónico ya está registrado.';
            } else {
                
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                
                $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$username, $email, $hashed_password]);

                $success = '¡Registro exitoso! Ahora puedes iniciar sesión.';
                
               
                header('Location: login.php?registered=true');
                exit();
            }
        } catch (PDOException $e) {
            $error = 'Error en la base de datos: ' . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Librería Online</title>
    <style>
    
body { 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
    
    
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url('../models.php/fondo2.jpg');
    background-size: cover;
    background-position: center;
    background-attachment: fixed; 
    background-color: #333; 
    
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}
.container {
    background: #ffffff; 
    padding: 35px 40px;
    border-radius: 12px;
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3); 
    width: 100%;
    max-width: 400px;
    border: 1px solid #e0d9cf;
}
h2 {
    color: #4c3b2e; 
    text-align: center;
    margin-bottom: 25px;
    font-size: 1.8em;
    border-bottom: 2px solid #a37b58; 
    padding-bottom: 10px;
}
label {
    display: block;
    margin-bottom: 5px;
    font-weight: 600; 
    color: #555;
}
input[type="email"], 
input[type="password"],
input[type="text"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #dcdcdc;
    border-radius: 8px; 
    box-sizing: border-box;
    transition: border-color 0.3s;
}
input:focus {
    border-color: #a37b58; 
    outline: none;
}
button {
    width: 100%;
    padding: 12px;
    background-color: #5a9b36; 
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.1em;
    font-weight: 700;
    transition: background-color 0.3s, transform 0.1s;
}
button:hover { 
    background-color: #4b802e; 
    transform: translateY(-1px); 
}
.error { 
    color: #cc4444; 
    background-color: #fee;
    padding: 10px;
    border: 1px solid #cc4444;
    border-radius: 5px;
    text-align: center; 
    margin-bottom: 15px; 
}
.success { 
    color: #4b802e; 
    background-color: #eff;
    padding: 10px;
    border: 1px solid #4b802e;
    border-radius: 5px;
    text-align: center; 
    margin-bottom: 15px; 
}
.switch-link {
    text-align: center;
    margin-top: 20px;
    font-size: 0.9em;
}
.switch-link a {
    color: #a37b58; 
    text-decoration: none;
    font-weight: 600;
}
.switch-link a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Crear Cuenta</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required value="<?php echo htmlspecialchars($username ?? ''); ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email ?? ''); ?>">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirmar Contraseña:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <button type="submit">Registrarme</button>
        </form>
        <p style="text-align: center; margin-top: 15px;">
            ¿Ya tienes cuenta? <a href="login.php">Inicia Sesión</a>
        </p>
    </div>
</body>
</html>