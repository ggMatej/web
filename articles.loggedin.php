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
            <!-- <button href="addArticle.php"><button class="btn add-article">Add article!</button></a> -->

                <br><br><br><br>
                
            <!-- Trigger the modal with a button -->
            <div class="col-md text-center">
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add article</button>
            </div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Add article</h4>
      <button type="button" class="close" data-dismiss="modal">&times;</button>
     </div>
      <div class="modal-body">
      <form method="post" action="includes/addArticle.inc.php" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div>
                        <label for="title">Title</label>
                        <input type="text" name="title">
                    </div>
                    <div>
                        <label for="image">Image</label>
                        <input type="file" name="image">
                    </div>
                    <div>
                        <label for="text">Your text</label>
                        <textarea name="text" cols="25" rows="10" placeholder="Write your article..."></textarea>
                    </div>
                    <div>
                        <label for="category">Category:</label>
                        <input type="radio" name="category" value="training" checked> Training
                        <input type="radio" name="category" value="race"> Race 
                        <input type="radio" name="category" value="other"> Other
                    </div>
                    <div>
                        <input class="btn btn-warning" type="submit" name="upload" value="Upload article!">
                    </div>

    </form>
      </div>
     
    </div>

  </div>
</div>
           
        </main>

