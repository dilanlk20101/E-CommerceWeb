<?php
    
    $servername = "localhost";
    $username = "root";		
    $password = "";			
    $dbname = "tevos";
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    
    if (mysqli_connect_error()){
        die('Error connecting to the database:'.mysqli_connect_error());
    }
?>