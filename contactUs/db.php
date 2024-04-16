<?php

// Database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'yummy';

// Connect to database
$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['create'])){
    $name = $_POST["name"];  
    $email = $_POST["email"];  
    $message = $_POST["message"];   
    

        // Insert data into the database
        $insert_query = "INSERT INTO contactus (name, email, message) VALUES(?,?,?)";
        $insert_stmt = mysqli_prepare($conn, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "sss", $name, $email, $message);
		mysqli_stmt_execute($insert_stmt);
		
        mysqli_stmt_close($insert_stmt);	
		header("Location: index.html");
		exit(); // Stop further execution
		
    }

    mysqli_stmt_close($check_stmt);
    mysqli_close($conn);

?>