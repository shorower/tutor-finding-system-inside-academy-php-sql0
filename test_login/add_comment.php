<?php include '_dbconnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Comment</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        button {
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #2980b9;
            transform: scale(1.1);
        }

        .message {
            margin-top: 20px;
            text-align: center;
            color: #27ae60;
        }

        .error {
            margin-top: 20px;
            text-align: center;
            color: #c0392b;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $gig_id = $_POST['gig_id'];
        $comment_text = $_POST['comment_text'];

        $insert_comment_sql = "INSERT INTO comments (gig_id, comment_text) VALUES ('$gig_id', '$comment_text')";

        if ($conn->query($insert_comment_sql)) {
            echo '<h2 class="message">Comment added successfully!</h2>';
        } else {
            echo '<h2 class="error">Error: ' . $conn->error . '</h2>';
        }

        // Close the database connection
        $conn->close();
    } else {
        // Redirect to the gigs retrieval page if accessed directly without a POST request
        header("Location: retrieval_page.php");
        exit();
    }
    ?>

    <a href="student_dashboard.php">
        <button>Home</button>
    </a>
</body>
</html>
