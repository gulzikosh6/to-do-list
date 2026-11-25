<?php
require_once 'config/db.php';
$pageTitle = "Жаңа кітап қосу";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $year = (int)($_POST['publish_year'] ?? 2025);
    $desc = trim($_POST['description'] ?? '');
    if ($pdo !== null && $title && $author) {
        $stmt = $pdo->prepare("INSERT INTO books (title, author, category, publish_year, description) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $author, $category, $year, $desc]);
    }
    header("Location: index.php#catalog");
    exit();
}
require_once 'includes/header.php';
?>
<main class="container">
    <div class="form-glass-card">
        <h1 class="section-heading" style="margin-bottom:18px;">Жаңа кітап қосу</h1>
        <form method="POST">
            <div class="form-group"><label>Кітап атауы</label><input type="text" name="title" class="glass-input" required></div>
            <div class="form-group"><label>Авторы</label><input type="text" name="author" class="glass-input" required></div>
            <div class="form-group"><label>Санаты</label><input type="text" name="category" class="glass-input" required></div>
            <div class="form-group"><label>Жылы</label><input type="number" name="publish_year" class="glass-input" value="2025"></div>
            <div class="form-group"><label>Сипаттамасы</label><textarea name="description" rows="4" class="glass-textarea" required></textarea></div>
            <button type="submit" class="btn-primary-glow">Сақтау</button>
        </form>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
