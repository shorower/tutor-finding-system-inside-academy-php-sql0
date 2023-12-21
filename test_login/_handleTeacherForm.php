<?php
session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        
        $teachersName = $_POST['teachers_name'];
        $teachersGender = $_POST['teachers_gender'];
        $teachersAddress = $_POST['teachers_address'];
        $teachersCgpa = $_POST['teachers_cgpa'];
        $course = $_POST['course'];
        $courseId = $_POST['course_id'];
        $contact_num = $_POST['phone_number'];
        $uid = $_SESSION['sno'];


        $sql = "INSERT INTO `teachers` (`teachers_name`, `teachers_gender`, `teachers_address`, `teachers_cgpa`, `course`, `course_id`, `timestamp`, `phone_number`, `uid`) VALUES ('$teachersName', '$teachersGender', '$teachersAddress', '$teachersCgpa', '$course', '$courseId', current_timestamp(), '$contact_num', '$uid')";

        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<h1>Data saved!</h1>";
            $sql_select = "SELECT * FROM teachers ORDER BY timestamp DESC LIMIT 1";
            $result_select = $conn->query($sql_select);

            // Check if the SELECT query was successful
            if ($result_select) {
            // Fetch the result as an associative array
                while ($row = $result_select->fetch_assoc()) {
                // Process each row as needed
                // print_r($row);
                
                echo "Full Name: " . $row['teachers_name'] . "<br>";
                echo "Gender: " . $row['teachers_gender'] . "<br>";
                echo "Address: " . $row['teachers_address'] . "<br>";
                echo "Phone Number: " . $row['phone_number'] . "<br>";
                }

            // Free the result set
            $result_select->free();
            } else {
            // Handle the SELECT query error
                echo "Error: " . $sql_select . "<br>" . $conn->error;
            }
        }
    }
?>


<a href="student_dashboard.php">
   <button>Home</button>
</a>