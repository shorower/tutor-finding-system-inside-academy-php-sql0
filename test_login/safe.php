<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include '_dbconnect.php';
        $course = $_POST['course'];
        $courseId = $_POST['courseId'];
        
        if($course){
            $sql = "SELECT * FROM `teachers` WHERE course = '$course'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            if($numRows>0){
                $row = mysqli_fetch_assoc($result);
                echo '
                <h2>Teacher Details</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>CGPA</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>'.$row['teachers_name'].'</td>
                            <td>'.$row['teachers_cgpa'].'</td>
                            <td>'.$row['teachers_name'].'</td>
                            <td>'.$row['teachers_cgpa'].'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                '; 
            }
        }
        elseif($courseId){
            $sql = "SELECT * FROM `teachers` WHERE courseId = '$courseId'";
            $result = mysqli_query($conn, $sql);
            $numRows = mysqli_num_rows($result);
            if($numRows>0){
                $row = mysqli_fetch_assoc($result);
                echo '
                <h2>Teacher Details</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>CGPA</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>'.$row['teachers_name'].'</td>
                            <td>'.$row['teachers_cgpa'].'</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                '; 
        }
    }
}
?>

















