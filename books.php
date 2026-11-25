<?php
require_once 'config/db.php';
$pageTitle = "Кітаптарды іздеу, сүзу және беттеу";

$allBooks = getBooksList($pdo);
$search = trim($_GET['q'] ?? '');
$category = trim($_GET['category'] ?? 'all');
$categories = array_unique(array_column($allBooks, 'category'));

$filtered = array_values(array_filter($allBooks, function ($b) use ($search, $category) {
    $okSearch = $search === '' || mb_stripos($b['title'] . ' ' . $b['author'], $search) !== false;
    $okCat = $category === 'all' || $b['category'] === $category;
    return $okSearch && $okCat;
}));

$perPage = 3;
$totalItems = count($filtered);
$totalPages = max(1, (int)ceil($totalItems / $perPage));
$page = max(1, min($totalPages, (int)($_GET['page'] ?? 1)));
$offset = ($page - 1) * $perPage;
$pagedBooks = array_slice($filtered, $offset, $perPage);

require_once 'includes/header.php';
?>
<main class="container" style="padding: 45px 22px;">
    <span class="section-kicker">Іздеу, сүзу және пагинация</span>
    <h1 class="section-heading" style="margin-bottom:20px;">Кітаптар каталогы</h1>

    <form method="GET" action="books.php" style="display:flex; gap:12px; flex-wrap:wrap; margin-bottom:28px;">
        <input type="text" name="q" value="<?= htmlspecialchars($search) ?>" class="glass-input" style="flex:1 1 250px;" placeholder="Кітап атауы немесе авторы...">
        <select name="category" class="glass-select" style="flex:0 1 240px;">
            <option value="all">Барлық санаттар</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= htmlspecialchars($cat) ?>" <?= $category === $cat ? 'selected' : '' ?>><?= htmlspecialchars($cat) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn-primary-glow">Іздеу</button>
    </form>

    <div class="books-grid">
        <?php foreach ($pagedBooks as $book): ?>
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

    <div class="pagination-bar">
        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
            <a href="?q=<?= urlencode($search) ?>&category=<?= urlencode($category) ?>&page=<?= $p ?>"
               class="page-btn <?= $p === $page ? 'active' : '' ?>">
                <?= $p ?>
            </a>
        <?php endfor; ?>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
