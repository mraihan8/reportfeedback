<?php
    // Buat Koneksinya
    $con = mysqli_connect("localhost","root","","report");
    $db1 = new mysqli("localhost","root","","report");
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

?>
