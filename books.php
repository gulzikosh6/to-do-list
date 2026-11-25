<?php
require_once 'config/db.php';
$pageTitle = "Кітаптар қоры";
$books = getBooksList($pdo);
require_once 'includes/header.php';
?>
<main class="container" style="padding:45px 22px;">
    <h1 class="section-heading" style="margin-bottom:24px;">Кітаптар тізімі</h1>
    <div class="books-grid">
        <?php foreach ($books as $book): ?>
            <article class="book-glass-card">
                <h3 class="book-title"><?= htmlspecialchars($book['title']) ?></h3>
                <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
                <p class="book-excerpt"><?= htmlspecialchars($book['description']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
