<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';

    $studentName = $_POST['student_name'];
    $studentGender = $_POST['student_gender'];
    $studentAddress = $_POST['student_address'];
    $studentCgpa = $_POST['student_cgpa'];
    $course = $_POST['course'];
    $courseId = $_POST['course_id'];
    $contactNum = $_POST['phone_number'];
    $uid = $_SESSION['sno'];

    $sql = "INSERT INTO `students` (`student_name`, `student_gender`, `student_address`, `student_cgpa`, `course`, `course_id`, `timestamp`, `phone_number`, `uid`) VALUES ('$studentName', '$studentGender', '$studentAddress', '$studentCgpa', '$course', '$courseId', current_timestamp(), '$contactNum', '$uid')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<h1>Data saved!</h1>";
    }
}
?>
