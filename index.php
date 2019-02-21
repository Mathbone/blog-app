<?php
  require "header.php";
?>
 <main id="main">
    <?php
    if (isset($_SESSION['userId'])){

      for ($i=0; $i <10 ; $i++) {
        echo "Blog post: ".($i+1)."<br>";
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
