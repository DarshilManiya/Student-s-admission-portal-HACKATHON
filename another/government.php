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
    $sql = "SELECT `student-name`, `email`, `address`, `mobile-number` , `id`,`sindex` FROM student_detail";
    $result = $conn->query($sql);

    $sql1 = "SELECT `username` FROM ad_detail ";
$result1 = $conn->query($sql1);

$row = $result1->fetch_assoc()
    ?>

    <div class="wrapper">

        <div class="body-overlay"></div>

        <!-------sidebar--design------------>

        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" />
                <span><?php echo $row["username"]; ?></span>
                    <!-- <span id="emailDisplay"></span> -->
                </h3>
            </div>
            <ul class="list-unstyled component m-0">
                <li class="active">
                    <a href="#" class="dashboard"><i class="material-icons">dashboard</i>Dashboard </a>
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
                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt</span>
                            </div>
                        </div>

                        <div class="col-md-5 col-lg-3 order-3 order-md-2">
                            <div class="xp-searchbar">
                                <form method="GET" action="gov_search.php">
                                    <div class="input-group">
                                        <input type="text" name="query" class="form-control" placeholder="Search">
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
                                                <img src="../manicon.png" style="width:40px; border-radius:50%; filter: invert(100%);" />
                                                <span class="xp-user-live"></span>
                                            </a>
                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="#">
                                                        <span class="material-icons">person_outline</span>
                                                        Profile
                                                    </a></li>
                                                <li><a href="#">
                                                        <span class="material-icons">settings</span>
                                                        Settings
                                                    </a></li>
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
                        <h4 class="page-title">Dashboard</h4>

                    </div>


                </div>
            </div>
            <!------top-navbar-end----------->


            <!------main-content-start----------->
           <div style="margin-top:8px ; margin-left:15px">
           sort by school: <select name="selschool" id="selschool" style="border:1px solid black;
  padding: 8px 20px;
  border-radius:5px;">
                <option value="0">all data</option>
                <?php 
                $sql1 = "SELECT * from school";
                $result1 = $conn->query($sql1);

                while ($rows = mysqli_fetch_assoc($result1))
                {
                    echo "<option value='{$rows["sindex"]}'>{$rows['sname']}</option>";
                }
                ?>
                <!-- <option value="10">brilient</option>
                <option value="11">yogi</option>
                <option value="12">ashadeep</option>
                <option value="13">gyandeep</option> -->
            </select>
           </div>
           
            <div class="main-content">
                <div class="row" >
                    
                    <div class="col-md-12">
                        
                        <div class="table-wrapper" id="maincontent">

                            <table class="table table-striped table-hover">
                            <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Students Details</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                             <a href="deleschool.php" class="btn btn-danger" onclick="">
    <i class="material-icons">&#xE15C;</i>
    <span>Delete</span>
            </a>
								<a href="schoolform.php" class="btn btn-success">
							   <i class="material-icons">&#xE147;</i>
							   <span>Add New School</span>
							   </a>
							 </div>
					     </div>
                                <thead>
                                    <tr>

                                        <th style="text-align:center;font-weight:900">School index</th>
                                        <th style="text-align:center;font-weight:900">Name</th>
                                        <th style="text-align:center;font-weight:900">Address</th>
                                        <th style="text-align:center;font-weight:900">Phone</th>
                                        <th style="text-align:center;font-weight:900">View</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {

                                    ?>
                                            <tr>

                                                <td style="text-align:center;"><?php echo $row["sindex"]; ?></td>
                                                <td style="text-align:center;"><?php echo $row["student-name"]; ?></td>
                                                <td style="text-align:center;"><?php echo $row["address"]; ?></td>
                                                <td style="text-align:center;"><?php echo $row["mobile-number"]; ?></td>
                                                <td style="text-align:center;">

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



    <script>
        function setDeleteStudentId(studentId) {
            document.getElementById('deleteStudentId').value = studentId;

        }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function() {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });

            $("#selschool").on("change", function() {
                var sst = $("#selschool").val();
                $.ajax({
                    url: "sortschool.php",
                    type: "POST",
                    data: {
                        sst: sst,
                    },
                    success: function(data) {
                        $("#maincontent").html(data);
                    }
                });
            });

        });
    </script>
    <script>
        function editStudent(studentId) {
            // Fetch student details using Ajax
            $.ajax({
                type: "GET",
                url: "fetch_detail.php",
                data: {
                    fetchStudentId: studentId
                },
                dataType: "json",
                success: function(data) {
                    // Populate the edit modal fields with actual data
                    document.getElementById('editStudentId').value = studentId;
                    document.getElementById('editAcademicYear').value = data['academic-year'];
                    document.getElementById('editGrade').value = data['grade'];
                    document.getElementById('editUdiseCode').value = data['udise-code'];
                    document.getElementById('editSection').value = data['section'];
                    document.getElementById('editStudentName').value = data['student-name'];
                    document.getElementById('editSectionRollNo').value = data['section-roll-no'];
                    document.getElementById('editGender').value = data['gender'];
                    document.getElementById('editDob').value = data['dob'];
                    document.getElementById('editMotherName').value = data['mother-name'];
                    document.getElementById('editFatherName').value = data['father-name'];
                    document.getElementById('editAadhaarNumber').value = data['aadhaar-number'];
                    document.getElementById('editAadhaarName').value = data['aadhaar-name'];
                    document.getElementById('editAddress').value = data['address'];
                    document.getElementById('editPincode').value = data['pincode'];
                    document.getElementById('editMobileNumber').value = data['mobile-number'];
                    document.getElementById('editAlternateMobileNumber').value = data['alternate-mobile-number'];
                    document.getElementById('editEmail').value = data['email'];
                    document.getElementById('editIndianNational').value = data['indian-national'];
                    document.getElementById('editMotherTongue').value = data['mother-tongue'];
                    document.getElementById('editSocialCategory').value = data['social-category'];
                    document.getElementById('editMinorityGroup').value = data['minority-group'];
                    document.getElementById('editBplBeneficiary').value = data['bpl-beneficiary'];
                    document.getElementById('editAayBeneficiary').value = data['aay-beneficiary'];
                    document.getElementById('editEwsDisadvantaged').value = data['ews-disadvantaged'];
                    document.getElementById('editCwsn').value = data['cwsn'];
                    document.getElementById('editImpairmentType').value = data['impairment-type'];
                    document.getElementById('editDisabilityPercentage').value = data['disability-percentage'];
                    document.getElementById('editSldScreened').value = data['sld-screened'];
                    document.getElementById('editSldType').value = data['sld-type'];
                    document.getElementById('editAsdScreened').value = data['asd-screened'];
                    document.getElementById('editAdhdScreened').value = data['adhd-screened'];
                    document.getElementById('editOutOfSchoolChild').value = data['out-of-school-child'];
                    document.getElementById('editMainstreamedYear').value = data['mainstreamed-year'];
                    document.getElementById('editBloodGroup').value = data['blood-group'];
                    document.getElementById('editHeight').value = data['height'];
                    document.getElementById('editWeight').value = data['weight'];
                    document.getElementById('editScholarshipReceived').value = data['scholarship-received'];
                    document.getElementById('editCentralScholarship').value = data['central-scholarship'];
                    document.getElementById('editCentralScholarshipDetails').value = data['central-scholarship-details'];
                    document.getElementById('editStateScholarship').value = data['state-scholarship'];
                    document.getElementById('editOtherScholarship').value = data['other-scholarship'];
                    document.getElementById('editScholarshipAmount').value = data['scholarship-amount'];
                    document.getElementById('editBirthCertificate').value = data['birth-certificate'];
                    document.getElementById('editAadharCardUpload').value = data['aadhar-card-upload'];
                    document.getElementById('editPhotoUpload').value = data['photo-upload'];
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
    </script>

    <script>
        function saveStudent() {
            // Get the updated student details
            var studentId = document.getElementById('editStudentId').value;
            var academicYear = document.getElementById('editAcademicYear').value;
            var grade = document.getElementById('editGrade').value;
            var udiseCode = document.getElementById('editUdiseCode').value;
            var section = document.getElementById('editSection').value;
            var name = document.getElementById('editStudentName').value;
            var sectionRollNo = document.getElementById('editSectionRollNo').value;
            var gender = document.getElementById('editGender').value;
            var dob = document.getElementById('editDob').value;
            var motherName = document.getElementById('editMotherName').value;
            var fatherName = document.getElementById('editFatherName').value;
            var aadhaarNumber = document.getElementById('editAadhaarNumber').value;
            var aadhaarName = document.getElementById('editAadhaarName').value;
            var address = document.getElementById('editAddress').value;
            var pincode = document.getElementById('editPincode').value;
            var mobileNumbers = document.getElementById('editMobileNumber').value;
            var alternateMobileNumber = document.getElementById('editAlternateMobileNumber').value;
            var email = document.getElementById('editEmail').value;
            var indianNational = document.getElementById('editIndianNational').value;
            var motherTongue = document.getElementById('editMotherTongue').value;
            var socialCategory = document.getElementById('editSocialCategory').value;
            var minorityGroup = document.getElementById('editMinorityGroup').value;
            var bplBeneficiary = document.getElementById('editBplBeneficiary').value;
            var aayBeneficiary = document.getElementById('editAayBeneficiary').value;
            var ewsDisadvantaged = document.getElementById('editEwsDisadvantaged').value;
            var cwsn = document.getElementById('editCwsn').value;
            var impairmentType = document.getElementById('editImpairmentType').value;
            var disabilityPercentage = document.getElementById('editDisabilityPercentage').value;
            var sldScreened = document.getElementById('editSldScreened').value;
            var sldType = document.getElementById('editSldType').value;
            var asdScreened = document.getElementById('editAsdScreened').value;
            var adhdScreened = document.getElementById('editAdhdScreened').value;
            var outOfSchoolChild = document.getElementById('editOutOfSchoolChild').value;
            var mainstreamedYear = document.getElementById('editMainstreamedYear').value;
            var bloodGroup = document.getElementById('editBloodGroup').value;
            var height = document.getElementById('editHeight').value;
            var weight = document.getElementById('editWeight').value;
            var scholarshipReceived = document.getElementById('editScholarshipReceived').value;
            var centralScholarship = document.getElementById('editCentralScholarship').value;
            var centralScholarshipDetails = document.getElementById('editCentralScholarshipDetails').value;
            var stateScholarship = document.getElementById('editStateScholarship').value;
            var otherScholarship = document.getElementById('editOtherScholarship').value;
            var scholarshipAmount = document.getElementById('editScholarshipAmount').value;
            var birthCertificate = document.getElementById('editBirthCertificate').value;
            var aadharCardUpload = document.getElementById('editAadharCardUpload').value;
            var photoUpload = document.getElementById('editPhotoUpload').value;

            // Send an AJAX request to update the student details
            $.ajax({
                type: "POST",
                url: "edit_student.php", // Replace with your server-side script to handle the update
                data: {
                    studentId: studentId,
                    academicYear: academicYear,
                    grade: grade,
                    udiseCode: udiseCode,
                    section: section,
                    name: name,
                    sectionRollNo: sectionRollNo,
                    gender: gender,
                    dob: dob,
                    motherName: motherName,
                    fatherName: fatherName,
                    aadhaarNumber: aadhaarNumber,
                    aadhaarName: aadhaarName,
                    address: address,
                    pincode: pincode,
                    mobileNumbers: mobileNumbers,
                    alternateMobileNumber: alternateMobileNumber,
                    email: email,
                    indianNational: indianNational,
                    motherTongue: motherTongue,
                    socialCategory: socialCategory,
                    minorityGroup: minorityGroup,
                    bplBeneficiary: bplBeneficiary,
                    aayBeneficiary: aayBeneficiary,
                    ewsDisadvantaged: ewsDisadvantaged,
                    cwsn: cwsn,
                    impairmentType: impairmentType,
                    disabilityPercentage: disabilityPercentage,
                    sldScreened: sldScreened,
                    sldType: sldType,
                    asdScreened: asdScreened,
                    adhdScreened: adhdScreened,
                    outOfSchoolChild: outOfSchoolChild,
                    mainstreamedYear: mainstreamedYear,
                    bloodGroup: bloodGroup,
                    height: height,
                    weight: weight,
                    scholarshipReceived: scholarshipReceived,
                    centralScholarship: centralScholarship,
                    centralScholarshipDetails: centralScholarshipDetails,
                    stateScholarship: stateScholarship,
                    otherScholarship: otherScholarship,
                    scholarshipAmount: scholarshipAmount,
                    birthCertificate: birthCertificate,
                    aadharCardUpload: aadharCardUpload,
                    photoUpload: photoUpload
                },
                success: function(response) {
                    // alert("Student details updated successfully!");

                    // Close the modal
                    $('#editModal').modal('hide');

                    // Reload the page
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                    // Handle the error (e.g., show an error message)
                    alert("Error updating student details. Please try again.");
                }
            });
        }
    </script>


    <script>
        window.onload = function() {
            var email = localStorage.getItem("email");
            var emailDisplay = document.getElementById("emailDisplay");
            if (email) {
                emailDisplay.textContent = email;
            } else {
                emailDisplay.textContent = "Email Address: Not provided";
            }
        }
    </script>

    <?php
    // Close the database connection
    $conn->close();
    ?>
    <!-- delete -->
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


    <!-- edit -->
    <div id="editModal" class="modal fade modal-xl">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <input type="hidden" name="editStudentId" id="editStudentId">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Student</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" style="overflow-x: auto;">
                    <div class="form-group">
                        <label for="editAcademicYear">Academic Year:</label>
                        <input type="text" class="form-control" id="editAcademicYear" name="editAcademicYear" required>
                    </div>
                    <div class="form-group">
                        <label for="editGrade">Grade:</label>
                        <input type="text" class="form-control" id="editGrade" name="editGrade" required>
                    </div>
                    <div class="form-group">
                        <label for="editUdiseCode">UDISE Code:</label>
                        <input type="text" class="form-control" id="editUdiseCode" name="editUdiseCode" required>
                    </div>
                    <div class="form-group">
                        <label for="editSection">Section:</label>
                        <input type="text" class="form-control" id="editSection" name="editSection" required>
                    </div>
                    <div class="form-group">
                        <label for="editStudentName">Student Name:</label>
                        <input type="text" class="form-control" id="editStudentName" name="editStudentName" required>
                    </div>
                    <div class="form-group">
                        <label for="editSectionRollNo">Section Roll No:</label>
                        <input type="text" class="form-control" id="editSectionRollNo" name="editSectionRollNo" required>
                    </div>
                    <div class="form-group">
                        <label for="editGender">Gender:</label>
                        <input type="text" class="form-control" id="editGender" name="editGender" required>
                    </div>
                    <div class="form-group">
                        <label for="editDob">Dob:</label>
                        <input type="text" class="form-control" id="editDob" name="editDob" required>
                    </div>
                    <div class="form-group">
                        <label for="editMotherName">Mother Name:</label>
                        <input type="text" class="form-control" id="editMotherName" name="editMotherName" required>
                    </div>
                    <div class="form-group">
                        <label for="editFatherName">Father Name:</label>
                        <input type="text" class="form-control" id="editFatherName" name="editFatherName" required>
                    </div>
                    <div class="form-group">
                        <label for="editAadhaarNumber">Aadhar Number:</label>
                        <input type="text" class="form-control" id="editAadhaarNumber" name="editAadhaarNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="editAadhaarName">Aadhar Name:</label>
                        <input type="text" class="form-control" id="editAadhaarName" name="editAadhaarName" required>
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Address:</label>
                        <input type="text" class="form-control" id="editAddress" name="editAddress" required>
                    </div>
                    <div class="form-group">
                        <label for="editPincode">Pincode:</label>
                        <input type="text" class="form-control" id="editPincode" name="editPincode" required>
                    </div>
                    <div class="form-group">
                        <label for="editMobileNumber">Mobile Number:</label>
                        <input type="text" class="form-control" id="editMobileNumber" name="editMobileNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="editAlternateMobileNumber">AlternateMobile Number:</label>
                        <input type="text" class="form-control" id="editAlternateMobileNumber" name="editAlternateMobileNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email:</label>
                        <input type="text" class="form-control" id="editEmail" name="editEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="editIndianNational">Indian National:</label>
                        <input type="text" class="form-control" id="editIndianNational" name="editIndianNational" required>
                    </div>
                    <div class="form-group">
                        <label for="editMotherTongue">Mother Tongue:</label>
                        <input type="text" class="form-control" id="editMotherTongue" name="editMotherTongue" required>
                    </div>
                    <div class="form-group">
                        <label for="editSocialCategory">Social Category:</label>
                        <input type="text" class="form-control" id="editSocialCategory" name="editSocialCategory" required>
                    </div>
                    <div class="form-group">
                        <label for="editMinorityGroup">Minority Group:</label>
                        <input type="text" class="form-control" id="editMinorityGroup" name="editMinorityGroup" required>
                    </div>
                    <div class="form-group">
                        <label for="editBplBeneficiary">BPL :</label>
                        <input type="text" class="form-control" id="editBplBeneficiary" name="editBplBeneficiary" required>
                    </div>
                    <div class="form-group">
                        <label for="editAayBeneficiary">AAY :</label>
                        <input type="text" class="form-control" id="editAayBeneficiary" name="editAayBeneficiary" required>
                    </div>
                    <div class="form-group">
                        <label for="editEwsDisadvantaged">EWS :</label>
                        <input type="text" class="form-control" id="editEwsDisadvantaged" name="editEwsDisadvantaged" required>
                    </div>
                    <div class="form-group">
                        <label for="editCwsn">CWSN :</label>
                        <input type="text" class="form-control" id="editCwsn" name="editCwsn" required>
                    </div>
                    <div class="form-group">
                        <label for="editImpairmentType">Impairment :</label>
                        <input type="text" class="form-control" id="editImpairmentType" name="editImpairmentType" required>
                    </div>
                    <div class="form-group">
                        <label for="editDisabilityPercentage">Disability :</label>
                        <input type="text" class="form-control" id="editDisabilityPercentage" name="editDisabilityPercentage" required>
                    </div>
                    <div class="form-group">
                        <label for="editSldScreened">SLD Screend :</label>
                        <input type="text" class="form-control" id="editSldScreened" name="editSldScreened" required>
                    </div>
                    <div class="form-group">
                        <label for="editSldType">SLD Type :</label>
                        <input type="text" class="form-control" id="editSldType" name="editSldType" required>
                    </div>
                    <div class="form-group">
                        <label for="editAsdScreened">ASD Screend :</label>
                        <input type="text" class="form-control" id="editAsdScreened" name="editAsdScreened" required>
                    </div>
                    <div class="form-group">
                        <label for="editAdhdScreened">ADHD Screend :</label>
                        <input type="text" class="form-control" id="editAdhdScreened" name="editAdhdScreened" required>
                    </div>
                    <div class="form-group">
                        <label for="editOutOfSchoolChild">OUT of School Child :</label>
                        <input type="text" class="form-control" id="editOutOfSchoolChild" name="editOutOfSchoolChild" required>
                    </div>
                    <div class="form-group">
                        <label for="editMainstreamedYear">xMain streamed Year :</label>
                        <input type="text" class="form-control" id="editMainstreamedYear" name="editMainstreamedYear" required>
                    </div>
                    <div class="form-group">
                        <label for="editBloodGroup">Blood Group :</label>
                        <input type="text" class="form-control" id="editBloodGroup" name="editBloodGroup" required>
                    </div>
                    <div class="form-group">
                        <label for="editHeight">Height :</label>
                        <input type="text" class="form-control" id="editHeight" name="editHeight" required>
                    </div>
                    <div class="form-group">
                        <label for="editWeight">Weight :</label>
                        <input type="text" class="form-control" id="editWeight" name="editWeight" required>
                    </div>
                    <div class="form-group">
                        <label for="editScholarshipReceived">Scholarship Received :</label>
                        <input type="text" class="form-control" id="editScholarshipReceived" name="editScholarshipReceived" required>
                    </div>
                    <div class="form-group">
                        <label for="editCentralScholarship">Central Scholarship :</label>
                        <input type="text" class="form-control" id="editCentralScholarship" name="editCentralScholarship" required>
                    </div>
                    <div class="form-group">
                        <label for="editCentralScholarshipDetails">Central Scholarship Detail :</label>
                        <input type="text" class="form-control" id="editCentralScholarshipDetails" name="editCentralScholarshipDetails" required>
                    </div>
                    <div class="form-group">
                        <label for="editStateScholarship">State Scholarship :</label>
                        <input type="text" class="form-control" id="editStateScholarship" name="editStateScholarship" required>
                    </div>
                    <div class="form-group">
                        <label for="editOtherScholarship">Other Scholarship :</label>
                        <input type="text" class="form-control" id="editOtherScholarship" name="editOtherScholarship" required>
                    </div>
                    <div class="form-group">
                        <label for="editScholarshipAmount">Scolarship Amount :</label>
                        <input type="text" class="form-control" id="editScholarshipAmount" name="editScholarshipAmount" required>
                    </div>
                    <div class="form-group">
                        <label for="editBirthCertificate">Birth Certificate :</label>
                        <input type="text" class="form-control" id="editBirthCertificate" name="editBirthCertificate" required>
                    </div>
                    <div class="form-group">
                        <label for="editAadharCardUpload">Aadharcard photo :</label>
                        <input type="text" class="form-control" id="editAadharCardUpload" name="editAadharCardUpload" required>
                    </div>
                    <div class="form-group">
                        <label for="editPhotoUpload">Photo Upload:</label>
                        <input type="text" class="form-control" id="editPhotoUpload" name="editPhotoUpload" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="button" class="btn btn-primary" onclick="saveStudent()">Save</button>
                </div>
            </div>
        </div>
    </div>





</body>

</html>