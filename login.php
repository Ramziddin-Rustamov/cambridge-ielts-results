<?php
session_start(); // Start session at the beginning of the file

if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit();
}

if (isset($_POST['login'])) {
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];

    require_once "database.php";

    // Select the user details and the corresponding webpage URL
    $sql = "SELECT * FROM userslist WHERE email = '$userEmail' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = [
            'email' => $row['email'],
            'name' => $row['name'],
            'certificate' => $row['certificate']
        ];

        // Redirect to the user's specific webpage
        if ($_SESSION['user']['email'] == 'admin@gmail.com') {
            header("Location: users.php");
            exit();
        }
        header("Location: home.php");
        exit();
    } else {
        $_SESSION['error'] = "Email is not registered !";

        header("Location: login.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambridge Login</title>
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
        <form class="sign_in_box" action="login.php" method="POST">
            <h1 class="sign_in_h1">Sign in</h1>
            <span class="span_sign_1">To continue, please sign in to My Cambridge.</span>
            <div class="email">
                <label class="label_email">Email address</label>
                <input type="text" class="input_email" required id="input_email" name="userEmail">
            </div>
            <div class="password">
                <label class="label_password">Password</label>
                <input class="input_password" id="input_password" required type="password" name="password">
            </div>

            <button class="sign_in_button" type="submit" name="login">Sign in</button>
        </form>
        <!-- Additional content here -->
    </div>
</body>

</html>