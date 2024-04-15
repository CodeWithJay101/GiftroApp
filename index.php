<?php
    session_start();
?>
<?php require_once("includes/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Giftro - Gift Shop</title>
</head>
<body>
<?php 
    $queryItem = "SELECT * FROM items WHERE itemsId = ?";
    $stmt = $conn->prepare($queryItem);
    $id = '1';
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = mysqli_fetch_assoc($result);
    ?>
<?php include("includes/header.php") ?>
    <div class="top-section">
        <div class="section-0">
            <section class="hero-section">
                <div class="hero-inner-sec">
                    <div class="hero-left">
                        <div class="hero-words">
                            <p class="heading hero-heading">The Best Way to Make Someone Happy...</p>
                            <p class="subheading hero-subheading">A gift for your every occasion</p>
                        </div>
                        <div class="hero-btn-div"><a class="btn hero-btn" href="/webdev/products">Shop Now</a></div>
                    </div>
                    <img class="hero-img" src="img/hero-img.png" alt="">
                </div>
                
            </section>
        </div>
    </div>
    <div class="arrival-section">
        <div class="section-1">
            <div class="arrival-heading-div">
                <p class="arrival-heading">New Arrivals</p>
            </div>
            <div class="cards-div">
            <?php 
                $queryNew = "select * from items where isNew = 1";
                $rowNew = $conn->query($queryNew);
                $rowsNew = mysqli_fetch_all($rowNew, MYSQLI_ASSOC); 
                $allNewCat = array();
                foreach ($rowsNew as $key => $val) {
                    $queryN = "select * from categories where catId = ?";
                    $stmt = $conn->prepare($queryN);
                    $id = $val['catId'];
                    $stmt->bind_param("s", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = mysqli_fetch_assoc($result);
                    array_push($allNewCat, $row);
                }
                foreach ($rowsNew as $key => $val) {
                    echo '<div class="card">
                            <a href="/webdev/products/item.php?id='.$val['itemsId'].'"><img class="card-img" src="'.$val['itemsImg'].'" alt="arrival-card"></a>
                            <div class="card-words">
                                <p class="card-category">'.$allNewCat[$key]['catName'].'</p>
                                <p class="card-item">'.$val['itemsName'].'</p>
                                <p class="card-price">$'.$val['itemsPrice'].'</p>
                            </div>
                        </div>';
                }
            ?>
                
            </div>
        </div>
    </div>
    <div class="offer-sec">
        <div class="offer-inner-sec">
            <div class="offer-img"></div>
            <div class="offer-words">
                <p class="heading offer-heading">New Gifts Just Arrived!</p>
                <p class="subheading offer-subheading">Check Them Out Now!</p>
            </div>
            <div class="hero-btn-div"><a class="btn offer-btn" href="/webdev/products">Shop Now</a></div>
            
        </div>
    </div>
    <?php 
        $queryCat = "SELECT * FROM categories";
        $rows = $conn->query($queryCat);
        $rowCat = mysqli_fetch_all($rows, MYSQLI_ASSOC); 
    ?>
        
    <div class="arrival-section">
        <div class="section-2">
            <div class="arrival-heading-div">
                <p class="cat-heading">Categories</p>
            </div>
            <div class="cat-section">
            <?php foreach ($rowCat as $key => $val) { ?>
                <div class="cat-card">
                    <a href="/webdev/products/?cat=<?php echo  $val['catId'] ?>"><img src="<?php echo $val['catImg'] ?>" alt="arrival-card" class="cat-img">
                    <p class="subheading cat-word"><?php echo $val['catName'] ?></p></a>
                </div>
            <?php }
        ?>
            </div>
        </div>
    </div>
    <?php include("includes/footer.php"); ?>
    <?php $stmt->close(); ?>
    <script src="js/main.js"></script>
</body>
</html>