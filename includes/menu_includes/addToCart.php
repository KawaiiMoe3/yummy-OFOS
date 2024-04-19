<?php
    //Check login status
    if (isset($_SESSION['login'])) {
        //logged in
        ?>
        <form action="" method="post">
            <button type="submit" name="addToCart" class="addToCart">Add To Cart</button>
            <input type="hidden" name="food_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="food_name" value="<?php echo $row['foodName']; ?>">
            <input type="hidden" name="food_price" value="<?php echo $row['foodPrice']; ?>">
            <input type="hidden" name="food_image" value="<?php echo $row['foodImage']; ?>">
        </form>
        
        <?php
        //Add the food to cart when button pressed
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST['addToCart'])){
                //Check the cart $_SESSION had food or not
                if(isset($_SESSION['cart'])){
                    //Add the same selected food to cart
                    $foodItems = array_column($_SESSION['cart'], 'food_name');
                    if(in_array($_POST['food_name'], $foodItems)){
                        echo "<script>
                            alert('Foods already added');
                            window.location.href = '../menu/foodMenu.php';
                        </script>";
                    }
                    else{
                        //Add the different selected food to cart and count the quantity of cart
                        $count = count($_SESSION['cart']);
                        $_SESSION['cart'][$count] = array(
                            'food_image' => $_POST['food_image'],
                            'food_name' => $_POST['food_name'], 
                            'food_price' => $_POST['food_price'],
                            'Quantity' => 1
                        );
                        echo "<script>
                            alert('Foods added into your cart.');
                            window.location.href = '../menu/foodMenu.php';
                        </script>";
                    }
                }
                else{
                    //isEmpty, store the food into $_SESSION and initiate count = 0
                    $_SESSION['cart'][0] = array(
                        'food_image' => $_POST['food_image'], 
                        'food_name'=>$_POST['food_name'], 
                        'food_price'=>$_POST['food_price'], 
                        'Quantity'=>1);
                    echo "<script>
                        alert('Foods added into your cart.');
                        window.location.href = '../menu/foodMenu.php';
                    </script>";
                }
            }
        }
    }
    else{
        // Prompt user to login before add to cart
        ?>
        <a href="../login">
            Add To Cart
        </a>
        <?php
    }
?>