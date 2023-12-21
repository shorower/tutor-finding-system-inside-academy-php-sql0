<?php
include '_dbconnect.php';
session_start();
if (isset($_POST['gig_submit'])) {

    $img_name = $_FILES['gig_img']['name'];
    $img_size = $_FILES['gig_img']['size'];
    $tmp_name = $_FILES['gig_img']['tmp_name'];
    $error = $_FILES['gig_img']['error'];

    if ($error === 0) {
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");

        if (in_array($img_ex_lc, $allowed_exs)) {
            $gig_img = uniqid("GIG-", true) . '.' . $img_ex_lc;
            $img_upload_path = "data/gigs/" . $gig_img;
            copy($tmp_name, $img_upload_path);
        }
    } else {
        $gig_img = 0;
    }

    $gig_title = $_POST['gig_title'];
    $gig_details = $_POST['gig_details'];

    $gig_category = $_POST['gig_category'];

    $gig_creator = 14; //$_SESSION['sno'];

    $sql = "INSERT INTO gigs(g_title,g_details,g_img,g_category,g_creator)
            VALUES('$gig_title','$gig_details','$gig_img','$gig_category','$gig_creator')";
    $conn->query($sql);
}
?>

<!-- Modal -->
<div class="modal fade" id="gigModal" tabindex="-1" role="dialog" aria-labelledby="gigModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title">Create a Post</h1>
            </div>
            <div class="modal-body text-center">
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="gig_title" class="form-label fs-5 text-primary">Title:                             </label>
                        <input type="text" class="form-control form-control-lg text-center" name="gig_title" placeholder="Type your title" required>
                    </div>

                    <div class="mb-3">
                        <label for="gig_details" class="form-label fs-5 text-primary">Details</label>
                        <textarea class="form-control form-control-lg text-center" name="gig_details" placeholder="Type details about your post" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="gig_category" class="form-label fs-5 text-primary">Department</label>
                        <select class="form-select form-select-lg text-center" name="gig_category" required>
                            <option value="" disabled selected>Select department</option>
                            <option value="CSE">CSE</option>
                            <option value="BBA">BBA</option>
                            <option value="ECO">ECO</option>
                            <option value="CIVIL">CIVIL</option>
                        </select>
                    </div>

                    <button type="submit" name="gig_submit" class="btn btn-warning btn-lg mt-3">Submit Post</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
<a href="student_dashboard.php">
   <button>Home page</button>
</a>



<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function preview() {
        frame.src = URL.createObjectURL(event.target.files[0]);
    }
</script>
