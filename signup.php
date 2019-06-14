<?php
    require "header.php";
?>

        <main>
            <div class="content add-article-form">
        <h1>Signup</h1>
          <form action="includes/signup.inc.php" method="post">
          <div>
          <input type="text" name="uid" placeholder="Username">

          </div>
          <div>
          <input type="text" name="mail" placeholder="E-mail">

          </div>
          <div>
          <input type="password" name="pwd" placeholder="Password">
        </div>
        <div>
        <button class="btn" type="submit" name="signup-submit">Signup</button>

        </div>
          </form>  
         </main>
         </div>
