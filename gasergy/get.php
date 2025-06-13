<?php
session_start();
file_put_contents(__DIR__ . '/get_debug.log', date('c') . " get.php\n", FILE_APPEND);

if (!isset($_SESSION['user_id'])) {
    file_put_contents(__DIR__ . '/get_debug.log', "Not logged in\n", FILE_APPEND);
    header('Location: /auth-system/frt_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Buy Gasergy</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f9f9f9;
      text-align: center;
      padding: 50px;
    }
    .option {
      display: inline-block;
      padding: 20px;
      margin: 20px;
      background: white;
      border: 2px solid #3498db;
      border-radius: 10px;
      cursor: pointer;
    }
    .option:hover {
      background: #e0f3ff;
    }
    form {
      display: inline;
    }
  </style>
</head>
<body>

  <h1>Get Gasergy ⚡</h1>
  <p>Select how much Gasergy you want to add to your account:</p>

  <form action="add.php" method="POST">
    <input type="hidden" name="amount" value="10">
    <button class="option">+10 Gasergy</button>
  </form>

  <form action="add.php" method="POST">
    <input type="hidden" name="amount" value="50">
    <button class="option">+50 Gasergy</button>
  </form>

  <form action="add.php" method="POST">
    <input type="hidden" name="amount" value="100">
    <button class="option">+100 Gasergy</button>
  </form>

</body>
</html>
