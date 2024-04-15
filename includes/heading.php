<div class="heading-container">
    <p class="heading-content"><?php 
   
    $uri = explode('?', $_SERVER['REQUEST_URI']);
    if($uri[0] == '/webdev/products/'){
        echo 'Our Products';
    } else if($uri[0] == '/webdev/contact/'){
        echo 'Contact Us';
    } else if($_SERVER['REQUEST_URI'] == '/webdev/about/'){
        echo 'About Us';
    } else if($_SERVER['REQUEST_URI'] == '/webdev/cart/'){
        echo 'Your Cart';
    }
    ?></p>
</div>