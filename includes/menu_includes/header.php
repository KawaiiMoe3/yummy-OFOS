<?php 
	include "../db_setup/db.php"; 
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YUMMY | Menu</title>
    <link rel="icon" type="image.x-icon" href="../images/index/Logo Files/For Web/Favicons/browser.png">
    <link rel="stylesheet" href="../css/defaultCss.css">
    <link rel="stylesheet" href="../css/menu.css">
</head>
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
                    <li><a href="./">HOME</a></li>
                    <li><a href="#">CATEGORY</a></li>
                    <li><a href="../menu/foodMenu.php">MENU</a></li>
                    <li><a href="../faq">FAQs</a></li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['login'])) {
                ?>
                <div class="right-nav">
                    <div class="search">
                        <span class="search-icon">
                            <img class="searchBtn" src="../images/Menu/search-interface-symbol.png" alt="">
                            <img class="closeBtn" src="../images/Menu/close.png" alt="">
                        </span>
                    </div>
                    <div class="search-box">
                        <input type="text" name="search" id="searchBox" placeholder="search food..">
                    </div>
                    <div class="cart">
                        <img src="../images/Menu/shopping-cart.png" alt="">
                        <span>0</span>
                    </div>
                    <div class="dropdown">
                        <button onclick="myDropdown()" class="dropbtn"><?php echo $_SESSION['login'] ?></button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="#home">
                                <img src="../images/Menu/user.png" alt="">
                                My Account
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
                    <div class="search">
                        <span class="search-icon">
                            <img class="searchBtn" src="../images/Menu/search-interface-symbol.png" alt="">
                            <img class="closeBtn" src="../images/Menu/close.png" alt="">
                        </span>
                    </div>
                    <div class="search-box">
                        <input type="text" name="search" id="searchBox" placeholder="search food..">
                    </div>
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
    </div>
    <!-- Header end -->