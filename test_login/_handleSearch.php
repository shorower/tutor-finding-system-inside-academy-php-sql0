<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    @$course = $_POST['course'];
    @$courseId =  $_POST['course_id'];

    if (isset($course)) {
        $sql = "SELECT * FROM `teachers` WHERE course = '$course'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch data and store it in an array
            $data = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            echo "0 results";
        }
    } 
    else if (isset($courseId)) {
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
    <title>Get Your Teacher</title>

    <!-- Bootstrap CSS (Bootstrap 5) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- GSAP Animation Library -->
    <script src="https://unpkg.com/gsap@3.9.0/dist/gsap.min.js"></script>

    <!-- Custom CSS for Animation -->
    <style>
        .title-animation {
            font-family: 'Comic Sans MS', cursive;
            overflow: hidden;
            white-space: nowrap;
            letter-spacing: 4px;
            width: 0;
            animation: typing 2s steps(20, end) infinite, blink-caret 0.5s step-end infinite;
        }

        @keyframes typing {
            0% {
                width: 0;
            }

            50% {
                width: 100%;
            }

            100% {
                width: 0;
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent;
            }

            50% {
                border-color: black;
            }
        }

        /* Adjusted Card Size */
        .card {
            max-width: 18rem;
            /* Adjust the maximum width of the card */
            height: auto;
            /* Allow the card height to adjust based on content */
            margin-bottom: 1rem;
            /* Add margin between cards */
        }

        .card-img-top {
            height: 10rem;
            /* Adjust the height of the image */
            width: auto;
            /* Maintain aspect ratio */
            object-fit: contain;
            /* Make sure the image is contained within the specified height */
        }

        .card-body {
            height: auto;
            /* Allow the card body height to adjust based on content */
        }

        /* "More" and "Show Less" Button */
        #moreButton,
        #showLessButton {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-family: 'Comic Sans MS', cursive;
            transition: background-color 0.3s ease-in-out;
            animation: changeColor 0.2s infinite;
        }

        @keyframes changeColor {
            0% {
                background-color: #2ecc71;
                /* Shamrock color */
            }

            25% {
                background-color: #3498db;
                /* Blue color */
            }

            50% {
                background-color: #e74c3c;
                /* Red color */
            }

            75% {
                background-color: #f39c12;
                /* Orange color */
            }

            100% {
                background-color: #2ecc71;
                /* Shamrock color */
            }
        }

        #moreButton:hover,
        #showLessButton:hover {
            background-color: #3498db;
            /* Change hover color to blue */
        }

        /* Hidden initially */
        #showLessButton {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <!-- Title with Typewriter Animation -->
        <h1 class="title-animation">Get Your Teacher</h1>

        <!-- Teacher Cards -->
        <div class="row mt-4" id="teacherCards">
            <!-- Card 1 -->
            <?php
            // Display data in a table
            if (!empty($data)) {
                echo "<table>
               ";

                foreach ($data as $row) { ?>
                    <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-header">
                                <h6>Teacher</h6>
                            </div>
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" class="card-img-top" alt="Profile Image">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['teachers_name']; ?></h5>
                                <p class="card-text">Gender: <?php echo $row['teachers_gender']; ?></p>
                                <div class="mb-3">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </div>
                                <p class="card-text">Address: <?php echo $row['teachers_address']; ?></p>
                                <p class="card-text">CGPA: <?php echo $row['teachers_cgpa']; ?></p>
                                <p class="card-text">Contact: <?php echo $row['phone_number']; ?></p>
                                <a href="hire.php" class="btn btn-primary btn-sm">Hire</a>
                            </div>
                        </div>
                    </div>

            <?php
                }

                echo "</table>";
            } else {
                echo "No data available";
            }
            ?>




            <!-- Additional Cards (Initially Hidden) -->
            <div class="col-md-4 additional-card" style="display: none;">
                <div class="card text-center">
                    <div class="card-header">
                        <h6>Teacher</h6>
                    </div>
                    <img src="https://placekitten.com/200/300" class="card-img-top" alt="Profile Image">
                    <div class="card-body">
                        <h5 class="card-title">Additional</h5>
                        <p class="card-text">Subject: Additional</p>
                        <div class="mb-3">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                            <i class="bi bi-star"></i>
                        </div>
                        <p class="card-text">Preferable Subjects: Additional Subjects</p>
                        <p class="card-text">Demand: High</p>
                        <a href="#" class="btn btn-primary btn-sm">Hire</a>
                    </div>
                </div>
            </div>
            <!-- Repeat the additional cards as needed -->
        </div>

        <!-- "More" and "Show Less" Button -->
        <button id="moreButton" onclick="toggleAdditionalCards('show')">
            More
            <span class="bi bi-arrow-right-circle-fill ml-2"></span>
        </button>

        <button id="showLessButton" onclick="toggleAdditionalCards('hide')">
            Show Less
            <span class="bi bi-arrow-left-circle-fill ml-2"></span>
        </button>
    </div>

    <script>
        // GSAP Animation
        const titleAnimation = document.querySelector('.title-animation');

        // Initial animation
        gsap.from(titleAnimation, {
            duration: 1,
            opacity: 0,
            y: -50,
            ease: 'power2.out'
        });

        // Animation every 4 seconds
        setInterval(() => {
            titleAnimation.style.animation = 'none';
            titleAnimation.offsetHeight; /* trigger reflow */
            titleAnimation.style.animation = null;
            gsap.from(titleAnimation, {
                duration: 2,
                opacity: 0,
                y: -50,
                ease: 'power2.out'
            });
        }, 4000);

        // Toggle visibility of additional cards
        function toggleAdditionalCards(action) {
            const additionalCards = document.querySelectorAll('.additional-card');
            additionalCards.forEach(card => {
                card.style.display = action === 'show' ? 'block' : 'none';
            });

            // Toggle button visibility
            const moreButton = document.getElementById('moreButton');
            const showLessButton = document.getElementById('showLessButton');
            moreButton.style.display = action === 'show' ? 'none' : 'block';
            showLessButton.style.display = action === 'show' ? 'block' : 'none';
        }
        
    </script>

    <!-- Bootstrap JS (Bootstrap 5) - Make sure to include it at the end of the body -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <a href="student_dashboard.php">
         <button>Home page</button>
    </a>
    

</body>

</html>
