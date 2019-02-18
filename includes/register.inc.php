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
  elseif (!filter_var($email)) {
    header("Location: ../register.php?error=invalidemail&uid=".$username."&email=".$email);
    exit();
  }


}
?>
