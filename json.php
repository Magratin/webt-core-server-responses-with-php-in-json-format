<?php
header('Content-Type: application/json');
require_once 'audio.php';

$ostId = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($ostId === null) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing OST ID']);
    exit;
}

$osts = seeder::create();

$foundOST = null;
foreach ($osts as $ost) {
    if ($ost->getId() === $ostId) {
        $foundOST = $ost;
        break;
    }
}

if ($foundOST) {
    echo json_encode($foundOST);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'OST not found']);
}
