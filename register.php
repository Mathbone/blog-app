<?php
  require "header.php";
?>
 <main>
   <h1>Register</h1>
   <form class="registration" action="includes/register.inc.php" method="post">
     <input type="text" name="uid" placeholder="Username">
     <input type="text" name="email" placeholder="Email">
     <input type="password" name="pwd" placeholder="Password">
     <input type="password" name="pwd-repeat" placeholder="Repeat Password">
     <button type="submit" name="register-submit">Submit</button>
   </form>
 </main>


<?php
  require 'footer.php';
?>
