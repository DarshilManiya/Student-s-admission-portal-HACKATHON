<?php

if(!isset($_POST['submit']))
{
    header("Location: login.php");
}
else{

    if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('Location: error404.php');
        // exit;
    }
    // Start the session
    session_start();
    
    // Function to generate an Anti-CSRF token
    function generateCSRFToken() {
        $csrfToken = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrfToken;
        return $csrfToken;
    }
    
    // Function to validate the Anti-CSRF token
    function validateCSRFToken($token) {
        return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;
    }
    
    // Get the email and password values from the form
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $user_type = $_POST['type'];
    // $txtsindex = $_POST['txtsindex'];
    
    // Include the database connection file
    $host = "localhost";
    $user = "u975914058_ak";
    $passdb = "Patidar1865@";
    $database = "u975914058_admin";
    
    // Create a new database connection using PDO
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $passdb);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
    
    $query = "SELECT * FROM ad_detail WHERE username = :email AND password = :pass AND type = :user_type";
    // if($user_type == "institution")
    // {
    //     $query = "SELECT * FROM ad_detail WHERE username = :email AND password = :pass AND type = :user_type AND sindex=:txtsindex" ;
    // }
    // if($user_type == "government")
    // {
        
    // }
    // Construct the SQL query using prepared statements
    
    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);
    
    // Bind parameters to the prepared statement
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
    $stmt->bindParam(':user_type', $user_type, PDO::PARAM_STR);
    
    
    // if ($user_type === "institution") {
    //     $stmt->bindParam(':txtsindex', $txtsindex, PDO::PARAM_STR);
    // }
    // Execute the SQL query
    $stmt->execute();
    
    // Get the number of rows returned by the query
    $count = $stmt->rowCount();
    
    // Check if the email and password are correct
    if ($count == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($user_type === "institution") {
            // Set the session variables
            // $_SESSION["fname"] = $row["fname"];
            // $_SESSION["role"] = $row["role"];
            // $_SESSION["userid"] = $row["id"];
            $_SESSION['schoolindex'] = $row['sindex'];
            // Set HttpOnly flag for the session cookie
            session_set_cookie_params(['samesite' => 'Lax', 'httponly' => true]);
            header('Set-Cookie: PHPSESSID=' . session_id() . '; path=/; HttpOnly', false);
    
             // Redirect the user to the index page
            header("Location: another/index.php");
            exit();
        } elseif ($user_type === "government") {
            // Set the session variables
            // $_SESSION["fname"] = $row["fname"];
            // $_SESSION["role"] = $row["role"];
            // $_SESSION["userid"] = $row["id"];
            $_SESSION['role'] = "government";
            // Set HttpOnly flag for the session cookie
            session_set_cookie_params(['samesite' => 'Lax', 'httponly' => true]);
            header('Set-Cookie: PHPSESSID=' . session_id() . '; path=/; HttpOnly', false);
    
            // Redirect the user to the government page
            header("Location: another/government.php");
            exit();
        }
    } else {
        echo "<script>alert('Invalid email or password!');
        window.location.href = 'login.php';
        </script>";
    }
}
    ?>