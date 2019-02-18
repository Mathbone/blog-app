<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wilson Blog App</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <header>
      <nav class="navbar">
        <span class="open-slide">
          <a href="#" onclick="openSlideMenu()">
            <svg width="30" height="30">
              <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
              <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
              <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
            </svg>
          </a>
        </span>
        <ul class="navbar-nav">
          <li><a href="index.php">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <span class="regbar">
          <form class="login" action="includes/login.inc.php" method="post">
            <input type="text" name="login-username" placeholder="Username">
            <input type="text" name="login-pwd" placeholder="Password">
            <button type="submit" name="login-submit">Login</button>
          </form>
          <a href="register.php">Register</a>
          <form class="logout" action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
          </form>
        </span>
      </nav>
      <div id="side-menu" class="side-nav">
        <a class="btn-close" href="#" onclick="closeSlideMenu()">&times;</a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

    </header>
