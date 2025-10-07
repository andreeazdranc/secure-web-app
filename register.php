<?php
require 'config.php';
$message = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) {
        $message = "Cont creat cu succes!";
    } else {
        $message = "Eroare: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Înregistrare</title>
    <style>
        body { background: #f5f5f5; font-family: Arial, sans-serif; }
        .container { max-width: 350px; margin: 80px auto; background: #fff; padding: 32px 36px; border-radius: 6px; box-shadow: 0 8px 32px rgba(0,0,0,0.1);}
        h2 { margin-bottom: 18px; color: #222; text-align: center; }
        input[type=text], input[type=password] { width: 100%; padding: 11px; margin: 10px 0 18px 0; border: 1px solid #bbb; border-radius: 4px;}
        input[type=submit] { width: 100%; background: #0066cc; color: #fff; padding: 11px; border: none; border-radius: 4px; font-size: 15px;}
        input[type=submit]:hover { background: #004b99;}
        .msg { color: #0a0; text-align: center; margin: 7px 0 13px;}
        .err { color: #c00; text-align: center; margin: 7px 0 13px;}
        a { color: #0066cc;}
        a:hover { text-decoration: underline;}
    </style>
</head>
<body>
<div class="container">
    <h2>Înregistrare</h2>
    <?php if ($message !== ""): ?>
    <div class="<?php echo strpos($message, 'Eroare') !== false ? 'err':'msg'; ?>">
        <?php echo htmlspecialchars($message); ?>
    </div>
    <?php endif; ?>
    <form method="post" autocomplete="off">
      <input type="text" name="username" placeholder="Utilizator" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
      <input type="password" name="password" placeholder="Parolă" required>
      <input type="submit" name="register" value="Înregistrează-te">
    </form>
    <p style="text-align:center">Ai deja cont? <a href="login.php">Login</a></p>
</div>
</body>
</html>