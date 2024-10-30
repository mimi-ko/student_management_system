<?php 

    $mysqli = new mysqli("localhost","root","","student_management_system");

    if ($mysqli->connect_error) {
        
        die("Connection failed: " . $mysqli->connect_error);
    }

?>