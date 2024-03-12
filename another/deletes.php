<?php 

$servername = "localhost";
$username = "u975914058_ak";
$password = "Patidar1865@";
$dbname = "u975914058_admin";

$sst = $_GET["sindex"];
// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$query = "delete from school where sindex = $sst";
if($result = $conn->query($query))
{
    echo "<script>alert('record deleted!');
        window.location.href = 'deleschool.php';
        </script>
        ";
}
mysqli_close($conn);


?>