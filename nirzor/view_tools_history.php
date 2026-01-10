<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
require_once __DIR__ . "/db.php";

if (!isset($_POST['farmers_id']) || empty($_POST['farmers_id'])) {
    echo json_encode([
        "success" => false,
        "tools" => []
    ]);
    exit;
}

$farmers_id = intval($_POST['farmers_id']);

// SQL with alias to FIX quantity issue
$sql = "SELECT 
            tools_order_id,
            toolsName,
            toolsId,
            price,
            farmers_id,
            quantity AS quantity
        FROM tools_history
        WHERE farmers_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $farmers_id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$tools = [];

while ($row = mysqli_fetch_assoc($result)) {
    $tools[] = $row;
}

echo json_encode([
    "success" => true,
    "tools" => $tools
]);
