<?php
    session_start();
    if(isset($_POST['edit-submit'])){
        require 'dbh.inc.php';
        $oldId = $_SESSION['userUId'];
        $newId = $_POST['newId'];
        $newPwd = $_POST['newPassword'];
        $hashedPwd = password_hash($newPwd, PASSWORD_DEFAULT);

        if(empty($newPwd) || empty($newId)){
            header("Location: ../editProfile.php?error=emptyfields&uid=".$newId."&mail=");
            exit();
        } else if(!preg_match("/^[a-zA-Z0-9]*$/",$newId)){
            header("Location: ../editProfile.php?error=invaliduid&mail=");
            exit();
        } else {
            $sql = 'SELECT uidUsers FROM users WHERE uidUsers=?;';
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../editProfile.php?error=sqlerror");
                exit();
            } else{
                mysqli_stmt_bind_param($stmt, "s", $newId );
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
               if($resultCheck > 0){
                    header("Location: ../editProfile.php?error=usernameOrEmailTaken");
                    exit();
                }else{
                    $sql = "UPDATE users SET uidUsers='".$newId."', pwdUsers='".$hashedPwd."' WHERE uidUsers='".$oldId."';";
                    mysqli_query($conn, $sql);
                    session_unset();
                    session_destroy();
                    header("Location: ../index.php");
                }
            }
        }
    
        


    }