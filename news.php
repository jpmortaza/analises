<?php
require 'config.php';
$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare('SELECT title, content, DATE_FORMAT(created_at, "%d/%m/%Y") AS created FROM news WHERE id = ?');
$stmt->execute([$id]);
$news = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title><?= htmlspecialchars($news['title'] ?? 'Notícia não encontrada'); ?></title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1><a href="index.php">Portal de Notícias</a></h1>
</header>
<main>
<?php if ($news): ?>
<article>
<h2><?= htmlspecialchars($news['title']); ?></h2>
<p><small><?= $news['created']; ?></small></p>
<div><?= nl2br(htmlspecialchars($news['content'])); ?></div>
</article>
<?php else: ?>
<p>Notícia não encontrada.</p>
<?php endif; ?>
</main>
</body>
</html>
