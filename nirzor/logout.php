<?php
session_start();
header("Content-Type: application/json");

if (session_status() === PHP_SESSION_ACTIVE) {
    session_unset();
    session_destroy();

    echo json_encode([
        "success" => true,
        "message" => "Logged out successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "No active session"
    ]);
}
