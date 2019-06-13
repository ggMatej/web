<?php
    require "header.php";
    require "includes/dbh.inc.php"
?>

        <main>
        <div class="content">
                <h1>Articles</h1>
                <form action="#" method="POST">
                        <label for="filter">Filter by:</label>
                        <select class="select" name="filter">
                        <option value="default">Default</option>
                        <option value="training">Training</option>
                        <option value="race">Race</option>
                        <option value="other">Other</option>
                    </select><br>
                    <input class="btn" type="submit" name="submit" value="Filter!">
                </form>
                
                    <?php
                        if(isset($_POST['submit'])){
                            $value = $_POST['filter'];
                            if($value == "race"){
                                $sql = "SELECT * FROM articles WHERE category='race';";
                                $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<div class='article_div'>";
                                            echo "<img src='includes/img/".$row['image']."' class='post-image'>";
                                                echo "<div class='post-preview'>";
                                                    echo "<h1><a href='single.php?id=".$row['id']."'>".$row['title']."</a></h1>";
                                                    echo "<i class='far fa-user'>Author: ".$row['author']."</i>";
                                                    echo "<p class='preview-text'>".$row['text']."</p>";
                                                    echo "<a href='single.php?id=".$row['id']."' class='btn read-more'>Read more</a>";
                                                echo "</div>";
                                        echo "</div>";
                                    }
                            } else if($value == "training"){
                                $sql = "SELECT * FROM articles WHERE category='training';";
                                $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<div class='article_div'>";
                                            echo "<img src='includes/img/".$row['image']."' class='post-image'>";
                                                echo "<div class='post-preview'>";
                                                    echo "<h1><a href='single.php?id=".$row['id']."'>".$row['title']."</a></h1>";
                                                    echo "<i class='far fa-user'>Author: ".$row['author']."</i>";
                                                    echo "<p class='preview-text'>".$row['text']."</p>";
                                                    echo "<a href='single.php?id=".$row['id']."' class='btn read-more'>Read more</a>";
                                                echo "</div>";
                                        echo "</div>";
                                    }
                            } else if($value == "default") {
                                $sql = "SELECT * FROM articles;";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo "<div class='article_div'>";
                                        echo "<img src='includes/img/".$row['image']."' class='post-image'>";
                                            echo "<div class='post-preview'>";
                                                echo "<h1><a href='single.php?id=".$row['id']."'>".$row['title']."</a></h1>";
                                                echo "<i class='far fa-user'>Author: ".$row['author']."</i>";
                                                echo "<p class='preview-text'>".$row['text']."</p>";
                                                echo "<a href='single.php?id=".$row['id']."' class='btn read-more'>Read more</a>";
                                            echo "</div>";
                                    echo "</div>";
                                }
                            } else if($value == "other") {
                                $sql = "SELECT * FROM articles WHERE category='other';";
                                $result = mysqli_query($conn, $sql);
                                while($row = mysqli_fetch_array($result)){
                                    echo "<div class='article_div'>";
                                        echo "<img src='includes/img/".$row['image']."' class='post-image'>";
                                            echo "<div class='post-preview'>";
                                                echo "<h1><a href='single.php?id=".$row['id']."'>".$row['title']."</a></h1>";
                                                echo "<i class='far fa-user'>Author: ".$row['author']."</i>";
                                                echo "<p class='preview-text'>".$row['text']."</p>";
                                                echo "<a href='single.php?id=".$row['id']."' class='btn read-more'>Read more</a>";
                                            echo "</div>";
                                    echo "</div>";
                                }
                            }
                        }else{
                            $sql = "SELECT * FROM articles;";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                                echo "<div class='article_div'>";
                                    echo "<img src='includes/img/".$row['image']."' class='post-image'>";
                                        echo "<div class='post-preview'>";
                                            echo "<h1><a href='single.php?id=".$row['id']."'>".$row['title']."</a></h1>";
                                            echo "<i class='far fa-user'>Author: ".$row['author']."</i>";
                                            echo "<p class='preview-text'>".$row['text']."</p>";
                                            echo "<a href='single.php?id=".$row['id']."' class='btn read-more'>Read more</a>";
                                        echo "</div>";
                                echo "</div>";
                            }
                        }
                    ?>
        </div>
        
        </main>

<?php
    require "footer.php";
?>