<?php
require_once 'config.php';

$id = $_GET['id'] ?? null;

if ($id) {
    try {
        $stmt = $connect->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([':id' => $id]);
    } catch(PDOException $e) {
        // Error handling
    }
}

header("Location: index.php");
exit;
