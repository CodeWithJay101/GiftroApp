<?php
    $serverName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "webdev";

    //connecting to the database (using mysqli) - procedural php
    $conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

    //if there is an error in the connection
    if(!$conn){
        //error message
        die("Connection failed: " . mysqli_connect_error());
    }