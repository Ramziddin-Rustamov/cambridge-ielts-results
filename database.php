<?php
$hostName = "localhost:3306";
$dbUser = "root"; //rusramu1_cambridge
$dbPassword = ""; //rusramu1_cambridge
$dbName = "userslist"; //rusramu1_cambridge

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Somthing went wrong while connecting to the database !");
}
