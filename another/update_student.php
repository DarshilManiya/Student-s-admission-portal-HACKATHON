<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: error404.php');
    // exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
    // if (isset($_POST['pass_fail_drop']) && is_array($_POST['pass_fail_drop'])) {
    //     $passFailDropIds = implode(',', $_POST['pass_fail_drop']);
    //     // Update academic-year for students who are dropped
    //     $passFailDropUpdateQuery = "UPDATE student_detail SET `academic-year` = `academic-year`,`grade` = `grade` WHERE id IN ($passFailDropIds)";
    //     $conn->query($passFailDropUpdateQuery);
    // }

    // Check which checkboxes were selected for pass/fail and drop
    if (isset($_POST['pass_fail']) && is_array($_POST['pass_fail'])) {
        $passFailIds = implode(',', $_POST['pass_fail']);
        // Update academic-year and grade for students who passed
        $passFailUpdateQuery = "UPDATE student_detail SET `academic-year` = (`academic-year` + 1), `grade` = `grade` + 1 WHERE id IN ($passFailIds)";
        $conn->query($passFailUpdateQuery);
    } else {
        // If pass/fail checkboxes are not selected, increase academic year by 1 for all students without affecting the grade
        $academicYearUpdateQuery = "UPDATE student_detail SET `academic-year` = `academic-year` + 1";
        $conn->query($academicYearUpdateQuery);
    }

   

    // Close the database connection
    $conn->close();
    echo '<script>alert("Update successful");</script>';
    header('Location: fail.php');
    exit; // Send a response to the client
}
?>

