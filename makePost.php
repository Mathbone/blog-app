<?php
  require "header.php";
?>
 <main id="main">
   <h1>Write your post:</h1>
   <form class="make-post" action="includes/makePost.inc.php" method="post">
     <textarea rows="20" cols="50" name="post-text" placeholder="Write a bulletin post..."></textarea>
     <button type="submit" name="post-submit">Submit</button>
   </form>
 </main>


<?php
  require 'footer.php';
?>
