<?php
    require "header.php";
    require "includes/dbh.inc.php";
?>

        <main>
            <div class="content">
                <h1>My articles</h1>
                <?php
                    $author = $_SESSION['userUId'];
                    $sql = "SELECT * FROM articles where author='$author';";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class='article_div'>";
                            echo "<img src='includes/img/".$row['image']."' class='post-image'>";
                                echo "<div class='post-preview'>";
                                    echo "<h1><a href='mysingle.php?id=".$row['id']."'>".$row['title']."</a></h1>";
                                    echo "<i class='far fa-user'>Author: ".$row['author']."</i>";
                                    echo "<p class='preview-text'>".$row['text']."</p>";
                                    echo "<a href='mysingle.php?id=".$row['id']."' class='btn read-more'>Read more</a>";
                                echo "</div>";
                        echo "</div>";
                    }
                ?>

            </div>
            <a href="addArticle.php"><button class="btn add-article">Add article!</button></a>

                <br><br><br><br>
                
            
           
        </main>

<?php
    require "footer.php";
?>