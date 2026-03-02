<?php
session_start();

if (isset($_SESSION['user'])) {
  header("Location: views/home.php");
  exit;
}

$error = "";

if (isset($_POST['login'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  if ($user === "admin" && $pass === "admin") {
    $_SESSION['user'] = "ADMIN";
    header("Location: views/home.php");
    exit;
  } else {
    $error = "Invalid username or password";
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Management System</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="wrap">
  <div class="box">
    <div class="center">
      <h2>Student Management System</h2>
      <p class="muted">Login</p>
    </div>

    <p class="msg center"><?php echo $error; ?></p>

    <form method="post">
      <label>Username</label>
      <input type="text" name="user" required>

      <label>Password</label>
      <input type="password" name="pass" required>

      <p class="center" style="margin-top:16px;">
        <button type="submit" name="login">Login</button>
      </p>
    </form>
  </div>
</div>
</body>
</html>