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
    <title>About Us</title>
</head>
<style>
    h1 {
    font-size: 40px;
    text-align: center;
    }

    section {
    margin-bottom: 20px;
    padding: 0 20px; 
    width: 70%;
    margin: 0 auto;
    text-align: justify;
    }

    h2 {
    margin-bottom: 10px;
    text-align: center;
    padding: 0 20px;
    }

    ul {
    margin-bottom: 10px;
    list-style-type: none;
    margin: 0 auto;
    text-align: center;
    }

    address {
    font-style: italic;
    text-align: center;
    }

    hr {
    border: none;
    border-top: 1px solid #ccc;
    margin: 10px 0;
    }

    p {
    text-align: center;
    }

    .social {
    display: flex;
    justify-content: center;
    }

    .social li{
    margin: 0 10px;
    }

    .social img {
    width: 50px;
    height: 50px;
    }

    .value {
    display: flex;
    justify-content: space-between;
    list-style-type: none;
    padding: 0;
    }

    .value li {
    flex: 1 0 calc(33.33% - 20px);
    }

    .value-box {
    border: 1px solid transparent;
    padding: 5%;
    text-align: center;
    height: auto;
    max-width: 300px; 
    margin: 0 auto; 
    }

    .value-icon {
    width: 60%;
    max-width: 150px;
    height: auto;
    margin: 0 auto 10px;
    }

    .value-box p {
    padding: 0 10px;
    }

    .value-box h3 {
    margin-bottom: 10px;
    }

</style>
<body>
    <?php include("../includes/header.php") ?>
    <?php include("../includes/heading.php") ?>
    <section>
    <section>
      <h1>Welcome to Giftro Gift Shop!</h1>
      <br><br>
      <a style="text-decoration: none" href="/webdev"><div class="main-logo">
            <p class="logo logo-grey">GIFTRO</p>
            <p class="sub-logo logo-red">GIFT SHOP</p>
      </a>
      <br>
      <p>At Giftro Gift Shop, we believe that every gift tells a story. </p>
      <p>Our mission is to help you find the perfect gift for every occasion, </p>
      <p>whether it's a birthday, anniversary, holiday, or just to show someone you care.</p>
      <br>
      <hr>
      <br>
    </section>
    <section>
      <h2>Our Story</h2>
      <br>
      <p>Established in 2010, Giftro Gift Shop has been serving the community for <i>14 years</i>.</p>
      <p>What started as a small shop has grown into a beloved destination for unique and thoughtful gifts.</p>
      <br>
      <hr>
      <br>
    </section>
    <section>
      <h2>Our Values</h2>
      <br>
      <ul class="value">
        <li>
          <div class="value-box">
          <h3><strong>Quality</strong> </h3> 
          <img src="<?php if(file_exists('../img/quality.jpeg')){echo "../img/quality.jpeg";} ?>" alt="" class="value-icon">
          <p>We handpick every item in our shop to ensure the highest quality and craftsmanship.</p>
          </div>
        </li>
        <li>
          <div class="value-box">
          <h3><strong>Variety</strong> </h3> 
          <img src="<?php if(file_exists('../img/variety.jpeg')){echo "../img/variety.jpeg";} ?>" alt="" class="value-icon">
          <p>From elegant jewelry to quirky novelty items, we offer a diverse selection to suit every taste and budget.</p>
          </div>
        </li>
        <li>
          <div class="value-box">
          <h3><strong>Customer Satisfaction</strong> </h3> 
          <img src="<?php if(file_exists('../img/satisfaction.jpeg')){echo "../img/satisfaction.jpeg";} ?>" alt="" class="value-icon">
          <p>Your satisfaction is our top priority. Our friendly staff is here to assist you in finding the perfect gift.</p>
          </div>
        </li>
      </ul>
      <br>
      <hr>
      <br>
    </section>
    <section>
      <h2>Our Commitment to Sustainability</h2>
      <br>
      <ul>
        <li>Sourcing products from ethical and eco-friendly suppliers</li>
        <li>Using recycled and biodegradable packaging materials</li>
        <li>Supporting local artisans and small businesses</li>
      </ul>
      <br>
      <hr>
      <br>
    </section>
    <section>
      <h2>Visit Us</h2>
      <br>
      <address>
        Giftro Gift Shop,<br>
        42 Jalan Ampang,<br>
        50450 Kuala Lumpur,<br>
        Malaysia<br>
        +60 3-1234 5678
      </address>
      <br>
      <hr>
      <br>
    </section>
    <section>
      <h1>Follow Us</h1>
      <br>
      <br>
      <ul class="social">
        <li><a target="_blank" class="social-icons" href="https://twitter.com/"><img src="<?php if(file_exists('img/twitter.png')){echo "img/twitter.png";} else{echo "../img/twitter.png";} ?>" alt="" class="footer-icon"></a></li>
        <li><a target="_blank" class="social-icons" href="https://www.facebook.com/"><img src="<?php if(file_exists('img/facebook.png')){echo "img/facebook.png";} else{echo "../img/facebook.png";} ?>" alt="" class="footer-icon"></a></li>
        <li><a target="_blank" class="social-icons" href="https://www.instagram.com/"><img src="<?php if(file_exists('img/insta.png')){echo "img/insta.png";} else{echo "../img/insta.png";} ?>" alt="" class="footer-icon"></a></li>
        <li><a target="_blank" class="social-icons" href="https://www.youtube.com/"><img src="<?php if(file_exists('img/youtube.png')){echo "img/youtube.png";} else{echo "../img/youtube.png";} ?>" alt="" class="footer-icon"></a></li>
      </ul>
      <br>
      <hr>
      <br>
    </section>
    <section>
    <p>Thank you for choosing Giftro Gift Shop.</p>
    <p>We look forward to helping you create memorable moments with our one-of-a-kind gifts!</p>
    </section>
    <br>
    </section>

    <?php include("../includes/footer.php"); ?>
    <script src="../js/main.js"></script>
</body>
</html>