<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta chasrset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>
        
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet"  href="style.css" type="text/css"/>
        
    </head>
<body>
    <header>
        <nav class="navbar navbar-expand-md justify-content-between navbar-dark bg-dark">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <a class="navbar-brand" href="#">
                MS OSIJEK
            </a>
            <div class="collapse navbar-collapse justify-content-between " id="collapse_target"> 
               <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="galery.php">Galery</a></li>
                    <li class="nav-item"><a class="nav-link" href="articles.php">My articles</a></li>
                </ul>
                    <?php
                        
                        if(isset($_SESSION['userId'])){
                            echo '<form class="form-inline" action="includes/logout.inc.php" method="post">
                            <button type="submit" class="btn btn-sm btn-light" name="logout-submit">Logout</button>
                            </form>'; 
                            echo '<a class="navbar-brand" href="editProfile.php">EDIT PROFILE</a>';

                        } else {
                            echo '<form class="form-inline" action="includes/login.inc.php" method="post">
                            <input type="text" name="mailuid" placeholder="Username/E-mail...">
                            <input type="password" name="pwd" placeholder="Password...">
                            <button type="submit" class="btn btn-light btn-sm " name="login-submit">Login</button>
                            </form>
                            <a class="navbar-brand" href="signup.php">SIGNUP</a>';
                        }
                        
                    ?>
                    
                
            
                    </div>
        </nav>
    </header>