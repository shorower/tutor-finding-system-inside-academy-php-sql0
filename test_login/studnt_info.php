<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>student form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <form action="_handleTeacherForm.php" method="post">
        <fieldset>
            <legend>Personal Information</legend>
            <label for="teachers_name">Full Name:</label>
            <input type="text" id="teachers_name" name="teachers_name" required />

            <label for="teachers_gender">Gender:</label>
            <select id="teachers_gender" name="teachers_gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="teachers_address">Address:</label>
            <input type="text" id="teachers_address" name="teachers_address" required />
        </fieldset>

        <fieldset>
            <legend>Academic Information</legend>
            <label for="teachers_cgpa">CGPA:</label>
            <input type="text" id="teachers_cgpa" name="teachers_cgpa" required />

            <label for="course">Course:</label>
            <input type="text" id="course" name="course" required />

            <label for="course_id">Course ID:</label>
            <input type="text" id="course_id" name="course_id" required />

            <label for="course_id">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required />
        </fieldset>

        <input type="submit" value="Submit" />
    </form>
</body>

</html>
