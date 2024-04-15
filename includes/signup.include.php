<?php

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];

        require_once "db.php";
        require_once "functions.include.php";

        if(emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false){
            echo '<script>';
            echo 'sessionStorage.setItem("isModalOpen", "true");';
            echo 'alert("Empty Fields Detected! Please Try Again!");';
            echo 'history.back();';
            echo '</script>';
            exit();
        }

        if(invalidUid($name) !== false){
            echo '<script>';
            echo 'sessionStorage.setItem("isModalOpen", "true");';
            echo 'alert("Invalid Name! Please Try Again!");';
            echo 'history.back();';
            echo '</script>';
            exit();
        }

        if(invalidEmail($email) !== false){
            echo '<script>';
            echo 'sessionStorage.setItem("isModalOpen", "true");';
            echo 'alert("Invalid Email! Please Try Again!");';
            echo 'history.back();';
            echo '</script>';
            exit();
        }

        if(pwdMatch($pwd, $pwdRepeat) !== false){
            echo '<script>';
            echo 'sessionStorage.setItem("isModalOpen", "true");';
            echo 'alert("Passwords Don\'t Match! Please Try Again!");';
            echo 'history.back();';
            echo '</script>';
            exit();
        }

        if(uidExists($conn, $name) !== false){
            echo '<script>';
            echo 'sessionStorage.setItem("isModalOpen", "true");';
            echo 'alert("Username Already Exist! Please Try Again!");';
            echo 'history.back();';
            echo '</script>';
            exit();
        }

        createUser($conn, $name, $email, $pwd);
    }
    else{
        header("location: /webdev");
        exit();
    }