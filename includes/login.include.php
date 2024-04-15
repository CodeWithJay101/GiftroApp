<?php
    //if the user access the page the proper way
    if(isset($_POST["submit"])){
        $username = $_POST["logname"];
        $pwd = $_POST["logpwd"];
        //reference documents
        require_once("db.php");
        require_once("functions.include.php");

        if(emptyInputLogin($username, $pwd) !== false){
            echo '<script>';
            echo 'sessionStorage.setItem("isLoginOpen", "true");';
            echo 'alert("Empty Fields Detected! Please Try Again!");';
            echo 'history.back();';
            echo '</script>';
            exit();
        }
        loginUser($conn, $username, $pwd);
    }
    else{
        header("location: /webdev");
        exit();
    }