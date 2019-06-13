<?php
    require "header.php";
?>

        <main>
            <div class="content add-article-form">
        <h1>Edit profile</h1>
            <form action="includes/editprofile.inc.php" method="post">
                <div>
                <label for="newId">New username</label>
                <input type="text" name="newId">

                </div>
                <div>
                <label for="newPassword">New password</label>
                <input type="password" name="newPassword">

                </div>
                <div>
                <input class="btn" type="submit" name="edit-submit" value="Submit!">

                </div>
            </form>
            </div>
        </main>

<?php
    require "footer.php";
?>