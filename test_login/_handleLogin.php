<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $email = $_POST['loginEmail']; 
        $pass = $_POST['password'];
        $role = $_POST['role'];

        $sql = "select * from `users` where user_email = '$email'";
        $result = mysqli_query($conn, $sql);
        $numRows = mysqli_num_rows($result);
        if($numRows==1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['user_pass']) && $role == $row['role']){
                if($row['role'] == "teacher"){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['sno'] = $row['sno'];
                    $_SESSION['useremail'] = $email;
                    header("Location: /projects/test_login/teacher_dashboard.php");
                }
                else{
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['useremail'] = $email;
                    header("Location: /projects/test_login/student_dashboard.php");
                }
            }
            else{
                echo '<div style="color: black; font-size: 40px; text-align: center; margin-top: 20vh; transform: translateY(-50%);">Wrong Password and Role</div>';
                echo '<div style="color: black; font-size: 40px; text-align: center; margin-top: 5vh; transform: translateY(-50%);">Re-Enter Password and Role</div>';
            
            }
        }
        else{
            echo '<div style="color: black; font-size: 40px; text-align: center; margin-top: 50vh; transform: translateY(-50%);">User Not Found</div>';
        }
    }
?>
