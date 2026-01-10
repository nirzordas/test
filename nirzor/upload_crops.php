<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
require_once __DIR__ . "/db.php";

if (
    empty($_POST['cropsName']) ||
    empty($_POST['price']) ||
    empty($_POST['quantity_in_kg']) ||
    empty($_POST['farmers_id'])
) {
    echo json_encode([
        "success" => false
    ]);
    exit;
}

$cropsName = mysqli_real_escape_string($conn, $_POST['cropsName']);
$price = intval($_POST['price']);
$quantity = intval($_POST['quantity_in_kg']);
$farmers_id = intval($_POST['farmers_id']);

$sql = "INSERT INTO crops (cropsName, price, quantity_in_kg, farmers_id)
        VALUES ('$cropsName', $price, $quantity, $farmers_id)";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}
