<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

header("Content-Type: application/json");
require_once __DIR__ . "/db.php";

/* ---------- FETCH TOOLS ---------- */
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = mysqli_query($conn, "SELECT toolsId, toolsName, price FROM tools");
    $tools = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $tools[] = $row;
    }

    echo json_encode([
        "success" => true,
        "tools" => $tools
    ]);
    exit;
}

/* ---------- RENT TOOL ---------- */
if (
    empty($_POST['toolsId']) ||
    empty($_POST['farmers_id']) ||
    empty($_POST['quantity'])
) {
    echo json_encode(["success" => false]);
    exit;
}

$toolsId = intval($_POST['toolsId']);
$farmers_id = intval($_POST['farmers_id']);

/* fetch tool data */
$toolQuery = mysqli_query($conn, "SELECT toolsName, price FROM tools WHERE toolsId = $toolsId");

if (mysqli_num_rows($toolQuery) === 0) {
    echo json_encode(["success" => false]);
    exit;
}

$tool = mysqli_fetch_assoc($toolQuery);
$toolsName = $tool['toolsName'];
$price = $tool['price'];

/* insert into tools_history */
$sql = "INSERT INTO tools_history (toolsName, toolsId, price, farmers_id)
        VALUES ('$toolsName', $toolsId, $price, $farmers_id)";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}

