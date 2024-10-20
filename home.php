<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Fetch user details from session
$userName = $_SESSION['user']['name'];
$userEmail = $_SESSION['user']['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cambridge - Welcome <?php echo htmlspecialchars($userName); ?></title>
    <link rel="stylesheet" href="./css/index2.css">
</head>

<body>
    <div class="header_1">
        <span class="span_about">About</span>
        <span class="span_contactus">Contact us</span>
        <button class="logout_button">
            <a href="logout.php">Logout</a>
        </button>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cambridge</title>
    <link rel="stylesheet" href="./css/index2.css">
    <link rel="icon" type="image/png" href="./images/favicon.png">
</head>

<body>
    <div class="header_1">
        <span class="span_about">About</span>
        <span class="span_contactus">Contact us</span>
        <button class="button_twitter">
            <svg class="jss18" width="32" height="32" viewBox="0 0 32 32" fill="none"
                xmlns="https://www.w3.org/2000/svg">
                <path
                    d="M23.9687 10.6332C23.3787 10.9067 22.7487 11.093 22.0854 11.178C22.7614 10.7485 23.2814 10.0714 23.5274 9.26364C22.8934 9.65383 22.1907 9.93786 21.4428 10.096C20.8455 9.42183 19.9942 9 19.0489 9C17.2376 9 15.769 10.5488 15.769 12.4569C15.769 12.7311 15.799 12.9947 15.8537 13.2471C13.1271 13.1114 10.7106 11.7306 9.09329 9.64329C8.80863 10.1509 8.64931 10.7407 8.64931 11.3833C8.64931 12.5855 9.22928 13.6422 10.1079 14.263C9.56993 14.2447 9.06396 14.0886 8.62264 13.8299V13.8728C8.62264 15.5496 9.75126 16.9479 11.2532 17.2664C10.9779 17.3444 10.6872 17.3866 10.3892 17.3866C10.1799 17.3866 9.97925 17.3655 9.77859 17.3262C10.1992 18.6992 11.4085 19.7003 12.8478 19.7285C11.7278 20.6558 10.3086 21.2084 8.77997 21.2084C8.51998 21.2084 8.26066 21.1922 8 21.1613C9.45927 22.1413 11.1785 22.7143 13.0378 22.7143C19.0735 22.7143 22.3701 17.4443 22.3701 12.8815C22.3701 12.7346 22.3701 12.5862 22.3601 12.4386C23.0007 11.9542 23.56 11.3418 24 10.6472L23.9687 10.6332Z"
                    fill="white"></path>
            </svg>
        </button>
        <button class="button_linkedin">
            <svg class="jss18" width="32" height="32" viewBox="0 0 32 32" fill="none"
                xmlns="https://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M23.7381 21.7176H20.8949V17.2624C20.8949 16.2 20.8733 14.8328 19.4133 14.8328C17.9309 14.8328 17.7045 15.9888 17.7045 17.184V21.7176H14.8613V12.556H17.5925V13.8048H17.6293C18.0109 13.0848 18.9389 12.3248 20.3253 12.3248C23.2061 12.3248 23.7389 14.2208 23.7389 16.6888V21.7176H23.7381Z"
                    fill="white"></path>
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M11.6504 11.3024C10.7352 11.3024 10 10.5616 10 9.6504C10 8.74 10.736 8 11.6504 8C12.5624 8 13.3016 8.74 13.3016 9.6504C13.3016 10.5616 12.5616 11.3024 11.6504 11.3024Z"
                    fill="white"></path>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0758 21.7176H10.2246V12.556H13.0758V21.7176Z"
                    fill="white"></path>
            </svg>
        </button>
        <button class="button_youtube">
            <svg class="jss18" width="32" height="32" viewBox="0 0 32 32" fill="none"
                xmlns="https://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M23.0575 10.3586C23.8178 10.561 24.4119 11.1277 24.6241 11.8529C24.8845 13.2236 25.0101 14.6145 24.9992 16.0075C25.009 17.3952 24.8835 18.7808 24.6241 20.1464C24.4119 20.8716 23.8178 21.4383 23.0575 21.6407C21.6395 22 16.0079 22 16.0079 22C16.0079 22 10.3599 22 8.95837 21.6407C8.19809 21.4383 7.60399 20.8716 7.3918 20.1464C7.12687 18.7813 6.99576 17.3957 7.00016 16.0075C6.99473 14.614 7.12585 13.2231 7.3918 11.8529C7.60399 11.1277 8.19809 10.561 8.95837 10.3586C10.3756 9.99285 16.0079 10 16.0079 10C16.0079 10 21.6545 10 23.0575 10.3586ZM14.2058 13.4296V18.5776L18.9055 16.0075L14.2058 13.4296Z"
                    fill="white"></path>
            </svg>
        </button>
        <button class="button_facebook">
            <svg class="jss18" width="32" height="32" viewBox="0 0 32 32" fill="none"
                xmlns="https://www.w3.org/2000/svg">
                <path
                    d="M13.84 24.6978L13.7271 17.4251H11.0703V14.2719H13.84V11.8687C13.84 9.1348 15.4685 7.62469 17.9601 7.62469C19.1536 7.62469 20.402 7.83774 20.402 7.83774V10.5222H19.0265C17.6714 10.5222 17.2488 11.363 17.2488 12.2257V14.2719H20.2741L19.7905 17.4251H17.3634L17.2488 24.6978H13.84Z"
                    fill="white"></path>
            </svg>
        </button>
        <button class="button_instagram">
            <svg class="jss18" width="32" height="32" viewBox="0 0 32 32" fill="none"
                xmlns="https://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M16 8C13.8267 8 13.5553 8.01 12.702 8.048C11.85 8.088 11.27 8.222 10.76 8.42C10.234 8.624 9.78733 8.898 9.34267 9.34267C8.898 9.78733 8.62333 10.2333 8.42 10.76C8.222 11.27 8.08733 11.85 8.048 12.702C8.008 13.5553 8 13.8267 8 16C8 18.1733 8.01 18.4447 8.048 19.298C8.088 20.1493 8.222 20.73 8.42 21.24C8.624 21.7653 8.898 22.2127 9.34267 22.6573C9.78733 23.1013 10.2333 23.3767 10.76 23.58C11.2707 23.7773 11.8507 23.9127 12.702 23.952C13.5553 23.992 13.8267 24 16 24C18.1733 24 18.4447 23.99 19.298 23.952C20.1493 23.912 20.73 23.7773 21.24 23.58C21.7653 23.376 22.2127 23.1013 22.6573 22.6573C23.1013 22.2127 23.3767 21.7673 23.58 21.24C23.7773 20.73 23.9127 20.1493 23.952 19.298C23.992 18.4447 24 18.1733 24 16C24 13.8267 23.99 13.5553 23.952 12.702C23.912 11.8507 23.7773 11.2693 23.58 10.76C23.376 10.234 23.1013 9.78733 22.6573 9.34267C22.2127 8.898 21.7673 8.62333 21.24 8.42C20.73 8.222 20.1493 8.08733 19.298 8.048C18.4447 8.008 18.1733 8 16 8ZM16 9.44C18.1353 9.44 18.39 9.45067 19.2333 9.48733C20.0133 9.524 20.4367 9.65333 20.718 9.764C21.0927 9.90867 21.358 10.082 21.6393 10.3613C21.9187 10.6413 22.092 10.9073 22.2367 11.282C22.346 11.5633 22.4767 11.9867 22.512 12.7667C22.55 13.6107 22.5587 13.864 22.5587 16C22.5587 18.136 22.5487 18.39 22.5093 19.2333C22.4687 20.0133 22.3387 20.4367 22.2287 20.718C22.0793 21.0927 21.9093 21.358 21.6293 21.6393C21.35 21.9187 21.08 22.092 20.7093 22.2367C20.4293 22.346 19.9993 22.4767 19.2193 22.512C18.37 22.55 18.12 22.5587 15.98 22.5587C13.8393 22.5587 13.5893 22.5487 12.7407 22.5093C11.96 22.4687 11.53 22.3387 11.25 22.2287C10.8707 22.0793 10.61 21.9093 10.3307 21.6293C10.05 21.35 9.87067 21.08 9.73067 20.7093C9.62067 20.4293 9.49133 19.9993 9.45067 19.2193L9.44906 19.1745C9.42029 18.3694 9.41 18.0816 9.41 15.99C9.41 13.9005 9.42026 13.6101 9.44895 12.7979L9.45067 12.7493C9.49133 11.9693 9.62067 11.54 9.73067 11.26C9.87067 10.88 10.05 10.62 10.3307 10.3393C10.61 10.06 10.8707 9.88 11.25 9.74067C11.53 9.63 11.9507 9.5 12.7307 9.46L12.7692 9.45864C13.5887 9.4297 13.8633 9.42 15.97 9.42L16 9.44ZM11.892 16C11.892 13.732 13.73 11.892 16 11.892C18.268 11.892 20.108 13.73 20.108 16C20.108 18.268 18.27 20.108 16 20.108C13.732 20.108 11.892 18.27 11.892 16ZM16 18.6667C14.5267 18.6667 13.3333 17.4733 13.3333 16C13.3333 14.5267 14.5267 13.3333 16 13.3333C17.4733 13.3333 18.6667 14.5267 18.6667 16C18.6667 17.4733 17.4733 18.6667 16 18.6667ZM20.2707 12.69C20.8 12.69 21.2307 12.26 21.2307 11.73C21.2307 11.2007 20.7993 10.77 20.2707 10.7707C19.7413 10.7707 19.3107 11.2007 19.3107 11.73C19.3107 12.2593 19.7407 12.69 20.2707 12.69Z"
                    fill="white"></path>
            </svg>
        </button>
    </div>
    <div class="navbar_mobile">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="22" height="22" style="margin-left: 22px;"
            viewBox="0 0 50 50">
            <path
                d="M 0 7.5 L 0 12.5 L 50 12.5 L 50 7.5 Z M 0 22.5 L 0 27.5 L 50 27.5 L 50 22.5 Z M 0 37.5 L 0 42.5 L 50 42.5 L 50 37.5 Z">
            </path>
        </svg>
        <h1 class="h1_navbar_mobile">My Cambridge</h1>
    </div>
    <div class="navbar">
        <img src="./images/CambridgePressAssessmentLogo.svg" width="195px" alt="">
        <hr class="navbar_hr">
        <h1 class="mycambridge_h1">My Cambridge</h1>
        <!--My account button-->
    </div>
    <div class="main_container">
        <div class="left_content">
            <div class="cont1">
                <a class="link_home" tabindex="0" open="" href="/">
                    <div class="link_home_svg"><svg class="" width="25px" focusable="false" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path d="M12 5.69l5 4.5V18h-2v-6H9v6H7v-7.81l5-4.5M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3z">
                            </path>
                        </svg></div>
                    <span class="home_span_menu">Home</span>
                </a>
            </div>
            <div class="cont2">
                <a class="link_account" tabindex="0" href="/">
                    <div class="link_account_svg">
                        <svg class="" width="25px" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zM7.07 18.28c.43-.9 3.05-1.78 4.93-1.78s4.51.88 4.93 1.78C15.57 19.36 13.86 20 12 20s-3.57-.64-4.93-1.72zm11.29-1.45c-1.43-1.74-4.9-2.33-6.36-2.33s-4.93.59-6.36 2.33C4.62 15.49 4 13.82 4 12c0-4.41 3.59-8 8-8s8 3.59 8 8c0 1.82-.62 3.49-1.64 4.83zM12 6c-1.94 0-3.5 1.56-3.5 3.5S10.06 13 12 13s3.5-1.56 3.5-3.5S13.94 6 12 6zm0 5c-.83 0-1.5-.67-1.5-1.5S11.17 8 12 8s1.5.67 1.5 1.5S12.83 11 12 11z">
                            </path>
                        </svg>
                    </div>
                    <span class="account_span_menu">Account</span>
                    <svg class="svg_account_str" focusable="false" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M15.88 9.29L12 13.17 8.12 9.29a.9959.9959 0 00-1.41 0c-.39.39-.39 1.02 0 1.41l4.59 4.59c.39.39 1.02.39 1.41 0l4.59-4.59c.39-.39.39-1.02 0-1.41-.39-.38-1.03-.39-1.42 0z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
        <div class="right_content">
            <h1 class="h1_right_content">Hello <?php echo htmlspecialchars($userName); ?> </h1>
            <h1 class="h1_right_content"> <span><?php echo htmlspecialchars($userEmail); ?></span> </h1>
            <h2 class="h2_right_content">My services</h2>
            <a href="table.php" class="service_link">
                <div class="content_service">
                    <img class="img_grade_tran" src="./images/GradeTranscripts.jpg" alt="">
                    <div class="card_description">
                        <h3>Grade Transcript Service</h3>
                        <p>Service for US students to send grade transcript to American colleges and universities</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="footer1">
        <ul>
            <li class="li_head">The Cambridge Family</li>
            <li class="li_footer1">Cambridge University Press</li>
            <li class="li_footer1">Cambridge Assessment</li>
            <li class="li_footer1">Contact us</li>
        </ul>
        <hr>
        <ul>
            <li class="li_head">Our brands</li>
            <li class="li_footer1">Cambridge Assessment Admissions Testing</li>
            <li class="li_footer1">Cambridge Assessment English</li>
            <li class="li_footer1">Cambridge Assessment International Education</li>
            <li class="li_footer1">Cambridge Assessment Network</li>
            <li class="li_footer1">CEM</li>
            <li class="li_footer1">OCR</li>
        </ul>
        <hr>
        <ul class="sertificate_boxs">
            <li><img class="cambridge_img_last" src="./images/CambridgePressAssessmentLogo.svg" alt=""></li>
            <li><img class="sert_img_last" src="./images/ISO9001.png" alt=""></li>
        </ul>
    </div>
    <div class="footer2">
        <span style="margin-top: 15px;">© 2024 Cambridge University Press and Assessment</span>
        <ul class="ul_footer2">
            <li class="li_footer2">Accessibility and Standards</li>
            <li class="li_footer2">Data Protection</li>
            <li class="li_footer2">
                <?php
                if ($_SESSION['user']['email'] == 'admin@gmail.com') {
                ?>
                    <a href="register.php">Register user </a>
                <?php
                }
                ?>

            </li>
            <li class="li_footer2">Statement on Modern Slavery</li>
            <li class="li_footer2">Terms and Conditions</li>
        </ul>
    </div>
</body>

</html>