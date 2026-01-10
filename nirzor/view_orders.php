<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
require_once __DIR__ . "/db.php";

if (!isset($_POST['farmers_id'])) {
    echo json_encode([
        "success" => false,
        "orders" => []
    ]);
    exit;
}

$farmers_id = intval($_POST['farmers_id']);

$sql = "SELECT orderId, cropsName, cropsId, price, farmers_id, client_id
        FROM order_history
        WHERE farmers_id = $farmers_id";

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
    exit;
}

$orders = [];

while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}

echo json_encode([
    "success" => true,
    "orders" => $orders
]);
