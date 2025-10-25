<?php
session_start();
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';
    if ($user === 'admin' && $pass === 'admin') {
        $_SESSION['logged'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Credenciais inválidas';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<h2>Login</h2>
<?php if ($error) echo '<p>'.$error.'</p>'; ?>
<form method="post">
<label>Usuário: <input type="text" name="user"></label><br>
<label>Senha: <input type="password" name="pass"></label><br>
<button type="submit">Entrar</button>
</form>
</body>
</html>
