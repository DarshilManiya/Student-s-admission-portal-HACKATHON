<!-- <?php
// if(!isset($_SERVER['HTTP_REFERER'])){
//     header('Location: error404.php');

// }
// header("Cache-Control: no-store, no-cache, must-revalidate");
// header("Pragma: no-cache");

// session_start();

// session_destroy();

// header("Location: ../login.php");
// exit();
// if(!isset($_SERVER['HTTP_REFERER'])){
//     header('Location: error404.php');
// }
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript"> 
        function preventBack() { 
            window.history.forward();  
        } 
          
        setTimeout("preventBack()", 0); 
          
        window.onunload = function () { null }; 
    </script> 
 </head>
 <body>
    
 </body>
 </html> -->

<?php
    session_start();
    session_destroy();
    header("Location: ../login.php");
?>