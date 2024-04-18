<?php
        include "../includes/menu_includes/header.php";
    ?>
    <!-- Slider start -->
    <div class="container">
        <div class="slider">
            <div class="slide active">
                <img src="../images/FoodMenu/ads2.png" alt="slide">
            </div>
            <div class="slide">
                <img src="../images/FoodMenu/ads6.png" alt="slide">
            </div>
            <div class="slide">
                <img src="../images/FoodMenu/ads7.png" alt="slide">
            </div>
            <div class="slide">
                <img src="../images/FoodMenu/ads8.png" alt="slide">
            </div>
            <div class="slide">
                <img src="../images/FoodMenu/ads1.png" alt="slide">
            </div>
            <div class="navigation">
                <div class="prevBtn">&lt;</div>
                <div class="nextBtn">&gt;</div>
            </div>
            <div class="navigation-visibility">
                <div class="slide-icon active"></div>
                <div class="slide-icon"></div>
                <div class="slide-icon"></div>
                <div class="slide-icon"></div>
                <div class="slide-icon"></div>
            </div>
        </div>
    </div>
    <!-- Slider end -->

    <!-- Food menu start -->
    <div class="container">
        <div class="food-section">
            <div class="food-topic">
                <div class="food-topic-info">
                    <p class="title">Food Categories</p>
                    <p class="brief">Make easier to find your Tasty in YUMMY!</p>
                </div>
            </div>
            <div class="food-container">
                <?php
                $sql = "SELECT * FROM foodcategory ORDER BY categoryName ASC";
                $res = mysqli_query($conn, $sql);

                //Fetch the food category from database
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $id = $row['id'];
                        ?>
                        <a href="../menu/filteredFood.php?id=<?php echo $id; ?>">
                            <div class="food-items">
                                <img src="../images/Foodcategory/<?php echo $row['categoryImage']; ?>" alt="">
                                <div class="category-details">
                                    <p><?php echo $row['categoryName']; ?></p>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Food menu end -->
    <?php include "../includes/menu_includes/footer.php" ?>