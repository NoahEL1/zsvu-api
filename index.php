<?php
require 'config.php';

header('Content-Type: application/json');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 1000;
$offset = ($page - 1) * $limit;

try {
    $stmt = $pdo->prepare("SELECT * FROM zsvu_daten LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetchAll();

    echo json_encode([
        'page' => $page,
        'limit' => $limit,
        'data' => $data
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Abfrage fehlgeschlagen']);
}
?>