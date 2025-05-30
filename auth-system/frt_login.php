<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - HTML Master</title>
  <style>
    body {
      font-family: sans-serif;
      background: #f4f4f4;
      padding: 50px;
    }
    form {
      max-width: 400px;
      margin: auto;
      background: white;
      padding: 2em;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 0.8em;
      margin: 0.5em 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      padding: 0.8em;
      width: 100%;
      background-color: #27ae60;
      color: white;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background-color: #219150;
    }
  </style>
</head>
<body>

  <form method="POST" action="backend-login-src/login.php">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email address" required />
    <input type="password" name="password" placeholder="Password" required />
    <button type="submit">Log In</button>
  </form>

  <p style="text-align:center; margin-top: 1em;">
    Don't have an account?
    <a href="frt_register.php" style="color: #3498db; text-decoration: none; font-weight: bold;">
      Register here
    </a>
  </p>

</body>
</html>
