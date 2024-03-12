
<!DOCTYPE html>
<html>

<head>
    <title>School Registration Form</title>
</head>
<!-- <script>window.history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    window.history.pushState(null, null, document.URL);
});</script> -->
<style>
        .btn {
            border: 2px solid black;
            border-radius: 4px;
            font-size: large;
            padding: 8px 12px;
            margin: 10px 15px;
            cursor: pointer;
           
        }

        .btn:hover {
            color: red;
            background-color: darkgray;
        }

        fieldset {
            background-color: lightgray;
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            width: 600px;
            margin: 0 auto;
            
        }

        legend {
            font-weight: bold;
            font-size: large;
        }

        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
       

        input[type="text"],
        input[type="number"]
         {
            width: 100%;
            padding: 10px;
            border: 1px solid black;
            border-radius: 4px;
            margin-top: 6px;
        }
        input[type="text"],
        input[type="number"] {
            width: 96%;
            padding: 10px;
            padding-right: 10px;
            border: 1px solid black;
            border-radius: 4px;
            margin-top: 6px;
        }
    </style>


<body>
    <center>
        <h1>School Registration Form</h1>
    </center>
    <fieldset style='background-color:lightgray'>
        <legend>School Information</legend>

        <form  method="post" action="govserver.php" enctype="multipart/form-data">
            <label for="sindex">School Index:</label>
            <input type="number" id="sindex" name="sindex" placeholder="School-Index" required><br><br>

            <label for="sname">School Name:</label>
            <input type="text" id="sname" name="sname" required><br><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required><br><br>

            <input type="reset" value="Reset" class="btn">

            <input type="submit" value="Submit" class="btn">

            
        </form>
    </fieldset>
</body>


</html>
<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: error404.php');
    // exit;
}
function generateCSRFToken() {
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrfToken;
    return $csrfToken;
}

// Function to validate the Anti-CSRF token
function validateCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] === $token;
}

