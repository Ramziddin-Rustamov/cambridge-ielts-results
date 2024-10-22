<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']['email'] -= 'admin@gmail.com') {
    header("Location: users.php");
    exit();
}


// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from session
$userName = $_SESSION['user']['name'];
$userEmail = $_SESSION['user']['email'];
$certificate = $_SESSION['user']['certificate'];
$request_date = $_SESSION['user']['request_date'];
$payment_date = $_SESSION['user']['payment_date'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>US Transcript services</title>
    <link rel="stylesheet" href="../css/index3.css">
</head>

<body>
    <div class="main_container">
        <div class="left_content">
            <img class="cambridge_logo" src="../images/CambridgeLogoWhite.svg" alt="">
        </div>
        <div class="right_content">
            <div class="nav_min">
                <h2>Grade Transcript Service</h2>
            </div>
            <div class="content_tran">
                <h1>Transcript History</h1>
                <button class="send_button">
                    <a href="logout.php">Logout</a>
                </button>
            </div>
            <div class="content_table">
                <table class="table_transcript">
                    <thead class="thead_table">
                        <tr>
                            <th class="txtNoWrap" scope="col">Request Date </th>
                            <th class="txtNoWrap" scope="col">Payment Date</th>
                            <th class="txtNoWrap" scope="col">Exam Series</th>
                            <th class="txtNoWrap" scope="col">Order Number</th>
                            <th class="txtNoWrap" scope="col">Status</th>
                            <th class="txtNoWrap" scope="col">Institution(s)</th>
                            <th class="txtNoWrap" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="txtNoWrap" scope="col"><?php echo $request_date; ?></th>
                            <th class="txtNoWrap" scope="col"><?php echo $payment_date; ?></th>
                            <th class="txtNoWrap" scope="col">D6898298</th>
                            <th class="txtNoWrap" scope="col">8534568</th>
                            <th class="txtNoWrap" scope="col">Active</th>
                            <th class="txtNoWrap" scope="col">UZ139 0442</th>
                            <th class="txtNoWrap" scope="col">
                                <a href="../sertificates/<?php echo $certificate; ?>">
                                    <img width="24px" style="margin-right: 5px;" src="../images/download_icon.png"
                                        alt="">
                                </a>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="footer">
                <span>© Cambridge University Press & Assessment 2024</span>
                <img class="footer_img" src="../images/CambridgeLogoBlack.svg" alt="">
            </div>
        </div>
    </div>
</body>

</html>