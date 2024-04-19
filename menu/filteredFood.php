<?php
        include "../includes/menu_includes/header.php";
?>

    <?php
    //Get the category ID
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT categoryName FROM foodcategory WHERE id = $id";
        $res = mysqli_query($conn, $sql);
        //Get the categoryName from database
        $rowRes = mysqli_fetch_assoc($res);
        //Get categoryName
        $categoryName = $rowRes['categoryName'];
    
    ?>
    <div class="searchTitleWrap">
        <p class="searchTitle">Filtered foods: "<span class="searchKey"><?php echo $categoryName; ?></span>"</p>
    </div>

    <!-- Food menu start -->
    <div class="container">
        <div class="food-section">
            <div class="food-container">
                <?php
                $filteredFood = "SELECT * FROM foodmenu WHERE foodCategory = '$categoryName' ORDER BY foodName ASC";
                $resFilteredFood = mysqli_query($conn, $filteredFood);
                //Count the rows of food that filtered by categoryName
                $count = mysqli_num_rows($resFilteredFood);

                //Food available
                if ($count > 0) {
                    while($row = mysqli_fetch_assoc($resFilteredFood)){
                        //Get the details for particular food
                        $foodId = $row['id'];
                        $foodName = $row['foodName'];
                        $foodDescription = $row['foodDescription'];
                        $foodPrice = $row['foodPrice'];
                        $foodImage = $row['foodImage'];
                        ?>
                        <div class="food-items">
                            <img src="../images/FoodMenu/<?php echo $foodImage; ?>" alt="">
                            <div class="food-details">
                                <div class="details-sub">
                                    <h5><?php echo $foodName; ?></h5>
                                    <h5 class="food-price">RM <?php echo $foodPrice; ?></h5>
                                </div>
                                <p><?php echo $foodDescription; ?></p>
                                <!-- Add To cart button -->
                                <?php include "../includes/menu_includes/addToCart.php"; ?>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <!-- Food menu end -->
    <?php include "../includes/menu_includes/footer.php" ?>