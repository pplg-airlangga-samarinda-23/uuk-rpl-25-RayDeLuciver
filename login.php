
<?php
session_start();
include('db.php');
include('functions.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = login($username, $password);
    
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: ' . ($user['role'] == 'admin' ? 'admin.php' : 'kader.php'));
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Posyandu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <form method="post" action="">
            <h2>Login Posyandu</h2>
            <?php if (isset($error)) echo "<p>$error</p>"; ?>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
