<?php
require_once 'config/db.php';
$pageTitle = "Кітаптар қоры — Онлайн Кітапхана";
$books = getBooksList($pdo);
require_once 'includes/header.php';
?>
<main class="container" style="padding: 45px 22px;">
    <div class="section-top-bar">
        <div>
            <span class="section-kicker">Электронды каталог</span>
            <h1 class="section-heading">Барлық кітаптар тізімі</h1>
        </div>
    </div>
    <div class="books-grid">
        <?php foreach ($books as $book): ?>
            <article class="book-glass-card">
                <div class="book-card-header">
                    <span class="category-chip"><?= htmlspecialchars($book['category']) ?></span>
                    <span class="year-chip"><?= (int)$book['publish_year'] ?> ж.</span>
                </div>
                <h3 class="book-title"><?= htmlspecialchars($book['title']) ?></h3>
                <p class="book-author">Авторы: <strong><?= htmlspecialchars($book['author']) ?></strong></p>
                <p class="book-excerpt"><?= htmlspecialchars($book['description']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
