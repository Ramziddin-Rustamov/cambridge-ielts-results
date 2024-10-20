<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user']['email']) == 'admin@gmail.com') {
    header("Location: login.php");
    exit();
}

include 'database.php'; // Include your database connection file

if (isset($_POST['register'])) {
    // Retrieve and sanitize input data
    $email = trim($_POST['userEmail']);
    $password = trim($_POST['password']);
    $certificateFile = $_FILES['filename'];

    // Check if the email is already registered
    $stmt = $conn->prepare("SELECT * FROM userslist WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email already exists!";
        header("Location: register.php"); // Redirect back to the registration page
        exit();
    }

    // Validate the uploaded file
    $allowedTypes = ['application/pdf'];
    $fileType = $certificateFile['type'];
    $fileSize = $certificateFile['size'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    if (!in_array($fileType, $allowedTypes)) {
        $_SESSION['error'] = "Only PDF files are allowed!";
        header("Location: register.php");
        exit();
    }

    if ($fileSize > $maxSize) {
        $_SESSION['error'] = "File size must be less than 5MB!";
        header("Location: register.php");
        exit();
    }

    // Move the file to the certificates folder
    $targetDir = "sertificates/";
    $fileName = basename($certificateFile['name']);
    $targetFilePath = $targetDir . $fileName;

    // Check if a file with the same name already exists
    if (file_exists($targetFilePath)) {
        $_SESSION['error'] = "A file with the same name already exists!";
        header("Location: register.php");
        exit();
    }

    if (is_uploaded_file($certificateFile['tmp_name'])) {
        if (move_uploaded_file($certificateFile['tmp_name'], $targetFilePath)) {

            $stmt = $conn->prepare("INSERT INTO userslist (email, password, certificate) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $password, $fileName);
            $stmt->execute();
            $_SESSION['success'] = "you registered new user successfully !";
        } else {
            $_SESSION['error'] = "Failed to move uploaded file.";
            header("Location: register.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Upload failed. Temporary file not found.";
        header("Location: register.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/index.css">
</head>

<body>
    <div class="container">
        <div class="main_logo">
            <img class="image_main_logo" src="./images/CambridgePressAssessmentLogo.svg" alt="">
        </div>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<div style='color: red; font-size: 24px; font-weight: bold; margin: 20px 0;'>{$_SESSION['error']}</div>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "<div style='color: green; font-size: 24px; font-weight: bold; margin: 20px 0;'>{$_SESSION['success']}</div>";
            unset($_SESSION['success']);
        }
        ?>
        <form class="sign_in_box" action="register.php" method="POST" enctype="multipart/form-data">
            <h5 class="sign_in_h1">Register</h5>
            <a style=" display: block;
                text-decoration: none;
                background-color: transparent;
                color: #0076bd;
                font-weight: 600;
                margin: 17px 0 0 16px; border: 1px solid; width: 60px; padding :7px 15px; border-radius:5px "
                class="list_button" href="users.php">
                Users </a>
            <br />
            <span class="span_sign_1">Create your users (students).</span>
            <div class="email">
                <label class="label_email">Email address</label>
                <input type="text" class="input_email" required id="input_email" name="userEmail">
            </div>
            <div class="password">
                <label class="label_password">Password</label>
                <input class="input_password" id="input_password" required type="password" name="password">
            </div>
            <div class="password">
                <label class="label_password">Upload your file (PDF only)</label>
                <input type="file" style=" margin: 20px;
                    padding: 10px 0;
                    background-color: #f3f3f3;
                    border: 2px solid #ccc;
                    border-radius: 5px;
                    font-size: 14px;
                    color: #333;
                    cursor: pointer;" class="span_sign_1" required name="filename" accept=".pdf">
            </div>
            <button class="sign_in_button" type="submit" name="register">Register</button>
        </form>
    </div>
</body>

</html>