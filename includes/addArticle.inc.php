<?php
    session_start();
    if(isset($_POST['upload'])){
        require 'dbh.inc.php';
        

        $image = $_FILES['image']['name'];
        $text = $_POST['text'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $author = $_SESSION['userUId'];

        $target = "img/".basename($image);

        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $sql = 'INSERT INTO articles (title,image,text,category,author) VALUES (?,?,?,?,?);';
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../articles.loggedin.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "sssss", $title, $image, $text, $category, $author);
            mysqli_stmt_execute($stmt);
            header("Location: ../articles.loggedin.php?upload=success");
            exit();
        }

    }