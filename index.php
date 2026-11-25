<?php
require_once 'config/db.php';
$pageTitle = "Басты бет — Онлайн Кітапхана";
$books = getBooksList($pdo);
require_once 'includes/header.php';
?>
<main>
    <section class="hero-section">
        <div class="container">
            <div class="hero-glass-card">
                <span class="hero-tag">✨ PHP негізіндегі динамикалық кітапхана</span>
                <h1 class="hero-title">Білім мен әдебиет әлеміне қош келдіңіз</h1>
                <p class="hero-subtitle">Серверлік тіл көмегімен динамикалық түрде қалыптасатын электронды кітапхана жүйесі. «Басты бет» батырмасын басып каталогты ашыңыз.</p>
                <div class="hero-buttons">
                    <button type="button" id="openMainContentBtn" class="btn-primary-glow">Басты бет — Әрі қарай ашу ↓</button>
                    <a href="books.php" class="btn-secondary-glass">Кітаптар қоры</a>
                </div>
            </div>
        </div>
    </section>

    <section id="catalog" class="expandable-section">
        <div class="container">
            <div class="section-top-bar">
                <div>
                    <span class="section-kicker">Динамикалық тізім</span>
                    <h2 class="section-heading">Таңдаулы кітаптар</h2>
                </div>
                <div style="min-width:260px;">
                    <input type="text" id="liveSearchInput" class="glass-input" placeholder="Кітап іздеу...">
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
        </div>
    </section>
</main>
<?php require_once 'includes/footer.php'; ?>
