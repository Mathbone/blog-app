<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Wilson Blog App</title>
  </head>
  <body>
    <h1>Blog App</h1>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
    <form class="login" action="includes/login.inc.php" method="post">
      <input type="text" name="login-username" placeholder="Username">
      <input type="text" name="login-pwd" placeholder="Password">
      <button type="button" name="login-submit">Login</button>
    </form>
    <form class="logout" action="includes/logout.inc.php" method="post">
      <button type="button" name="logout-submit">Logout</button>
    </form>
