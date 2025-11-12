<?php

header('Content-Type: application/json');


require_once __DIR__ . '/../config/db.php';

try {

    $stmt = $pdo->query("SELECT id, title, author, price, isbn FROM books ORDER BY title ASC");
    $books = $stmt->fetchAll();


    echo json_encode(['success' => true, 'data' => $books]);

} catch (PDOException $e) {

    http_response_code(500); 
    echo json_encode(['success' => false, 'message' => 'Error al cargar libros: ' . $e->getMessage()]);
}

exit;
?>