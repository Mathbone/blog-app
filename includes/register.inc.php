<?php


if (isset($_POST['register-submit'])){
  require 'dbh.inc.php';
  $username = $_POST['uid'];
  $email = $_POST['email'];
  $pwd = $_POST['pwd'];
  $pwdRepeat = $_POST['pwd-repeat'];

  if (empty($username) || empty($email) || empty($pwd) || empty($pwdRepeat)){
    header("Location: ../register.php?error=emptyfields&uid=".$username."&email=".$email);
    exit();
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalidemail&uid=".$username."&email=".$email);
    exit();
  }
  elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
    header("Location: ../register.php?error=invaliduid&uid=".$username."&email=".$email);
    exit();
  }
  elseif ($pwd != $pwdRepeat){
    header("Location: ../register.php?error=pwdcheck&uid=".$username."&email=".$email);
    exit();
  }
  else{
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../register.php?error=sqlerror&uid=".$username."&email=".$email);
      exit();
    }
  }


}
?>
