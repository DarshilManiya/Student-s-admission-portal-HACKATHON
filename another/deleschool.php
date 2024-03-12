<?php
session_start();
    if(!isset($_SESSION["role"]))
    {
        header("Location: ../login.php");
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- <script type="text/javascript"> 
        function preventBack() { 
            window.history.forward();  
        } 
          
        setTimeout("preventBack()", 0); 
          
        window.onunload = function () { null }; 
    </script>  -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>crud dashboard</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/custom.css">


    <!--google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
    #selschool:focus {
        outline:none;
    }
</style>

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- <script>window.history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    window.history.pushState(null, null, document.URL);
});</script> -->
</head>

<body>


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
    $sql = "SELECT `sname`,`sindex` FROM school";
    $result1 = $conn->query($sql);
    $sql1 = "SELECT `username` FROM ad_detail ";
    $result2 = $conn->query($sql1);
    
    $row = $result1->fetch_assoc();

$row1 = $result2->fetch_assoc()
    ?>

    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>
        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" />
                <span><?php echo $row1["username"]; ?></span>
                    <!-- <span id="emailDisplay"></span> -->
                </h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li >
                    <a href="government.php" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
                </li>
                


                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false">
                        <i class="fa fa-question-circle fa-xl" aria-hidden="true"></i>
                        Help
                    </a>

                </li>





            </ul>
        </div>
       

        <!-------sidebar--design- close----------->



        <!-------page-content start----------->

        <div id="content">

            <!------top-navbar-start----------->

            <div class="top-navbar">
                <div class="xd-topbar">
                 

                    <div class="xp-breadcrumbbar text-center">
                        <h4 class="page-title">School Management</h4>

                    </div>


                </div>
            </div>
           
           
            <div class="main-content">
                <div class="row" >
                    
                    <div class="col-md-12">
                        
                        <div class="table-wrapper" id="maincontent">

                            <table class="table table-striped table-hover">
                            <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">School Detail</h2>
							 </div>
							 
					     </div>
                                <thead>
                                    <tr>

                                        <th style="text-align:center;font-weight:900">School index</th>
                                        <th style="text-align:center;font-weight:900">School Name</th>
                                        <th style="text-align:center;font-weight:900">Actions</th>
                                       

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if ($result1->num_rows > 0) {
                                        while ($row = $result1->fetch_assoc()) {

                                    ?>
                                            <tr>

                                                <td style="text-align:center;"><?php echo $row["sindex"]; ?></td>
                                                <td style="text-align:center;"><?php echo $row["sname"]; ?></td>
                                              
                                                <td style="text-align:center;">
<!-- 
                                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal">
        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
    </a>  -->

    <a href="deletes.php?sindex=<?php echo $row['sindex']; ?>" class="view" onclick =  'confirm("Are you sure you want to Delete?")'>
                                                        <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
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





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>




    


    

    <?php
    // Close the database connection
    $conn->close();
    ?>
    <!-- delete -->
  


    




</body>

</html>