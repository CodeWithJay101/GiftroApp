<?php
    session_start();
?>
<?php require_once("../includes/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Contact Us</title>
</head>
<body>
    <?php include("../includes/header.php") ?>
    <?php include("../includes/heading.php") ?>
    <?php 
    if(isset($_GET['error'])){
        if($_GET['error'] == 'invalidemail'){
            echo '<center class="error" style="color:red"><b>Invalid Email!</b></center>';
        }
        else if($_GET['error'] == 'invalidname'){
            echo '<center class="error" style="color:red"><b>Invalid Name!</b></center>';
        }
        else if($_GET['error'] == 'emptyinput'){
            echo '<center class="error" style="color:red"><b>Empty Fields Detected!</b></center>';
        }
        else if($_GET['error'] == 'toolong'){
            echo '<center class="error" style="color:red"><b>Content too long!</b></center>';
        }
        else if($_GET['error'] == 'wrong'){
            echo '<center class="error" style="color:red"><b>Something went wrong!</b></center>';
        }
        else if($_GET['error'] == 'invalidphone'){
            echo '<center class="error" style="color:red"><b>Invalid Phone Number! It should be 10 digits long!</b></center>';
        }
    }
        
    ?>
    <div class="form-wrapper">
        <form class="form-grid" action="/webdev/includes/contact.include.php" method="post">
            <div class="name-wrapper">
                <div class="form-name span-1">
                    <label class="name-label" for="name">Name:</label>
                    <input type="text" id="name" name="conname" placeholder="Enter your name" <?php if(isset($_SESSION["username"])){echo 'value="'.$_SESSION["username"].'"';} ?> required>
                </div>
                
            </div>
            <div class="email-wrapper">
                <div class="form-email span-1">
                    <label class="email-label" for="email">Email:</label>
                    <input type="email" id="email" name="conemail" placeholder="Enter your email" <?php if(isset($_SESSION["useremail"])){echo 'value="'.$_SESSION["useremail"].'"';} ?> required>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="form-phone span-2">
                    <label class="phone-label" for="phone">Phone Number:</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your phone number">
                </div>
            </div>
            <div class="content-wrapper">
                <div class="form-content span-2">
                    <label class="content-label" for="content">Content:</label>
                    <textarea maxlength="500" name="content" id="content" placeholder="Tell us anything" required></textarea>
                </div>
                <div class="content-count"><span class="actual-count">0</span>/500</div>
            </div>
            <div class="form-buttons span-2">
                <input style="border: none;" class="btn" type="submit" value="Submit" name="submit">
                <input style="border: none;" class="btn reset-btn" type="reset" value="Reset" onclick="resetForm();">
            </div>
        </form>
    </div>

    <?php include("../includes/footer.php"); ?>
    <script src="../js/main.js"></script>
    <script>
        const cont = document.querySelector("#content");
        const actual = document.querySelector(".actual-count");
        const reset = document.querySelector(".reset-count");
        cont.addEventListener('input', (e) => {
            actual.innerHTML = cont.value.length;
        })
        function resetForm(){
            setTimeout(function(){
                actual.innerHTML = '0';
            }, 50);
            return true;
        }
    </script>
</body>
</html>