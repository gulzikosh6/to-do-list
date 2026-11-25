<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$pageTitle = $pageTitle ?? 'Онлайн Кітапхана';
$currentFile = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="ambient-bg">
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>
</div>
<header class="site-header">
    <div class="container header-inner">
        <a href="index.php#catalog" class="brand-logo">📚 Онлайн Кітапхана</a>
        <nav class="main-nav">
            <a href="<?= $currentFile === 'index.php' ? '#catalog' : 'index.php#catalog' ?>" id="navHomeBtn" class="nav-link active">Басты бет</a>
            <a href="books.php" class="nav-link">Кітаптар қоры</a>
            <?php if (file_exists(__DIR__ . '/../create_book.php')): ?>
                <a href="create_book.php" class="nav-link">Кітап қосу</a>
            <?php endif; ?>
            <?php if (file_exists(__DIR__ . '/../login.php')): ?>
                <?php if (!empty($_SESSION['user_id'])): ?>
                    <span class="category-chip">👤 <?= htmlspecialchars($_SESSION['user_name'] ?? 'Оқырман') ?></span>
                    <a href="logout.php" class="nav-link">Шығу</a>
                <?php else: ?>
                    <a href="login.php" class="nav-link">Кіру</a>
                    <a href="register.php" class="nav-link">Тіркелу</a>
                <?php endif; ?>
            <?php endif; ?>
        </nav>
    </div>
</header>
