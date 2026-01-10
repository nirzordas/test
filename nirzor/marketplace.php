<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
require_once __DIR__ . "/db.php";

$sql = "SELECT cropsId, cropsName, price, farmers_id, quantity_in_kg FROM crops";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
    exit;
}

$crops = [];

while ($row = mysqli_fetch_assoc($result)) {
    $crops[] = $row;
}

echo json_encode([
    "success" => true,
    "crops" => $crops
]);
