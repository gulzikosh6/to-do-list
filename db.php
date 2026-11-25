<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$host = 'localhost';
$dbname = 'online_library';
$username = 'root';
$password = '';
$pdo = null;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    $pdo = null;
}

function getBooksList(?PDO $pdo): array {
    if ($pdo !== null) {
        try {
            $rows = $pdo->query("SELECT * FROM books ORDER BY id DESC")->fetchAll();
            if (!empty($rows)) return $rows;
        } catch (PDOException $e) {}
    }
    return [
        ['id' => 1, 'title' => 'Абай жолы', 'author' => 'Мұхтар Әуезов', 'category' => 'Классикалық әдебиет', 'publish_year' => 1942, 'description' => 'Қазақ халқының өмірі мен рухани мәдениетін кеңінен суреттейтін ұлы роман-эпопея.'],
        ['id' => 2, 'title' => 'Қара сөздер', 'author' => 'Абай Құнанбайұлы', 'category' => 'Философия', 'publish_year' => 1909, 'description' => 'Адамгершілік, білім-ғылым, еңбек және тәрбие туралы пәлсапалық ой-толғамдар.'],
        ['id' => 3, 'title' => 'Көшпенділер', 'author' => 'Ілияс Есенберлин', 'category' => 'Тарихи трилогия', 'publish_year' => 1976, 'description' => 'Қазақ хандығының қалыптасуы мен ел тәуелсіздігі жолындағы күресті бейнелейтін тарихи туынды.'],
        ['id' => 4, 'title' => 'Қыз Жібек', 'author' => 'Халық мұрасы', 'category' => 'Ауыз әдебиеті', 'publish_year' => 1894, 'description' => 'Адал махаббат пен ел бірлігін жырлайтын лиро-эпостық дастан.'],
        ['id' => 5, 'title' => 'Веб-бағдарламалау негіздері', 'author' => 'А. Сейітов', 'category' => 'IT және бағдарламалау', 'publish_year' => 2025, 'description' => 'HTML, CSS, PHP және MySQL технологиялары бойынша практикалық оқу құралы.'],
        ['id' => 6, 'title' => 'Құтты білік', 'author' => 'Жүсіп Баласағұн', 'category' => 'Түркі мұрасы', 'publish_year' => 1069, 'description' => 'Әділетті қоғам, парасатты басқару мен білім қағидаларын баяндайтын дастан.']
    ];
}
?>
