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
    <title>Document</title>
</head>
<body>
    <?php include("../includes/header.php") ?>
    <?php
        $queryItems = "select * from items";
        $rowItems = $conn->query($queryItems);
        $rowsItems = mysqli_fetch_all($rowItems, MYSQLI_ASSOC);
        if(!empty($_GET['id'])){
            $queryItemP = "select * from items where itemsId = ".$_GET['id']."";
            $rowItemP = $conn->query($queryItemP);
            $rowsItemP = mysqli_fetch_assoc($rowItemP); 
            if(!empty($rowsItemP['itemsName'])){
                $queryCP = "select * from categories where catId = ?";
                $stmt = $conn->prepare($queryCP);
                $id = $rowsItemP['catId'];
                $stmt->bind_param("s", $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $rowCP = mysqli_fetch_assoc($result);
    ?>
            
            
    
    <div class="item-wrapper">
        <img class="item-img" src="<?php echo $rowsItemP['itemsImg'] ?>" alt="">
        <div class="item-content">
            <p class="item-cat"><u><?php echo $rowCP['catName'] ?></u></p>
            <p class="item-name"><b><?php echo $rowsItemP['itemsName'] ?></b></p>
            <p class="item-price">$<?php echo $rowsItemP['itemsPrice'] ?></p>
            <p class="item-desc"><?php echo $rowsItemP['itemsDesc'] ?></p>
            <form action="../includes/cart.include.php" method="post" class="form-group">
                <div class="input-group">
                    <div class="input-group-btn">
                        <div id="down" class="btn btn-default" onclick=" down('1')"><img class="btn-img" src="../img/minus.png" alt=""></div>
                    </div>
                    <input type="number" id="myNumber" class="form-control input-number" name="amount" value="1" />
                    <input style="display:none" type="number" class="form-control input-number" name="itemid" value="<?php echo $_GET['id'] ?>" />
                    <div class="input-group-btn">
                        <div id="up" class="btn btn-default" onclick="up('10')"><img class="btn-img" src="../img/plus.png" alt=""></div>
                    </div>
                </div>
                <?php 
                    if(isset($_SESSION['username'])){
                        echo '<input name="submit" class="btn addto-btn" type="submit" value="Add To Cart">';
                    }else{
                        echo '<div name="submit" class="btn addto-btn" onclick="profilePopup()">Add To Cart</div>';
                    }
                ?>
                
            </form>
        </div>
    </div>
    
    <?php  }else{
        echo "<center style='margin-top:20px;margin-bottom:20px'>Why are you modifying the URL?!</center>";  } }
        else{
        echo "<center style='margin-top:20px;margin-bottom:20px'>Why are you modifying the URL?!</center>";
    }
    ?>
    <script>
        function up(max) {
            if(document.getElementById("myNumber").value == ''){
                document.getElementById("myNumber").value = 0;
            }
            document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
            if (document.getElementById("myNumber").value >= parseInt(max)) {
                document.getElementById("myNumber").value = max;
            }
        }
        function down(min) {
            if(document.getElementById("myNumber").value == ''){
                document.getElementById("myNumber").value = 1;
            }
            document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
            if (document.getElementById("myNumber").value <= parseInt(min)) {
                document.getElementById("myNumber").value = min;
            }
        }
        console.log(document.getElementById("myNumber").value);
    </script>
    <?php include("../includes/footer.php"); ?>
    <script src="../js/main.js"></script>
</body>
</html>