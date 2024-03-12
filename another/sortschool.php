<?php 

$servername = "localhost";
$username = "u975914058_ak";
$password = "Patidar1865@";
$dbname = "u975914058_admin";

$sst = $_POST["sst"];
// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($sst == 0)
{
    $query = "SELECT `student-name`, `email`, `address`, `mobile-number` , `id`,`sindex` FROM student_detail";
}
else{
    $query = "SELECT `student-name`, `email`, `address`, `mobile-number` , `id`,`sindex` FROM student_detail where sindex={$sst}";
}

$result = $conn->query($query);

if ($result->num_rows > 0){
    $output = "";
    $output = '
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>

                                        <th style="text-align: center; font-weight:bolder">School Index</th>
                                        <th style="text-align: center; font-weight:bolder">Name</th>
                                        <th style="text-align: center; font-weight:bolder">Address</th>
                                        <th style="text-align: center; font-weight:bolder">Phone</th>
                                        <th style="text-align: center; font-weight:bolder">View</th>

                                    </tr>
                                </thead>

                                <tbody>
    ';

    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>
        <td style='text-align: center;'>{$row["sindex"]}</td>
        <td style='text-align: center;'>{$row["student-name"]}</td>
        <td style='text-align: center;'>{$row["address"]}</td>
        <td style='text-align: center;'>{$row["mobile-number"]}</td>
        <td style='text-align: center;'>

            <a href='view.php?id=$row[id]' class='view'>
                <i class='fa-regular fa-eye'></i>
            </a>



        </td>
            </tr>";
    }
    $output .= "</tbody> </table>";
    mysqli_close($conn);
    echo $output;
}
else {
    echo "No record found!!";
}
?>