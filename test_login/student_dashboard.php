<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: "Arial", sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #343a40;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #495057;
        }

        input {
            width: 30%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
            color: #fff;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            width: 45%;
            margin: 10px;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-title {
            color: #007bff;
        }

        .comment-section {
            margin-top: 20px;
        }

        .gig-img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .comment-form {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>Enter Course!</h2>
    <form action="_handleSearch.php" method="post" class="mb-4">
        <!-- <label for="course">Enter course name or ID:</label> -->
        <input type="text" id="course" name="course" placeholder="Type here..." class="form-control typeahead"
            autocomplete="off" />
        <button type="submit" id="searchCourseButton" class="btn btn-primary">Search</button>
    </form>

    <a href="create_post.php" class="btn btn-primary mb-3">Create a Problem Post</a>
    <a href="login.php" class="btn btn-primary mb-3">Log Out</a>
    

    <div class="container mt-3">
        <?php
        // Include your database connection file
        include '_dbconnect.php';

        // Retrieve gigs from the database
        $retrieve_sql = "SELECT * FROM gigs";
        $result = $conn->query($retrieve_sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <?php if ($row['g_img']) { ?>
                        <img src="data/gigs/<?php echo $row['g_img']; ?>" class="img-fluid gig-img" alt="Gig Image">
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['g_title']; ?></h5>
                        <p class="card-text">Details: <?php echo $row['g_details']; ?></p>
                        <p class="card-text">Department: <?php echo $row['g_category']; ?></p>

                        <div class="comment-section mt-3">
                            <!-- <h6>Comments</h6> -->
                            <?php
                            // Retrieve comments for the current gig
                            $gig_id = $row['id'];
                            $comment_sql = "SELECT * FROM comments WHERE gig_id = $gig_id";
                            $comment_result = $conn->query($comment_sql);

                            if ($comment_result->num_rows > 0) {
                                while ($comment = $comment_result->fetch_assoc()) {
                                    ?>
                                    <p class="mb-0"><strong>Comment:</strong> <?php echo $comment['comment_text']; ?></p>
                                    <p class="text-muted"><small><?php echo $comment['comment_date']; ?></small></p>
                                <?php
                                }
                            } else {
                                echo "<p>No comments yet.</p>";
                            }
                            ?>
                        </div>

                        <!-- Add Comment Form -->
                        <form action="add_comment.php" method="post" class="mt-3 comment-form">
                            <input type="hidden" name="gig_id" value="<?php echo $gig_id; ?>">
                            <div class="mb-3">
                                <label for="comment_text" class="form-label">Add a Comment:</label>
                                <textarea class="form-control" name="comment_text" id="comment_text" rows="2"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Comment</button>
                        </form>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>No gigs found.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Typeahead JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <script>
        $(document).ready(function () {
            // Initialize typeahead on the course input
            $('#course').typeahead({
                source: function (query, result) {
                    // Your code to fetch suggestions based on the user input
                    // Example: Use AJAX to fetch suggestions from the server
                    $.ajax({
                        url: 'your_suggestions_endpoint.php',
                        method: 'POST',
                        data: { query: query },
                        dataType: 'json',
                        success: function (data) {
                            result(data);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
