<?php
    if(isset($_POST["submit"])){
        session_start();
        $items = $_POST['item'];

        require_once "db.php";
        require_once "functions.include.php";

        $array = unserialize($_SESSION['usercart']);
        foreach ($items as $key => $val) {
            unset($array[$val]);
        }
        if(!empty($array)){
            $_SESSION['usercart'] = serialize($array);
        } else{
            $_SESSION['usercart'] = '';
        }
        $sql = "UPDATE users SET usersCart = ? WHERE usersId = ?;";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /webdev/products");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION['usercart'], $_SESSION['userid']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: /webdev/cart");
        exit();
    }
    else{
        if(isset($_SESSION['username'])){
            header("location: /webdev/cart");
            exit();
        } else{
            header("location: /webdev");
            exit();
        }
        
    }