<?php
    require "header.php";
    require "includes/dbh.inc.php";
?>

        <main>
            
                <?php
                    //$author = $_SESSION['userUId'];
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM articles where id='$id';";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                        
                            
                                echo "<div class='post'>";
                                    echo "<h1>".$row['title']."</h1>";
                                    echo "<p class='text'>".$row['text']."</p>";
                                echo "</div>";

                                
                    }
                ?>
                
            
                       
      </main>
                  
