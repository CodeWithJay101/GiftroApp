<header>
    <div class="header-div">
        <a style="text-decoration: none" href="/webdev"><div class="main-logo">
            <p class="logo logo-grey">GIFTRO</p>
            <p class="sub-logo logo-red">GIFT SHOP</p>
        </div></a>
        <ul class="nav">
            <li><a class="nav-links" href="/webdev">Home</a></li>
            <li><a class="nav-links" href="/webdev/products">Our Products</a></li>
            <li><a class="nav-links" href="/webdev/about">About Us</a></li>
            <li><a class="nav-links" href="/webdev/contact">Contact Us</a></li>
        </ul>
        <div class="icons">
            <?php 
                if(isset($_SESSION["username"])){
                    echo '<a href="/webdev/cart"><img class="icon cart-icon" src="'; ?> <?php if(file_exists('img/cart.png')){echo "img/cart.png";} else{echo "../img/cart.png";} ?> <?php echo '" alt="cart icon"></a>';
                } else{
                    echo '<img onclick="profilePopup()" class="icon cart-icon" src="'; ?> <?php if(file_exists('img/cart.png')){echo "img/cart.png";} else{echo "../img/cart.png";} ?> <?php echo '" alt="cart icon">';
                }
            ?>
            
            <img onclick="<?php if(isset($_SESSION['userid'])){echo 'logoutPopup()';} else{echo 'profilePopup()';} ?>" class="icon profile-icon" src="<?php if(file_exists('img/prof.png')){echo "img/prof.png";} else{echo "../img/prof.png";} ?>" alt="cart icon">
        </div>
    </div>
</header>

<dialog data-modal class="modal profile-modal">
    <div class="login-title">Log In</div>
    <form class="login-form" action="/webdev/includes/login.include.php" method="post">
        <div class="login-input-sec">
            <div class="login-label login-name">
                <label class="login-name-label" for="lname">Name:</label>
                <input class="login-input" type="text" id="lname" name="logname" placeholder="Enter your name" required>
            </div>
            <div class="login-label login-pass">
                <label class="login-pass-label" for="lpwd">Password:</label>
                <input class="login-input" type="password" id="lpass" name="logpwd" placeholder="Enter your password" required>
            </div>
            <div>New here? <span onclick="openSignup()" class="signup-btn" style="color:blue">Click here to sign up!</span></div>
        </div>
        <div class="login-btns">
            <input name="submit" type="submit" value="Login" class="btn modal-btn">
            <input onclick="closeLogin()" type="reset" value="Close" class="btn modal-btn">
        </div>
        
    </form>
</dialog>
    
<dialog data-modal class="modal signup-modal">
    <div class="login-title">Sign Up</div>
    <form class="login-form" action="/webdev/includes/signup.include.php" method="post">
        <div class="login-input-sec">
            <div class="login-label login-name">
                <label class="login-name-label" for="name">Name:</label>
                <input class="login-input" type="text" id="login-name" name="name" placeholder="Name" required>
            </div>
            <div class="login-label login-pass">
                <label class="login-pass-label" for="lemail">Email:</label>
                <input class="login-input" type="email" id="lemail" name="email" placeholder="Email" required>
            </div>
            <div class="login-label login-pass">
                <label class="login-pass-label" for="pwd">Password:</label>
                <input class="login-input" type="password" id="pwd" name="pwd" placeholder="Password" required>
            </div>
            <div class="login-label login-pass">
                <label class="login-pass-label" for="pwdrepeat">Retype Password:</label>
                <input class="login-input" type="password" id="pwdrepeat" name="pwdrepeat" placeholder="Retype password" required>
            </div>
            <div>Have an account? <span onclick="openLogin()" class="signup-btn" style="color:blue">Click here to log in!</span></div>
        </div>
        <div class="login-btns">
            <input name="submit" type="submit" value="Sign Up" class="btn modal-btn">
            <input onclick="closeSignup()" type="reset" value="Close" class="btn modal-btn">
        </div>
        
    </form>
</dialog>

<dialog data-modal class='modal logout-modal'>
    <h1 class="logout-head">Hello there, <span style='font-weight: 700'><?php echo $_SESSION["username"]; ?></span></h1>
    <div class="login-btns">
        <a style="border:none" href="/webdev/includes/logout.include.php" class="btn modal-btn">Logout</a>
        <input onclick="closeLogout()" type="reset" value="Close" class="btn modal-btn">
    </div>
</dialog>

