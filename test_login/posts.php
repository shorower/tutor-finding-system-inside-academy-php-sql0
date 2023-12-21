<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>posting</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container mt-5">
    <h1>Post here</h1>

    <?php
    // Include your database connection file
    include '_dbconnect.php';

    // Retrieve gigs from the database
    $retrieve_sql = "SELECT * FROM gigs";
$result = $conn->query($retrieve_sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row['g_title']; ?></h5>
                <p class="card-text"><?php echo $row['g_details']; ?></p>
                <p class="card-text">Price: <?php echo $row['g_price']; ?></p>
                <p class="card-text">Category: <?php echo $row['g_category']; ?></p>
                <p class="card-text">Location: <?php echo $row['g_location']; ?></p>

                <!-- Display the image -->
                <?php if ($row['g_img']) { ?>
                    <img src="data/gigs/<?php echo $row['g_img']; ?>" class="img-fluid" alt="Gig Image">
                <?php } ?>

                <!-- Comment Section -->
                <div class="mt-3">
                    <h6>Comments</h6>
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
                <form action="add_comment.php" method="post" class="mt-3">
                    <input type="hidden" name="gig_id" value="<?php echo $gig_id; ?>">
                    <div class="mb-3">
                        <label for="comment_text" class="form-label">Add a Comment:</label>
                        <textarea class="form-control" name="comment_text" id="comment_text" rows="2" required></textarea>
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
</body>

</html>
