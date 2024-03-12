<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>crud dashboard</title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
		<!-- Font Awesome -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
	    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <!----css3---->
        <link rel="stylesheet" href="css/custom.css">
		
		
		<!--google fonts -->
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	
	
	   <!--google material icon-->
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
<!-- 
      <script type="text/javascript"> 
        function preventBack() { 
            window.history.forward();  
        } 
          
        setTimeout("preventBack()", 0); 
          
        window.onunload = function () { null }; 
    </script>  -->
  </head>
  <body>


<?php

// Connect to your database
$host = "localhost";
$username = "u975914058_ak";
$password = "Patidar1865@";
$database = "u975914058_admin";

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the user's search query
$query = $_GET['query'];

// Perform the SQL query to search for matching records
// Perform the SQL query to search for matching records
$sql = "SELECT * FROM student_detail WHERE LOWER(`student-name`)  LIKE LOWER('%$query%')";
// $sql = "SELECT * FROM student_detail WHERE LIKE LOWER('%$query%')";
$result = mysqli_query($conn, $sql);


// Close the database connection
?>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th><span class="custom-checkbox">
                    
                </span></th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>View</th>
            
        </tr>
    </thead>

    <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td>
                        <span class="custom-checkbox">
                            
                        </span>
                    </td>
                    <td><?php echo $row["student-name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td><?php echo $row["mobile-number"]; ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $row['id']; ?>" class="view">
                            <i class="fa-regular fa-eye"></i>
                        </a>
                    </td>
                    
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='7'>No results found.</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php 
mysqli_close($conn);

?>
<script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
 <script>
	 function setDeleteStudentId(studentId) {
        document.getElementById('deleteStudentId').value = studentId;
		
    }
   </script>
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="delete.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this student?</p>
                    <input type="hidden" name="id" id="deleteStudentId">
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
 </body>
  
  </html>

