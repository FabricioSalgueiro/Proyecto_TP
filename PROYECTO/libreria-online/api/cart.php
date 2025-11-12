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
$method = $_SERVER['REQUEST_METHOD'];


$input = json_decode(file_get_contents('php://input'), true);
$book_id = $input['book_id'] ?? null;

try {
    if ($method === 'GET') {
        
        $stmt = $pdo->prepare("
            SELECT 
                ci.book_id, ci.quantity, b.title, b.price 
            FROM cart_items ci
            JOIN books b ON ci.book_id = b.id
            WHERE ci.user_id = ?
        ");
        $stmt->execute([$user_id]);
        $cart_items = $stmt->fetchAll();

        echo json_encode(['success' => true, 'data' => $cart_items]);

    } elseif ($method === 'POST') {
        
        if (!$book_id) {
             http_response_code(400); 
             echo json_encode(['success' => false, 'message' => 'Falta book_id.']);
             exit;
        }

        
        $stmt = $pdo->prepare("
            INSERT INTO cart_items (user_id, book_id, quantity)
            VALUES (?, ?, 1)
            ON DUPLICATE KEY UPDATE quantity = quantity + 1
        ");
        $stmt->execute([$user_id, $book_id]);

        echo json_encode(['success' => true, 'message' => 'Libro añadido/actualizado en el carrito.']);

    } elseif ($method === 'DELETE') {
        

        if ($book_id) {
            
            $stmt = $pdo->prepare("DELETE FROM cart_items WHERE user_id = ? AND book_id = ?");
            $stmt->execute([$user_id, $book_id]);
            echo json_encode(['success' => true, 'message' => 'Libro eliminado del carrito.']);
        } else {
            
            $pdo->beginTransaction();
            
            
            $stmt_items = $pdo->prepare("SELECT book_id FROM cart_items WHERE user_id = ?");
            $stmt_items->execute([$user_id]);
            $items_to_purchase = $stmt_items->fetchAll(PDO::FETCH_COLUMN);

            if (empty($items_to_purchase)) {
                $pdo->rollBack();
                echo json_encode(['success' => false, 'message' => 'El carrito está vacío.']);
                exit;
            }
            
           
            $sql_insert = "INSERT IGNORE INTO purchases (user_id, book_id) VALUES (?, ?)";
            $stmt_insert = $pdo->prepare($sql_insert);

            foreach ($items_to_purchase as $book_id_purchased) {
                $stmt_insert->execute([$user_id, $book_id_purchased]);
            }
            
            
            $stmt_clear = $pdo->prepare("DELETE FROM cart_items WHERE user_id = ?");
            $stmt_clear->execute([$user_id]);

            $pdo->commit(); 
            echo json_encode(['success' => true, 'message' => 'Compra finalizada con éxito y carrito vaciado.']);
        }

    } else {
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
    }

} catch (PDOException $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Error de servidor: ' . $e->getMessage()]);
}
exit;
?>