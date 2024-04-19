<?php
    include "../includes/menu_includes/header.php" 
?>

<?php
    //Get the search key
    $searchKey = $_POST['search'];
    $sql = "SELECT * FROM foodmenu WHERE foodName LIKE '%$searchKey%' OR foodCategory LIKE '%$searchKey%' ORDER BY foodName ASC";
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="searchTitleWrap">
        <p class="searchTitle">Foods on Your Search: "<span class="searchKey"><?php echo $searchKey ?></span>"</p>
    </div>
    <div class="container">
        <div class="food-section">
            <div class="food-container">
    <?php
        //Count rows
        $count = mysqli_num_rows($res);
        //Check the food is available or not
        if ($count > 0) {
            //Food available
            while ($row = mysqli_fetch_assoc($res)) {
                ?>
                <div class="food-items">
                    <img src="../images/FoodMenu/<?php echo $row['foodImage']; ?>" alt="">
                    <div class="food-details">
                        <div class="details-sub">
                            <h5><?php echo $row['foodName']; ?></h5>
                            <h5 class="food-price">RM <?php echo $row['foodPrice']; ?></h5>
                        </div>
                        <p><?php echo $row['foodDescription']; ?></p>
                        <!-- Add To cart button -->
                        <?php include "../includes/menu_includes/addToCart.php"; ?>
                    </div>
                </div>
                <?php
            }
        }
        else{
            //Food Not Found
            echo "<div class='foodNotFound'>Sry.. Foods Not Found.</div>";
        }
        ?>
        </div>
    </div>
</div>
<?php include "../includes/menu_includes/footer.php" ?>