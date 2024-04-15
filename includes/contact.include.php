<?php
    if(isset($_POST["submit"])){
        $name = $_POST["conname"];
        $email = $_POST["conemail"];
        $content = $_POST["content"];
        $phone = $_POST["phone"];

        require_once "../includes/db.php";
        require_once "functions.include.php";
        
        if(emptyInputContact($name, $email, $content) !== false){
            header("location: /webdev/contact/?error=emptyinput");
            exit();
        }
        if(invalidPhone($phone) !== false){
            header("location: /webdev/contact/?error=invalidphone");
            exit();
        }

        if(invalidUid($name) !== false){
            header("location: /webdev/contact/?error=invalidname");
            exit();
        }

        if(invalidEmail($email) !== false){
            header("location: /webdev/contact/?error=invalidemail");
            exit();
        }
        if(checkContentLength($content) !== true){
            header("location: /webdev/contact/?error=toolong");
            exit();
        }

        insertContent($conn, $name, $email, $content, $phone);
    }
    else{
        header("location: /webdev/contact");
        exit();
    }
