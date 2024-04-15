<?php
    if(isset($_POST["submit"])){
        session_start();
        $amount = $_POST['amount'];
        $itemid = $_POST['itemid'];
        require_once "db.php";
        require_once "functions.include.php";

        if(validateAmount($amount) !== false){
            echo '<script>alert("Invalid amount! Item not added to cart! Please Try Again!")</script>';
            echo("<script>window.location = '/webdev/products';</script>");
            exit();
        }

        addItem($conn, $amount, $itemid);
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