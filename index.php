<?php
  require "header.php";
?>
 <main id="main">
    <?php
    if (isset($_SESSION['userId'])){
      require 'includes/dbh.inc.php';

      $sql = "SELECT authoridPosts, textPosts, timestampPosts FROM posts ORDER BY timestampPosts DESC LIMIT 10";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ./error.php?error=prepare");
        exit();
      }
      else{
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($result)){
          $sql = "SELECT uidUsers FROM users WHERE idUsers = ".$row['authoridPosts'];
          $stmt = mysqli_stmt_init($conn);
          mysqli_stmt_prepare($stmt,$sql);
          mysqli_stmt_execute($stmt);
          $nameResult = mysqli_stmt_get_result($stmt);
          $authorName = mysqli_fetch_assoc($nameResult)['uidUsers'];
          echo '<div class="blog-post">'.$row['textPosts'].'<div class="author">'.$authorName.'</div><div class="timestamp">'.$row['timestampPosts'].'</div></div>';
        }
      }
    }
    else{
      echo '<h1 class="register-message">Please register or login to view blog posts.</h1>';
    }
    ?>
 </main>


<?php
  require 'footer.php';
?>
