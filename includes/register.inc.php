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
    else{
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0){
        header("Location: ../register.php?error=usertaken&uid=".$username."&email=".$email);
        exit();
      }
      else{
        $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../register.php?error=sqlerror&uid=".$username."&email=".$email);
          exit();
        }
        else{
          $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../register.php?signup=success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
  header("Location: ../register.php");
  exit();
}
?>
