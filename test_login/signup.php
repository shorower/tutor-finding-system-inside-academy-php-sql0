<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form class="container mt-4" action="_handleSignup.php" method="post">
        <div class="mb-3">
            <label for="signupEmail" class="form-label">User ID</label>
            <input type="text" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Re Password</label>
            <input type="password" id="cpassword" name="cpassword" class="form-control">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Select a role</label>
            <select id="role" name="role" class="form-select">
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        
    </form>
    
    <div class="container d-flex justify-content-end mt-2">
        <a href="Login.php" class="btn btn-primary">Login Page</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>