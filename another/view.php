<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 3px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: lightgray;
        }

        .image-cell {
            text-align: center;
            
        }

        img {
            max-width: 100%;
            max-height: 200px;
        }
    </style>
</head>
<body>
    <center><h1>Student Detail</h1></center>
    <table>
    <!-- <thead>
            <tc>
                <th>Academic Year</th>
                <th>Grade/Class</th>
                <th>School Index Code</th>
                <th>Section</th>
                <th>Student Name</th>
                <th>Section Roll No.</th>
                <th>Gender</th>
                <th>Date of Birth</th>
                <th>Mother's Name</th>
                <th>Father's Name</th>
                <th>Aadhaar Number</th>
                <th>Aadhaar Name</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Mobile Number (Parent)</th>
                <th>Alternate Mobile Number (Parent)</th>
                <th>Contact Email ID (Parent)</th>
                <th>Indian National</th>
                <th>Mother Tongue</th>
                <th>Social Category</th>
                <th>Minority Group</th>
                <th>BPL Beneficiary</th>
                <th>Antyodaya Anna Yojana (AAY) Beneficiary</th>
                <th>EWS/Disadvantaged Group</th>
                <th>CWSN</th>
                <th>Type of Impairment</th>
                <th>Disability Percentage</th>
                <th>Screened for Specific Learning Disability (SLD)</th>
                <th>Type of SLD</th>
                <th>Screened for Autism Spectrum Disorder (ASD)</th>
                <th>Screened for Attention Deficit Hyperactive Disorder (ADHD)</th>
                <th>Out-of-School Child</th>
                <th>When Mainstreamed</th>
                <th>Blood Group</th>
                <th>Height (in CMs)</th>
                <th>Weight (in KGs)</th>
                <th>Scholarship Received</th>
                <th>Central Scholarship</th>
                <th>Central Scholarship Details</th>
                <th>State Scholarship</th>
                <th>Other Scholarship</th>
                <th>Scholarship Amount (per annum)</th>
                <th>Birth Certificate (PDF)</th>
                <th>Aadhaar Card (PDF)</th>
                <th>Photo (Image)</th>
            </tc>
        </thead> -->
        <tbody>
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

// Retrieve the student's ID from the URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // SQL query to retrieve the student's details based on the ID
    $sql = "SELECT * FROM student_detail WHERE id = $student_id";
    $sql1 = "SELECT 
    s.id, 
    s.`academic-year`, 
    s.grade, 
    s.`udise-code`, 
    s.section, 
    s.`student-name`, 
    s.`section-roll-no`, 
    s.gender, 
    s.dob, 
    s.`mother-name`, 
    s.`father-name`, 
    s.`aadhaar-number`, 
    s.`aadhaar-name`, 
    s.address, 
    s.pincode, 
    s.`mobile-number`, 
    s.`alternate-mobile-number`, 
    s.email, 
    s.`indian-national`, 
    s.`mother-tongue`, 
    s.`social-category`, 
    s.`minority-group`, 
    s.`bpl-beneficiary`, 
    s.`aay-beneficiary`, 
    s.`ews-disadvantaged`, 
    s.cwsn, 
    s.`impairment-type`, 
    s.`disability-percentage`, 
    s.`sld-screened`, 
    s.`sld-type`, 
    s.`asd-screened`, 
    s.`adhd-screened`, 
    s.`out-of-school-child`, 
    s.`mainstreamed-year`, 
    s.`blood-group`, 
    s.height, 
    s.weight, 
    s.`scholarship-received`, 
    s.`central-scholarship`, 
    s.`central-scholarship-details`, 
    s.`state-scholarship`, 
    s.`other-scholarship`, 
    s.`scholarship-amount`, 
    s.`birth-certificate`, 
    s.`aadhar-card-upload`, 
    s.`photo-upload`, 
    s.sindex,
    sc.sname  -- Add the schoolname from the school table
FROM 
student_detail s
JOIN 
    school sc ON s.sindex = sc.sindex
WHERE 
    id = $student_id;
";
    $result = $conn->query($sql1);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Display the student's information
        // echo "<tr>";
        $studentDetails = array(
            'School Index' => $row["sindex"],
            'School Name' => $row["sname"],
            'Academic Year' => $row["academic-year"],
            'Grade/Class' => $row["grade"],
            'School Index Code' => $row["udise-code"],
            'Section' => $row["section"],
            'Student Name' => $row["student-name"],
            'Section Roll No.' => $row["section-roll-no"],
            'Gender' => $row["gender"],
            'Date of Birth' => $row["dob"],
            'Mother\'s Name' => $row["mother-name"],
            'Father\'s Name' => $row["father-name"],
            'Aadhaar Number' => $row["aadhaar-number"],
            'Aadhaar Name' => $row["aadhaar-name"],
            'Address' => $row["address"],
            'Pincode' => $row["pincode"],
            'Mobile Number (Parent)' => $row["mobile-number"],
            'Alternate Mobile Number (Parent)' => $row["alternate-mobile-number"],
            'Contact Email ID (Parent)' => $row["email"],
            'Indian National' => $row["indian-national"],
            'Mother Tongue' => $row["mother-tongue"],
            'Social Category' => $row["social-category"],
            'Minority Group' => $row["minority-group"],
            'BPL Beneficiary' => $row["bpl-beneficiary"],
            'Antyodaya Anna Yojana (AAY) Beneficiary' => $row["aay-beneficiary"],
            'EWS/Disadvantaged Group' => $row["ews-disadvantaged"],
            'CWSN' => $row["cwsn"],
            'Type of Impairment' => $row["impairment-type"],
            'Disability Percentage' => $row["disability-percentage"],
            'Screened for Specific Learning Disability (SLD)' => $row["sld-screened"],
            'Type of SLD' => $row["sld-type"],
            'Screened for Autism Spectrum Disorder (ASD)' => $row["asd-screened"],
            'Screened for Attention Deficit Hyperactive Disorder (ADHD)' => $row["adhd-screened"],
            'Out-of-School Child' => $row["out-of-school-child"],
            'When Mainstreamed' => $row["mainstreamed-year"],
            'Blood Group' => $row["blood-group"],
            'Height (in CMs)' => $row["height"],
            'Weight (in KGs)' => $row["weight"],
            'Scholarship Received' => $row["scholarship-received"],
            'Central Scholarship' => $row["central-scholarship"],
            'Central Scholarship Details' => $row["central-scholarship-details"],
            'State Scholarship' => $row["state-scholarship"],
            'Other Scholarship' => $row["other-scholarship"],
            'Scholarship Amount (per annum)' => $row["scholarship-amount"],
        );
        
        foreach ($studentDetails as $field => $value) {
            echo "<tr>";
            echo "<td style='font-weight:bold;background-color:lightgray;width:45%'>$field</td>";
            echo "<td>$value</td>";
            echo "</tr>";
        }
        // Output the images separately in individual rows
        echo "<tr class='image-cell'>";
        echo "<td style='font-weight:bold;background-color:lightgray'>Birth Certificate </td>";
        echo "<td><a href='" . $row["birth-certificate"] . "' target='_blank'>View Birth Certificate</a></td>";
        echo "</tr>";
        
        echo "<tr class='image-cell'>";
        echo "<td style='font-weight:bold;background-color:lightgray'>Aadhaar Card </td>";
        echo "<td><a href='" . $row["aadhar-card-upload"] . "' target='_blank'>View Aadhaar Card</a></td>";
        echo "</tr>";
        
        echo "<tr class='image-cell'>";
        echo "<td style='font-weight:bold;background-color:lightgray'>Student Photo </td>";
        echo "<td><a href='" . $row["photo-upload"] . "' target='_blank'>View Student Photo</a></td>";
        echo "</tr>";
        // You can display other information as well
    } else {
        echo "Student not found.";
    }
}

// Close the database connection
$conn->close();

?>

        </tbody>
    </table>
</body>
</html>