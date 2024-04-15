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
    <title>Your Cart</title>
</head>
<body>
    <?php include("../includes/header.php") ?>
    <?php include("../includes/heading.php") ?>
    <?php 
        $queryItem = "SELECT * FROM items WHERE itemsId = ?";
        $stmt = $conn->prepare($queryItem);
        $id = '1';
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = mysqli_fetch_assoc($result);
    ?>
    <?php 
        if(!isset($_SESSION['username'])){
            echo '<center style="margin-top:20px; margin-bottom:60px"><b>Please Log In to Access The Cart!</b></center>';
        } else{
            if(empty($_SESSION['usercart'])){
                echo '<center style="margin-top:20px; margin-bottom:60px"><b>Your Cart is Currently Empty!</b></center>';
            } else{ ?>
                <form class="cart-wrapper" action="../includes/delcart.include.php" method="post">
                    <div style="text-align:right; margin-bottom: 5px">
                        <button name="submit" class="trash-btn" type="submit"><img width="30px" src="../img/trash.png" alt=""></button>
                    </div>
                    <?php 
                        $cartarray = unserialize($_SESSION['usercart']);
                        foreach ($cartarray as $key => $val) {
                            $Item = "SELECT * FROM items WHERE itemsId = ?";
                            $stmt = mysqli_stmt_init($conn); 
                            if(!mysqli_stmt_prepare($stmt, $Item)){
                                header("location: /webdev/products");
                                exit();
                            }
                            mysqli_stmt_bind_param($stmt, "s", $val['id']);
                            mysqli_stmt_execute($stmt);
                            $resultitem = mysqli_stmt_get_result($stmt);
                            $rowitem = mysqli_fetch_assoc($resultitem); ?>
                            <div class="cart-list">
                                <input style="transform: scale(2); border-radius: 50%" class="cart-check" type="checkbox" name="item[]" value="<?php echo $key ?>">
                                <img class="cart-img" src="<?php echo $rowitem['itemsImg'] ?>" alt="">
                                <a class="cart-name" href="<?php echo '/webdev/products/item.php?id='.$rowitem['itemsId'] ?>"><?php echo $rowitem['itemsName'] ?></a>
                                <p><b>$<?php echo number_format($rowitem['itemsPrice'], 2) ?></b></p>
                                <p>&#10006;</p>
                                <p><b><?php echo $val['amount'] ?></b></p>
                                <p style="font-size: 25px;"><b>&#61;</b></p>
                                <p><b>$<?php echo number_format($val['total'], 2) ?></b></p>
                            </div>
                       <?php }
                    ?>
                    
                </form>
                <div class="total-wrapper">
                    <div class="total-list">
                        <p style="font-size:20pt"><b>Total:</b></p>
                        <?php 
                            $total = 0;
                            foreach ($cartarray as $key => $val) {
                                $total += $val['total'];
                            }
                        ?>
                        <p><b>$<?php echo number_format($total, 2) ?></b></p>
                    </div>
                </div>
                <div class="btn-wrapper">
                    <form class="btn-list" action="../includes/subcart.include.php" method="post">
                        <div class="wrapper-wrap">
                            <div class="shipping-wrapper">
                                <p class="shipping-name"><u><b>Shipping Method:</b></u></p>
                                <input type="radio" name="shipping" id="EM" value="East Malaysia" required>
                                <label for="EM">East Malaysia</label><br>
                                <input type="radio" name="shipping" id="WM" value="West Malaysia">
                                <label for="WM">West Malaysia</label>
                            </div>
                            <div class="shipping-wrapper">
                                <p class="shipping-name"><u><b>Payment Method:</b></u></p>
                                <input type="radio" name="payment" id="boost" value="Boost" required>
                                <label for="boost">Boost</label><br>
                                <input type="radio" name="payment" id="tng" value="Touch N Go">
                                <label for="tng">Touch N Go</label><br>
                                <input type="radio" name="payment" id="cod" value="Cash on Delivery">
                                <label for="cod">Cash on Delivery</label><br>
                                <input type="radio" name="payment" id="card" value="Debit/Credit Card">
                                <label for="card">Debit/Credit Card</label><br>
                            </div>
                        </div>
                        <input type="submit" value="Confirm Purchase" name="submit" class="btn">
                    </form>
                </div>
                
            <?php }
        }
    ?>
    <?php include("../includes/footer.php"); ?>
    <script src="../js/main.js"></script>
</body>
</html>