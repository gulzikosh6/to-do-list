<?php
require_once 'config/db.php';
$pageTitle = "Басты бет — Іздеу, Сүзгілеу және Беттеу";
$books = getBooksList($pdo);
require_once 'includes/header.php';
?>
<main>
    <section class="hero-section">
        <div class="container">
            <div class="hero-glass-card">
                <span class="hero-tag">🔎 Іздеу • Сүзгілеу • Пагинация</span>
                <h1 class="hero-title">Кеңейтілген іздеу жүйесі бар онлайн кітапхана</h1>
                <p class="hero-subtitle">Кітаптарды атауы мен санаты бойынша сүзгіден өткізіп, беттерге бөліп қарау жүйесі. «Басты бет» батырмасын басу арқылы каталогты ашыңыз.</p>
                <div class="hero-buttons">
                    <button type="button" id="openMainContentBtn" class="btn-primary-glow">Басты бет — Әрі қарай ашу ↓</button>
                    <a href="books.php" class="btn-secondary-glass">Толық іздеу беті</a>
                </div>
            </div>
        </div>
    </section>

    <section id="catalog" class="expandable-section">
        <div class="container">
            <div class="section-top-bar">
                <h2 class="section-heading">Таңдаулы кітаптар</h2>
                <div style="min-width:260px;">
                    <input type="text" id="liveSearchInput" class="glass-input" placeholder="Жылдам іздеу...">
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
                        <p class="book-author"><?= htmlspecialchars($book['author']) ?></p>
                        <p class="book-excerpt"><?= htmlspecialchars($book['description']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>
<?php require_once 'includes/footer.php'; ?>
