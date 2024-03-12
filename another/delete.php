<?php

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

// Check if the student_id is set and not empty
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $studentId = $_POST['id'];

    // SQL query to delete the student record
    $sql = "DELETE FROM student_detail WHERE id = $studentId";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // JavaScript alert for successful deletion
        echo '<script>alert("Student deleted successfully");</script>';

        // Redirect to index.php after successful deletion
        echo '<script>window.location.href = "index.php";</script>';
        exit();
    } else {
        // JavaScript alert for deletion error
        echo '<script>alert("Error deleting student: ' . $conn->error . '");</script>';
    }
} else {
    // JavaScript alert for invalid student ID
    echo '<script>alert("Invalid student ID");</script>';
    echo '<script>window.location.href = "index.php";</script>';
    exit();
}

// Close the database connection
$conn->close();
?>
