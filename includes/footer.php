<div class="bottom-section">
    <div class="section-foot">
        <footer>
            <div class="footer-div">
                <div class="footer-left">
                    <a style="text-decoration: none" href="/webdev"><div class="main-logo">
                        <p class="logo logo-grey">GIFTRO</p>
                        <p class="sub-logo logo-red">GIFT SHOP</p>
                    </div></a>
                    <ul class="footer-nav-social">
                        <li><a target="_blank" class="foot-nav-icons" href="https://twitter.com/"><img src="<?php if(file_exists('img/twitter.png')){echo "img/twitter.png";} else{echo "../img/twitter.png";} ?>" alt="" class="footer-icon"></a></li>
                        <li><a target="_blank" class="foot-nav-icons" href="https://www.facebook.com/"><img src="<?php if(file_exists('img/facebook.png')){echo "img/facebook.png";} else{echo "../img/facebook.png";} ?>" alt="" class="footer-icon"></a></li>
                        <li><a target="_blank" class="foot-nav-icons" href="https://www.instagram.com/"><img src="<?php if(file_exists('img/insta.png')){echo "img/insta.png";} else{echo "../img/insta.png";} ?>" alt="" class="footer-icon"></a></li>
                        <li><a target="_blank" class="foot-nav-icons" href="https://www.youtube.com/"><img src="<?php if(file_exists('img/youtube.png')){echo "img/youtube.png";} else{echo "../img/youtube.png";} ?>" alt="" class="footer-icon"></a></li>
                    </ul>
                </div>
                
                <div class="footer-lists">
                    <ul class="footer-nav">
                        <li><a class="foot-nav-links" href="/webdev">Home</a></li>
                        <li><a class="foot-nav-links" href="/webdev/products">Our Products</a></li>
                        <li><a class="foot-nav-links" href="/webdev/about">About Us</a></li>
                        <li><a class="foot-nav-links" href="/webdev/contact">Contact Us</a></li>
                    </ul>
                    <?php 
                        $queryCat = "SELECT * FROM categories";
                        $rows = $conn->query($queryCat);
                        $rowCat = mysqli_fetch_all($rows, MYSQLI_ASSOC); 
                    ?>
                    <ul class="footer-nav">
                    <?php foreach ($rowCat as $key => $val) { ?>
                        <li><a class="foot-nav-links" href="/webdev/products/?cat=<?php echo  $val['catId'] ?>"><?php echo $val['catName'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </footer>
        
    </div>
    <section class="footer-section">
        <div class="footer-inner-sec">
            <p class="footer-word">Copyright © 2024 Giftro<br>Powered by Gift Shop</p>
        </div>
    </section>
</div>
