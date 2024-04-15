<?php
    function emptyInputLogin($username, $pwd){
        if(empty($username) || empty($pwd)){
            return true;
        }
        else{
            return false;
        }
    }
    function emptyInputContact($name, $email, $content){
        if(empty($name) || empty($email) || empty($content)){
            return true;
        }
        else{
            return false;
        }
    }
    function validateAmount($amount){
        if($amount < 1 || $amount > 10 || empty($amount)){
            return true;
        }
        else{
            return false;
        }
    }
    function checkContentLength($content){
        if(!empty($content)){
            if(strlen($content) < 500){
                return true;
            } else{
                return false;
            }
        }
    }
    function uidExists($conn, $username){
        $sql = "SELECT * FROM users WHERE usersName = ?;";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo '<script>alert("Something Went Wrong! Please Try Again!")</script>';
            echo("<script>window.location = '/webdev';</script>");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $resultsData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultsData)){
            return $row;
        }
        else{
            return false;
        }
        mysqli_stmt_close($stmt);
    }
    function loginUser($conn, $username, $pwd){
        $uidExists = uidExists($conn, $username);

        if($uidExists === false){
            echo '<script>';
            echo 'sessionStorage.setItem("isLoginOpen", "true");';
            echo 'alert("User Does Not Exist! Please Try Again!");';
            echo 'history.back();';
            echo '</script>';
            exit();
        }
        $pwdHashed = $uidExists["usersPwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);
        if($checkPwd === false){
            echo '<script>';
            echo 'sessionStorage.setItem("isLoginOpen", "true");';
            echo 'alert("Wrong Password! Please Try Again!");';
            echo 'history.back();';
            echo '</script>';
            exit();
        }
        else if($checkPwd === true){
            session_start();
            $_SESSION["userid"] = $uidExists["usersId"];
            $_SESSION["username"] = $uidExists["usersName"];
            $_SESSION["useremail"] = $uidExists["usersEmail"];
            $_SESSION["usercart"] = $uidExists["usersCart"];
            echo '<script>alert("Log In Successful! Welcome '.$_SESSION["username"].'!")</script>';
            echo("<script>history.back();</script>");
            exit();
        }
    }
    function emptyInputSignup($name, $email, $pwd, $pwdRepeat){
        if(empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)){
            return true;
        }
        else{
            return false;
        }
    }
    function invalidUid($name){
        if(!preg_match("/^[a-zA-Z0-9 ]*$/", $name)){
            return true;
        }
        else{
            return false;
        }
    }
    function invalidPhone($phone){
        if(!preg_match ("/^[0-9]{10}$/", $phone)){
            return true;
        }
        else{
            return false;
        }
    }
    function invalidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        else{
            return false;
        }
    }
    function pwdMatch($pwd, $pwdRepeat){
        if($pwd !== $pwdRepeat){
            return true;
        }
        else{
            return false;
        }
    }
    function createUser($conn, $name, $email, $pwd){
        $sql = "INSERT INTO users (usersId, usersName, usersEmail, usersPwd) VALUES (NULL, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo '<script>alert("Something Went Wrong! Please Try Again!")</script>';
            echo("<script>window.location = '/webdev';</script>");
            exit();
        }
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo '<script>';
        echo 'sessionStorage.setItem("isLoginOpen", "true");';
        echo 'alert("Sign Up Successful! You can login now!");';
        echo 'history.back();';
        echo '</script>';
        exit();
    }
    function insertContent($conn, $name, $email, $content, $phone){
        $sql = "INSERT INTO contact (id, name, email, details, phoneno) VALUES (NULL, ?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /webdev/contact/?error=wrong");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $content, $phone);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo '<script>alert("Thanks for your submission! We will get back to you ASAP!")</script>';
        echo("<script>window.location = '/webdev';</script>");
        exit();
    }
    function addItem($conn, $amount, $itemid){
        $queryItem = "SELECT * FROM items WHERE itemsId = ?";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $queryItem)){
            header("location: /webdev/products");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $itemid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rowI = mysqli_fetch_assoc($result);
        if(empty($_SESSION['usercart'])){
            $data['id'] = $itemid;
            $data['amount'] = $amount;
            $data['total'] = $rowI['itemsPrice'] * $amount;
            $unser_itemarray = [];
            array_push($unser_itemarray, $data);
        } else{
            $unser_itemarray = unserialize($_SESSION['usercart']);
            $data['id'] = $itemid;
            $data['amount'] = $amount;
            $data['total'] = $rowI['itemsPrice'] * $amount;
            array_push($unser_itemarray, $data);
        }
        $ser_itemarray = serialize($unser_itemarray);
        $userid = $_SESSION['userid'];
        $sql = "UPDATE users SET usersCart = ? WHERE usersId = ?;";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: /webdev/products");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $ser_itemarray, $userid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $sql = "SELECT * FROM users WHERE usersName = ?;";
        $stmt = mysqli_stmt_init($conn); 
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo '<script>alert("Something Went Wrong! Please Try Again!")</script>';
            echo("<script>window.location = '/webdev';</script>");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $_SESSION['username']);
        mysqli_stmt_execute($stmt);
        $resultsData = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($resultsData);
        $_SESSION["usercart"] = $row['usersCart'];
        echo '<script>alert("Item added into cart!")</script>';
        echo("<script>window.location = '/webdev/products';</script>");
        exit();
    }