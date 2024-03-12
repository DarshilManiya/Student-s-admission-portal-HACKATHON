
<!DOCTYPE html>
<html>

<head>
    <title>Student Registration Form</title>
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
        input[type="number"],
        input[type="date"],
        select,
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid black;
            border-radius: 4px;
            margin-top: 6px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],input[type="email"],
        input[type="file"] {
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
        <h1>Student Registration Form</h1>
    </center>
    <fieldset style='background-color:lightgray'>
        <legend>Student Information</legend>

        <form  method="post" action="server.php" enctype="multipart/form-data">
            <label for="academic-year">Academic Year:</label>
            <input type="text" id="academic-year" name="academic-year" placeholder="2023-24" required><br><br>

            <label for="grade">GRADE/CLASS:</label>
            <input type="number" id="grade" name="grade" required><br><br>

            <label for="udise-code">School index code:</label>
            <input type="text" id="udise-code" name="udise-code" required><br><br>

            <label for="section">SECTION:</label>
            <select id="section" name="section" required>
                <option value="1">Primary</option>
                <option value="2">Secondary</option>
                <option value="3">Higher Secondary</option>
            </select><br><br>

            <label for="student-name">Name of the Student (in Capital Letters):</label>
            <input type="text" id="student-name" name="student-name" required><br><br>

            <label for="section-roll-no">Section Roll No.:</label>
            <input type="text" id="section-roll-no" name="section-roll-no" required><br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">  </option>
            </select><br><br>

            <label for="dob">Date of Birth (DD/MM/YYYY):</label>
            <input type="date" id="dob" name="dob" required><br><br>

            <label for="mother-name">Mother’s Name:</label>
            <input type="text" id="mother-name" name="mother-name" required><br><br>

            <label for="father-name">Father’s Name:</label>
            <input type="text" id="father-name" name="father-name" required><br><br>

            <label for="aadhaar-number">Aadhaar Number of Student:</label>
            <input type="text" id="aadhaar-number" name="aadhaar-number" required><br><br>

            <label for="aadhaar-name">Name of Student as per/in Aadhaar Card:</label>
            <input type="text" id="aadhaar-name" name="aadhaar-name" required><br><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required><br><br>

            <label for="pincode">Pincode:</label>
            <input type="text" id="pincode" name="pincode" required><br><br>

            <label for="mobile-number">Mobile Number (Parent):</label>
            <input type="text" id="mobile-number" name="mobile-number" required><br><br>

            <label for="alternate-mobile-number">Alternate Mobile Number (Parent):</label>
            <input type="text" id="alternate-mobile-number" name="alternate-mobile-number" required><br><br>

            <label for="email">Contact email-id (Parent):</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="indian-national">Whether the Student is Indian National?</label>
            <select id="indian-national" name="indian-national" required>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select><br><br>

            <label for="mother-tongue">Mother Tongue of the Student:</label>
            <input type="text" id="mother-tongue" name="mother-tongue" required><br><br>

            <label for="social-category">Social Category:</label>
            <select id="social-category" name="social-category" required>
                <option value="1">General</option>
                <option value="2">SC</option>
                <option value="3">ST</option>
                <option value="4">OBC</option>
            </select><br><br>

            <label for="minority-group">Minority Group:</label>
            <select id="minority-group" name="minority-group" required>
                <option value="1">Muslim</option>
                <option value="2">Christian</option>
                <option value="3">Sikh</option>
                <option value="4">Buddhist</option>
                <option value="5">Parsi</option>
                <option value="6">Jain</option>
                <option value="7">Not Applicable</option>
            </select><br><br>

            <label for="bpl-beneficiary">Whether BPL beneficiary?</label>
            <select id="bpl-beneficiary" name="bpl-beneficiary" required>
                <option value="2">No</option>
                <option value="1">Yes</option>
            </select><br><br>

            <div id="bpl-options" style="display: none;">
                <label for="aay-beneficiary">Whether Antyodaya Anna Yojana (AAY) beneficiary?</label>
                <select id="aay-beneficiary" name="aay-beneficiary">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select><br><br>
            </div>

            <label for="ews-disadvantaged">Whether belongs to EWS / Disadvantaged Group?</label>
            <select id="ews-disadvantaged" name="ews-disadvantaged" required>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select><br><br>

            <label for="cwsn">Whether CWSN?</label>
            <select id="cwsn" name="cwsn" required>
                <option value="2">No</option>
                <option value="1">Yes</option>
            </select><br><br>

            <div id="cwsn-options" style="display: none;">
                <label for="impairment-type">Type of impairment (code):</label>
                <input type="text" id="impairment-type" name="impairment-type"><br><br>

                <label for="disability-percentage">Disability Percentage (in %):</label>
                <input type="text" id="disability-percentage" name="disability-percentage"><br><br>
            </div>
            <label for="sld-screened">Whether Student has been screened for Specific Learning Disability (SLD):</label>
            <select id="sld-screened" name="sld-screened" required>
                <option value="2">No</option>
                <option value="1">Yes</option>
            </select><br><br>

            <div id="sld-options" style="display: none;">
                <label for="sld-type">Specify the type of SLD:</label>
                <select id="sld-type" name="sld-type">
                    <option value="1">Dysgraphia</option>
                    <option value="2">Dyscalculia</option>
                    <option value="3">Dyslexia</option>
                </select><br><br>
            </div>

            <label for="asd-screened">Whether Student has been screened for Autism Spectrum Disorder (ASD) :</label>
            <select id="asd-screened" name="asd-screened" required>
                <option value="2">No</option>
                <option value="1">Yes</option>
            </select><br><br>

            <label for="adhd-screened">Whether Student has been screened for Attention Deficit Hyperactive Disorder
                (ADHD):</label>
            <select id="adhd-screened" name="adhd-screened" required>
                <option value="2">No</option>
                <option value="1">Yes</option>
            </select><br><br>

            <label for="out-of-school-child">Is this Student identified as Out-of-School-Child in current or previous
                years?</label>
            <select id="out-of-school-child" name="out-of-school-child" required>
                <option value="2">No</option>
                <option value="1">Yes</option>
            </select><br><br>

            <div id="out-of-school-options" style="display: none;">
                <label for="mainstreamed-year">When the student is mainstreamed?</label>
                <select id="mainstreamed-year" name="mainstreamed-year">
                    <option value="1">In current academic year</option>
                    <option value="2">In earlier AC Year</option>
                </select><br><br>
            </div>

            <label for="blood-group">Blood Group:</label>
            <select name="blood-group" id="blood-group">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                
            </select>
            <br><br>

            <label for="height">Student’s Height (in CMs):</label>
            <input type="text" id="height" name="height"><br><br>

            <label for="weight">Student’s Weight (in KGs):</label>
            <input type="text" id="weight" name="weight"><br><br>

            <label for="scholarship-received">Scholarship Received by Student (in Previous Academic year):</label>
            <select id="scholarship-received" name="scholarship-received" required>
                <option value="2">NO</option>
                <option value="1">YES</option>
            </select><br><br>

            <div id="scholarship-options" style="display: none;">
                <label for="central-scholarship">Central Scholarship:</label>
                <select id="central-scholarship" name="central-scholarship">
                    <option value="1">YES</option>
                    <option value="2">NO</option>
                </select><br><br>

                <label for="central-scholarship-details">Code & Name of Scholarship:</label>
                <input type="text" id="central-scholarship-details" name="central-scholarship-details"><br><br>

                <label for="state-scholarship">State Scholarship:</label>
                <select id="state-scholarship" name="state-scholarship">
                    <option value="1">YES</option>
                    <option value="2">NO</option>
                </select><br><br>

                <label for="other-scholarship">Other Scholarship:</label>
                <select id="other-scholarship" name="other-scholarship">
                    <option value="1">YES</option>
                    <option value="2">NO</option>
                </select><br><br>

                <label for="scholarship-amount">Scholarship Amount (per annum):</label>
                <input type="text" id="scholarship-amount" name="scholarship-amount"><br><br>
            </div>

            <label for="birth-certificate">Upload Birth Certificate:(.pdf, .jpg, .png format)</label>
            <input type="file" id="birth-certificate" name="birth-certificate" accept=".pdf, .jpg, .png"
                required><br><br>

            <label for="aadhar-card-upload">Upload Aadhaar Card:(.pdf, .jpg, .png format)</label>
            <input type="file" id="aadhar-card-upload" name="aadhar-card-upload" accept=".pdf, .jpg, .png"
                required><br><br>

            <label for="photo-upload">Upload Photo of Student:(.jpg / .png format)</label>
            <input type="file" id="photo-upload" name="photo-upload" accept=".jpg, .png"
                required><br><br>

            <input type="reset" value="Reset" class="btn">

            <input type="submit" value="Submit" class="btn">

            <script>
                function validateAadhaar() {
                    var aadhaarNumber = document.getElementById('aadhaar-number').value;

                    // Check if Aadhaar number is exactly 12 digits
                    if (/^\d{12}$/.test(aadhaarNumber)) {
                        return true; // Valid Aadhaar number
                    } else {
                        alert('Please enter a valid 12-digit Aadhaar number.');
                        return false; // Invalid Aadhaar number
                    }
                }
                document.getElementById("bpl-beneficiary").addEventListener("change", function () {
                    var bplOptions = document.getElementById("bpl-options");
                    if (this.value === "1") {
                        bplOptions.style.display = "block";
                    } else {
                        bplOptions.style.display = "none";
                    }
                });

                document.getElementById("cwsn").addEventListener("change", function () {
                    var cwsnOptions = document.getElementById("cwsn-options");
                    if (this.value === "1") {
                        cwsnOptions.style.display = "block";
                    } else {
                        cwsnOptions.style.display = "none";
                    }
                });

                document.getElementById("out-of-school-child").addEventListener("change", function () {
                    var outOfSchoolOptions = document.getElementById("out-of-school-options");
                    if (this.value === "1") {
                        outOfSchoolOptions.style.display = "block";
                    } else {
                        outOfSchoolOptions.style.display = "none";
                    }
                });

                document.getElementById("scholarship-received").addEventListener("change", function () {
                    var scholarshipOptions = document.getElementById("scholarship-options");
                    if (this.value === "1") {
                        scholarshipOptions.style.display = "block";
                    } else {
                        scholarshipOptions.style.display = "none";
                    }
                });

                document.getElementById("sld-screened").addEventListener("change", function () {
                    var sldOptions = document.getElementById("sld-options");
                    if (this.value === "1") {
                        sldOptions.style.display = "block";
                    } else {
                        sldOptions.style.display = "none";
                    }
                });
            </script>
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

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: error404.php');
    // exit;
}
?>