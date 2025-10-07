<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php'); exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Acasă</title>
<style>
body { background: #f5f8fa; font-family: Arial, sans-serif; }
.container { max-width: 400px; margin: 80px auto; background: #fff; padding: 36px 36px 36px; border-radius: 8px; box-shadow: 0 8px 32px rgba(0,0,0,0.08);}
h1 { color: #222; text-align: center; }
a { display: block; color: #0066cc; margin: 20px auto 0; width: 80px; text-align: center; text-decoration: none; padding: 7px 0; border-radius: 4px; background: #ededed; transition: all .2s;}
a:hover { background: #0066cc; color: #fff; }
</style>
</head>
<body>
<div class="container">
    <h1>Bine ai venit, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
