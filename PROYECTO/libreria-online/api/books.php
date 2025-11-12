<?php
// api/books.php
header('Content-Type: application/json');

// Incluir la conexión a la base de datos (ruta relativa a api/)
require_once __DIR__ . '/../config/db.php';

try {
    // Consulta para obtener todos los libros
    $stmt = $pdo->query("SELECT id, title, author, price, isbn FROM books ORDER BY title ASC");
    $books = $stmt->fetchAll();

    // Devolver la lista de libros
    echo json_encode(['success' => true, 'data' => $books]);

} catch (PDOException $e) {
    // En caso de error de la base de datos
    http_response_code(500); // Internal Server Error
    echo json_encode(['success' => false, 'message' => 'Error al cargar libros: ' . $e->getMessage()]);
}

exit;
?>