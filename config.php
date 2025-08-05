<?php
$host = 'dpg-d28rsdur433s73bt3vn0-a.frankfurt-postgres.render.com';
$dbname = 'zsvudb';
$user = 'zsvuuser';
$password = 'XesjBLjxZ6NVurlaNwSonp1vK93FfYuj';
$port = 5432;

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Datenbankverbindung fehlgeschlagen']);
    exit;
}
?>
