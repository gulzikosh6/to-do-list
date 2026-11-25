<?php
require_once 'config/db.php';
$id = (int)($_GET['id'] ?? 0);
if ($pdo !== null && $id > 0) {
    $stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$id]);
}
header("Location: index.php#catalog");
exit();
?>
