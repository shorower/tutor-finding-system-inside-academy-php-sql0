<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $user_email = $_POST['signupEmail'];
        $pass = $_POST['password'];
        $cpass = $_POST['cpassword'];
        $role = $_POST['role'];

        // check wheather this emails exists or not 
        $existSql = "select * from `users` where user_email = '$user_email'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows>0){
            $showError ="email is already in use";
            echo $showError;
        }
        else{
            if($pass == $cpass){
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_email`, `role`, `user_pass`, `timestamp`) VALUES ('$user_email', '$role', '$hash', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                    header("Location: /projects/test_login/login.php?signupsuccess=true");
                    echo 'You can login now!';
                    exit();
                }
            }
            else{
                $showError = "Passwords do not match";
                header("Location: /projects/test_login/signup.php?signupsuccess=false&error=$showError");
            }
        }
    }
    else{ 
        echo 'There is an issue please wait..';
    }

?>