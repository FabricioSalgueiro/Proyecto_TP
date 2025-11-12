<?php

session_start();
header('Content-Type: application/json');


if (!isset($_SESSION['user_id'])) {
    http_response_code(401); 
    echo json_encode(['success' => false, 'message' => 'Acceso no autorizado.']);
    exit;
}


require_once __DIR__ . '/../config/db.php'; 
$user_id = $_SESSION['user_id'];

try {
   
    $stmt = $pdo->prepare("
        SELECT 
            p.book_id AS id, 
            b.title, 
            b.author,
            b.isbn
        FROM purchases p  
        JOIN books b ON p.book_id = b.id
        WHERE p.user_id = ?
        ORDER BY b.title ASC
    ");
    $stmt->execute([$user_id]);
    $purchased_books = $stmt->fetchAll();

    echo json_encode(['success' => true, 'data' => $purchased_books]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error al cargar mis libros: ' . $e->getMessage()]);
}
exit;
?>