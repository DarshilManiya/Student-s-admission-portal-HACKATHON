<?php
// update_student.php

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

// Get data from the AJAX request
$studentId = $_POST['studentId'];





// Additional fields
$academicYear = $_POST['academicYear'];
$grade = $_POST['grade'];
$udiseCode = $_POST['udiseCode'];
$section = $_POST['section'];
$name = $_POST['name'];
$sectionRollNo = $_POST['sectionRollNo'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$motherName = $_POST['motherName'];
$fatherName = $_POST['fatherName'];
$aadhaarNumber = $_POST['aadhaarNumber'];
$aadhaarName = $_POST['aadhaarName'];
$address = $_POST['address'];
$pincode = $_POST['pincode'];
$mobileNumbers = $_POST['mobileNumbers'];
$alternateMobileNumber = $_POST['alternateMobileNumber'];
$email = $_POST['email'];
$indianNational = $_POST['indianNational'];
$motherTongue = $_POST['motherTongue'];
$socialCategory = $_POST['socialCategory'];
$minorityGroup = $_POST['minorityGroup'];
$bplBeneficiary = $_POST['bplBeneficiary'];
$aayBeneficiary = $_POST['aayBeneficiary'];
$ewsDisadvantaged = $_POST['ewsDisadvantaged'];
$cwsn = $_POST['cwsn'];
$impairmentType = $_POST['impairmentType'];
$disabilityPercentage = $_POST['disabilityPercentage'];
$sldScreened = $_POST['sldScreened'];
$sldType = $_POST['sldType'];
$asdScreened = $_POST['asdScreened'];
$adhdScreened = $_POST['adhdScreened'];
$outOfSchoolChild = $_POST['outOfSchoolChild'];
$mainstreamedYear = $_POST['mainstreamedYear'];
$bloodGroup = $_POST['bloodGroup'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$scholarshipReceived = $_POST['scholarshipReceived'];
$centralScholarship = $_POST['centralScholarship'];
$centralScholarshipDetails = $_POST['centralScholarshipDetails'];
$stateScholarship = $_POST['stateScholarship'];
$otherScholarship = $_POST['otherScholarship'];
$scholarshipAmount = $_POST['scholarshipAmount'];
$birthCertificate = $_POST['birthCertificate'];
$aadharCardUpload = $_POST['aadharCardUpload'];
$photoUpload = $_POST['photoUpload'];

// SQL query to update student details
$sql = "UPDATE student_detail SET
        
        
        
       
        `academic-year`='$academicYear',
        `grade`='$grade',
        `udise-code`='$udiseCode',
        `section`='$section',
        `student-name`='$name',
        `section-roll-no`='$sectionRollNo',
        `gender`='$gender',
        `dob`='$dob',
        `mother-name`='$motherName',
        `father-name`='$fatherName',
        `aadhaar-number`='$aadhaarNumber',
        `aadhaar-name`='$aadhaarName',
        `address`='$address',
        `pincode`='$pincode',
        `mobile-number`='$mobileNumbers',
        `alternate-mobile-number`='$alternateMobileNumber',
        `email`='$email',
        `indian-national`='$indianNational',
        `mother-tongue`='$motherTongue',
        `social-category`='$socialCategory',
        `minority-group`='$minorityGroup',
        `bpl-beneficiary`='$bplBeneficiary',
        `aay-beneficiary`='$aayBeneficiary',
        `ews-disadvantaged`='$ewsDisadvantaged',
        `cwsn`='$cwsn',
        `impairment-type`='$impairmentType',
        `disability-percentage`='$disabilityPercentage',
        `sld-screened`='$sldScreened',
        `sld-type`='$sldType',
        `asd-screened`='$asdScreened',
        `adhd-screened`='$adhdScreened',
        `out-of-school-child`='$outOfSchoolChild',
        `mainstreamed-year`='$mainstreamedYear',
        `blood-group`='$bloodGroup',
        `height`='$height',
        `weight`='$weight',
        `scholarship-received`='$scholarshipReceived',
        `central-scholarship`='$centralScholarship',
        `central-scholarship-details`='$centralScholarshipDetails',
        `state-scholarship`='$stateScholarship',
        `other-scholarship`='$otherScholarship',
        `scholarship-amount`='$scholarshipAmount',
        `birth-certificate`='$birthCertificate',
        `aadhar-card-upload`='$aadharCardUpload',
        `photo-upload`='$photoUpload'
        WHERE id=$studentId";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error updating student details: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
