<?php
include 'config.php';

$id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("SELECT photo FROM portfolio WHERE id = ?");
$stmt->execute([$id]);
$port = $stmt->fetch();

if ($port && $port['photo'] != 'default.jpg' && file_exists('./uploads/' . $port['photo'])) {
    unlink('./uploads/' . $port['photo']);
}

$stmt = $pdo->prepare("DELETE FROM portfolio WHERE id = ?");
$stmt->execute([$id]);

header("Location: ./index.php");
exit;
?>