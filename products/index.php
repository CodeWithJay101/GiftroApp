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
    <title>Our Products</title>
</head>
<body>
    <?php include("../includes/header.php") ?>
    <?php include("../includes/heading.php") ?>
    <?php $queryItems = "select * from items";
    $rowItems = $conn->query($queryItems);
    $rowsItems = mysqli_fetch_all($rowItems, MYSQLI_ASSOC);
    $allCat = array();
    foreach ($rowsItems as $key => $val) {
        $queryC = "select * from categories where catId = ?";
        $stmt = $conn->prepare($queryC);
        $id = $val['catId'];
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = mysqli_fetch_assoc($result);
        array_push($allCat, $row);
    }
    ?>
    <div class="select-wrapper">
        <div class="custom-select" style="width:200px;">
            <select name="category">
                <option value="">Select Category:</option>
                <option value="0">All</option>
                <option value="1">Toys</option>
                <option value="2">Accesories</option>
                <option value="3">Clothing</option>
                <option value="4">Handbags</option>
                <option value="5">Wallets</option>
                <option value="6">Stationaries</option>
            </select>
        </div>
    </div>
    <?php 
        $queryCat = "SELECT * FROM categories";
        $rows = $conn->query($queryCat);
        $rowCat = mysqli_fetch_all($rows, MYSQLI_ASSOC); 
        if(isset($_GET['cat']) || !empty($_GET['cat'])){
            if($_GET['cat'] == 0){
                echo '<div class="cat-head">All</div>';
            }else{
                foreach ($rowCat as $key => $val){
                    if($val['catId'] == $_GET['cat']){
                        echo '<div class="cat-head">'.$val['catName'].'</div>';
                    } 
                }
            }
        } else{
            echo '<div class="cat-head">All</div>';
        }
    ?>
    <div class="cards-div">
        <?php 

            if(empty($_GET['cat'])){
                foreach ($rowsItems as $key => $val) {
                    echo '<div class="card">
                                <a href="/webdev/products/item.php?id='.$val['itemsId'].'"><img class="card-img" src="'.$val['itemsImg'].'" alt="arrival-card"></a>
                                <div class="card-words">
                                    <p class="card-category">'.$allCat[$key]['catName'].'</p>
                                    <p class="card-item">'.$val['itemsName'].'</p>
                                    <p class="card-price">$'.$val['itemsPrice'].'</p>
                                </div>
                            </div>';
                }
            } else{
                $queryI = "select * from items where catId = ".$_GET['cat']."";
                $rowI = $conn->query($queryI);
                $rowsI = mysqli_fetch_all($rowI, MYSQLI_ASSOC);
                $allI = array();
                foreach ($rowsI as $key => $val) {
                    $queryC = "select * from categories where catId = ?";
                    $stmt = $conn->prepare($queryC);
                    $id = $val['catId'];
                    $stmt->bind_param("s", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = mysqli_fetch_assoc($result);
                    array_push($allI, $row);
                }
                //echo '<pre>'; print_r($rowsI); exit;
                if(!empty($rowsI)){
                    foreach ($rowsI as $key => $val) {
                        echo '<div class="card">
                                    <a href="/webdev/products/item.php?id='.$val['itemsId'].'"><img class="card-img" src="'.$val['itemsImg'].'" alt="arrival-card"></a>
                                    <div class="card-words">
                                        <p class="card-category">'.$allI[$key]['catName'].'</p>
                                        <p class="card-item">'.$val['itemsName'].'</p>
                                        <p class="card-price">$'.$val['itemsPrice'].'</p>
                                    </div>
                                </div>';
                    }
                } else{
                    echo "Why are you modifying the URL?!";
                }
                
            }
        ?>
    </div>
    <?php include("../includes/footer.php"); ?>
    <script>
        var x, i, j, l, ll, selElmnt, a, b, c;
        /* Look for any elements with the class "custom-select": */
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /* For each option in the original select element,
            create a new DIV that will act as an option item: */
            c = document.createElement("DIV");
            c.setAttribute("id", "selsel");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /* When an item is clicked, update the original select box,
                and the selected item: */
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                    y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /* When the select box is clicked, close any other select boxes,
            and open/close the current select box: */
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
        }

        function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
            arrNo.push(i)
            } else {
            y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
            }
        }
        }

        /* If the user clicks anywhere outside the select box,
        then close all select boxes: */
        document.addEventListener("click", closeAllSelect);
        // new new
        const selectedsel = document.querySelectorAll('#selsel');
        selectedsel.forEach(ele => {
            if(ele.innerHTML == 'Toys'){
                ele.addEventListener('click', (e) => {
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('cat', 1);
                    window.location.search = urlParams;
                })
            }
             else if(ele.innerHTML == 'All'){
                ele.addEventListener('click', (e) => {
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('cat', 0);
                    window.location.search = urlParams;
                })
            } 
            else if(ele.innerHTML == 'Accesories'){
                ele.addEventListener('click', (e) => {
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('cat', 2);
                    window.location.search = urlParams;
                })
            }
            else if(ele.innerHTML == 'Clothing'){
                ele.addEventListener('click', (e) => {
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('cat', 3);
                    window.location.search = urlParams;
                })
            }
            else if(ele.innerHTML == 'Handbags'){
                ele.addEventListener('click', (e) => {
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('cat', 4);
                    window.location.search = urlParams;
                })
            }
            else if(ele.innerHTML == 'Wallets'){
                ele.addEventListener('click', (e) => {
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('cat', 5);
                    window.location.search = urlParams;
                })
            }
            else if(ele.innerHTML == 'Stationaries'){
                ele.addEventListener('click', (e) => {
                    const urlParams = new URLSearchParams(window.location.search);
                    urlParams.set('cat', 6);
                    window.location.search = urlParams;
                })
            }
        })
    </script>
    <script src="../js/main.js"></script>
</body>
</html>