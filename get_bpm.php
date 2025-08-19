<?php
require_once 'db.php'; // conexão PDO

header('Content-Type: application/json; charset=utf-8');

$stmt = $pdo->query("SELECT bpm FROM batimentos ORDER BY data_hora DESC LIMIT 1");
$batimento = $stmt->fetch(PDO::FETCH_ASSOC);

if ($batimento && isset($batimento['bpm'])) {
    echo json_encode(["bpm" => (int)$batimento['bpm']]);
} else {
    echo json_encode(["bpm" => 0]);
}
