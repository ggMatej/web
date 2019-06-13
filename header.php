<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta chasrset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title></title>
        <link rel="stylesheet"  href="style.css" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        
    </head>
<body>
    <header>
        <nav class="nav">
            <a class="logo" href="#">
                <h4>MS OSIJEK</h4>
            </a>
            <div class="nav__other">
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="galery.php">Galery</a></li>
                <li><a href="articles.php">My articles</a></li>
            </ul>
            <div class="login-form">
                <?php
                    
                    if(isset($_SESSION['userId'])){
                        echo '<form action="includes/logout.inc.php" method="post">
                        <button type="submit" class="btn" name="logout-submit">Logout</button>
                        </form>'; 
                        echo '<a href="editProfile.php">EDIT PROFILE</a>';

                    } else {
                        echo '<form action="includes/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username/E-mail...">
                        <input type="password" name="pwd" placeholder="Password...">
                        <button type="submit" class="btn" name="login-submit">Login</button>
                        </form>
                        <a href="signup.php">Signup</a>';
                    }
                    
                ?>
                
            </div>
            </div>
            
        </nav>
    </header>