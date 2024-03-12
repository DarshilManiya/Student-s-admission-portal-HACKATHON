<?php


// fetch_student.php

$servername = "localhost";
$username = "u975914058_ak";
$password = "Patidar1865@";
$dbname = "u975914058_admin";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $fetchStudentId = $_GET["fetchStudentId"];

    // Fetch the student details from the database
    $sql = "SELECT `academic-year`, `grade`, `udise-code`, `section`, `student-name`, `section-roll-no`, `gender`, `dob`, `mother-name`, `father-name`, `mobile-number` , `aadhaar-number` , `aadhaar-name` , `address` , `pincode` , `mobile-number` , `alternate-mobile-number` , `email` , `indian-national` , `mother-tongue` , `social-category` , `minority-group` , `bpl-beneficiary` , `aay-beneficiary` , `ews-disadvantaged` , `cwsn` , `impairment-type` , `disability-percentage` , `sld-screened` , `sld-type` , `asd-screened` , `adhd-screened` , `out-of-school-child` , `mainstreamed-year`, `blood-group` , `height` , `weight` , `scholarship-received` , `central-scholarship` , `central-scholarship-details` , `state-scholarship` , `other-scholarship` , `scholarship-amount` , `birth-certificate` , `aadhar-card-upload` , `photo-upload` FROM student_detail WHERE id=$fetchStudentId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo "Student details not found";
    }
}

// Close the database connection
$conn->close();
?>
