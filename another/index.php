<?php
session_start();
    if(!isset($_SESSION["schoolindex"]))
    {
        header("Location: ../login.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <title>crud dashboard</title>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
	    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
  </head>
  <body>
  <?php 
  $scindex = $_SESSION["schoolindex"]; 
//   $username = $_SESSION["username"]; 
   ?>
  <?php
$servername = "localhost";
$username = "u975914058_ak";
$password = "Patidar1865@";
$dbname = "u975914058_admin";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `student-name`, `grade`, `address`, `mobile-number` , `id` FROM student_detail where sindex = $scindex ORDER BY `student-name`";
$result = $conn->query($sql);

$sql1 = "SELECT `username` FROM ad_detail where sindex = $scindex";
$result1 = $conn->query($sql1);

$sql2 = "SELECT `sname` FROM school where sindex = $scindex";
$result2 = $conn->query($sql2);

$row = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc()

?>

<div class="wrapper">
	  <div class="body-overlay"></div>
	 <div id="sidebar">
	    <div class="sidebar-header">
		   <h3><img src="img/logo.png" class="img-fluid"/>
           <span><?php echo $row["username"]; ?></span>
           
		</h3>
		</div>
		<ul class="list-unstyled component m-0">
		  <li class="active">
		  <a href="#" class="dashboard"><i class="material-icons">dashboard</i>dashboard </a>

		  </li>

		  <li class="dropdown">
    <a  id="openNoticeboard" onclick="showConfirmation()">
        <i class="fa-solid fa-bullhorn fa-xl hello"></i>Noticeboard
    </a>
</li>

<script>
    function showConfirmation() {
        var confirmation = confirm("Are you sure you want to open the Noticeboard?");
        
        if (confirmation) {
            // If the user clicks "OK" in the confirmation dialog, navigate to the noticeboard.php page.
            window.location.href = "fail.php";
        } else {
            // If the user clicks "Cancel" in the confirmation dialog, do nothing (stay on the current page).
            // You don't need to set window.location.href here.
        }
    }
</script>
		</ul>
	 </div>
      <div id="content">
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
									 </a></li> -->
									 <!-- <li><a href="#">
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
				    <h4 class="page-title">Dashboard</h4>
                    
                    <span style="color:white">School Name: <?php echo $row2["sname"]; ?></span>  <br>
                    <span style="color:white">School Index: <?php echo $scindex; ?></span>
                  
				 </div>
			 </div>
		  </div>
		      <div class="main-content">
			     <div class="row">
				    <div class="col-md-12">
					   <div class="table-wrapper">
					   <div class="table-title">
					     <div class="row">
						     <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
							    <h2 class="ml-lg-2">Manage  Students</h2>
							 </div>
							 <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
								<a href="form.php" class="btn btn-success">
							   <i class="material-icons">&#xE147;</i>
							   <span>Add New Students</span>
							   </a>
							 </div>
					     </div>
					   </div>
					   <table class="table table-striped table-hover">
					      <thead>
						     <tr>
							 <!-- <th><span class="custom-checkbox">
							 <input type="checkbox" id="selectAll">
							 <label for="selectAll"></label>
                            </th> -->
							 <th style="font-weight:900;text-align:center">Name</th>
							 <th style="font-weight:900;text-align:center">Grade</th>
							 <th style="font-weight:900;text-align:center">Address</th>
							 <th style="font-weight:900;text-align:center">Phone</th>
							 <th style="font-weight:900;text-align:center">View</th>
							 <th style="font-weight:900;text-align:center">Actions</th>
							 </tr>
						  </thead>
						  <tbody>
						  <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
            <!-- <th>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="option[]" value="1">
                    <label for="checkbox1"></label>
                </span>
            </th> -->
            <td style="text-align:center;"><?php echo $row["student-name"]; ?></td>
            <td style="text-align:center;"><?php echo $row["grade"]; ?></td>
            <td style="text-align:center;"><?php echo $row["address"]; ?></td>
            <td style="text-align:center;"><?php echo $row["mobile-number"]; ?></td>
            <td style="text-align:center;">
			<a href="view.php?id=<?php echo $row['id']; ?>" class="view">
    <i class="fa-regular fa-eye"></i>
</a>
            </td>
            <td>
			<a href="#editModal" class="edit" data-toggle="modal" onclick="editStudent(<?php echo $row['id']; ?>)">
    <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
</a>
                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal" onclick="setDeleteStudentId(<?php echo $row['id']; ?>)">
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
		 <footer class="footer">
		    <div class="container-fluid">
			   <div class="footer-in">
			      <p class="mb-0">&copy 2023 All Rights Reserved.</p>
			   </div>
			</div>
		 </footer>
	  </div>
</div>
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
    function editStudent(studentId) {
        $.ajax({
            type: "GET",
            url: "fetch_detail.php",
            data: { fetchStudentId: studentId },
            dataType: "json",
            success: function (data) {
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
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>
<script>
    function saveStudent() {
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
        $.ajax({
            type: "POST",
            url: "edit_student.php", 
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
            success: function (response) {
                $('#editModal').modal('hide');
                location.reload();
            },
            error: function (error) {
                console.log(error);
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
			emailDisplay.textContent =email;
		} else {
			emailDisplay.textContent = "Email Address: Not provided";
		}
	}
</script>
<?php
$conn->close();
?>
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
                    <!-- <input type="text" class="form-control" id="editSection" name="editSection" required> -->
                    <select id="editSection" name="editSection" required>
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
                <option value="Higher Secondary">Higher Secondary</option>
            </select>
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
                    <!-- <input type="text" class="form-control" id="editGender" name="editGender" required> -->
                    <select id="editGender" name="editGender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <!-- <option value="3">  </option> -->
            </select>
                </div>
				<div class="form-group">
                    <label for="editDob">Dob:</label>
                    <input type="date" class="form-control" id="editDob" name="editDob" required>
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
                    <!-- <select id="editIndianNational" name="editIndianNational" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select> -->
                </div>
				<div class="form-group">
                    <label for="editMotherTongue">Mother Tongue:</label>
                    <input type="text" class="form-control" id="editMotherTongue" name="editMotherTongue" required>
                </div>
				<div class="form-group">
                    <label for="editSocialCategory">Social Category:</label>
                    <!-- <input type="text" class="form-control" id="editSocialCategory" name="editSocialCategory" required> -->
                    <select id="editSocialCategory" name="editSocialCategory" required>
                <option value="General">General</option>
                <option value="SC">SC</option>
                <option value="ST">ST</option>
                <option value="OBC">OBC</option>
            </select>
                </div>
				<div class="form-group">
                    <label for="editMinorityGroup">Minority Group:</label>
                    <!-- <input type="text" class="form-control" id="editMinorityGroup" name="editMinorityGroup" required> -->
                    <select id="editMinorityGroup" name="editMinorityGroup" required>
                <option value="Muslim">Muslim</option>
                <option value="Christian">Christian</option>
                <option value="Sikh">Sikh</option>
                <option value="Buddhist">Buddhist</option>
                <option value="Parsi">Parsi</option>
                <option value="Jain">Jain</option>
                <option value="Not Applicable">Not Applicable</option>
            </select>
                </div>
				<div class="form-group">
                    <label for="editBplBeneficiary">BPL :</label>
                    <input type="text" class="form-control" id="editBplBeneficiary" name="editBplBeneficiary" required>
                    <!-- <select id="editBplBeneficiary" name="editBplBeneficiary" required>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select> -->
                </div>
				<div class="form-group">
                    <label for="editAayBeneficiary">AAY :</label>
                    <input type="text" class="form-control" id="editAayBeneficiary" name="editAayBeneficiary" required>
                    <!-- <select id="editAayBeneficiary" name="editAayBeneficiary">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select> -->
                </div>
				<div class="form-group">
                    <label for="editEwsDisadvantaged">EWS :</label>
                    <input type="text" class="form-control" id="editEwsDisadvantaged" name="editEwsDisadvantaged" required>
                    <!-- <select id="editEwsDisadvantaged" name="editEwsDisadvantaged" required>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select> -->
                </div>
				<div class="form-group">
                    <label for="editCwsn">CWSN :</label>
                    <input type="text" class="form-control" id="editCwsn" name="editCwsn" required>
                    <!-- <select id="editCwsn" name="editCwsn" required>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select> -->
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
                    <!-- <select id="editSldScreened" name="editSldScreened" required>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select> -->
                </div>
				<div class="form-group">
                    <label for="editSldType">SLD Type :</label>
                    <!-- <input type="text" class="form-control" id="editSldType" name="editSldType" required> -->
                    <select id="editSldType" name="editSldType">
                    <option value="Dysgraphia">Dysgraphia</option>
                    <option value="Dyscalculia">Dyscalculia</option>
                    <option value="Dyslexia">Dyslexia</option>
                </select>
                </div>
				<div class="form-group">
                    <label for="editAsdScreened">ASD Screend :</label>
                    <input type="text" class="form-control" id="editAsdScreened" name="editAsdScreened" required>
                    <!-- <select id="editAsdScreened" name="editAsdScreened" required>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select> -->
                </div>
				<div class="form-group">
                    <label for="editAdhdScreened">ADHD Screend :</label>
                    <input type="text" class="form-control" id="editAdhdScreened" name="editAdhdScreened" required>
                    <!-- <select id="editAdhdScreened" name="editAdhdScreened" required>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select> -->
                </div>
				<div class="form-group">
                    <label for="editOutOfSchoolChild">OUT of School Child :</label>
                    <input type="text" class="form-control" id="editOutOfSchoolChild" name="editOutOfSchoolChild" required>
                    <!-- <select id="editOutOfSchoolChild" name="editOutOfSchoolChild" required>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
            </select> -->
                </div>
				<div class="form-group">
                    <label for="editMainstreamedYear">xMain streamed Year :</label>
                    <input type="text" class="form-control" id="editMainstreamedYear" name="editMainstreamedYear" required>
                    <!-- <select id="editMainstreamedYear" name="editMainstreamedYear">
                    <option value="In current academic year">In current academic year</option>
                    <option value="In earlier AC Year">In earlier AC Year</option>
                </select> -->
                </div>
				<div class="form-group">
                    <label for="editBloodGroup">Blood Group :</label>
                    <!-- <input type="text" class="form-control" id="editBloodGroup" name="editBloodGroup" required> -->
                    <select name="editBloodGroup" id="editBloodGroup">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                
            </select>
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
                    <!-- <input type="text" class="form-control" id="editScholarshipReceived" name="editScholarshipReceived" required> -->
                    <select id="editScholarshipReceived" name="editScholarshipReceived" required>
                <option value="NO">NO</option>
                <option value="YES">YES</option>
            </select>
                </div>
				<div class="form-group">
                    <label for="editCentralScholarship">Central Scholarship :</label>
                    <!-- <input type="text" class="form-control" id="editCentralScholarship" name="editCentralScholarship" required> -->
                    <select id="editCentralScholarship" name="editCentralScholarship">
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
                </div>
				<div class="form-group">
                    <label for="editCentralScholarshipDetails">Central Scholarship Detail :</label>
                    <input type="text" class="form-control" id="editCentralScholarshipDetails" name="editCentralScholarshipDetails" required>
                </div>
				<div class="form-group">
                    <label for="editStateScholarship">State Scholarship :</label>
                    <!-- <input type="text" class="form-control" id="editStateScholarship" name="editStateScholarship" required> -->
                    <select id="editStateScholarship" name="editStateScholarship">
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
                </div>
				<div class="form-group">
                    <label for="editOtherScholarship">Other Scholarship :</label>
                    <!-- <input type="text" class="form-control" id="editOtherScholarship" name="editOtherScholarship" required> -->
                    <select id="editOtherScholarship" name="editOtherScholarship">
                    <option value="YES">YES</option>
                    <option value="NO">NO</option>
                </select>
                </div>
				<div class="form-group">
                    <label for="editScholarshipAmount">Scolarship Amount :</label>
                    <input type="text" class="form-control" id="editScholarshipAmount" name="editScholarshipAmount" required>
                </div>
				<div class="form-group">
                    <label for="editBirthCertificate">Birth Certificate :</label>
                    <input type="file" value="<?php echo $data['birth-certificate']; ?>" class="form-control" id="editBirthCertificate" name="editBirthCertificate" required>
                </div>
				<div class="form-group">
                    <label for="editAadharCardUpload">Aadharcard photo :</label>
                    <input type="file" value="<?php echo $data['aadhar-card-upload']; ?>" class="form-control" id="editAadharCardUpload" name="editAadharCardUpload" required>
				</div>
                <div class="form-group">
                    <label for="editPhotoUpload">Photo Upload:</label>
                    <input type="file" value="<?php echo $data['photo-upload']; ?>" class="form-control" id="editPhotoUpload" name="editPhotoUpload" required>
                </div>
            </div>
            <!-- document.getElementById('editBirthCertificate').value = data['birth-certificate'];
                document.getElementById('editAadharCardUpload').value = data['aadhar-card-upload'];
                document.getElementById('editPhotoUpload').value = data['photo-upload']; -->
            <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <button type="button" class="btn btn-primary" onclick="saveStudent()">Save</button>
            </div>
        </div>
    </div>
</div>
<!-- Add this script inside the <script> tag or in an external JavaScript file -->
<script>
    function deleteSelectedStudents() {
        var selectedIds = [];

        // Iterate through all checkboxes
        $('input[name="option[]"]:checked').each(function() {
            selectedIds.push($(this).val());
        });

        if (selectedIds.length > 0) {
            $.post("delete.php", { ids: selectedIds }, function(response) {
                // Handle the success response as needed
                location.reload(); // You can also update the table without refreshing the page
            }).fail(function(error) {
                console.log(error);
                alert("Error deleting students. Please try again.");
            });
        } else {
            alert("Please select at least one student to delete.");
        }
    }
</script>



  </body>
  </html>