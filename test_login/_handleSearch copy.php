<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        @$course = $_POST['course'];
        @$courseId =  $_POST['course_id'];
        
        if(isset($course)){
            $sql = "SELECT * FROM `teachers` WHERE course = '$course'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // Fetch data and store it in an array
            $data = $result->fetch_all(MYSQLI_ASSOC);
            } else {
            echo "0 results";
            }
        }
        else if(isset($courseId)){
            $sql = "SELECT * FROM `teachers` WHERE  course_id = '$courseId'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // Fetch data and store it in an array
            $data = $result->fetch_all(MYSQLI_ASSOC);
            } else {
            echo "0 results";
            }
        }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
        }

        h1 {
            color: #343a40;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border-radius: 10px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e2e6ea;
        }

        td {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <h1>Data from Database</h1>
    <a href="student_dashboard.php">
   <button>Home page</button>
</a>

    <?php
    // Display data in a table
    if (!empty($data)) {
        echo "<table>
                <tr>
                    <th>Teachers Name</th>
                    <th>Teachers Gender</th>
                    <th>Teachers Address</th>
                    <th>Teachers CGPA</th>
                    <th>Contact Number</th>
                </tr>";
        
        foreach ($data as $row) {
            echo "<tr>
                    <td>{$row['teachers_name']}</td>
                    <td>{$row['teachers_gender']}</td>
                    <td>{$row['teachers_address']}</td>
                    <td>{$row['teachers_cgpa']}</td>
                    <td>{$row['phone_number']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No data available";
    }
    ?>
</body>

</html>
