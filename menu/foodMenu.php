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
                    <p class="title">Menu</p>
                    <p class="brief">Find Your Tasty!</p>
                </div>
            </div>
            <div class="food-container">
                <?php
                $sql = "SELECT * FROM foodmenu ORDER BY foodName ASC";
                $foodMenu = mysqli_query($conn, $sql);

                while($row = mysqli_fetch_assoc($foodMenu)){
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
                ?>
            </div>
        </div>
    </div>
    <!-- Food menu end -->
    <?php include "../includes/menu_includes/footer.php" ?>