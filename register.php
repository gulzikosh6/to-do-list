<?php
require_once 'config/db.php';
$pageTitle = "Тіркелу";
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['password'] ?? '';
    if ($name && $email && strlen($pass) >= 6) {
        if ($pdo !== null) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hash]);
            $_SESSION['user_id'] = $pdo->lastInsertId();
        } else {
            $_SESSION['user_id'] = 1;
        }
        $_SESSION['user_name'] = $name;
        header("Location: index.php#catalog");
        exit();
    } else {
        $error = "Барлық өрістерді дұрыс толтырыңыз.";
    }
}
require_once 'includes/header.php';
?>
<main class="container">
    <div class="form-glass-card">
        <h1 class="section-heading" style="margin-bottom:18px;">Жаңа оқырманды тіркеу</h1>
        <?php if ($error): ?><div class="alert-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <form method="POST">
            <div class="form-group"><label>Аты-жөні</label><input type="text" name="full_name" class="glass-input" required></div>
            <div class="form-group"><label>Пошта</label><input type="email" name="email" class="glass-input" required></div>
            <div class="form-group"><label>Құпиясөз</label><input type="password" name="password" class="glass-input" required></div>
            <button type="submit" class="btn-primary-glow" style="width:100%; justify-content:center;">Тіркелу</button>
        </form>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
