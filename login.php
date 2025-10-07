<?php
session_start();
require 'config.php';
$message = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $stmt = $mysqli->prepare('SELECT password FROM users WHERE username=?');
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hash);
        $stmt->fetch();
        if (password_verify($_POST['password'], $hash)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: home.php'); exit;
        } else {
            $message = 'Parolă greșită!';
        }
    } else {
        $message = 'Utilizator inexistent!';
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Autentificare</title>
<style>
    body { background: #f5f8fa; font-family: Arial, sans-serif; }
    .container { max-width: 350px; margin: 80px auto; background: #fff; padding: 24px 32px 32px; border-radius: 8px; box-shadow: 0 8px 32px rgba(0,0,0,0.1);}
    h2 { margin-bottom: 18px; color: #222; text-align: center; }
    input[type=text], input[type=password] {
        width: 100%; padding: 10px; margin: 9px 0 18px 0; border: 1px solid #bbb; border-radius: 4px;
    }
    input[type=submit] {
        width: 100%; background: #0066cc; color: #fff; padding: 12px; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;
    }
    input[type=submit]:hover { background: #0051a8; }
    .msg { margin: 15px 0; color: #0a0; text-align: center; }
    .err { margin: 15px 0; color: #c00; text-align: center; }
    a { color: #0066cc; text-decoration: none; }
    a:hover { text-decoration: underline; }
</style>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <?php if ($message !== ""): ?>
    <div class="err"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <form method="post" autocomplete="off">
      <input type="text" name="username" placeholder="Utilizator" required>
      <input type="password" name="password" placeholder="Parolă" required>
      <input type="submit" name="login" value="Login">
    </form>
    <p style="text-align:center">Nu ai cont? <a href="register.php">Înregistrează-te</a></p>
</div>
</body>
</html>
