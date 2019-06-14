<?php
    require "header.php";
?>

        <main>
        <?php
                    
                    if(isset($_SESSION['userId'])){
                        header('Location: articles.loggedin.php');

                    } else {
                        echo 'You have to be logged in to see your articles!';
                    }
                    
                ?>
        </main>

