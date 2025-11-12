<?php


session_start();


if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}


require_once __DIR__ . '/../config/db.php';

$error = '';
$email_input = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $email_input = htmlspecialchars($email);

    
    if (empty($email) || empty($password)) {
        $error = 'Ambos campos son obligatorios.';
    } else {
        try {
            
            $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            
            if ($user && password_verify($password, $user['password'])) {
                
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                
                
                header('Location: index.php');
                exit();
            } else {
                $error = 'Email o contraseña incorrectos.';
            }
        } catch (PDOException $e) {
            $error = 'Error de conexión o base de datos.';
            
        }
    }
}


$registered_success = isset($_GET['registered']) && $_GET['registered'] === 'true' ? '¡Registro exitoso! Por favor, inicia sesión.' : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Librería Online</title>
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
        <h2>Iniciar Sesión</h2>
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <?php if ($registered_success): ?>
            <p class="success"><?php echo $registered_success; ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo $email_input; ?>">

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Entrar</button>
        </form>
        <p style="text-align: center; margin-top: 15px;">
            ¿No tienes cuenta? <a href="register.php">Crear Cuenta</a>
        </p>
    </div>
</body>
</html>