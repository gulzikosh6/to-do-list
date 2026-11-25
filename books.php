<?php
require_once 'config/db.php';
$pageTitle = "Кітаптар қоры";
$books = getBooksList($pdo);
require_once 'includes/header.php';
?>
<main class="container" style="padding:45px 22px;">
    <div class="section-top-bar">
        <h1 class="section-heading">Кітаптар тізімі</h1>
        <a href="create_book.php" class="btn-primary-glow">+ Кітап қосу</a>
    </div>
    <div class="books-grid">
        <?php foreach ($books as $book): ?>
            <article class="book-glass-card">
                <h3 class="book-title"><?= htmlspecialchars($book['title']) ?></h3>
                <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
                <p class="book-excerpt"><?= htmlspecialchars($book['description']) ?></p>
                <div class="book-card-actions">
                    <a href="edit_book.php?id=<?= (int)$book['id'] ?>" class="btn-edit-link">Өңдеу</a>
                    <a href="delete_book.php?id=<?= (int)$book['id'] ?>" class="btn-delete-link">Өшіру</a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
