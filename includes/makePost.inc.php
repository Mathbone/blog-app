<?php
session_start();

if (isset($_POST['post-submit'])){
  require 'dbh.inc.php';
  $postText = htmlentities($_POST['post-text']);

  if (empty($postText)){
    header("Location: ../register.php?error=emptyPost");
    exit();
  }
  else{
    $sql = "INSERT INTO posts (textPosts, authoridPosts) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../makePost.php?error=sqlerror");
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "si", $postText, $_SESSION['userId']);
      mysqli_stmt_execute($stmt);
      header("Location: ../index.php?post=success");
      exit();
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else{
  header("Location: ../index.php");
  exit();
}
?>
