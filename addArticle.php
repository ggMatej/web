<?php
    require "header.php";
?>

        <main>
            <div class="content add-article-form">
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
                        <input class="btn" type="submit" name="upload" value="Upload article!">
                    </div>

                </form>
                </div>
         </main>

