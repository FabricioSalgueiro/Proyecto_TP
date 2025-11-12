<?php

session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$book_title = htmlspecialchars($_GET['title'] ?? 'Libro Desconocido');
$isbn = htmlspecialchars($_GET['isbn'] ?? 'N/A');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leyendo: <?php echo $book_title; ?></title>
    <style>

:root {
    --primary-color: #7b4e31; 
    --background-paper: #fffaf0; 
    --text-color: #2c2c2c; 
}
        
body { 
    font-family: 'Georgia', serif; 
    background-color: #f0ede8; 
    padding: 20px;
    margin: 0;
    line-height: 1.6;
    color: var(--text-color);
}
.reader-wrapper {
    max-width: 900px; 
    margin: 40px auto; 
    box-shadow: 0 5px 20px rgba(0,0,0,0.1); 
    border-radius: 12px;
    overflow: hidden; 
    border: 1px solid #ddd;
}
.reader-container { 
    background: var(--background-paper); 
    padding: 50px 70px; 
}

h1 { 
    color: var(--primary-color); 
    border-bottom: 2px solid var(--primary-color); 
    padding-bottom: 10px; 
    margin-bottom: 10px; 
    text-align: center; 
    font-size: 2.5em;
}
.metadata { 
    text-align: center; 
    color: #888; 
    font-style: italic; 
    margin-bottom: 40px; 
    font-size: 0.95em;
    font-weight: 500;
}
.book-content { 
    font-size: 1.15em; 
    color: var(--text-color);
    column-count: 1; 
    max-width: 700px; 
    margin: 0 auto;
    text-align: justify;
}
.book-content br {
    line-height: 1.5;
}


.back-link a {
    display: inline-block;
    background-color: var(--primary-color);
    color: white;
    padding: 10px 20px;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    margin-top: 40px;
    transition: background-color 0.3s, transform 0.1s;
}
.back-link a:hover {
    background-color: #633e24;
    transform: translateY(-1px);
}
.back-link {
    text-align: center; 
}

@media (max-width: 768px) {
    .reader-container {
        padding: 30px 20px;
    }
    h1 {
        font-size: 2em;
    }
    .book-content {
        font-size: 1.1em;
        column-count: 1;
        max-width: 100%;
    }
}
    </style>
</head>
<body>
    <div class="reader-wrapper">
        <div class="reader-container">
            <h1><?php echo $book_title; ?></h1>
            <p class="metadata">ISBN: <?php echo $isbn; ?> | Disfrutando de la lectura...</p>
            <div class="book-content">
                <p>
                    **CAPÍTULO 1: El Comienzo Simulacro**<br><br>
                    Este es solo un fragmento de texto simulado. En una aplicación real, el contenido completo del libro se cargaría aquí desde una fuente segura (como archivos en el servidor o un servicio de almacenamiento dedicado), y se aplicaría gestión de derechos digitales (DRM). Como indicaste, no tenemos acceso a la base de datos de libros completa, así que esto sirve como marcador de posición funcional.<br><br>
                    "Y entonces, al dar la vuelta a la esquina, se encontró con que el mundo no era el mismo. Las luces parpadeaban, y el aire olía a ozono y a promesas olvidadas. Era un mundo de código PHP y bases de datos MySQL, un lugar donde los precios siempre necesitaban un `parseFloat`."<br><br>
                    La aventura continuaba, un bucle infinito que solo podía ser detenido por un `exit()` bien colocado. Nuestro héroe, un usuario recién registrado, estaba a punto de descubrir el verdadero poder de los `header('Location: ...')`. El resto del libro está esperando tu próxima compra... o al menos, una simulación de ella.
                </p>
                </div>
            <p class="back-link">
                <a href="index.php#my-books-section">← Volver a Mis Libros</a>
            </p>
        </div>
    </div>
</body>
</html>