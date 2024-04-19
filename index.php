<?php include "./includes/index_includes/header.php" ?>

    <!-- Hero start -->
    <section id="hero">
        <div class="hero container">
            <div>
            <?php
            if (isset($_SESSION['login'])) {
                ?>
                <h1>Begin Yours<span></span></h1>
                <h1>Tasty in YUMMY,<span></span></h1>
                <h1><?php echo $_SESSION['login'] ?><span></span></h1>
                <?php
            }
            else{
                ?>
                <h1>Savor<span></span></h1>
                <h1>Extraordinary Tastes<span></span></h1>
                <h1>Only With YUMMY<span></span></h1>
                <?php
            }
            ?>
                
                <a href="./menu" type="button" class="btn-index">Discover Menu</a>
            </div>
        </div>
    </section>
    <!-- Hero end -->

    <!-- Service Section -->
    <section id="services">
        <div class="services container">
            <div class="service-top">
                <h1 class="section-title">Why <span>YUMMY </span>?</h1>
                <p>YUMMY offers unique tastes in food with emotional satisfaction...Real excitement. We are known for our great quality food and different styles of cooking so come and have try out in YUMMY!!</p>
            </div>
            <div class="service-bottom">
                <div class="service-item">
                    <div class="icon"><img src="./images/index/hamburger.png"/>
                    </div>
                    <h2>Unique Styles of food</h2>
                    <p>YUMMY has a secret recipe, which only the chef knows, our chef has undergone a great deal of training to ensure we reach your satisfaction when you taste our food. </p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="./images/index/menu--v1.png"/>
                    </div>
                    <h2>Variety of food choice</h2>
                    <p>Do you want a pizza? Sure! Want a burger? Not a problem! YUMMY has variety of food choice for you to choose as we know that hate eating the same thing evryday.</p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="./images/index/cook-male--v1.png"/>
                    </div>
                    <h2>professional chefs</h2>
                    <p>As we mentioned, our restaurant serve customers with our secret recipe.To ensure our food taste reach the maximun satisfaction to you, we had a course for every chefs.</p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="./images/index/service-bell.png"/>
                    </div>
                    <h2>Well trained staffs</h2>
                    <p>Well, besides delicious food, services is also an important to customers and we did that too as we had a course to train staffs for giving you a better services in YUMMY.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Section -->

    <!-- Food start -->
    <section id="foods">
        <div class="foods container">
            <div class="foods-header">
                <h1 class="section-title"><span>recommended</span> YUMMY</h1>
            </div>
            <div class="all-foods">
                <div class="project-item">
                    <div class="project-info">
                        <h1>Spaghetti</h1>
                        <h2>with cabonara sauce</h2>
                        <p>In YUMMY, you eat not only a spaghetti, but with the memories of mother making this dish to you</p>
                    </div>
                    <div class="project-img">
                        <img src="./images/index/spaghetti.jpeg" alt="img">
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-info">
                        <h1>Burger</h1>
                        <h2>With cheese, vegetables, onions, tomatoes, etc</h2>
                        <p>When ordering burgers, you are free to choose different patties and side dishes and also your puttings. Just say it, and we'll do it for you.</p>
                    </div>
                    <div class="project-img">
                        <img src="./images/index/burger.jpeg" alt="img">
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-info">
                        <h1>Ramen</h1>
                        <h2>Japanese style, but bigger version</h2>
                        <p>Love ramen? Here you go! We make not only ramen, but a HUGE size of ramen which can be enjoyed by 2~3 people.</p>
                    </div>
                    <div class="project-img">
                        <img src="./images/index/ramen.jpeg" alt="img">
                    </div>
                </div>
                <a href="./menu" type="button" class="btn-index">Check out our menu</a>
            </div>
        </div>
    </section>
    <!-- Food end -->

    <!-- About start -->
    <section id="about">
        <div class="about container">
            <div class="col-left">
                <div class="about-img">
                    <img src="./images//index/1687848957_SBOe6a_Malaysia.jpg" alt="img">
                </div>
            </div>
            <div class="col-right">
                <h1 class="section-title">About <span>us</span></h1>
                <h2>we're passionate about bringing delicious food right to your doorstep</h2>
                <p>Our journey began with a simple idea: to create a seamless and convenient way for food lovers to discover, order, and enjoy their favorite meals from the comfort of their homes.</p>
                <a href="./about_us" type="button" class="btn-index">Explore More</a>
            </div>
        </div>
    </section>
    <!-- About end -->

    <!-- Contact start -->
    <section id="contact">
        <div class="contact container">
            <div>
                <h1 class="section-title">Contact <span>info</span></h1>
            </div>
            <div class="contact-items">
                <div class="contact-item">
                    <div class="icon"><img src="./images/index/apple-phone.png" /></div>
                    <div class="contact-info">
                        <h1>Phone</h1>
                        <h2>+60 167114514</h2>
                        <h2>+60 125569909</h2>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon"><img src="./images/index/new-post.png" /></div>
                    <div class="contact-info">
                        <h1>Email</h1>
                        <h2>yummy_cs@yummy.com</h2>
                        <h2>yummy_official@yummy.com</h2>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon"><img src="./images/index/address.png" /></div>
                    <div class="contact-info">
                        <h1>Address</h1>
                        <h2>100 Jalan YUMMY Taman YUMMY 81000 Kulai Johor</h2>
                    </div>
                </div>
            </div>
            <a href="./contactUs" type="button" class="btn-index">Contact Us</a>
        </div>
    </section>
    <!-- Contact end -->

    <?php include "./includes/index_includes/footer.php" ?>

    <script src="./js/index.js"></script>
</body>
</html>