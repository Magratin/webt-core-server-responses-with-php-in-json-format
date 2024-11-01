<?php
header('Content-Type: application/json');
require_once 'audio.php';


$allOSTs = isset($_GET['all']) && $_GET['all'] === 'true';
$ostId = isset($_GET['id']) ? intval($_GET['id']) : null;

$osts = seeder::create();

if ($allOSTs || $ostId === null) {
    echo json_encode($osts);
    exit;
}


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
