<?php
require_once 'config/db.php';
$pageTitle = "Басты бет — Авторизация және Дерекқор";
$books = getBooksList($pdo);
require_once 'includes/header.php';
?>
<main>
    <section class="hero-section">
        <div class="container">
            <div class="hero-glass-card">
                <span class="hero-tag">🔐 Сессия және Дерекқор модулі</span>
                <h1 class="hero-title">Жеке оқырман кабинеті бар кітапхана</h1>
                <p class="hero-subtitle">Жүйеге тіркеліп кіру арқылы кітаптар қорын толық пайдаланыңыз. Төмендегі «Басты бет» батырмасы арқылы каталогқа өтіңіз.</p>
                <div class="hero-buttons">
                    <button type="button" id="openMainContentBtn" class="btn-primary-glow">Басты бет — Әрі қарай ашу ↓</button>
                    <a href="login.php" class="btn-secondary-glass">Жүйеге кіру</a>
                </div>
            </div>
        </div>
    </section>
    <section id="catalog" class="expandable-section">
        <div class="container">
            <h2 class="section-heading" style="margin-bottom:22px;">Кітаптар қоры</h2>
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
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php require_once 'includes/footer.php'; ?>
