<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login and Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            width: 100%;
        }

        /* Added style for the Sign Up button */
        .btn-signup {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-signup:hover {
            background-color: #218838;
            border-color: #218838;
        }

        img {
            width: 200px;
            height: 100px;
            cursor: move; /* Set cursor to move for drag operation */
        }
        
    </style>
</head>

<body>
<div class="container">
    <img src="scholar.webp"/>
</div>



    <form class="container mt-4" action="_handleLogin.php" method="post">
        <img src="pngegg.png" alt="Centered Image" id="draggableImage">

        <div class="mb-3">
            <label for="loginEmail" class="form-label">User ID</label>
            <input type="text" class="form-control" id="loginEmail" name="loginEmail"
                aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Select a role</label>
            <select id="role" name="role" class="form-select">
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>

        <!-- Styled Sign Up button with JavaScript action -->
        <p>Wanna create an account? Hit sign up button </p>
        <button type="button" class="btn btn-primary btn-signup" onclick="redirectToSignupPage()">Sign Up</button>

        <script>
            // JavaScript function to redirect to the signup page
            function redirectToSignupPage() {
                // Change the URL to the desired signup page
                window.location.href = 'signup.php';
            }

            // Make the image draggable
            const draggableImage = document.getElementById('draggableImage');

            draggableImage.addEventListener('mousedown', (e) => {
                e.preventDefault();

                let offsetX = e.clientX - draggableImage.getBoundingClientRect().left;
                let offsetY = e.clientY - draggableImage.getBoundingClientRect().top;

                function moveImage(e) {
                    let x = e.clientX - offsetX;
                    let y = e.clientY - offsetY;

                    draggableImage.style.left = x + 'px';
                    draggableImage.style.top = y + 'px';
                }

                function stopMoving() {
                    document.removeEventListener('mousemove', moveImage);
                    document.removeEventListener('mouseup', stopMoving);
                }

                document.addEventListener('mousemove', moveImage);
                document.addEventListener('mouseup', stopMoving);
            });
        </script>

    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>

