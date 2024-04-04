<?php

$servername = "localhost";
$uname = "root";
$pass = "";
$db = "gymnsb";

$conn = mysqli_connect($servername, $uname, $pass, $db);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$currentDate = date('m-d');
$sql = "SELECT COUNT(*) AS num_birthdays FROM members WHERE DATE_FORMAT(dob, '%m-%d') = '$currentDate'";
$query = mysqli_query($conn, $sql);

if (!$query) {
    die("Query Failed: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($query);
$num_birthdays = $row['num_birthdays'];

echo $num_birthdays;

?>
<!-- Visit codeastro.com for more projects -->
