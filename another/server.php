<?php
session_start();
// Database details
$host = "localhost";
$username = "u975914058_ak";
$password = "Patidar1865@";
$dbname = "u975914058_admin";

// Create a database connection
$con = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_POST['submit'])) {
    // Get the form data and sanitize it
    $academicYear = $_POST["academic-year"];
    $grade = $_POST["grade"];
    $udiseCode = $_POST["udise-code"];
    $section = $_POST["section"];
    $studentName = $_POST["student-name"];
    $sectionRollNo = $_POST["section-roll-no"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $motherName = $_POST["mother-name"];
    $fatherName = $_POST["father-name"];
    $aadhaarNumber = $_POST["aadhaar-number"];
    $aadhaarName = $_POST["aadhaar-name"];
    $address = $_POST["address"];
    $pincode = $_POST["pincode"];
    $mobileNumber = $_POST["mobile-number"];
    $alternateMobileNumber = $_POST["alternate-mobile-number"];
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL); // Validate email
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $school= $_SESSION['schoolindex'];


    if ($email === false) {
        echo "Invalid email address.";
        exit; // Exit to prevent further processing
    }

    // Convert email to lowercase
    $email = strtolower($email);
    $height = $_POST["height"]; 
    $weight = $_POST["weight"];
    $bloodGroup = $_POST["blood-group"];
    $indianNational = $_POST["indian-national"];
    $motherTongue = $_POST["mother-tongue"];
    $socialCategory = $_POST["social-category"];
    $minorityGroup = $_POST["minority-group"];
    $ewsDisadvantaged = $_POST["ews-disadvantaged"];
    $asdScreened = $_POST["asd-screened"];
    $adhdScreened = $_POST["adhd-screened"];
    $outOfSchoolChild = $_POST["out-of-school-child"];
    $mainstreamedYear = $_POST["mainstreamed-year"];
    $scholarshipReceived = $_POST["scholarship-received"];
    $centralScholarship = $_POST["central-scholarship"];
    $centralScholarshipDetails = $_POST["central-scholarship-details"];
    $stateScholarship = $_POST["state-scholarship"];
    $otherScholarship = $_POST["other-scholarship"];
    $scholarshipAmount = $_POST["scholarship-amount"];
    $bplBeneficiary = $_POST["bpl-beneficiary"];
    $aayBeneficiary = $_POST["aay-beneficiary"];
    $cwsn = $_POST["cwsn"];
    $impairmentType = $_POST["impairment-type"];
    $disabilityPercentage = $_POST["disability-percentage"];
    $sldScreened = $_POST["sld-screened"];
    $sldType = $_POST["sld-type"];
    $aadharPhoto = $_FILES["aadhar-card-upload"];
    $birthCertificate = $_FILES["birth-certificate"];
    $stuPhoto = $_FILES["photo-upload"];

    $aadharPhotoPath = "uploads/" . basename($aadharPhoto["name"]);
    $birthCertificatePath = "uploads/" . basename($birthCertificate["name"]);
    $stuPhotoPath = "uploads/" . basename($stuPhoto["name"]);


    $checkuser = "SELECT * FROM student_detail WHERE `aadhaar-number` = ?";
    $stmt = mysqli_prepare($con, $checkuser);
    
    if ($stmt) {
        // Bind parameter and set type
        mysqli_stmt_bind_param($stmt, "s", $aadhaarNumber);
    
        // Execute the query
        mysqli_stmt_execute($stmt);
    
        // Store the result
        mysqli_stmt_store_result($stmt);
    
        // Get the count of rows
        $count = mysqli_stmt_num_rows($stmt);
    
        // Close the statement
        mysqli_stmt_close($stmt);
    
        if ($count > 0) {
            echo "<script>alert('User already exists.');
            window.location = 'form.php'; // Redirect to index.php
            </script>";
            
            exit; // Exit to prevent further processing
        }
        
    }
   
        


    if (
        move_uploaded_file($aadharPhoto["tmp_name"], $aadharPhotoPath) &&
        move_uploaded_file($birthCertificate["tmp_name"], $birthCertificatePath) &&
        move_uploaded_file($stuPhoto["tmp_name"], $stuPhotoPath)
    ) {
        // Create a prepared statement
        $stmt = mysqli_prepare($con, "INSERT INTO student_detail (`academic-year`, `grade`, `udise-code`, `section`, `student-name`, `section-roll-no`, `gender`, `dob`, `mother-name`, `father-name`, `aadhaar-number`, `aadhaar-name`, `address`, `pincode`, `mobile-number`, `alternate-mobile-number`, `email`, `indian-national`, `mother-tongue`, `social-category`, `minority-group`, `bpl-beneficiary`, `aay-beneficiary`, `ews-disadvantaged`, `cwsn`, `impairment-type`, `disability-percentage`, `sld-screened`, `sld-type`, `asd-screened`, `adhd-screened`, `out-of-school-child`, `mainstreamed-year`, `blood-group`, `height`, `weight`, `scholarship-received`, `central-scholarship`, `central-scholarship-details`, `state-scholarship`, `other-scholarship`, `scholarship-amount`,`aadhar-card-upload`,`birth-certificate`,`photo-upload`,`sindex`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

        if ($stmt) {
            // Bind parameters and set types for each field
            mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssssssssssssssssssssssssssss", $academicYear, $grade, $udiseCode, $section, $studentName, $sectionRollNo, $gender, $dob, $motherName, $fatherName, $aadhaarNumber, $aadhaarName, $address, $pincode, $mobileNumber, $alternateMobileNumber, $email, $indianNational, $motherTongue, $socialCategory, $minorityGroup, $bplBeneficiary, $aayBeneficiary, $ewsDisadvantaged, $cwsn, $impairmentType, $disabilityPercentage, $sldScreened, $sldType, $asdScreened, $adhdScreened, $outOfSchoolChild, $mainstreamedYear, $bloodGroup, $height, $weight, $scholarshipReceived, $centralScholarship, $centralScholarshipDetails, $stateScholarship, $otherScholarship, $scholarshipAmount, $aadharPhotoPath, $birthCertificatePath, $stuPhotoPath,$school);

            // Execute the query
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo "<script>
                alert('Entry added successfully');
                window.location = 'index.php'; // Redirect to index.php
            </script>";
            } else {
                echo "Error: " . mysqli_error($con);
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "<script>
    alert('Sorry! Entry is not Submitted');
    window.location = 'index.php'; // Redirect to index.php
</script>";
    }
}
// Close connection
mysqli_close($con);