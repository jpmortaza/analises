<?php
session_start();
if (!($_SESSION['logged'] ?? false)) {
    header('Location: login.php');
    exit;
}
require '../config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $stmt = $pdo->prepare('INSERT INTO news (title, content, created_at) VALUES (?, ?, NOW())');
    $stmt->execute([$title, $content]);
}
$news = $pdo->query('SELECT id, title FROM news ORDER BY created_at DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Admin - Notícias</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Gerenciar Notícias</h2>
<a href="logout.php">Sair</a>
<h3>Adicionar</h3>
<form method="post">
<label>Título:<br><input type="text" name="title"></label><br>
<label>Conteúdo:<br><textarea name="content"></textarea></label><br>
<button type="submit">Salvar</button>
</form>
<h3>Existentes</h3>
<ul>
<?php foreach ($news as $n): ?>
<li><?= htmlspecialchars($n['title']); ?></li>
<?php endforeach; ?>
</ul>
</body>
</html>
