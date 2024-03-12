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
    $s_name= $_SESSION['sname'];
    $s_index= $_SESSION['sindex'];
    $s_username=$_SESSION['username'];
    $s_password=$_SESSION['password'];



    // Convert email to lowercase

    $s_name = $_POST["sname"];
    $s_index = $_POST["sindex"];
    $s_username= $_POST["username"];
    $s_password = $_POST["password"];
    

    $checkschool = "SELECT * FROM school WHERE `sindex` = ?";
    $stmt = mysqli_prepare($con, $checkschool);
    
    if ($stmt) {
        // Bind parameter and set type
        mysqli_stmt_bind_param($stmt, "s", $s_index);
    
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
            window.location = 'schoolform.php'; // Redirect to index.php
            </script>";
            
            exit; // Exit to prevent further processing
        }
        
    }
   
        


  
        // Create a prepared statement
        $stmt = mysqli_prepare($con, "INSERT INTO school (`sindex`, `sname`) VALUES (?,?)");
        $stmt2 = mysqli_prepare($con, "INSERT INTO ad_detail (`username`, `password`,`sindex`) VALUES (?,?,?)");

        if ($stmt && $stmt2) {
            // Bind parameters and set types for each field
            mysqli_stmt_bind_param($stmt, "ss", $s_index, $s_name);
            mysqli_stmt_bind_param($stmt2, "sss", $s_username, $s_password,$s_index);

            // Execute the query
            $result = mysqli_stmt_execute($stmt);
            $result2 = mysqli_stmt_execute($stmt2);

            if ($result && $result2) {
                echo "<script>
                alert('Entry added successfully');
                window.location = 'government.php'; // Redirect to index.php
            </script>";
            } else {
                echo "Error: " . mysqli_error($con);
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
            mysqli_stmt_close($stmt2);
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } 

// Close connection
mysqli_close($con);
    


