<?php
	include "../db_setup/db.php"; 
    session_start();
?>

<body class="">
    <!-- Header start -->
    <div class="header">
        <div class="container">
            <div class="left-brand">
                <a href="../">
                    <img src="../images/index/Logo Files/For Web/png/Color logo - no background.png" alt="YUMMY">
                </a>
            </div>
            <div class="center-nav">
                <ul>
                    <li><a href="../menu">HOME</a></li>
                    <li><a href="../menu/foodCategory.php">CATEGORY</a></li>
                    <li><a href="../menu/foodMenu.php">MENU</a></li>
                    <li><a href="../faq">FAQs</a></li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['login'])) {
                ?>
                <div class="right-nav">
                    <?php
                    $count = 0;
                    if (isset($_SESSION['cart'])) {
                        $count = count($_SESSION['cart']);
                    }
                    ?>
                    <a href="../checkout" class="cart">
                        <img src="../images/Menu/shopping-cart.png" alt="">
                        <span><?php echo $count; ?></span>
                    </a>
                    <div class="dropdown">
                        <button onclick="myDropdown()" class="dropbtn">
                            <i class="fa-regular fa-user" style="color: #ffffff;"></i>
                            <?php echo $_SESSION['login'] ?>
                        </button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="../myAccount">
                                <img src="../images/Menu/user.png" alt="">
                                My Account
                            </a>
                            <a href="../order_history">
                                <img src="../images/Menu/shopping-bag.png" alt="">
                                Order History
                            </a>
                            <a href="../logout">
                                <img src="../images/Menu/logout.png" alt="">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
                <script>
                    function myDropdown() {
                        var dropdownContent = document.getElementById("myDropdown");
                        if (dropdownContent.style.display === "block") {
                            dropdownContent.style.display = "none";
                        } else {
                            dropdownContent.style.display = "block";
                        }
                    }

                // Close the dropdown if the user clicks outside of it
                window.onclick = function(event) {
                    if (!event.target.matches('.dropbtn')) {
                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.style.display === 'block') {
                                openDropdown.style.display = 'none';
                            }
                        }
                    }
                }

                </script>
                <?php
            }
            else{
                ?>
                <div class="right-nav">
                    <div class="cart">
                    </div>
                    <div class="account">
                        <a href="../login">Login</a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="container">
            <div class="search-wrap">
                <div class="search-box">
                    <form action="../menu/foodSearch.php" method="post">
                        <input type="text" class="search-input" placeholder="Search food.." name="search">
                        <button type="submit" name="submit" class="searchBtn">
                            <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        </div>
    <!-- Header end -->