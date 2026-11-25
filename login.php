<?php
require_once 'config/db.php';
$pageTitle = "Жүйеге кіру";
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['password'] ?? '';
    if ($pdo !== null) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($pass, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['full_name'];
            header("Location: index.php#catalog");
            exit();
        } else {
            $error = "Пошта немесе құпиясөз қате.";
        }
    } else {
        $_SESSION['user_id'] = 1;
        $_SESSION['user_name'] = explode('@', $email)[0];
        header("Location: index.php#catalog");
        exit();
    }
}
require_once 'includes/header.php';
?>
<main class="container">
    <div class="form-glass-card">
        <h1 class="section-heading" style="margin-bottom:18px;">Жүйеге кіру</h1>
        <?php if ($error): ?><div class="alert-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
        <form method="POST">
            <div class="form-group"><label>Электронды пошта</label><input type="email" name="email" class="glass-input" required></div>
            <div class="form-group"><label>Құпиясөз</label><input type="password" name="password" class="glass-input" required></div>
            <button type="submit" class="btn-primary-glow" style="width:100%; justify-content:center;">Кіру</button>
        </form>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
