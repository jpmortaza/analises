<?php
require 'config.php';
$stmt = $pdo->query('SELECT id, title, DATE_FORMAT(created_at, "%d/%m/%Y") AS created FROM news ORDER BY created_at DESC');
$news = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Portal de Notícias</title>
<meta name="description" content="Portal de notícias simples em PHP">
<link rel="stylesheet" href="style.css">
</head>
<body>
<header>
<h1>Portal de Notícias</h1>
<nav>
<a href="index.php">Home</a> | <a href="contact.php">Contato</a>
</nav>
</header>
<main>
<?php foreach ($news as $item): ?>
<article>
<h2><a href="news.php?id=<?= $item['id']; ?>"><?= htmlspecialchars($item['title']); ?></a></h2>
<p><small><?= $item['created']; ?></small></p>
</article>
<?php endforeach; ?>
</main>
</body>
</html>
