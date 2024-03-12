<?php
header("Content-Security-Policy: frame-ancestors 'none'");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>SSIP</title>
  </head>
  <body>
    <header class="head" style="background-color: #3b71ca; height: 60px">
      <div class="logo">
        <a href="index.php"> 
          <img
          id="logo"
          class="site_logo"
          src="pngwing.com.png"
          style="filter: invert(100%)"
          alt="State Emblem of India"
        />
        <span style="color: white; font-size: 14px">પોરબંદર જિલ્લો</span>  
        </a>
      </div>
      <i class="bx bx-menu" id="menu-icon"></i>
      <nav class="navbars">
        <a href="index.php"><span class="nl home">Home</span></a>
        <a href="#aboutus"><span class="nl tech">About Us</span></a>
        <a href="#contactus"><span class="nl non-tech">Contact Us</span></a>
        <a href="login.php"><span class="nl flagship">Login</span></a>
        <a href="another/help.html"><span class="nl flagship">Help</span></a>
      </nav>
    </header>

    <!-- Carousel -->
    <div class="carousel-container">
      <div
        id="carouselExampleIndicators"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="first.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="second.jpg" class="d-block w-100" alt="..." />
          </div>
          <div class="carousel-item">
            <img src="third.jpg" class="d-block w-100" alt="..." />
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <!-- About Us -->
    <!-- <center><h1>About Us</h1></center> -->
    <div class="text-center my-3">
      <h2 style="font-size: xx-large">Registration Detail</h2>
    </div>
    <hr />

    <?php
// Replace these variables with your database credentials
$host = "localhost";
$username = "u975914058_ak";
$password = "Patidar1865@";
$dbname = "u975914058_admin";

// Create a database connection
$con = mysqli_connect($host, $username, $password, $dbname);

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Specify the table name
$tableName = "student_detail";

// SQL query to count rows in the specified table
$sql = "SELECT COUNT(*) as rowCount FROM $tableName";
$result = mysqli_query($con, $sql);

if ($result) {
    // Fetch the result
    $row = mysqli_fetch_assoc($result);

    // Set the value of $rowCount
    $rowCount = $row["rowCount"];
} else {
    echo "Error: " . mysqli_error($con);
}

$tableName = "school";

// SQL query to count rows in the specified table
$sql = "SELECT COUNT(*) as rowCount FROM $tableName";
$result = mysqli_query($con, $sql);

if ($result) {
    // Fetch the result
    $row = mysqli_fetch_assoc($result);

    // Set the value of $rowCount
    $rowCount1 = $row["rowCount"];
} else {
    echo "Error: " . mysqli_error($con);
}

// Close the connection
mysqli_close($con);
?>
    <div class="section-full bg-white bg-img-fix content-inner">
      <div class="container">
        <div class="section-content">
          <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="text-center">
                <i class="fa-solid fa-school fa-5x"></i>

                <div
                  class="counter font-26 font-weight-800 text-primary m-b5"
                  style="font-size: x-large"
                >
                <?php echo $rowCount1; ?>
                </div>
                <span style="font-size: x-large">School</span>
              </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <div class="text-center">
                <i class="fa-solid fa-person fa-5x"></i>

                <div
                  class="counter font-26 font-weight-800 text-primary m-b5"
                  style="font-size: x-large"
                >
                <?php echo $rowCount; ?>
                </div>
                <span style="font-size: x-large">Student</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr />
    <!-- Contact Us -->
    <center><h2>Contact Us</h2></center>
    <div class="containers" id="contactus">
      <div style="padding-left: 70px">
        <div class="contactbody">
          <div>
            <h4>District Collector Office</h4>
            <div class="cdisplay" style="padding-bottom: 10px">
              <h6>
                Abc Ramji Nagar <br />
                Society Sardar Road <br />
                Porbandar <br />
                Gujarat - 345435
              </h6>
            </div>
          </div>
          <h4>Emergencies</h4>
          <div>
            <h6>District Helpline</h6>
            <h6>Call :- +91 6352900593</h6>
          </div>
          <div class="cdisplay" style="margin-top: 30px">
            <i
              class="fa-solid fa-phone"
              style="margin-left: 0%; margin-right: 2%; margin-top: 0px"
            ></i>
            <h6>+91 6352900593</h6>
          </div>
          <div class="cdisplay">
            <i
              class="fa-solid fa-phone"
              style="margin-left: 0%; margin-right: 2%"
            ></i>
            <h6>+91 9157873567</h6>
          </div>
          <div class="cdisplay">
            <i
              class="fas fa-envelope"
              style="margin-left: 0%; margin-right: 2%"
            ></i>
            <h6>radhekaran62@gmail.com</h6>
          </div>
        </div>
      </div>
    </div>
    <div
      class="bg-dark py-2"
    >
      <center class="text-white">
        Copyright © 2023. All rights reserved.
      </center>
    </div>
    <!-- <div
      class="d-flex flex-column flex-md-row text-md-start my-2 py-2 px-4 px-xl-5 bg-dark"
    >
      <center class="mb-0 text-white">
        Copyright © 2023. All rights reserved.
      </center>
    </div> -->

    <script src="script.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"
    ></script>
  </body>
</html>