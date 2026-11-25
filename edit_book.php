<?php
require_once 'config/db.php';
$pageTitle = "Кітапты өңдеу";
$id = (int)($_GET['id'] ?? 1);
$book = getBooksList($pdo)[0];
if ($pdo !== null) {
    $stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
    $stmt->execute([$id]);
    $found = $stmt->fetch();
    if ($found) $book = $found;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($pdo !== null) {
        $stmt = $pdo->prepare("UPDATE books SET title=?, author=?, category=?, publish_year=?, description=? WHERE id=?");
        $stmt->execute([$_POST['title'], $_POST['author'], $_POST['category'], (int)$_POST['publish_year'], $_POST['description'], $id]);
    }
    header("Location: index.php#catalog");
    exit();
}
require_once 'includes/header.php';
?>
<main class="container">
    <div class="form-glass-card">
        <h1 class="section-heading" style="margin-bottom:18px;">Кітапты өңдеу</h1>
        <form method="POST">
            <div class="form-group"><label>Атауы</label><input type="text" name="title" class="glass-input" value="<?= htmlspecialchars($book['title']) ?>" required></div>
            <div class="form-group"><label>Авторы</label><input type="text" name="author" class="glass-input" value="<?= htmlspecialchars($book['author']) ?>" required></div>
            <div class="form-group"><label>Санаты</label><input type="text" name="category" class="glass-input" value="<?= htmlspecialchars($book['category']) ?>" required></div>
            <div class="form-group"><label>Жылы</label><input type="number" name="publish_year" class="glass-input" value="<?= (int)$book['publish_year'] ?>"></div>
            <div class="form-group"><label>Сипаттамасы</label><textarea name="description" rows="4" class="glass-textarea" required><?= htmlspecialchars($book['description']) ?></textarea></div>
            <button type="submit" class="btn-primary-glow">Жаңарту</button>
        </form>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
