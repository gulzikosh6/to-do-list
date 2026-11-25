<?php
$pageTitle = "Оқырманды тіркеу — Онлайн Кітапхана";
$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['password'] ?? '';

    if ($name === '' || $email === '' || strlen($pass) < 6) {
        $errorMessage = "Барлық өрістерді дұрыс толтырыңыз (құпиясөз кемінде 6 таңба).";
    } else {
        $successMessage = "Құрметті " . htmlspecialchars($name) . ", тіркелу сәтті аяқталды!";
    }
}
require_once 'includes/header.php';
?>
<main class="container">
    <div class="form-glass-card">
        <span class="section-kicker">POST сұранысын өңдеу</span>
        <h1 class="section-heading" style="margin-bottom:18px;">Оқырманды тіркеу</h1>
        <?php if ($successMessage): ?><div class="alert-box"><?= $successMessage ?></div><?php endif; ?>
        <?php if ($errorMessage): ?><div class="alert-error"><?= $errorMessage ?></div><?php endif; ?>
        <form method="POST" action="register.php">
            <div class="form-group">
                <label>Аты-жөніңіз</label>
                <input type="text" name="full_name" class="glass-input" required>
            </div>
            <div class="form-group">
                <label>Электронды пошта</label>
                <input type="email" name="email" class="glass-input" required>
            </div>
            <div class="form-group">
                <label>Құпиясөз</label>
                <input type="password" name="password" class="glass-input" required>
            </div>
            <button type="submit" class="btn-primary-glow" style="width:100%; justify-content:center;">Тіркелу</button>
        </form>
    </div>
</main>
<?php require_once 'includes/footer.php'; ?>
