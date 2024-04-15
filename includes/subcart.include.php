<?php
    if(isset($_POST["submit"])){
        session_start();
        $shipping = $_POST['shipping'];
        $payment = $_POST['payment'];

        require_once "db.php";
        require_once "functions.include.php";

        $cartarray = unserialize($_SESSION['usercart']);
        $total = 0;
        foreach ($cartarray as $key => $val) {
            $total += $val['total'];
        }
        $sql = "UPDATE users SET usersCart = null WHERE usersId = ?;";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /webdev");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['userid']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $sql = "INSERT INTO transaction (transactionId, usersId, transactionDetails, transactionTotal, transactionShipping, transactionPayment) VALUES (NULL, ?, ?, ?, ?, ?);";
        
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /webdev");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssss", $_SESSION['userid'], $_SESSION['usercart'], $total, $shipping, $payment);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION['usercart'] = '';
        echo '<script>alert("Total payment: $'.number_format($total, 2).'\nThank you for your purchase!")</script>';
        echo("<script>window.location = '/webdev';</script>");
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