<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
			text-align: center;
		}

		a {
			display: inline-block;
			padding: 10px 20px;
			margin: 20px;
			text-decoration: none;
			color: #fff;
			background-color: #3498db;
			border-radius: 5px;
		}

		a:hover {
			background-color: #2980b9;
		}
	</style>
</head>
<body>
	<a href="fail.php">Update</a>
</body>
</html>

<?php 
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('Location: error404.php');
    // exit;
}
?>
