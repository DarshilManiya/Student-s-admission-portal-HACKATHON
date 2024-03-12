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

  </head>
  <body>
  
  <?php 
  session_start();
  $scindex = $_SESSION["schoolindex"]; 
   ?>
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

// SQL query to retrieve student details
$sql = "SELECT `student-name`, `email`, `address`, `mobile-number` , `id`,`grade` FROM student_detail where sindex = $scindex";
$result = $conn->query($sql);
?>

<div class="wrapper">
     
	  <div class="body-overlay"></div>
	 
	 <!-------sidebar--design------------>
	 
	 <div id="sidebar">
	    <div class="sidebar-header">
		   <h3><img src="img/logo.png" class="img-fluid"/>
			<!-- <span id="emailDisplay"></span> -->
		</h3>
		</div>
		<ul class="list-unstyled component m-0">
		  <li class="active">
		  <a href="./index.php" class="dashboard"><i class="material-icons">dashboard</i>Go to dashboard </a>
		  </li>
		  
		  
		  
		  
		   
		  
		  
		   
		  
		
		</ul>
	 </div>
	 
   <!-------sidebar--design- close----------->
   
   
   
      <!-------page-content start----------->
   
      <div id="content">
	     
		  <!------top-navbar-start-----------> 
		     
		  <div class="top-navbar">
		     <div class="xd-topbar">
			     <div class="row">
				     <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
					    <div class="xp-menubar">
						    <span class="material-icons text-white">signal_cellular_alt</span>
						</div>
					 </div>
					 
					 <div class="col-md-5 col-lg-3 order-3 order-md-2">
					     <div class="xp-searchbar">
						     <form method="GET" action="search.php">
							    <div class="input-group">
								  <input type="text" name="query" class="form-control"
								  placeholder="Search">
								  <div class="input-group-append">
								     <button class="btn" type="submit" id="button-addon2">Go
									 </button>
								  </div>
								</div>
							 </form>
						 </div>
					 </div>
					 
					 
					 <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
					     <div class="xp-profilebar text-right">
						    <nav class="navbar p-0">
							   <ul class="nav navbar-nav flex-row ml-auto">
							  
							  
							   
							   <li class="dropdown nav-item">
							     <a class="nav-link" href="#" data-toggle="dropdown">
								  <img src="../manicon.png" style="width:40px; border-radius:50%; filter: invert(100%);"/>
								  <span class="xp-user-live"></span>
								 </a>
								  <ul class="dropdown-menu small-menu">
								     <!-- <li><a href="#">
									 <span class="material-icons">person_outline</span>
									 Profile
									 </a></li>
									 <li><a href="#">
									 <span class="material-icons">settings</span>
									 Settings
									 </a></li> -->
									 <li><a href="logout.php">
									 <span class="material-icons">logout</span>
									 Logout
									 </a></li>
									 
								  </ul>
							   </li>
							   
							   
							   </ul>
							</nav>
						 </div>
					 </div>
					 
				 </div>
				 
				 <div class="xp-breadcrumbbar text-center">
				    <h4 class="page-title">Update Student Result</h4>
					
				 </div>
				 
				 
			 </div>
		  </div>
		  <!------top-navbar-end-----------> 
		  
		  
		   <!------main-content-start-----------> 
		     
		      <div class="main-content">
              <div>
            <center><h5 style="color:red;">Check-box if student is pass</h5></center>
          </div>
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					     
					   <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Manage  Students</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
							   <!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"> -->
								<!-- <a href="form.html" class="btn btn-success">
							   <i class="material-icons">&#xE147;</i>
							   <span>Add New Students</span>
							   </a> -->
							   <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
							   <i class="material-icons">&#xE15C;</i>
							   <span>Delete</span>
							   </a> -->
							 </div>
					     </div>
					   </div>
					   <form id="updateForm" method="post" action="update_student.php">
                       <table class="table table-striped table-hover">
					      <thead>
						     <tr>
							 <th>
                                <span class="custom-checkbox">
                                    Pass/Fail
							 <!-- <input type="checkbox" id="selectAll">
							 <label for="selectAll"></label> -->
                            </th>
							
							<!-- <th>
                                <span class="custom-checkbox">
                                    Dropped -->
							 <!-- <input type="checkbox" id="selectAll">
							 <label for="selectAll"></label> -->
                            <!-- </th> -->
							 <th style="font-weight:900;text-align:center">Name</th>
							 <th style="font-weight:900;text-align:center">Class</th>
							 <th style="font-weight:900;text-align:center">Address</th>
							 <th style="font-weight:900;text-align:center">Phone</th>
							 <th style="font-weight:900;text-align:center">View</th>
							 
							 </tr>
						  </thead>
						  
						  <tbody>
						  <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
			
    ?>
        <tr>
            <th style="text-align:center;">
            <span class="custom-checkbox">
                        <input type="checkbox" class="checkbox" name="pass_fail[]" value="<?php echo $row['id']; ?>">
                        <!-- <label for="checkbox1"></label> -->
                        <label for="checkbox <?php echo $row['id']; ?>"></label>

                    </span>
            </th>
			<!-- <th>
            <span class="custom-checkbox">
                        <input type="checkbox" class="checkbox" > -->
                        <!-- <label for="checkbox1"></label> -->
                        <!-- <label for="checkbox"></label>

                    </span>
            </th> -->
			



            <td style="text-align:center;"><?php echo $row["student-name"]; ?></td>
            <td style="text-align:center;"><?php echo $row["grade"]; ?></td>
            <td style="text-align:center;"><?php echo $row["address"]; ?></td>
            <td style="text-align:center;"><?php echo $row["mobile-number"]; ?></td>
            <td>
			<a href="view.php?id=<?php echo $row['id']; ?>" class="view">
    <i class="fa-regular fa-eye"></i>
</a>
            </td>
            
        </tr>
    <?php
        }
    } else {
        echo "No student records found.";
    }
    ?>
							 
						  </tbody>
						  
					      
					   </table>
                       <button type="" id="updateButton" class="btn btn-success">Update Students</button>
</form>
					   </div>
					</div>
					

			     </div>
			  </div>
		  
		    <!------main-content-end-----------> 
		  
		 
		 
		 <!----footer-design------------->
		 
		 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023 All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
		 
		 
		 
		 
	  </div>
   
</div>



<!-------complete html----------->



  <script>
	function myFunc()
	{
		window.location.href = "view.php";
	}
  </script>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="js/jquery-3.3.1.min.js"></script>
  
  
  <script type="text/javascript">
       $(document).ready(function(){
	      $(".xp-menubar").on('click',function(){
		    $("#sidebar").toggleClass('active');
			$("#content").toggleClass('active');
		  });
		  
		  $('.xp-menubar,.body-overlay').on('click',function(){
		     $("#sidebar,.body-overlay").toggleClass('show-nav');
		  });
		  
	   });
  </script>
  
  <script>
	window.onload = function() {
		var email = localStorage.getItem("email");
		var emailDisplay = document.getElementById("emailDisplay");
		if (email) {
			emailDisplay.textContent =email;
		} else {
			emailDisplay.textContent = "Email Address: Not provided";
		}
	}
</script>

<?php
// Close the database connection
$conn->close();
?>

  </body>
  
  </html>