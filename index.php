<?php
require_once 'config/db.php';
$pageTitle = "Басты бет — Кітаптар қорын басқару";
$books = getBooksList($pdo);
require_once 'includes/header.php';
?>
<main>
    <section class="hero-section">
        <div class="container">
            <div class="hero-glass-card">
                <span class="hero-tag">🗂️ CRUD басқару жүйесі</span>
                <h1 class="hero-title">Кітаптар қорын толық басқару</h1>
                <p class="hero-subtitle">Жаңа кітаптарды қосу, бар мәліметтерді өңдеу және каталогтан өшіру мүмкіндігі. «Басты бет» батырмасын басып каталогқа өтіңіз.</p>
                <div class="hero-buttons">
                    <button type="button" id="openMainContentBtn" class="btn-primary-glow">Басты бет — Әрі қарай ашу ↓</button>
                    <a href="create_book.php" class="btn-secondary-glass">+ Жаңа кітап қосу</a>
                </div>
            </div>
        </div>
    </section>

    <section id="catalog" class="expandable-section">
        <div class="container">
            <h2 class="section-heading" style="margin-bottom:22px;">Каталогты басқару</h2>
            <div class="books-grid">
                <?php foreach ($books as $book): ?>
                    <article class="book-glass-card">
                        <div class="book-card-header">
                            <span class="category-chip"><?= htmlspecialchars($book['category']) ?></span>
                            <span class="year-chip"><?= (int)$book['publish_year'] ?> ж.</span>
                        </div>
                        <h3 class="book-title"><?= htmlspecialchars($book['title']) ?></h3>
                        <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
                        <p class="book-excerpt"><?= htmlspecialchars($book['description']) ?></p>
                        <div class="book-card-actions">
                            <a href="edit_book.php?id=<?= (int)$book['id'] ?>" class="btn-edit-link">Өңдеу</a>
                            <a href="delete_book.php?id=<?= (int)$book['id'] ?>" class="btn-delete-link" onclick="return confirm('Өшіруге сенімдісіз бе?');">Өшіру</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php require_once 'includes/footer.php'; ?>
