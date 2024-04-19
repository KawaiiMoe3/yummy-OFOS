<?php
    include "../includes/menu_includes/header.php" 
?>

    <!-- Slider start -->
    <div class="container">
        <div class="slider">
            <div class="slide active">
                <img src="../images/Menu/Chinise-food.jpg" alt="slide">
            </div>
            <div class="slide">
                <img src="../images/Menu/fast-food.jpg" alt="slide">
            </div>
            <div class="slide">
                <img src="../images/Menu/indian-food.jpg" alt="slide">
            </div>
            <div class="slide">
                <img src="../images/Menu/malay-food.jpg" alt="slide">
            </div>
            <div class="slide">
                <img src="../images/Menu/western-food.jpg" alt="slide">
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
    
    <!-- Daily Discover start -->
    <div class="container">
        <div class="food-section">
            <div class="food-topic">
                <div class="food-topic-info">
                    <p class="title">Daily Discover</p>
                    <p class="brief">Experience a daily dose of culinary adventure with our discovery menu, designed to take you on a flavorful exploration through diverse cuisines and tantalizing flavors, ensuring every visit is a delightful surprise.</p>
                </div>
            </div>
            <div class="food-container">
                <?php
                $dailyDiscover = "SELECT * FROM foodmenu WHERE foodCategory = 'Daily Discover' ORDER BY RAND() LIMIT 6";
                $menuDd = mysqli_query($conn, $dailyDiscover);
                while($row = mysqli_fetch_assoc($menuDd)){
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
    <!-- Daily Discover end -->

    <!-- Breakfast start -->
    <div class="container">
        <div class="food-section">
            <div class="food-topic">
                <div class="food-topic-info">
                    <p class="title">Breakfast</p>
                    <p class="brief">Start your day right with our breakfast menu, featuring a tantalizing selection of hearty classics and nutritious options to fuel your morning adventures.</p>
                </div>
            </div>
            <div class="food-container">
            <?php
                $breakfast = "SELECT * FROM foodmenu WHERE foodCategory = 'Breakfast' ORDER BY RAND() LIMIT 3";
                $menuB = mysqli_query($conn, $breakfast);
                while($row = mysqli_fetch_assoc($menuB)){
                    ?>
                    <div class="food-items">
                        <img src="../images/FoodMenu/<?php echo $row['foodImage']; ?>" alt="">
                        <div class="food-details">
                            <div class="details-sub">
                                <h5><?php echo $row['foodName']; ?></h5>
                                <h5 class="food-price">RM <?php echo $row['foodPrice']; ?></h5>
                            </div>
                            <p><?php echo $row['foodDescription']; ?></p>
                            <?php
                            if (isset($_SESSION['login'])){
                                ?>
                                <a href="#">
                                    Add To Cart
                                </a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="../login">
                                    Add To Cart
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Breakfast end -->

    <!-- Desserts start -->
    <div class="container">
        <div class="food-section">
            <div class="food-topic">
                <div class="food-topic-info">
                    <p class="title">Desserts</p>
                    <p class="brief">Treat yourself to a world of sweetness with our dessert menu, showcasing a tempting assortment of desserts that are as beautiful as they are delicious, perfect for indulging your senses and satisfying your cravings.</p>
                </div>
            </div>
            <div class="food-container">
            <?php
                $dessert = "SELECT * FROM foodmenu WHERE foodCategory = 'Dessert' ORDER BY RAND() LIMIT 3";
                $menuDe = mysqli_query($conn, $dessert);
                while($row = mysqli_fetch_assoc($menuDe)){
                    ?>
                    <div class="food-items">
                        <img src="../images/FoodMenu/<?php echo $row['foodImage']; ?>" alt="">
                        <div class="food-details">
                            <div class="details-sub">
                                <h5><?php echo $row['foodName']; ?></h5>
                                <h5 class="food-price">RM <?php echo $row['foodPrice']; ?></h5>
                            </div>
                            <p><?php echo $row['foodDescription']; ?></p>
                            <?php
                            if (isset($_SESSION['login'])){
                                ?>
                                <a href="#">
                                    Add To Cart
                                </a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="../login">
                                    Add To Cart
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Desserts end -->

    <!-- Western start -->
    <div class="container">
        <div class="food-section">
            <div class="food-topic">
                <div class="food-topic-info">
                    <p class="title">Western</p>
                    <p class="brief">Delight in the classics reimagined with our Western food menu, offering a fresh take on beloved dishes paired with innovative creations, all prepared with the utmost dedication to quality and flavor.</p>
                </div>
            </div>
            <div class="food-container">
            <?php
                $western = "SELECT * FROM foodmenu WHERE foodCategory = 'Western' ORDER BY RAND() LIMIT 3";
                $menuWes = mysqli_query($conn, $western);
                while($row = mysqli_fetch_assoc($menuWes)){
                    ?>
                    <div class="food-items">
                        <img src="../images/FoodMenu/<?php echo $row['foodImage']; ?>" alt="">
                        <div class="food-details">
                            <div class="details-sub">
                                <h5><?php echo $row['foodName']; ?></h5>
                                <h5 class="food-price">RM <?php echo $row['foodPrice']; ?></h5>
                            </div>
                            <p><?php echo $row['foodDescription']; ?></p>
                            <?php
                            if (isset($_SESSION['login'])){
                                ?>
                                <a href="#">
                                    Add To Cart
                                </a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="../login">
                                    Add To Cart
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Western end -->

    <!-- Beverage start -->
    <div class="container">
        <div class="food-section">
            <div class="food-topic">
                <div class="food-topic-info">
                    <p class="title">Beverages</p>
                    <p class="brief">Explore a world of taste sensations with our beverage menu, offering a carefully curated collection of drinks ranging from specialty coffees and teas to signature cocktails and mocktails, ensuring there's something for every palate and occasion.</p>
                </div>
            </div>
            <div class="food-container">
            <?php
                $beverages = "SELECT * FROM foodmenu WHERE foodCategory = 'Drinks' ORDER BY RAND() LIMIT 3";
                $menuBv = mysqli_query($conn, $beverages);
                while($row = mysqli_fetch_assoc($menuBv)){
                    ?>
                    <div class="food-items">
                        <img src="../images/FoodMenu/<?php echo $row['foodImage']; ?>" alt="">
                        <div class="food-details">
                            <div class="details-sub">
                                <h5><?php echo $row['foodName']; ?></h5>
                                <h5 class="food-price">RM <?php echo $row['foodPrice']; ?></h5>
                            </div>
                            <p><?php echo $row['foodDescription']; ?></p>
                            <?php
                            if (isset($_SESSION['login'])){
                                ?>
                                <a href="#">
                                    Add To Cart
                                </a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="../login">
                                    Add To Cart
                                </a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Beverage end -->

    <!-- View All Button start -->
    <div class="container">
        <div class="viewAll">
            <a href="../menu/foodMenu.php" class="viewAllBtn">View All</a>
        </div>
    </div>
    <!-- View All Button end -->

    <!-- Shopping Cart start -->
    <div class="cartTab">
        <h1>Food Cart</h1>
        <div class="listCart">
            <div class="item">
                <div class="image">
                    <img src="../images/Menu/Salmon-Fried-Rice.jpg" alt="">
                </div>
                <div class="name">
                    Salmon Fried Rice
                </div>
                <div class="totalPrice">
                    RM 15.00
                </div>
                <div class="quantity">
                    <span class="minus">&lt;</span>
                    <span>1</span>
                    <span class="plus">&gt;</span>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="../images/Menu/Salmon-Fried-Rice.jpg" alt="">
                </div>
                <div class="name">
                    Salmon Fried Rice
                </div>
                <div class="totalPrice">
                    RM 15.00
                </div>
                <div class="quantity">
                    <span class="minus">&lt;</span>
                    <span>1</span>
                    <span class="plus">&gt;</span>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="../images/Menu/Salmon-Fried-Rice.jpg" alt="">
                </div>
                <div class="name">
                    Salmon Fried Rice
                </div>
                <div class="totalPrice">
                    RM 15.00
                </div>
                <div class="quantity">
                    <span class="minus">&lt;</span>
                    <span>1</span>
                    <span class="plus">&gt;</span>
                </div>
            </div>
        </div>
        <div class="btn">
            <button class="close">Close</button>
            <button class="checkOut">Checkout</button>
        </div>
    </div>
    <!-- Shopping Cart end -->

    <?php include "../includes/menu_includes/footer.php" ?>